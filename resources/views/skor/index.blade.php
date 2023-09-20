@extends('layouts.page')

@section('title')
@section('content')

    <h1 class="my-3">Input Data Skor</h1>
    @include('layouts.components.alert')

    <div class="section-siswa">
        <div class="card mt-3">
            <div class="card-body p-4">
                <form action="{{ route('skor.store') }}" method="POST">
                    @csrf
                    <table class="table table-bordered" id="table">

                        <tr>
                            <th>
                                Club
                            </th>
                            <th>
                                Skor
                            </th>
                            <th>
                                Club
                            </th>
                            <th>
                                Skor
                            </th>
                        </tr>
                        <tr>

                            <td>

                                <select name="inputs[0][club_id_1]" id="club_id_1" class="form-control">
                                @foreach ($club as $c )
                                <option value="{{ $c->id }}">{{ $c->nama_club }}</option>
                                @endforeach
                            </select></td>
                            <td>

                                <input type="number" name="inputs[0][score_1]" id="score_1" class="form-control" placeholder="Score 1">
                            </td>
                            <td>

                                <select name="inputs[0][club_id_2]" id="club_id_2" class="form-control">
                                    @foreach ($club as $c )
                                    <option value="{{ $c->id }}">{{ $c->nama_club }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <div class="mb-3">

                                    <input type="number" name="inputs[0][score_2]" id="score_2" class="form-control" placeholder="Score 2">
                                </div>
                            </td>
                            <td>
                                <button type="button" id="add" name="add" class="btn btn-primary mb-3">+ Add</button>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-success" >Save</button>
                 </div>


                </div>

               </form>
            </div>
        </div>
    </div>

@endsection
