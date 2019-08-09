<div class='container'>
<div class='mb-3'>

<h4>List Supplier</h4>
<button class='btn btn-primary mr-2' id='btnTampilFormTambah'><i class="mdi mdi-database-plus"></i> Tambah</button>



<div class="mt-3">
  <table id='table_id'>

  <thead>
      <tr>
          <td>No</td>
          <td>Kode</td>
          <td>Nama</td>
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
      <td>{{$sup -> nama_lengkap}}</td>
      <td>{{$sup -> alamat}}<td>
      <td>{{$sup -> no_hp}}</td>
      <td></td>
      <td><button class='btn btn-primary btnEdit' id='{{$sup -> kode}}'><i class="mdi mdi-grease-pencil"></i> Edit</button></td>
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
      let kodeSup = $(this).attr('id');
      window.alert(kodeSup);
    });

    $('#btnTampilFormTambah').click(function(){
      $('#divUtama').html("Memuat ... ");
      $('#divUtama').load('/supplier/formTambahTampil');
    });

  });
</script>
