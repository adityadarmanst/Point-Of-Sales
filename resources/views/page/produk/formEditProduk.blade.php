

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
                        <input type="text" class="form-control" id="txtKodePro" disabled placeholder="Kode Supplier" value="{{$dataProduk -> kode}}">
                      </div>
                      <div class="form-group">
                        <label for="txtNamaProduk">Nama Produk</label>
                        <input type="text" class="form-control" id="txtNamaPro" placeholder="Nama Produk" value="{{$dataProduk -> nama}}">
                      </div>
                      <div class="form-group">
                        <label for="txtSatuan">Satuan</label>
                        <select class="form-control" name='txtSatuan' id='txtSatuan'>
                          @foreach($satuan as $sat)
                            @if($sat -> kode === $dataProduk -> satuan)
                             <option value='{{$sat -> kode}}' selected>{{$sat -> nama}}</option>
                            @else
                              <option value='{{$sat -> kode}}'>{{$sat -> nama}}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="txtKategori">Kategori</label>
                      <select class="form-control"  name='txtKategori' id='txtKategori'>
                        @foreach($kategori as $kat)
                          @if($kat -> kode == $dataProduk -> kategori)
                          <option value="{{$kat -> kode}}" selected>{{$kat -> nama}}</option>
                          @else
                          <option value="{{$kat -> kode}}">{{$kat -> nama}}</option>
                          @endif
                        @endforeach
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Deksripsi Produk</label>
                        <input type="email" class="form-control" id="txtDeksripsi" placeholder="Deksripsi" value='{{$dataProduk -> deksripsi}}'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Harga Jual</label>
                        <input type="email" class="form-control" id="txtHargaJual" placeholder="Harga Jual" value='{{$dataProduk -> harga_jual}}'>
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
                              <h3>Edit Produk</h3>
                              <ul>

                              </ul>
                              <div id='divTest'></div>
                            </div>
                          </div>

                        </di>

</div>

    <script>
      $(document).ready(function(){

        $('#btnSimpan').click(function(){
          let kodePro = $('#txtKodePro').val();
          let namaPro = $('#txtNamaPro').val();
          let deksripsi = $('#txtDeksripsi').val();
          let satuan = $('#txtSatuan').val();
          let kategori = $('#txtKategori').val();
          let hargaJual = $('#txtHargaJual').val();
          $.post('/produk/prosesTambah',function(){

          });
        });
        
      });
    </script>
