<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cauhoi extends Model
{
	protected $table="cauhoi";
    protected  $primaryKey = 'idCauHoi';
    public function monhoc(){
    	return $this->belongsTo('App\monhoc','idCauHoi','idMonHoc');
    }
    public function chude(){
    	return $this->belongsTo('App\chude','idCauHoi','idChuDe');
    }
    public function level(){
    	return $this->belongsTo('App\level','idLevel','idCauHoi');
    }
    public function user(){
    	return $this->belongsTo('App\user','idNguoiTao','idCauHoi');
    }
}
