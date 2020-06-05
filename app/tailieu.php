<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tailieu extends Model
{
    protected $table="tailieu";
    protected  $primaryKey = 'idTaiLieu';
    public function monhoc()
    {
    	return $this->belongsTo('App\monhoc','idMonHoc','idMonHoc');
    }
}
