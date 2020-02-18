<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaintJobProgress extends Model
{
  protected $table = 'paint_job_progresses';

  public $primaryKey = 'id';

  public $timestamps = true;

}
