<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekaptaripfranco extends Model
{
    protected $table = "rekaptaripfranco";
    protected $fillable = ['id','kode_rute','nama_vendor','status_pemenang','kontrak','tgl_kontrak','mulai','akhir'];
}
