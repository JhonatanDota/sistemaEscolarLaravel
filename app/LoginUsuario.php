<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginUsuario extends Model
{
    protected $fillable = ['nome','email','senha','tipo_acesso'];
}
