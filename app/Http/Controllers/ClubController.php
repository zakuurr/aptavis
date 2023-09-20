<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubStoreRequest;
use App\Models\Club;
use Exception;
use Illuminate\Http\Request;
Use Alert;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $club = Club::all();
        return view('club.index',compact('club'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ClubStoreRequest $request)
    {
        try {
            $data = $request->validated();

            $club = Club::create($data);
            Alert::success('Data Klub', 'Klub Berhasil Ditambahkan');
            return redirect()->route('club.index');
        } catch (Exception $e) {
            Alert::error('Data Klub', 'Klub Gagal Ditambahkan');
            return redirect()->back();
        }
    }


}
