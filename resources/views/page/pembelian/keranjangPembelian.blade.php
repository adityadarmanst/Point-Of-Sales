<table id='table_id' class="table-striped table-hover table">

<thead>
    <tr>
        <td>No</td>
        <td>Produk</td>
        <td>Total Harga</td>
        <td>Aksi</td>
    </tr>
</thead>
<tbody>
@foreach($keranjang as $ker)
<?php
$kodeProduk = $ker -> kode_produk;
$produk = DB::table('tbl_produk') -> where('kode', $kodeProduk) -> first();
$namaProduk = $produk -> nama;
?>
<tr>
<td>{{$loop -> iteration}}</td>
<td>{{$namaProduk}}<br/><small>Qty : {{$ker -> jumlah_produk}}</small></td>
<td>Rp. {{number_format($ker -> total_harga)}}</td>
<td><button class="btn btn-primary">Hapus</button></td>
</tr>
@endforeach
</tbody>
</table>

<script>
$(document).ready(function(){
      $('#table_id').DataTable();
});
</script>
