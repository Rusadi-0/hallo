<div class="table-responsive">
	<table class="table table-hover keranjang table-fixed">
		<thead>
			<tr style="background-color: #F1BC61;">
				<th style="width: 0.1cm;">NO</th>
				<th style="width: 10rem;">CODE</th>
				<th>NAMA</th>
				<th class="text-center" style="width: 10rem;">HARGA SATUAN</th>
				<th class="text-center" style="width: 17rem;">QTY</th>
				<th class="text-center" style="width: 12rem;">HARGA</th>
				<th class="text-center" style="width: 0.1rem;">OPSI</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1 ?>
			<?php foreach ($this->cart->contents() as $items) { ?>
				<tr>
					<td class="pt-5" style="width: 0.1cm;"><b><?= $i++ ?>.</b></td>
					<td class="pt-5"><?= $items['id'] ?></td>
					<td class="pt-5"><?= strtoupper($items['name']) ?></td>
					<td class="pt-5">
						<div class="d-flex justify-content-center">
							<?php
							$uangs = $items['price'];
							$ratusans = substr($uangs, -3);
							$bulatams = floor($uangs / 1000) * 1000;
							if ($ratusans < 200) {
								$hasilBulats = $bulatams;
								echo number_format($hasilBulats);
							} elseif ($ratusans < 599) {
								$hasilBulats = ($bulatams + 500);
								echo number_format($hasilBulats);
							} else {
								$hasilBulats = ($bulatams + 1000);
								echo number_format($hasilBulats);
							}


							?>
						</div>
					</td>
					<td class="pt-5" class="">
						<div class="d-flex justify-content-center">
							<div class="dok d-flex justify-content-evenly">
								<button style="background-color: #E04F62;" onClick='hapus_row("<?= $items['id'] ?>")' class="btn btn-danger py-0 px-1 "><i class="bi bi-dash"></i></button>
								<strong class="mx-3"><?= $items['qty']; ?></strong>
								<button style="background-color: ##07B343;" onClick='tambah_row("<?= $items['id'] ?>")' class="btn btn-success py-0 px-1 "><i class="bi bi-plus"></i></button>
							</div>
						</div>
					</td>
					<td class="d-flex justify-content-between">
						<div class=" d-flex justify-content-evenly">
							<div class=" mb-3">
								<div class="d-flex justify-content-end">Harga:</div>
								<div class="d-flex justify-content-end">Disc:</div>
								<div class="d-flex justify-content-end"><strong>Total:</strong></div>
							</div>
						</div>
						<div class=" d-flex justify-content-evenly">
							<div class=" mb-3">
								<div class="d-flex justify-content-end">


									<?php

									$harga_barang = $items['price'];
									$qttyTotal = $items['qty'];


									$ratusan = substr(($harga_barang), -3);
									$bulatam = floor(($harga_barang) / 1000) * 1000;
									if ($ratusan < 100) {
										$hasilBulat = $bulatam * $qttyTotal;
										echo number_format($hasilBulat);
									} elseif ($ratusan < 599) {
										$hasilBulat = ($bulatam + 500) * $qttyTotal;
										echo number_format($hasilBulat);
									} else {
										$hasilBulat = ($bulatam + 1000) * $qttyTotal;
										echo number_format($hasilBulat);
									}
									?>


								</div>
								<div class="d-flex justify-content-end">


									<?php
									$ratusanTotal = substr(($harga_barang * $qttyTotal), -3);
									$bulatamTotal = floor(($harga_barang * $qttyTotal) / 1000) * 1000;
									if ($ratusanTotal < 100) {
										$hasilBulatTotal = $bulatamTotal;
										// echo number_format($hasilBulatTotal) . "</strong>";
									} elseif ($ratusanTotal < 599) {
										$hasilBulatTotal = ($bulatamTotal + 500);
										// echo number_format($hasilBulatTotal) . "</strong>";
									} else {
										$hasilBulatTotal = ($bulatamTotal + 1000);
										// echo number_format($hasilBulatTotal) . "</strong>";
									}



									$totalHasilAll = $hasilBulat - $hasilBulatTotal;
									if ($totalHasilAll == 0) {
										echo number_format($totalHasilAll);
									} else {
										echo " - " . number_format($totalHasilAll);
									};

									?>


								</div>
								<div class="d-flex justify-content-end">

									<?php
									$ratusanTotal = substr(($harga_barang * $qttyTotal), -3);
									$bulatamTotal = floor(($harga_barang * $qttyTotal) / 1000) * 1000;
									if ($ratusanTotal < 100) {
										$hasilBulatTotal = $bulatamTotal;
										echo "<strong><u>" . number_format($hasilBulatTotal) . "</u></strong>";
									} elseif ($ratusanTotal < 599) {
										$hasilBulatTotal = ($bulatamTotal + 500);
										echo "<strong><u>" . number_format($hasilBulatTotal) . "</u></strong>";
									} else {
										$hasilBulatTotal = ($bulatamTotal + 1000);
										echo "<strong><u>" . number_format($hasilBulatTotal) . "</u></strong>";
									}


									?>
								</div>
							</div>
						</div>
					</td>
					<td class="pt-4">
						<button style="width: 0.7cm; background-color: #E04F62;" sty onClick='delete_row("<?= $items['rowid'] ?>")' class="w-100 btn btn-danger btn_block"><i class="bi bi-trash3-fill"></i></button>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
<script>
	var site_url = '<?= site_url() ?>';

	function delete_row(id) {
		$.get(site_url + '/myigniter/deleterow/' + id, function(data) {
			/*optional stuff to do after success */
			kolom();
			total();
			$('#ganti').html('<div style="color:#8e8e8e;" class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>');
			document.getElementById('bayare').value = 'Rp. 0';
			$('#hpsCtk').remove()
		});
	}

	function tambah_row(id) {
		$.get(site_url + '/myigniter/tambahRow/' + id, function(data) {
			/*optional stuff to do after success */
			kolom();
			total();
			$('#ganti').html('<div style="color:#8e8e8e;" class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>');
			document.getElementById('bayare').value = 'Rp. 0';
			$('#hpsCtk').remove()
		});
	}

	function hapus_row(id) {
		$.get(site_url + '/myigniter/hapusRow/' + id, function(data) {
			/*optional stuff to do after success */
			kolom();
			total();
			$('#ganti').html('<div style="color:#8e8e8e;" class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>');
			document.getElementById('bayare').value = 'Rp. 0';
			$('#hpsCtk').remove()
		});
	}
</script>