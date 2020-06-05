<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\monhoc;
use App\users;
class giangday extends Model
{
     protected $table="giangday";

  
     protected $primaryKey = 'idGiangVienHT,idMonHoc';


    protected $fillable = ['idGiangVienHT', 'idMonHoc'];
     
    public $timestamps = false;

    public function monhoc()
    {
        return $this->belongsTo('App\monhoc','idMonHoc','idMonHoc');
    }
    public function users()
    {
        return $this->belongsTo('App\users','idGiangVienHT','id');
    }
}
