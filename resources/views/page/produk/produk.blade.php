<div class='container'>
<div class='mb-3'>
<div class="card">
  <div class="card-body">
<h4>List Produk</h4>
<button class='btn btn-primary mr-2' id='btnTampilFormTambah'><i class="mdi mdi-database-plus"></i> Tambah</button>



<div class="mt-3">
  <table id='table_id' class="table-striped">

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
      <td>{{$pro -> nama}} <br/>  <small> Tipe : {{$kat -> nama}}</small><br/><small>Satuan : {{$sat -> nama}}</small></td>
      <td>{{$pro -> deksripsi}}</td>
      <td>{{$pro -> harga_jual}}</td>
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
      $.post('/produk/hapusProses',{'kodeProduk':kodeProduk},function(data){
          $('#divUtama').html("Memuat ... ");
          $('#divUtama').load('/produk/tampil');
      });
    });

  });
</script>
