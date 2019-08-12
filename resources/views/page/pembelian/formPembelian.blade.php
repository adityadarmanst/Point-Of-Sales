<div class="container">

<div class='row'>

  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Buat pembelian baru</h4>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No Faktur</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtNoFaktur" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Supplier</label>
                        <div class="col-sm-9" style="padding-top:10px;">
                          <select class="js-example-basic-single form-control select2-selection" name="state">
                          <option value="none">-- Pilih supplier --</option>
                          @foreach($supplier as $sup)
                          <option value="{{$sup -> kode}}">{{$sup -> nama_lengkap}}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                            <h4 class="card-title">Daftar produk</h4>
                              <ul>

                              </ul>
                              <div id='divTest'></div>
                            </div>
                          </div>

                        </di>

</div>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
