<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreviewController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $areas = Area::all();
    return view('backend.preview.index', compact('areas'));
  }

  public function getData(Request $request)
  {
    $plot_id = $request->sel_plot;
    $area_id = $request->sel_area;

    $area_n_plot_id_arr = ['area_id' => $area_id, 'plot_id' => $plot_id];

    return redirect()->route('preview.show')->with('ids', $area_n_plot_id_arr);

  }

  public function show()
  {
    $plot_id = "";
    $area_id = "";
    $positions_arr = ['', 'st', 'nd', 'rd', 'th'];

   /* print_r(session('ids'));
    print_r();
    print_r($area_id);*/

    if (session('ids')) {
      $ids_arr = session('ids');
      $plot_id = $ids_arr['plot_id'];
      $area_id = $ids_arr['area_id'];
    }

    $landOwners = DB::table('land_owners')
      ->join('plots', 'land_owners.plot_id', '=', 'plots.id')
      ->join('areas', 'plots.area_id', '=', 'areas.id')
      ->select('land_owners.*')
      ->where('plot_id', $plot_id)
      ->where('areas.id', $area_id)
      ->orderByDesc('track_owner')
      ->get();

    $flats = DB::table('flats as f')
      ->join('plots as p', 'f.plot_id', '=', 'p.id')
      ->join('areas as a', 'p.area_id', '=', 'a.id')
      ->select('f.*', 'a.id as area_id', 'p.id as plot_id')
      ->where('a.id', $area_id)
      ->where('p.id', $plot_id)
      ->orderBy('f.id')
      ->get();

    return view('backend.preview.show', compact('landOwners', 'positions_arr', 'flats'));
  }
}
