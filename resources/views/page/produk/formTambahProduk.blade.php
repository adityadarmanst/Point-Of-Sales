<?php
$bahanKodeProduk = "1234567890987654321";
$kodeProduk = substr(str_shuffle($bahanKodeProduk), 0, 10);
 ?>
<div class="container">

<div class='row'>

  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Produk Baru</h4>
                    <p class="card-description">
                      Basic form layout
                    </p>
                    <div class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Kode</label>
                        <input type="text" class="form-control" id="txtKodeSup" disabled placeholder="Kode Supplier" value="{{$kodeProduk}}">
                      </div>
                      <div class="form-group">
                        <label for="txtNamaProduk">Nama Produk</label>
                        <input type="text" class="form-control" id="txtNamaProduk" placeholder="Nama Produk">
                      </div>
                      <div class="form-group">
                        <label for="txtSatuan">Satuan</label>
                        <select class="form-control" name='txtSatuan' id='txtSatuan'>
                            @foreach($satuan as $sat)
                            <option value='{{$sat -> kode}}'>{{$sat -> nama}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="txtKategori">Kategori</label>
                      <select class="form-control"  name='txtKategori' id='txtKategori'>
                        @foreach($kategori as $kat)
                          <option value="{{$kat -> kode}}">{{$kat -> nama}}</option>
                        @endforeach
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Deksripsi Produk</label>
                        <input type="email" class="form-control" id="txtDeksripsi" placeholder="Deksripsi">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Harga Jual</label>
                        <input type="email" class="form-control" id="txtHargaJual" placeholder="Harga Jual">
                      </div>
                      <button class="btn btn-primary mr-2" id='btnSimpan'>Simpan</button>
                      <button class="btn btn-light" id='btnKembali'>Kembali</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                              <h3>Produk</h3>
                              <ul>

                              </ul>
                              <div id='divTest'></div>
                            </div>
                          </div>

                        </di>

</div>


<script>
$(document).ready(function(){

  $('#txtNamaProduk').focus();

  $('#btnSimpan').click(function(){
    let kodeProduk = "{{$kodeProduk}}";
    let namaProduk = $('#txtNamaProduk').val();
    let satuan = $('#txtSatuan').val();
    let kategori = $('#txtKategori').val();
    let deksripsi = $('#txtDeksripsi').val();
    let hargaJual = $('#txtHargaJual').val();

    if(namaProduk == "" || satuan == "" || kategori == "" || deksripsi == "" || hargaJual == ""){
      Swal.fire(
            'Field kosong!!',
            'Harap perhatikan semua field',
            'warning'
          );
      $('#txtNamaProduk').focus();
    }else{
      $.post('/produk/tambahProses',{'kodeProduk':kodeProduk,'namaProduk':namaProduk,'satuan':satuan,'kategori':kategori,'deksripsi':deksripsi,'hargaJual':hargaJual},function(data){
        console.log(data);
        Swal.fire(
              'Tambah produk',
              'Produk berhasil ditambahkan',
              'success'
            );
        $('#divUtama').html("Memuat ...");
        $('#divUtama').load('produk/tampil');
      });
    }
  });

  $('#btnKembali').click(function(){
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('produk/tampil');
  });

});
</script>
