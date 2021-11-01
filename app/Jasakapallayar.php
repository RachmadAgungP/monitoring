<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasakapallayar extends Model
{
    public $table = "jasakapallayar";
    protected $fillable = ['id','kode_rutes','nama_vendor','status_pemenang','kontrak','tgl_kontrak','mulai','akhir'];
}
