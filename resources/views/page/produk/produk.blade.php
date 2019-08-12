<div class='container'>
<div class='mb-3'>
<div class="card">
  <div class="card-body">
<h3>List Produk</h3>
<button class='btn btn-primary mr-2' id='btnTampilFormTambah'><i class="mdi mdi-database-plus"></i> Tambah</button>



<div class="mt-3">
  <table id='table_id' class="table-striped table-hover table">

  <thead>
      <tr>
          <td>No</td>
          <td>Kode</td>
          <td>Nama Produk</td>
          <td>Deks</td>

          <td>Harga Jual</td>
          <td>Stok</td>
          <td style='width:20%;'>Aksi</td>
      </tr>
  </thead>
  <tbody>
      @foreach($produk as $pro)
      <?php
        $kat = DB::table('tbl_kategori') -> where('kode', $pro -> kategori) -> first();
        $sat = DB::table('tbl_satuan') -> where('kode', $pro -> satuan) -> first();
       ?>

      <tr>
      <td>{{$loop -> iteration}}</td>
      <td>{{$pro -> kode}}</td>
      <td><a href='#!' class='btnDetail' id='{{$pro -> kode}}'>{{$pro -> nama}} </a>
      <br/>  <small> Tipe : {{$kat -> nama}}</small><br/><small>Satuan : {{$sat -> nama}}</small></td>
      <td>{{$pro -> deksripsi}}</td>
      <td>Rp. {{number_format($pro -> harga_jual)}}</td>
      <td>{{$pro -> stok}}</td>
      <td><button class='btn btn-primary btnEdit' id='{{$pro -> kode}}'><i class="mdi mdi-grease-pencil"></i> Edit</button>
      <button class='btn btn-warning btnHapus' id='{{$pro -> kode}}'><i class="mdi mdi mdi-delete"></i> Hapus</button></td>
    </tr>
      @endforeach
  </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
<script>
  $(document).ready(function(){
    $('#table_id').DataTable();

    $('.btnEdit').click(function(){
      let kodeProduk = $(this).attr('id');
      $('#divUtama').html("Memuat ... ");
      $('#divUtama').load('/produk/formEditTampil',{'kodeProduk':kodeProduk});
    });

    $('#btnTampilFormTambah').click(function(){
      $('#divUtama').html("Memuat ... ");
      $('#divUtama').load('/produk/formTambahTampil');
    });

    $('.btnHapus').click(function(){
      let kodeProduk = $(this).attr('id');

      Swal.fire({
        title: 'Hapus Produk?',
        text: "Apakah kamu yakin menghapus produk ini ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.value) {
          $.post('/produk/hapusProses',{'kodeProduk':kodeProduk},function(data){
            let status = data.status;
            if(status == "berhasil"){
              Swal.fire('Terhapus!','Produk berhasil di hapus ','success');
              $('#divUtama').html("Memuat ..");
              $('#divUtama').load('produk/tampil');
            }else{
              Swal.fire('Gagal!','Produk gagal di hapus ','error');
              $('#divUtama').html("Memuat ..");
              $('#divUtama').load('produk/tampil');
            }
          });

        }
    });

    });

    $('.btnDetail').click(function(){
      let kodeProduk = $(this).attr('id');

    });

  });
</script>
