<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdicionaAluno extends Model
{
    protected $fillable = ['nome', 'sexo', 'nascimento' , 'cidade', 'bairro', 'rua', 'numero', 'complemento'];
    protected $table = 'alunos';
}
