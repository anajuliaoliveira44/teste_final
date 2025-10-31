<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\BelongsTo;
=======
>>>>>>> b30999b3e9210094af1c03a54f6c305538de201d

class Comentario extends Model
{
    protected $table = 'comentario';
    protected $fillable = ['comentario', 'publicacao_id', 'user_id'];
    public $timestamps = false;
    
<<<<<<< HEAD
     public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function publicacao(): BelongsTo
  {
    return $this->belongsTo(Publicacao::class, 'publicacao_id');
  }
=======
>>>>>>> b30999b3e9210094af1c03a54f6c305538de201d
}
