<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Area extends Model
{
    protected $guarded = [];

    public function plots()
    {
      return $this->hasMany(Plot::class);
    }

  public static function getFilteredArea($area_id)
  {
    /*$areas = DB::select(
      DB::raw(
        "select areas.id, areas.name 
            from areas 
            where id <> '$area_id';
            "
      )
    );*/

    $areas = DB::table('areas')->where('id', '<>', $area_id)->get();

    return $areas;
  }
}
