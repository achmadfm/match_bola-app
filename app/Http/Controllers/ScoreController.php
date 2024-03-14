<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ClubMatch;
use App\Models\Klasmen;
use App\Models\KlasmenScore;
use Illuminate\Http\Request;
use Session;

class ScoreController extends Controller
{
    public function index()
    {
        $data = ClubMatch::get();
        $clubs = Club::get();
        return view('score', compact('data', 'clubs'));
    }

    public function multiScore()
    {
        $data = ClubMatch::get();
        $clubs = Club::get();
        return view('multi-score', compact('data', 'clubs'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'id_club_1' => 'required',
            'score_club_1' => 'required',
            'id_club_2' => 'required|different:id_club_1',
            'score_club_2' => 'required',
        ]);

        try {
            $klasmen = Klasmen::latest()->first();
            if (
                !ClubMatch::where(function ($q) use ($request) {
                    $q->where(function ($q) use ($request) {
                        $q->where('id_club_1', $request->id_club_1);
                        $q->where('id_club_2', $request->id_club_2);
                    })->orWhere(function ($q) use ($request) {
                        $q->where('id_club_1', $request->id_club_2);
                        $q->where('id_club_2', $request->id_club_1);
                    });
                })->where('id_klasmen', $klasmen->id)->exists()
            ) {
                ClubMatch::create($request->all() + ['id_klasmen' => $klasmen->id]);
                $this->submitMatch(
                    $request->id_club_1,
                    $request->id_club_2,
                    $request->score_club_1,
                    $request->score_club_2
                );
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to create match.');
        }
        return redirect()->back()->with('success', 'Match created successfully.');
    }

    public function multiScoreSubmit(Request $request)
    {
        $request->validate([
            'id_club_1' => 'required|array',
            'score_club_1' => 'required|array',
            'id_club_2' => 'required|array',
            'score_club_2' => 'required|array',
        ]);
        $klasmen = Klasmen::latest()->first();
        foreach ($request->id_club_1 as $key => $id_club_1) {
            if ($id_club_1 == $request->id_club_2[$key]) {
                continue;
            }
            try {
                if (
                    !ClubMatch::where(function ($q) use ($request, $id_club_1, $key) {
                        $q->where(function ($q) use ($request, $id_club_1, $key) {
                            $q->where('id_club_1', $id_club_1);
                            $q->where('id_club_2', $request->id_club_2[$key]);
                        })->orWhere(function ($q) use ($request, $id_club_1, $key) {
                            $q->where('id_club_1', $request->id_club_2[$key]);
                            $q->where('id_club_2', $id_club_1);
                        });
                    })->where('id_klasmen', $klasmen->id)->exists()
                ) {
                    ClubMatch::create([
                        'id_club_1' => $id_club_1,
                        'score_club_1' => $request->score_club_1[$key],
                        'id_club_2' => $request->id_club_2[$key],
                        'score_club_2' => $request->score_club_2[$key],
                        'id_klasmen' => $klasmen->id
                    ]);
                    $this->submitMatch(
                        $id_club_1,
                        $request->id_club_2[$key],
                        $request->score_club_1[$key],
                        $request->score_club_2[$key]
                    );
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to create match.');
            }
        }
        return redirect()->back()->with('success', 'Match created successfully.');
    }

    public function submitMatch($club_1, $club_2, $score_1, $score_2)
    {
        $klasmen = Klasmen::latest()->first();
        $club1 = KlasmenScore::where('id_club', $club_1)->where('id_klasmen', $klasmen->id)->first();
        $club2 = KlasmenScore::where('id_club', $club_2)->where('id_klasmen', $klasmen->id)->first();
        if ($score_1 > $score_2) {
            $club1->point += 3;
            $club1->win_goal += $score_1;
            $club1->w += 1;

            $club2->lose_goal += $score_2;
            $club2->l += 1;
        } elseif ($score_1 < $score_2) {
            $club2->point += 3;
            $club2->win_goal += $score_2;
            $club2->w += 1;

            $club1->lose_goal += $score_1;
            $club1->l += 1;
        } else {
            $club1->point += 1;
            $club1->win_goal += $score_1;
            $club1->d += 1;

            $club2->point += 1;
            $club2->win_goal += $score_2;
            $club2->d += 1;
        }
        $club1->m += 1;
        $club2->m += 1;
        $club1->save();
        $club2->save();
    }
}
