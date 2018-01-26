<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    protected $table = 'crews';

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
