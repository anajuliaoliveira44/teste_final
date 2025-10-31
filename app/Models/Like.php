<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    protected $table = 'likes';
    
    protected $fillable = ['publicacao_id', 'user_id', 'likes','created_at','updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id' );
    }
    public function publicacao(): BelongsTo
    {
        return $this->belongsTo(Publicacao::class, 'publicacao_id', 'id_publicacao');
    }
}
