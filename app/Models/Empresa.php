<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
   protected $fillable =['nome','loga_url','descricao','data_criacao','data_atualizacao']; 
   public $timestamps = false;

}
