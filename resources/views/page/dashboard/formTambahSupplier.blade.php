<?php
$bahanKodeSup = "1234567890987654321";
$kodeSup = substr(str_shuffle($bahanKodeSup), 0, 6);
 ?>
<div class="container">

<div class='row'>

  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Supplier Baru</h4>
                    <p class="card-description">
                      Basic form layout
                    </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Kode</label>
                        <input type="text" class="form-control" id="txtKodeSup" disabled placeholder="Kode Supplier" value="{{$kodeSup}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" class="form-control" id="txtNamaLengkap" placeholder="Nama Lengkap">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" class="form-control" id="txtAlamat" placeholder="Alamat">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Hp</label>
                        <input type="text" class="form-control" id="txtHp" placeholder="Hp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="txtEmail" placeholder="Email">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                      <button class="btn btn-light">Kembali</button>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                              <h3>Fungsi supplier</h3>
                              <ul>
                                <li>Supplier berfungsi sebagai penyalur produk yang akan kita jual</li>
                              </ul>
                            </div>
                          </div>

                        </di>

</div>


<script>
$(document).ready(function(){

  $('#txtNamaLengkap').focus();

});
</script>
