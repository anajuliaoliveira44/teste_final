<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
    
}
