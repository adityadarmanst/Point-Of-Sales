$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#divUtama').html("Memuat ..");
    $('#divUtama').load('beranda');

    $('#btnKategori').click(function(){
        $('#divUtama').html("Memuat ..");
        $('#divUtama').load('kategori/tampil');
    });

    $('#btnSupplier').click(function(){
        $('#divUtama').html("Memuat ..");
        $('#divUtama').load('supplier/tampil');
    });

    $('#btnProduk').click(function(){
        $('#divUtama').html("Memuat ..");
        $('#divUtama').load('produk/tampil');
    });

    $('#btnDashboard').click(function(){
        $('#divUtama').html("Memuat ..");
        $('#divUtama').load('beranda');
    });

});
