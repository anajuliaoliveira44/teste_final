<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacao';
    protected $fillable = ['likes', 'deslikes', 'publicacao_id'];
    public $timestamps = false;
    
}
