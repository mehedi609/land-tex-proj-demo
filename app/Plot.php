<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plot extends Model
{
  protected $guarded = [];

  public function area()
  {
      return $this->belongsTo(Area::class);
  }
}
