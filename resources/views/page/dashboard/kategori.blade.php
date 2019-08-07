
<?php
$bahanKode = "0981234561223";
$acak = str_shuffle($bahanKode);
$kodeBarang = substr($acak, 0, 4);
?>
<div class='mb-3'>
    
<h4>List kategori</h4>
<button class='btn btn-primary mr-2' id='btnTampilForm'>Tambah</button>
<div class='col-4 mt-4 mb-4' id='divFormTambah'>

<form class="forms-sample">
                    <div class="form-group">
                      <label for="txtKode">Kode</label>
                      <input type="text" class="form-control" id="txtKode" disabled placeholder="Kode Kategori" value='{{$kodeBarang}}'>
                    </div>
                    <div class="form-group">
                      <label for="txtNama">Nama Kategori</label>
                      <input type="email" class="form-control" id="txtNama" placeholder="Nama Kategori">
                    </div>
                    
                    <button type="button" class="btn btn-primary mr-2" data-dismiss="modal" id='btnProTambah'>Simpan</button>
                    <a href='#!' id='btnTutupForm'>Tutup</a>
                  </form>
</div>
</div>

<div class='col-4 mt-4 mb-4' id='divFormUpdate'>

<form class="forms-sample">
                    <div class="form-group">
                      <label for="txtKode">Kode</label>
                      <input type="text" class="form-control " disabled id="txtKodeUp" placeholder="Kode Kategori">
                    </div>
                    <div class="form-group">
                      <label for="txtNama">Nama Kategori</label>
                      <input type="email" class="form-control" id="txtNamaUp" placeholder="Nama Kategori">
                    </div>
                    
                    <button type="button" class="btn btn-primary mr-2" data-dismiss="modal" id='btnUpdate'>Update</button>
                    <a href='#!' id='btnTutupFormUp'>Tutup</a>
                  </form>
</div>
</div>

<table id='table_id'>

<thead>
    <tr>
        <td>No</td>
        <td>Kode</td>
        <td>Nama</td>
        <td style='width:30%;'>Aksi</td>
    </tr>
</thead>
<tbody>
    @foreach($kategori as $kat)
    <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$kat -> kode}}</td>
        <td>{{$kat -> nama}}</td>
        <td><button class='btn btn-primary btnEdit' id='{{$kat -> kode}}'><i class="mdi mdi-grease-pencil"></i> Edit</button> &nbsp;
        <button class='btn btn-warning btnHapus' id='{{$kat -> kode}}'><i class="mdi mdi mdi-delete"></i> Hapus</button>
        </td>
    </tr>
    @endforeach
</tbody>
</table>


<script>
$(document).ready(function(){
    $('#table_id').DataTable();
    $('#divFormTambah').hide();
    $('#divFormUpdate').hide();

    $('.btnEdit').click(function(){
        var id = $(this).attr('id');
        $('#divFormTambah').hide();
        $.post('/kategori/EditData',{'id':id},function(data){
          //let obj = data.nama;
          let namaUp = data.nama;
          let idUp = data.id;
          $('#txtNamaUp').val(namaUp);
          $('#txtKodeUp').val(idUp);
          $("html, body").animate({ scrollTop: 0 }, "slow");
          $('#divFormUpdate').show();
        });
    });

    $('#btnTampilForm').click(function(){
      $('#divFormTambah').show();
      $('#divFormUpdate').hide();
    });

    $('#btnTutupForm').click(function(){
      $('#divFormTambah').hide();
    });

    $('#btnProTambah').click(function(){
        var kode = $('#txtKode').val();
        var nama = $('#txtNama').val();

        if(kode=="" && nama ==""){
          window.alert("Harap isi kode & nama kategori!!");
        }else{
          $.post('/kategori/tambahProses',{'kode':kode,'nama':nama},function(data){
            $('#divUtama').html("Memuat ..");          
            $('#divUtama').load('kategori/tampil');
        });
        }
    });

    $('#btnTutupFormUp').click(function(){
      $('#divFormUpdate').hide();
    });
  
});
</script>