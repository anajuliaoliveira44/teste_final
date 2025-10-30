<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentario';
    protected $fillable = ['comentario', 'publicacao_id', 'user_id'];
    public $timestamps = false;
    
}
