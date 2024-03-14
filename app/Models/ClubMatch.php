<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMatch extends Model
{
    use HasFactory;
    protected $table = 'match';
    protected $guarded = [];

    public function club1()
    {
        return $this->belongsTo(Club::class, 'id_club_1');
    }

    public function club2()
    {
        return $this->belongsTo(Club::class, 'id_club_2');
    }
}
