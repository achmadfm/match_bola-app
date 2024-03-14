<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasmenScore extends Model
{
    use HasFactory;

    protected $table = 'klasmen_score'; //table name is klasmen_score
    protected $guarded = [];

    public function club()
    {
        return $this->belongsTo(Club::class, 'id_club', 'id');
    }
}
