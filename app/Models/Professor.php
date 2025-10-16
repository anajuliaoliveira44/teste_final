<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
   protected $table = 'professor';
   protected $fillable =['id','nome','disciplina', 'foto'];
   public $timestamps = false; 

   public function ContatoProfessor(){
    return $this->hasOne(ContatoProfessor::class);
   }
}
