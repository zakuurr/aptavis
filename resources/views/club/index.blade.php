@extends('layouts.page')

@section('title')
@section('content')

    <h1 class="my-3">Input Data Club</h1>
    @include('layouts.components.alert')

    <div class="section-siswa">
        <div class="card mt-3">
            <div class="card-body p-4">
                <form action="{{ route('club.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_club" class="form-label">Nama Club</label>
                        <input type="text" name="nama_club" id="nama_club" class="form-control" placeholder="Nama Club">
                    </div>
                    <div class="mb-3">
                        <label for="kota_club" class="form-label">Kota Club</label>
                        <input type="text" name="kota_club" id="kota_club" class="form-control" placeholder="Kota Club">
                    </div>
                    <button type="submit" class="btn btn-success" >Simpan</button>
               </form>
            </div>
        </div>
    </div>

    <div class="section-siswa">
        <div class="card mt-3">
            <div class="card-body p-4">
    <div class="table-responsive mt-3">
        <table class="table table-responsive table-hover display" id="myTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Club</th>
                    <th scope="col">Kota Club</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($club as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $p->nama_club }}</td>
                    <td>{{ $p->kota_club }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
            </div>
        </div>
    </div>

@endsection
