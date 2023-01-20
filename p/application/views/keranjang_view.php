<div class="table-responsive">
	<table style="border-radius: 5px;" class="table table-bordered table-hover keranjang table-fixed">
		<thead>
				<tr>
					<th style="width: 0.1cm;">NO</th>
					<th>CODE BARANG</th>
					<th>NAMA BARANG</th>
					<th>HARGA BARANG</th>
					<th>BANYAK DIBELI</th>
					<th>JUMLAH HARGA</th>
					<th style="width: 0.1cm;">OPSI</th>
				</tr>
		</thead>
		<tbody>
			<?php $i=1?>
			<?php foreach ($this->cart->contents() as $items){ ?>
				<tr>
					<td style="width: 0.1cm;"><b><?= $i++ ?>.</b></td>
					<td><?= $items['id'] ?></td>
					<td><?=  strtoupper($items['name']) ?></td>
					<td><?= number_format($items['price']) ?></td>
					<td class="d-flex justify-content-between"><?= $items['qty'] ?><div class="dok"><button  onClick='tambah_row("<?= $items['id'] ?>")' class="btn btn-success py-0 px-2">+</button> <button  onClick='hapus_row("<?= $items['id'] ?>")' class="btn btn-danger py-0 px-2">-</button></div></td>
					<td><b><?= number_format($total = $items['price']*$items['qty']) ?></b></td>
					<td class="d-flex justify-content-center"><button style="width: 0.7cm;" onClick='delete_row("<?= $items['rowid'] ?>")' class="m-0 p-0 btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
					<!-- <td style="width: 0.1cm;"><button onClick='delete_row("<?= $items['rowid'] ?>")' class="m-0 p-0 btn-danger">HPS</button><button onClick='hapus_row("<?= $items['id'] ?>")' class="m-0 p-0 btn-info">HPS</button></td> -->
				</tr>
			<?php
			}
			?> 
		</tbody>
	</table>
</div>
<script>
var site_url = '<?=site_url()?>';

function delete_row (id){
$.get(site_url+'/myigniter/deleterow/'+id, function(data) {
	/*optional stuff to do after success */
	kolom();
	total();
	$('#ganti').html('<div style="color:#8e8e8e;" class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>');
	document.getElementById('bayare').value = 'Rp. 0';
	$('#hpsCtk').remove()
	});
}
function tambah_row (id){
$.get(site_url+'/myigniter/tambahRow/'+id, function(data) {
	/*optional stuff to do after success */
	kolom();
	total();
	$('#ganti').html('<div style="color:#8e8e8e;" class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>');
	document.getElementById('bayare').value = 'Rp. 0';
	$('#hpsCtk').remove()
	});
}
function hapus_row (id){
$.get(site_url+'/myigniter/hapusRow/'+id, function(data) {
	/*optional stuff to do after success */
	kolom();
	total();
	$('#ganti').html('<div style="color:#8e8e8e;" class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>');
	document.getElementById('bayare').value = 'Rp. 0';
	$('#hpsCtk').remove()
	});
}
</script>