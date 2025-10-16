<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContatoProfessor extends Model
{
  protected $table = 'contato_professor';
   protected $fillable =['professor_id','email','telefone']; 
   public $timestamps = false;

   public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
    
}
