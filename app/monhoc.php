<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monhoc extends Model
{
    // protected $table="monhoc";
    // protected  $primaryKey = 'idMonHoc';
    
    protected $table="monhoc";
    protected $primaryKey = 'idMonHoc';
    
    //public $timestamps = false;
    
    public function chude()
    {
    	return $this->hasMany('App\chude','idMonHoc','idMonHoc'); //1 môn học có nhiều chủ đề
    }

    public function dethi()
    {
    	return $this->hasMany('App\dethi','idMonHoc','idMonHoc'); //1 môn học có nhiều de thi
    }

    public function cauhoi(){
     	return $this->hasMany('App\cauhoi','idMonHoc','idMonHoc');
    }
    public function giangday(){
    	return $this->hasMany('App\giangday','idMonHoc','idMonHoc');
    }
}
