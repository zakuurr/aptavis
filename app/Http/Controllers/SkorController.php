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
        try{
            $arrayClub = [];
            foreach ($request->inputs as $club) {
                $arrayClub[] = $club['club_id_1'];
                $arrayClub[] = $club['club_id_2'];
            }

            $duplicated = array_filter(array_count_values($arrayClub), function ($count) {
                return $count > 1;
            });

            if (count($duplicated) > 0) {
                Alert::error('Error', 'Club tidak bisa duplikat');
                return redirect()->route('skor.index');
            }

            foreach ($request->inputs as $key => $value) {
                Skor::create($value);
            }

            Alert::success('Success', 'Skor berhasil ditambahkan.')->autoClose(30000);

            return redirect()->route('klasemen');
        }  catch (\Exception $e){
                Alert::error('Error', 'Skor gagal ditambahlan');
                return redirect()->back();
        }

    }
}
