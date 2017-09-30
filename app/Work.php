<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $fillable = 
    ['title','image','discription','work','credit','mv','date','company','work_url','company_url','updated_at','created_at','singerid'];
    protected $appends = ['embed_url','media_type'];

    public function setDateAttribute($value){
        $this->attributes['date'] = str_replace("/", ".", $value);
    }

    public function getEmbedUrlAttribute()
    {
        preg_match('/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/', $this->work_url, $matches);
// print_r($matches);
        // dd( $matches);
        if (isset( $matches[2])){
          return "https://www.youtube.com/embed/". $matches[2]; 
        }
        return "";
    }
    public function getMediaTypeAttribute()
    {
        if (strpos($this->work_url,'youtube')!==false){
          return 'youtube';
        }else if (strpos($this->work_url,'soundcloud')!==false){
          return 'soundcloud';
        }

    }
    // public function singer(){
    //   return $this->hasOne('App\Singer','id', 'singerid');
    // }
}
