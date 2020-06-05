<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeaccount extends Model
{
    protected $table="typeaccount";
    protected  $primaryKey = 'idType';
    public function users()
    {
    	return $this->hasMany('App\users','idtype','idtype');
    }
}
