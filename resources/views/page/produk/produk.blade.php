<div class='container'>
<div class='mb-3'>

<h4>List Produk</h4>
<button class='btn btn-primary mr-2' id='btnTampilFormTambah'><i class="mdi mdi-database-plus"></i> Tambah</button>



<div class="mt-3">
  <table id='table_id'>

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
       ?>

      <tr>
      <td>{{$loop -> iteration}}</td>
      <td>{{$pro -> kode}}</td>
      <td>{{$pro -> nama}} <br/>  <small> Tipe : {{$kat -> nama}}</small><br/><small>Satuan : {{$pro -> satuan}}</small></td>
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
      let kodeSup = $(this).attr('id');
      Swal.fire({
        title: 'Hapus Suppplier?',
        text: "Apakah kamu yakin menghapus Supplier ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.value) {
          $.post('/supplier/hapusProses',{'kodeSup':kodeSup},function(data){
            let status = data.status;
            if(status == "berhasil"){
              Swal.fire(
                'Terhapus!',
                'Kategori berhasil di hapus ',
                'success'
              );
              $('#divUtama').html("Memuat ..");
              $('#divUtama').load('supplier/tampil');
            }else{

            }
          });

        }
    });

    })

  });
</script>
