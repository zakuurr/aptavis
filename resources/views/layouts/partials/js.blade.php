<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
    var clubData = <?php echo json_encode($club); ?>;
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






