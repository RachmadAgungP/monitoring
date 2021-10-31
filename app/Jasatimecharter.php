<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasatimecharter extends Model
{
    public $table = "jasatimecharter";
    protected $fillable = ['id','nama_angkutan','kelas_kapasitas','nama_vendor','tarif','kapasitas','kontrak','tgl_kontrak','mulai','akhir'];

}
