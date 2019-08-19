<div class="container">

<div class='row'>

  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3><strong>Masukkan Produk</strong></h3>

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
                            <h3><strong>Informasi Keranjang</strong></h3>
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
                              <div id='divTest' class="alert alert-primary mt-2" role="alert"></div>
<hr/>
<h3><strong>Informasi Checkout</strong></h3>
<div id='divInformasiKeranjang'>
  <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Total Harga</label>
                      <div class="col-sm-9 mt-3">
                      <h2><strong id='capHarga'>Rp.</strong></h2>
                      </div>
                    </div>
</div>

                            </div>
                          </div>

                        </di>

</div>
<script>
$(document).ready(function() {
    $('#table_id').DataTable();
    $('#table_id2').DataTable();
    $('#divTest').hide();
    $('.js-example-basic-single').select2({placeholder: 'Pilih supplier'});
    let pesan = "";

    $('.btnTambah').click(function(){
      let kodeProduk = $(this).attr('id');
      let noTransaksi = "{{$noTransaksi}}";
      let jumlahProduk = prompt("Masukkan jumlah produk : ");

      if(jumlahProduk == 0 || jumlahProduk == ""){
        window.alert("Masukkan jumlah barang");
      }else{

          $.post('/transaksi/tambahProduk',{'kodeProduk':kodeProduk,'noTransaksi':noTransaksi,'jumlahProduk':jumlahProduk},function(data){
            console.log(data);
            $('#divTest').show();
            if(data.status == 'tambah'){
              pesan = "Produk di tambahkan ke keranjang";
            }else{
              pesan = "Produk di update ke keranjang";
            }
            $.post('/transaksi/updateHargaKeranjangPembelian',{'noTransaksi':noTransaksi},function(data){
              let harga = data.harga;
              $('#capHarga').html("Rp. "+harga);
            });
            $('#divTest').html(pesan);
            setTimeout(tutupAlertCart, 2000);
            $('#divTemp').load('transaksi/keranjangPembelian/'+noTransaksi);
          });


      }

    });

    function tutupAlertCart()
    {
      $('#divTest').hide();
      $('#divTest').html("");
    }

});
</script>
