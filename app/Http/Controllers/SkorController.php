<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkorStoreRequest;
use App\Models\Club;
use App\Models\Skor;
use Illuminate\Http\Request;
Use Alert;
class SkorController extends Controller
{
    public function index ()
    {
        $club=Club::all();
        return view('skor.index',compact('club'));
    }

    public function store (SkorStoreRequest $request)
    {

        $data = $request->validated();

        foreach ($request->inputs as $key => $value) {
            if ($request->inputs[$key]['club_id_1'] === $request->inputs[$key]['club_id_2']) {
                Alert::error('Data Skor', 'Ada nama klub yang sama dalam satu pertandingan');
                return redirect()->back();
            }
            Skor::create($value);
        }

        Alert::success('Data Skor', 'Skor Berhasil Ditambahkan');
        return redirect()->route('skor.index');

    }
}
