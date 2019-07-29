
<div class='mb-3'>
    
<h4>List kategori</h4>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Kategori</button>    
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        Tambah kategori
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">

                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="txtKode">Kode</label>
                      <input type="text" class="form-control" id="txtKode" placeholder="Kode Kategori">
                    </div>
                    <div class="form-group">
                      <label for="txtNama">Nama Kategori</label>
                      <input type="email" class="form-control" id="txtNama" placeholder="Nama Kategori">
                    </div>
                    
                    <button type="button" class="btn btn-primary mr-2" data-dismiss="modal" id='btnProTambah'>Tambah</button>
                   
                  </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>


<table id='table_id'>

<thead>
    <tr>
        <td>No</td>
        <td>Kode</td>
        <td>Nama</td>
       
        <td>Aksi</td>
    </tr>
</thead>
<tbody>
    @foreach($kategori as $kat)
    <tr>
        <td>{{$loop -> iteration}}</td>
        <td>{{$kat -> kode}}</td>
        <td>{{$kat -> nama}}</td>
        <td><button class='btn btn-primary btnEdit' id='{{$kat -> kode}}'>Edit</button></td>
    </tr>
    @endforeach
</tbody>
</table>


<script>
$(document).ready(function(){
    $('#table_id').DataTable();

    $('.btnEdit').click(function(){
        var id = $(this).attr('id');
        window.alert(id);
    });

    $('#btnProTambah').click(function(){
        var kode = $('#txtKode').val();
        var nama = $('#txtNama').val();
        $.post('/kategori/tambahProses',{'kode':kode,'nama':nama},function(data){
           
          
            $('#divUtama').load('kategori/tampil');
        });
    });

});
</script>