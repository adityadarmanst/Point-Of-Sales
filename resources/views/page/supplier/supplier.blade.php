<div class='container'>
<div class='mb-3'>
  <div class="card">
    <div class="card-body">
<h4>List Supplier</h4>
<button class='btn btn-primary mr-2' id='btnTampilFormTambah'><i class="mdi mdi-database-plus"></i> Tambah</button>



<div class="mt-3">
  <table id='table_id'>

  <thead>
      <tr>
          <td>No</td>
          <td>Kode</td>
          <td>Nama - Email</td>
          <td>Alamat<td>
          <td>Hp</td>
          <td>Total Transaksi</td>
          <td style='width:20%;'>Aksi</td>
      </tr>
  </thead>
  <tbody>
      @foreach($supplier as $sup)
      <tr>
      <td>{{$loop -> iteration}}</td>
      <td>{{$sup -> kode}}</td>
      <td><a href='#!' class='suppDetails' id='{{$sup -> kode}}'>{{$sup -> nama_lengkap}}</a><br/><small>{{$sup -> email}}</small></td>
      <td>{{$sup -> alamat}}<td>
      <td>{{$sup -> no_hp}}</td>
      <td></td>
      <td><button class='btn btn-primary btnEdit' id='{{$sup -> kode}}'><i class="mdi mdi-grease-pencil"></i> Edit</button>
      <button class='btn btn-warning btnHapus' id='{{$sup -> kode}}'><i class="mdi mdi mdi-delete"></i> Hapus</button></td>
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
      let kodeSup = $(this).attr('id');
      $('#divUtama').html("Memuat ... ");
      $('#divUtama').load('/supplier/formEditTampil',{'kodeSup':kodeSup});
    });

    $('#btnTampilFormTambah').click(function(){
      $('#divUtama').html("Memuat ... ");
      $('#divUtama').load('/supplier/formTambahTampil');
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

  });

  });
</script>
