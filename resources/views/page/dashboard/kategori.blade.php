
<?php
$bahanKode = "0981234561223";
$acak = str_shuffle($bahanKode);
$kodeBarang = substr($acak, 0, 4);
?>
<div class='mb-3'>

<h4>List kategori</h4>
<button class='btn btn-primary mr-2' id='btnTampilForm'><i class="mdi mdi-database-plus"></i> Tambah</button>
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
        let id = $(this).attr('id');
        $('#divFormTambah').hide();
        $.post('/kategori/editData',{'id':id},function(data){
          //let obj = data.nama;
          let namaUp = data.nama;
          let idUp = data.kode;
          $('#txtNamaUp').val(namaUp);
          $('#txtKodeUp').val(idUp);
          $("html, body").animate({ scrollTop: 0 }, "slow");
          $('#divFormUpdate').show();
          $('#txtNamaUp').focus();
        });
    });

    $('#btnTampilForm').click(function(){
      $('#divFormTambah').show();
      $('#txtNama').focus();
      $('#divFormUpdate').hide();
    });

    $('#btnTutupForm').click(function(){
      $('#divFormTambah').hide();
    });

    $('#btnProTambah').click(function(){
        let kode = $('#txtKode').val();
        let nama = $('#txtNama').val();

        if(kode=="" && nama ==""){
          window.alert("Harap isi kode & nama kategori!!");
        }else{
          $.post('/kategori/tambahProses',{'kode':kode,'nama':nama},function(data){
            $('#divUtama').html("Memuat ..");
            Swal.fire(
              'Status simpan',
              'Kategori berhasil di tambah',
              'success'
            );
            $('#divUtama').load('kategori/tampil');
        });
        }
    });

    $('#btnUpdate').click(function(){
      let kode = $('#txtKodeUp').val();
      let nama = $('#txtNamaUp').val();
      $.post('/kategori/editProses',{'kode':kode,'nama':nama},function(data){
        console.log(data);
        if(data.status == 'berhasil'){
          Swal.fire(
                'Terupdate!',
                'Kategori berhasil di update ',
                'success'
              );
        }else{

        }
        $('#divUtama').html("Memuat ..");
        $('#divUtama').load('kategori/tampil');
      });
    });

    $('.btnHapus').click(function(){
      let idKategori = $(this).attr('id');
      Swal.fire({
        title: 'Hapus kategori?',
        text: "Apakah kamu yakin menghapus kategori "+ idKategori +"?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.value) {
          $.post('/kategori/hapusProses',{'idKategori':idKategori},function(data){
            let status = data.status;
            if(status == "berhasil"){
              Swal.fire(
                'Terhapus!',
                'Kategori berhasil di hapus ',
                'success'
              );
              $('#divUtama').html("Memuat ..");
              $('#divUtama').load('kategori/tampil');
            }else{

            }
          });

        }
    });

    });

    $('#btnTutupFormUp').click(function(){
      $('#divFormUpdate').hide();
    });

});
</script>
