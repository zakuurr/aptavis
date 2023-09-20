@extends('layouts.page')

@section('title')
@section('content')
<h1 class="my-3">Klasemen</h1>

<div class="section-siswa">
    <div class="card mt-3">
        <div class="card-body p-4">
<div class="table-responsive">
    <table class="table table-bordered mb-0">
        <thead>
        <tr>
            <th>No</th>
            <th>Klub</th>
            <th>Ma</th>
            <th>Me</th>
            <th>S</th>
            <th>K</th>
            <th>GM</th>
            <th>GK</th>
            <th>Point</th>
        </tr>
    </thead>
    <tbody>
        @foreach($klasemen as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data['klub'] }}</td>
                <td>{{ $data['Ma'] }}</td>
                <td>{{ $data['Me'] }}</td>
                <td>{{ $data['S'] }}</td>
                <td>{{ $data['K'] }}</td>
                <td>{{ $data['GM'] }}</td>
                <td>{{ $data['GK'] }}</td>
                <td>{{ $data['Point'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
        </div>
    </div>
</div>
    @endsection
