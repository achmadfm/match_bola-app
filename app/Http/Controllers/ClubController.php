<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ClubMatch;
use App\Models\Klasmen;
use App\Models\KlasmenScore;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $data = Club::get();
        return view('club', compact('data'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:clubs'],
            'city' => ['required'],
        ]);

        Club::create($request->all());
        KlasmenScore::create([
            'id_klasmen' => Klasmen::latest()->first()->id,
            'id_club' => Club::latest()->first()->id,
        ]);

        return redirect()->back()->with('success', 'Club Created Successfully');
    }

    public function delete($id)
    {
        $klasmen = Klasmen::latest()->first();
        Club::find($id)->delete();
        ClubMatch::where('id_club_1', $id)->orWhere('id_club_2', $id)->delete();
        KlasmenScore::where('id_club', $id)->where('id_klasmen', $klasmen->id)->delete();
        KlasmenScore::where('id_klasmen', $klasmen->id)->update([
            'point' => 0,
            'win_goal' => 0,
            'lose_goal' => 0,
            'm' => 0,
            'w' => 0,
            'l' => 0,
            'd' => 0,
        ]);
        //recount klasmen score
        $data = ClubMatch::get();
        $recountScore = new ScoreController();
        foreach ($data as $row) {
            $recountScore->submitMatch($row->id_club_1, $row->id_club_2, $row->score_club_1, $row->score_club_2);
        }
        return redirect()->back()->with('success', 'Club Deleted Successfully');
    }
}
