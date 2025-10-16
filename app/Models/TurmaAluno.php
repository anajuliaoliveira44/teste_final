<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  TurmaAluno extends Model
{
    //
   protected $table = 'turma_aluno';
   protected $fillable =['id_aluno']; 
   public $timestamps = false;
}