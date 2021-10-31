<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPemenang extends Model
{
    protected $table = "statuspemenang";
    protected $fillable = ['id','status_pemenang'];

}
