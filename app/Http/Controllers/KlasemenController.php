<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Skor;
use Illuminate\Http\Request;

class KlasemenController extends Controller
{
    public function klasemen()
    {
        $klubs = Club::all();
        $klasemen = [];

        foreach ($klubs as $klub) {
            $klubData = [
                'klub' => $klub->nama_club,
                'Ma' => 0,
                'Me' => 0,
                'S' => 0,
                'K' => 0,
                'GM' => 0,
                'GK' => 0,
                'Point' => 0,
            ];

            $scores = Skor::where('club_id_1', $klub->id)->orWhere('club_id_2', $klub->id)->get();
            foreach ($scores as $score) {
                $klubData['Ma']++;

                if ($score->club_id_1 === $klub->id) {
                    $klubData['GM'] += $score->score_1;
                    $klubData['GK'] += $score->score_2;
                    if ($score->score_1 > $score->score_2) {
                        $klubData['Me']++;
                        $klubData['Point'] += 3;
                    } elseif ($score->score_1 === $score->score_2) {
                        $klubData['S']++;
                        $klubData['Point'] += 1;
                    } else {
                        $klubData['K']++;
                    }
                } else {
                    $klubData['GM'] += $score->score_2;
                    $klubData['GK'] += $score->score_1;
                    if ($score->score_2 > $score->score_1) {
                        $klubData['Me']++;
                        $klubData['Point'] += 3;
                    } elseif ($score->score_2 === $score->score_1) {
                        $klubData['S']++;
                        $klubData['Point'] += 1;
                    } else {
                        $klubData['K']++;
                    }
                }
            }

            $klasemen[] = $klubData;
        }
        usort($klasemen, function ($a, $b) {
            return $b['Point'] - $a['Point'];
        });

        return view('klasemen.index', compact('klasemen'));
    }
}
