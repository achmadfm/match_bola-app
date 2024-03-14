<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasmen extends Model
{
    use HasFactory;
    protected $table = 'klasmen'; // table name is klasmen
    protected $guarded = [];
}
