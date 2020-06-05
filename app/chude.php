<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chude extends Model
{
    protected $table="chude";
    protected  $primaryKey = 'idChuDe';
    public function cauhoi(){
    	return $this->hasMany('App\cauhoi','idChuDe','idChuDe');
    }
    public $timestamps = false;
    // public function monhoc(){
    // 	return $this->belongsTo('App\monhoc','idMonHoc','idChuDe');
    // }
    public function monhoc()
    {
    	return $this->belongsTo('App\monhoc','idMonHoc','idMonHoc');
    }
}
