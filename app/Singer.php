<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    //
    protected $fillable=["name","cover","link","description","show"];
}
