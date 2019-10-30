<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Requests\Area\CreateAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AreaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (session('status'))
      Alert::success('Success Title', session('status'));

    $areas = Area::paginate(15);
    return view('backend.areas.index', compact('areas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('backend.areas.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateAreaRequest $request)
  {
    $area = new Area();

    $area->name = $request->name;

    $area->save();

    return redirect()->route('areas.index')->with('status', 'Area Added Successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Area $area
   * @return \Illuminate\Http\Response
   */
  public function show(Area $area)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Area $area
   * @return \Illuminate\Http\Response
   */
  public function edit(Area $area)
  {
    return view('backend.areas.edit', compact('area'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Area $area
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateAreaRequest $request, Area $area)
  {
    $area->name = $request->name;

    $area->save();

    return redirect()->route('areas.index')->with('status', 'Area Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Area $area
   * @return \Illuminate\Http\Response
   */
  public function destroy(Area $area)
  {
    $area->delete();
    //Redirect to a specified route with flash message.
    return redirect()
      ->route('areas.index')
      ->with('status','Deleted the selected area');
  }
}
