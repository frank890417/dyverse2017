<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = 
    ['title','content','tag','link','description','author','cover','established_time','created_at'];
}
