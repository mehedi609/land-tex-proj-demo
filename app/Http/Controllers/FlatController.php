<?php

namespace App\Http\Controllers;

use App\Area;
use App\Flat;
use App\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FlatController extends Controller
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

    $flats = $this->getFlatsInfo();

//      print("<pre>".print_r($flats,true)."</pre>");

    return view('backend.flats.index', compact('flats'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $areas = Area::all();
    return view('backend.flats.create', compact('areas'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $flat = new Flat();

    $flat->flat_no = $request->flat_no;
    $flat->area = $request->area;
    $flat->plot_id = $request->sel_plot;

//    print("<pre>".print_r($flat,true)."</pre>");

    $flat->save();

    return redirect()->route('flats.index')->with('status', 'A New Flat Added');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Flat $flat
   * @return \Illuminate\Http\Response
   */
  public function show(Flat $flat)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $flat = $this->getFlatById($id);

    $areas = Area::getFilteredArea($flat->area_id);

//    print("<pre>".print_r($areas,true)."</pre>");

    return view('backend.flats.edit', compact('flat', 'areas'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Flat $flat
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Flat $flat)
  {
    $flat->flat_no = $request->flat_no;
    $flat->area = $request->area;
    $flat->plot_id = $request->sel_plot;

//    print("<pre>".print_r($flat,true)."</pre>");
    $flat->save();
    return redirect()
      ->route('flats.index')
      ->with('status', 'Flat Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Flat $flat
   * @return \Illuminate\Http\Response
   */
  public function destroy(Flat $flat)
  {
    $flat->delete();
    //Redirect to a specified route with flash message.
    return redirect()
      ->route('flats.index')
      ->with('status', 'Deleted the selected Flat');
  }


  public function getFlatsInfo()
  {
    $flats = DB::table('flats')
      ->join('plots', 'flats.plot_id', '=', 'plots.id')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->select('areas.id as area_id', 'areas.name as area_name', 'plots.plot_no', 'flats.*')
      ->orderBy('id')
      ->paginate(10);

    return $flats;
  }


  public function getFlatById($id)
  {
    $flats = DB::table('flats')
      ->join('plots', 'flats.plot_id', '=', 'plots.id')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->select('areas.id as area_id', 'areas.name as area_name', 'plots.plot_no', 'flats.*')
      ->where('flats.id', $id)->get();

    return $flats[0];
  }

  // Used for ajax call
  public function getFlatsByPlotId($id)
  {
    $flats = DB::table('flats')->where('plot_id', $id)->orderBy('flats.id')->get();
    return $flats;
  }

}
