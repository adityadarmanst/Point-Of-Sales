
<div class='mb-3'>
    
<h4>List kategori</h4>
<button class='btn btn-primary mr-2' id='btnTampilForm'>Tambah</button>
<div class='col-4 mt-4 mb-4' id='divFormTambah'>

<form class="forms-sample">
                    <div class="form-group">
                      <label for="txtKode">Kode</label>
                      <input type="text" class="form-control" id="txtKode" placeholder="Kode Kategori">
                    </div>
                    <div class="form-group">
                      <label for="txtNama">Nama Kategori</label>
                      <input type="email" class="form-control" id="txtNama" placeholder="Nama Kategori">
                    </div>
                    
                    <button type="button" class="btn btn-primary mr-2" data-dismiss="modal" id='btnProTambah'>Simpan</button>
                    <a href='#!' id='btnTutupForm'>Tutup</a>
                  </form>
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
    $('#divFormTambah').hide();
    $('.btnEdit').click(function(){
        var id = $(this).attr('id');
        window.alert(id);
    });

    $('#btnTampilForm').click(function(){
      $('#divFormTambah').show();
    });

    $('#btnTutupForm').click(function(){
      $('#divFormTambah').hide();
    });

    $('#btnProTambah').click(function(){
        var kode = $('#txtKode').val();
        var nama = $('#txtNama').val();

        if(kode=="" && nama ==""){
          window.alert("Harap isi kode & nama kategori!!");
        }else{
          $.post('/kategori/tambahProses',{'kode':kode,'nama':nama},function(data){          
            $('#divUtama').load('kategori/tampil');
        });
        }
    });

});
</script>