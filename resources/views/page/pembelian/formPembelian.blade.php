<div class="container">

<div class='row'>

  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Buat pembelian baru</h4>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No Faktur</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtNoFaktur" disabled value="{{$noTransaksi2Cap}}">
                        </div>
                    </div>

                    <hr/>
                    <div class="">
                    <h4 class="card-title">Buat pembelian baru  <br/><small>Ketikkan nama produk agar pencarian lebih mudah</small></h4>

                    <table id='table_id2' class="table-striped table-hover table">

                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Produk</td>
                            <td>Harga @</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($produk as $pro)
                      <tr>
                          <td>{{$loop -> iteration}}</td>
                          <td>{{$pro -> nama}}</td>
                          <td>Rp. {{number_format($pro -> harga_jual)}}</td>
                          <td><button class="btn btn-primary btnTambah" id="{{$pro -> kode}}">Tambah</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                            <h4 class="card-title">Daftar Keranjang</h4>
                            <div id='divTemp'>
                            <table id='table_id' class="table-striped table-hover table">

                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Produk</td>
                                    <td>Harga @</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                              <div id='divTest'></div>
                            </div>
                          </div>

                        </di>

</div>
<script>
$(document).ready(function() {
    $('#table_id').DataTable();
    $('#table_id2').DataTable();
    $('.js-example-basic-single').select2({placeholder: 'Pilih supplier'});
    //$('#divTemp').html('<tr><td></td><td></td><td></td><td></td></tr>');
    $('.btnTambah').click(function(){
      let kodeProduk = $(this).attr('id');
      let noTransaksi = "{{$noTransaksi}}";
      let jumlahProduk = prompt("Masukkan jumlah barang ");

      if(jumlahProduk == 0 || jumlahProduk == ""){
        window.alert("Masukkan jumlah barang");
      }else{
        $.post('/transaksi/tambahProduk',{'kodeProduk':kodeProduk,'noTransaksi':noTransaksi,'jumlahProduk':jumlahProduk},function(data){
          console.log(data);
          $('#divTest').html(data.status);
          $('#divTemp').load('transaksi/keranjangPembelian/'+noTransaksi);
        });
      }

    });


});
</script>
