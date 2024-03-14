<?php

namespace App\Http\Controllers;

use App\Models\Klasmen;
use App\Models\KlasmenScore;
use Illuminate\Http\Request;

class KlasmenController extends Controller
{
    public function index()
    {
        if (!$klasmen = Klasmen::first()) {
            $klasmen = Klasmen::firstOrCreate([
                'name' => 'Klasmen' . date('YmdHis')
            ]);
        }

        $data = KlasmenScore::where('id_klasmen', $klasmen->id)->orderBy('point', 'desc')->get();
        return view('dashboard', compact('data'));
    }
}
