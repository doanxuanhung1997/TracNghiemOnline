<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    protected $table="tintuc";
    protected  $primaryKey = 'idTinTuc';
    public function users()
    {
    	return $this->belongsTo('App\users','idGiangVien','id');
    }
}
