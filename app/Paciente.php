<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido_pat',
        'apelliodo_mat',
        'fecha_nac'
    ];

    public $timestamps = false;
}
