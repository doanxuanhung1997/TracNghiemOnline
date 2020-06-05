<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dethi extends Model
{
    protected $table="dethi";
    protected  $primaryKey = 'idDeThi';
    // public function monhoc(){
    // 	return $this->belongsTo('App\monhoc','idDeThi','idMonHoc');
    // }
    public function monhoc()
    {
    	return $this->belongsTo('App\monhoc','idMonHoc','idMonHoc');
    }
}
