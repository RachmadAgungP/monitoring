<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasacontainer extends Model
{
    public $table = "jasacontainer";
    protected $fillable = ['id','kode_rute','nama_vendor','status_pemenang','kontrak','tgl_kontrak','mulai','akhir'];
}
