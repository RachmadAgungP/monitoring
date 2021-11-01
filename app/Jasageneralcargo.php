<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasageneralcargo extends Model
{
    public $table = "jasageneralcargo";
    protected $fillable = ['id','kode_rutes','nama_vendor','status_pemenang','kontrak','tgl_kontrak','mulai','akhir'];
}
