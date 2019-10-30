<?php

namespace App\Http\Controllers;

use App\Area;
use App\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PlotController extends Controller
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


    $plots = DB::table('plots')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->select('plots.*', 'areas.name')
      ->orderBy('plots.id')
      ->paginate(10);

    return view('backend.plots.index', compact('plots'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $areas = Area::all();
    return view('backend.plots.create', compact('areas'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $plot = new Plot();

    $plot->plot_no = $request->plot_no;
    $plot->area = $request->area;
    $plot->total_flat = $request->total_flat;
    $plot->area_id = $request->sel_area;

    $plot->save();

    Session::flash('status', "Plot Added Successfully");

    return redirect()->route('plots.index');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Plot $plot
   * @return \Illuminate\Http\Response
   */
  public function show(Plot $plot)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Plot $plot
   * @return \Illuminate\Http\Response
   */
  public function edit(Plot $plot)
  {
    $plot_area = DB::table('plots')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->where('areas.id', '=', $plot->area_id)
      ->select('areas.name')
      ->get();

//      print_r($plot_area);
//    print_r($plot->area_id);

    $area_name = $plot_area[0]->name;
//    print_r($area_name);

    $areas = Area::where('id', '<>', $plot->area_id)->get();
    return view('backend.plots.edit', compact('areas', 'area_name', 'plot'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Plot $plot
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Plot $plot)
  {
    $plot->plot_no = $request->plot_no;
    $plot->area = $request->area;
    $plot->total_flat = $request->total_flat;
    $plot->area_id = $request->sel_area;

    $plot->save();

//    Session::flash('status', "Plot Added Successfully");

    return redirect()
      ->route('plots.index')
      ->with('status', 'Plot Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Plot $plot
   * @return \Illuminate\Http\Response
   */
  public function destroy(Plot $plot)
  {
    $plot->delete();
    //Redirect to a specified route with flash message.
    return redirect()
      ->route('plots.index')
      ->with('status','Deleted the selected Plot');
  }

  public function getPlotsByAreaId($id)
  {
    $plots = DB::table('plots')->where('area_id', $id)->orderBy('plots.id')->get();
    return $plots;
  }
}
