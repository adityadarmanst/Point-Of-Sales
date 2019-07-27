@extends('layout.main')

@section('judulHalaman', 'Halaman Login')

@section('container')
<div class='container mt-3'>
Ini isi dari halaman login<br/>
<a href='#!' class='btn btn-success' id='btnTampilkan'>Tampilkan</a><br/><br/>
<input type='text'  id='txtNama'>
<a href='#!' class='btn btn-success' id='btnUpdate'>Update</a><br/><br/>
<a href='#!' class='btn btn-warning' id='btnGoForm'>Load</a>
<div class='row mt2'><h2 id='teksKita'></h2></div>
<div id='divSkrip'></div>
</div>
<div>
</div>
@endsection

@section('mainScript')
<script type='text/javascript'>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#btnTampilkan').click(function(){
       $.post('/testJson',{'nama':'Aditia Darma'},function(data){
        console.log(data);
       });
    });
    $('#btnUpdate').click(function(){
        var nama = $('#txtNama').val();
        $.post('/updateSup',{'nama':nama}, function(data){
            console.log(data);
            $('#teksKita').html(nama);
        });
    });

    $('#btnGoForm').click(function(){
        $('#divSkrip').load('/editForm');
    });
   

});
</script>
@endsection
