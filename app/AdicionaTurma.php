<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdicionaTurma extends Model
{
    protected $fillable = ['descricao','quantidade_vagas','professor'];
    protected $table = 'turmas';
}
