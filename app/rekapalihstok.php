<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekapalihstok extends Model
{
    protected $table = "rekapalihstok";
    protected $fillable = ['id','kode_rutes','nama_vendor','status_pemenang','kontrak','tgl_kontrak','mulai','akhir'];
}
