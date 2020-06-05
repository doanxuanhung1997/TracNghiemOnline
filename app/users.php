<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = "users";
    protected $primaryKey = 'id'; 
    //public $timestamps = false;
    public function typeaccount()
    {
    	return $this->belongsTo('App\typeaccount','idtype','idtype');
    }

    public function tintuc()
    {
    	return $this->hasMany('App\tintuc','idGiangVien','id');
    }
}
