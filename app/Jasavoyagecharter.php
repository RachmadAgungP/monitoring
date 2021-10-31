<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasavoyagecharter extends Model
{
    // 
    public $table = "jasavoyagecharter";
    protected $fillable = ['id','kode_rutes','nama_vendor','status_pemenang','kontrak','tgl_kontrak','mulai','akhir'];
}
