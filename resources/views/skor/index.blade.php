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

@push('js')
<script>
    var clubData = <?= json_encode($club) ?>;
    var i = 0;
    var a = 0;
    var j = 2;
    var h = 3;

    $('#add').click(function(){
        ++i;
        ++j;
        ++h;
        var newRow = '<tr>' +
            '<td>' +

            '<select name="inputs[' + i + '][club_id_1]" id="club_id_1_' + i + '" class="form-control">';
        clubData.forEach(function(club) {
            newRow += '<option value="' + club.id + '">' + club.nama_club + '</option>';
        });
        newRow += '</select></td>' +
            '<td>' +

            '<input type="text" name="inputs[' + i + '][score_1]" class="form-control" placeholder="Score '+ (i+2) +'">' +
            '</td>' +
            '<td>' +

            '<select name="inputs[' + i + '][club_id_2]" id="club_id_2_' + i + '" class="form-control">';
        clubData.forEach(function(club) {
            newRow += '<option value="' + club.id + '">' + club.nama_club + '</option>';
        });
        newRow += '</select></td>' +
            '<td>' +
            '<input type="text" name="inputs[' + i + '][score_2]" class="form-control" placeholder="Score '+(i+3)+'">' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-danger remove-table-row">Remove</button>' +
            '</td>' +
            '</tr>';

        $('#table').append(newRow);
    });

    $(document).on('click','.remove-table-row',function(){
        $(this).parents('tr').remove();
    })
</script>
@endpush
