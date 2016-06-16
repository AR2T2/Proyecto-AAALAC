<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelobd extends Model
{
    //
    public function status(){return $this->belongsToMany('\App\Status','status')}
    public function registros(){return $this->belongsToMany('\App\Registros','registros')}
    //
}
