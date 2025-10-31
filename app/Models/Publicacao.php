<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Publicacao extends Model
{
    
    protected $table = 'publicacao';
    protected $primaryKey = 'id_publicacao';
    protected $fillable = ['foto', 'titulo_prato', 'localr', 'cidade', 'empresa_id'];
    public $timestamps = false;
 public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'publicacao_id', 'id_publicacao');
    }

    public function dislikes(): HasMany
    {
        return $this->hasMany(Dislike::class,  'publicacao_id', 'id_publicacao');
    }

    public function comentario(): HasMany
    {
        return $this->hasMany(Comentario::class,  'publicacao_id', 'id_publicacao');
    }
}
