<div class="container">

<div class='row'>

  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Supplier</h4>
                    <p class="card-description">
                      Basic form layout
                    </p>
                    <div class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Kode</label>
                        <input type="text" class="form-control" id="txtKodeSup" disabled placeholder="Kode Supplier" value="{{$supplier -> kode}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" class="form-control" id="txtNamaLengkap" value="{{$supplier -> nama_lengkap}}" placeholder="Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" class="form-control" id="txtAlamat" value="{{$supplier -> alamat}}" placeholder="Alamat">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hp</label>
                        <input type="text" class="form-control" id="txtHp" value="{{$supplier -> no_hp}}" placeholder="Hp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="txtEmail" value="{{$supplier -> email}}" placeholder="Email">
                      </div>
                      <button class="btn btn-primary mr-2" id='btnUpdate'>Update</button>
                      <button class="btn btn-light" id='btnKembali'>Kembali</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                              <h3>Fungsi supplier</h3>
                              <ul>
                                <li>Supplier berfungsi sebagai penyalur produk yang akan kita jual</li>
                                <li>Data supplier harus sesuai dengan kondisi di lapangan</li>
                                <li>Nama supplier bisa nama usaha/nama pemilik usaha</li>
                              </ul>
                            </div>
                          </div>

                        </di>

</div>

<script>
$(document).ready(function(){
  $('#btnKembali').click(function(){
    $('#divUtama').html("Memuat ..");
    $('#divUtama').load('supplier/tampil');
  });
});
</script>
