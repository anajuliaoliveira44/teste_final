<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
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
=======
use App\Models\Avaliacao;

class Publicacao extends Model
{
    protected $table = 'publicacao';
    protected $fillable = ['foto', 'titulo_prato', 'localr', 'cidade', 'empresa_id'];
    public $timestamps = false;
    
 
    public function avaliacao()
    {
        // Retorna uma avaliação padrão (likes=0) se não existir, evitando nulidade na view
        return $this->hasOne(Avaliacao::class, 'publicacao_id')->withDefault([
            'likes' => 0,
            'deslikes' => 0,
        ]);
    }
    
>>>>>>> b30999b3e9210094af1c03a54f6c305538de201d
}
