<?php

namespace App\Http\Controllers;

use App\Area;
use App\FlatOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FlatOwnerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (session('status')) {
      Alert::success('Success', session('status'));
    }

    $flatOwners = $this->getFlatOwners();

//    print("<pre>" . print_r($flatOwners, true) . "</pre>");

    return view('backend.flat_owners.index', compact('flatOwners'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $areas = Area::all();
    return view('backend.flat_owners.create', compact('areas'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $flat_id = $request->sel_flat;

//      print("<pre>".print_r($flat_id,true)."</pre>");

    $max = DB::table('flat_owners')
      ->where('flat_id', $flat_id)
      ->max('track_owner');

    if (!$max) $max = 0;

//      print("<pre>".print_r($max,true)."</pre>");

    if ($max > 1) {
      $current_owner = DB::table('flat_owners')
        ->where('flat_id', $flat_id)
        ->where('track_owner', $max)
        ->get();

      DB::table('flat_owners')
        ->where('id', $current_owner[0]->id)
        ->update(['status' => false]);
    }

    $flatOwner = new FlatOwner();

    $flatOwner->name = $request->name;
    $flatOwner->flat_id = $flat_id;
    $flatOwner->track_owner = $max + 1;

//    print("<pre>".print_r($flatOwner,true)."</pre>");


    $flatOwner->save();

    return redirect()
      ->route('flat-owners.index')
      ->with('status', 'A new Flat Owner created!');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\FlatOwner $flatOwner
   * @return \Illuminate\Http\Response
   */
  public function show(FlatOwner $flatOwner)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $id
   * @return void
   */
  public function edit($id)
  {
    $flatOwner = $this->getFlatOwnerById($id);

    $areas = Area::getFilteredArea($flatOwner->area_id);

//      print("<pre>" . print_r($flatOwner, true) . "</pre>");

    return view('backend.flat_owners.edit', compact('flatOwner', 'areas'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\FlatOwner $flatOwner
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, FlatOwner $flatOwner)
  {
    $flat_id = $request->sel_flat;

    $flatOwner->name = $request->name;
    $flatOwner->flat_id = $flat_id;

    $flatOwner->save();

    return redirect()
      ->route('flat-owners.index')
      ->with('status', 'Flat Owner Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\FlatOwner $flatOwner
   * @return \Illuminate\Http\Response
   */
  public function destroy(FlatOwner $flatOwner)
  {
    $flatOwner->delete();
    return redirect()
      ->route('flat-owners.index')
      ->with('status', 'Flat Owner Deleted Successfully');
  }

  public function getFlatOwners()
  {
    $flatOwners = DB::table('flat_owners')
      ->join('flats', 'flat_owners.flat_id', '=', 'flats.id')
      ->join('plots', 'flats.plot_id', '=', 'plots.id')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->select('areas.id as area_id', 'areas.name as area_name',
        'plots.id as plot_id', 'plots.plot_no', 'flats.flat_no', 'flat_owners.*'
      )
      ->orderBy('id')
      ->paginate(10);

    return $flatOwners;
  }

  public function getFlatOwnerById($id)
  {
    $flatOwner = DB::table('flat_owners')
      ->join('flats', 'flat_owners.flat_id', '=', 'flats.id')
      ->join('plots', 'flats.plot_id', '=', 'plots.id')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->select('areas.id as area_id', 'areas.name as area_name',
        'plots.id as plot_id', 'plots.plot_no', 'flats.flat_no', 'flat_owners.*'
      )
      ->where('flat_owners.id', $id)->get();

    return $flatOwner[0];
  }

  public function getFlatOwnersByFlatId($id)
  {
    $flatOwners = DB::table('flat_owners')
      ->join('flats', 'flat_owners.flat_id', '=', 'flats.id')
      ->select('flat_owners.*')
      ->where('flats.id', $id)
      ->orderByDesc('flat_owners.track_owner')
      ->get();

    return $flatOwners;
  }
}
