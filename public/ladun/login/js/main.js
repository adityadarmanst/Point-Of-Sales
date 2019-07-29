$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#divUtama').load('beranda');
   

    $('#btnKategori').click(function(){
        $('#divUtama').load('kategori/tampil');
    }); 

    $('#btnDashboard').click(function(){
        $('#divUtama').load('beranda');
    });

});