<?php

namespace App\Http\Controllers;

use App\Area;
use App\LandOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LandOwnerController extends Controller
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

    $landOwners = $this->getLandOwners();

//    print("<pre>" . print_r($landOwners, true) . "</pre>");

    return view('backend.land_owners.index', compact('landOwners'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $areas = Area::all();

//      print("<pre>".print_r($areas,true)."</pre>");

    return view('backend.land_owners.create', compact('areas'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $plot_id = $request->sel_plot;

//      print("<pre>".print_r($plot_id,true)."</pre>");

    $max = DB::table('land_owners')
      ->where('plot_id', $plot_id)
      ->max('track_owner');

    if (!$max) $max = 0;

//      print("<pre>".print_r($max,true)."</pre>");

    if ($max > 1) {
      $current_owner = DB::table('land_owners')
        ->where('plot_id', $plot_id)
        ->where('track_owner', $max)
        ->get();

      DB::table('land_owners')
        ->where('id', $current_owner[0]->id)
        ->update(['status' => false]);
    }

    $land_owner = new LandOwner();
    $land_owner->name = $request->name;
    $land_owner->plot_id = $plot_id;
    $land_owner->track_owner = $max + 1;

    $land_owner->save();
//      print("<pre>".print_r($land_owner,true)."</pre>");


    return redirect()
      ->route('landowners.index')
      ->with('status', 'A new Land Owner created!');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\LandOwner $landOwner
   * @return \Illuminate\Http\Response
   */
  public function show(LandOwner $landOwner)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
//    $landOwner = LandOwner::findOrFail($id);
//    print("<pre>".print_r($landOwner,true)."</pre>");

    $landOwner = $this->getLandOwnerId($id);

    $areas = Area::getFilteredArea($landOwner->area_id);

    return view('backend.land_owners.edit', compact('areas', 'landOwner'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $landOwner = LandOwner::findOrFail($id);
//    print("<pre>".print_r($landOwner,true)."</pre>");

    $plot_id = $request->sel_plot;
    $landOwner->name = $request->name;
    $landOwner->plot_id = $plot_id;

    $landOwner->save();

    return redirect()
      ->route('landowners.index')
      ->with('status', 'Land Owner Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $landOwner = LandOwner::findOrFail($id);
    $landOwner->delete();

    return redirect()
      ->route('landowners.index')
      ->with('status', 'Deleted the selected Land Owner');
  }

  public function getLandOwners()
  {
    $landOwners = DB::table('land_owners')
      ->join('plots', 'land_owners.plot_id', '=', 'plots.id')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->select('land_owners.*', 'plots.plot_no', 'areas.name as area_name', 'areas.id as area_id')
      ->paginate(10);

    return $landOwners;
  }

  public function getLandOwnerId($id)
  {

    $landOwner = DB::table('land_owners')
      ->join('plots', 'land_owners.plot_id', '=', 'plots.id')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->select('areas.id as area_id', 'areas.name as area_name', 'plots.plot_no', 'land_owners.*')
      ->where('land_owners.id', $id)
      ->get();

    return $landOwner[0];
  }
}
