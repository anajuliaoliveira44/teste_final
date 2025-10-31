<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    protected $table = 'comentario';
    protected $fillable = ['comentario', 'publicacao_id', 'user_id'];
    public $timestamps = false;
    
     public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function publicacao(): BelongsTo
  {
    return $this->belongsTo(Publicacao::class, 'publicacao_id');
  }
}
