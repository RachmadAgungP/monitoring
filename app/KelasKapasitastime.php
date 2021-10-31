<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelaskapasitastime extends Model
{
    public $table = "kelas_kapasitas_time";
    protected $fillable = ['id_kelas_kapasitas','kelas_kapasitas'];
}
