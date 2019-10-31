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

    return redirect()->route('preview.show')->with('plot_id', $plot_id);

  }

  public function show()
  {
    $plot_id = "";

    if (session('plot_id')) {
      $plot_id = session('plot_id');
    }

    $landOwners = DB::table('land_owners');

    return view('backend.preview.show', compact('user'));
  }
}
