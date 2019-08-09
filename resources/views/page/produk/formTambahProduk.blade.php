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
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <input type="text" class="form-control" id="txtNamaLengkap" placeholder="Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <label for="txtSatuan">Satuan</label>
                        <select class="form-control" name='txtSatuan' id='txtSatuan'>
                            <option value='botol'>Botol</option>
                            <option value='dus'>Dus</option>
                            <option value='sachet'>Sachet</option>
                            <option value='liter'>Liter</option>
                            <option value='bal'>Bal</option>
                            <option value='bungkus'>Bungkus</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kategori</label>
                      <select class="form-control">
                        @foreach($kategori as $kat)
                          <option value="{{$kat -> kode}}">{{$kat -> nama}}</option>
                        @endforeach
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="txtEmail" placeholder="Email">
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
                            </div>
                          </div>

                        </di>

</div>


<script>
$(document).ready(function(){

  $('#txtNamaLengkap').focus();

  $('#btnSimpan').click(function(){
    let kodeSup = $('#txtKodeSup').val();
    let nama = $('#txtNamaLengkap').val();
    let alamat = $('#txtAlamat').val();
    let hp = $('#txtHp').val();
    let email = $('#txtEmail').val();

    if(kodeSup == "" || nama == "" || alamat == "" || hp == "" || email == ""){
      Swal.fire(
            'Field kosong!!',
            'Harap perhatikan semua field',
            'warning'
          );
      $('#txtNamaLengkap').focus();
    }else{
        $.post('/supplier/prosesTambah',{'kodeSup':kodeSup,'namaSup':nama,'alamatSup':alamat,'hpSup':hp,'emailSup':email},function(data){
          if(data.status == 'berhasil'){
            Swal.fire(
                  'Tambah supplier',
                  'Supplier berhasil di tambahkan',
                  'success'
                );
            $('#divUtama').html("Memuat ...");
            $('#divUtama').load('supplier/tampil');
          }else{

          }

        });
    }

  });

  $('#btnKembali').click(function(){
      $('#divUtama').html("Memuat ...");
      $('#divUtama').load('supplier/tampil');
  });

});
</script>
