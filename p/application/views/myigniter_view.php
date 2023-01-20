<div class="container-fluid">
	<div class="container-fluid my-5 pt-5">
        <div id="gogg" class="row g-4 pb-3 shadow-lg">
            <div class="col-sm-8">
                <h6 class="card-title mt-3"><b>SCAN CODE</b> <small>(f2)</small></h6>
                <form id="form" action="" method="POST" role="form">
					<input id="kode" type="text" name="kode" autofocus="autofocus" class="form-control" placeholder="Kode Barang" required="required">
				</form>
				<form action="<?=site_url("myigniter/selesai")?>">
					<div class="row g-1">
						<div class="col-sm-4">
							<h6 class="card-title mt-3"><b>CASH</b><small> (f4)</small></h6>
							<input type="text" id="bayare" name="" class="form-control" required="required" placeholder="Rp. 0">
						</div>
						<div class="col-sm-4">
							<h6 class="card-title mt-3"><b>KEMBALIAN</b></h6>
							<div class="card">
								<div id="ganti">
								<div class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6 style="opacity: 0;" class="card-title mt-3 text_white">MMMMMMM</h6>
							<div id="ctk"></div>
							<!-- <button class="btn btn-success btn_block">CETAK STRUK</button> -->
						</div>
						<div class="col-sm-2">
							<h6 style="opacity: 0;" class="card-title mt-3 text_white">MMMMMM</h6>
							<button onclick="hapusSemua()" type="button" class="btn btn-danger btn_block"><i class="bi bi-trash3-fill"></i><small> (f9)</small></button>
						</div>
					</div>
				</form>
            </div>
            <div class="col-sm-4">
                <h6 class="card-title mt-3"><b>TOTAL HARGA</b></h6>
                <div style="background-color: #edffed;border-radius: 5px;" class="card p-4">
                    <h2 class="display-4" id="total"></h2>
                </div>
            </div>
        </div>
        <!-- <hr class="mb-5 mt-4"> -->
		<br class="mb-5 mt-5">
        <h6 class="card-title mt-4"><b>DAFTAR BELANJA</b> <a href="<?= base_url('barang')?>"><i class="bi-cart4"></i></a></h6>
		<div class="table-responsive keranjang"> 
		</div>
</div>
</div>
	



<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.price_format.2.0.min.js') ?>"></script>
<script>
$(function() {
	var availableTags = [
	  <?php foreach ($cari->result() as $row): ?>
	  	"<?= $row->id ?>",
	  <?php endforeach ?>
	];
	$( "#manual" ).autocomplete({
	  source: availableTags
	});

	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	})

	$('#kode').keyup(function() {
	    konfirmasi();
		$('#ganti').html('<div style="color:#8e8e8e;" class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>');
		document.getElementById('bayare').value = 'Rp. 0';
		$('#hpsCtk').remove()
	});

	$('#tombol').click(function() {
		$(this).addClass('disabled');
		konfirmasi();
	});

	kolom();
	total();

	var rupiah ={prefix: 'Rp. ', thousandsSeparator: ',', centsLimit: 0};
	$('#bayare').priceFormat(rupiah);
	$('#ganti');

	$('#bayare').keyup(function() {
		site_url = '<?=site_url()?>';
		$.get(site_url+'/myigniter/total', function(data) {
			tot = data;
			bayare = $('#bayare').unmask();
			kembali = parseInt(bayare) - parseInt(tot);
			
			if(kembali > 0 && tot > 0){
			$('#ganti').html('<div class="babi px-3 py-2 pt-2 pb-1">'+kembali+'</div>');
			$('#ctk').html('<button id="hpsCtk" type="submit" class="btn btn-success btn_block"><i class="bi bi-printer-fill"></i> <small>(enter)</small></button>');

			$('.babi').priceFormat({prefix: 'Rp. ', thousandsSeparator: ',', centsLimit: 0});
			}else if( parseInt(bayare) ==  parseInt(tot)){
				if(tot>0){
					$('#ganti').html('<div class="px-3 py-2 pt-1">'+kembali+'</div>');
					$('#ctk').html('<button id="hpsCtk" type="submit" class="btn btn-success btn_block"><i class="bi bi-printer-fill"></i> <small>(enter)</small></button>');

					$('#ganti').html('<div style="color:green;" class="babi px-3 py-2 pt-2 pb-1">'+'UANG PASS'+'</div>');
				}
			}else if(tot == 0) {
				$('#ganti').html('<div style="color:red;" class="babi px-3 py-2 pt-2 pb-1">'+'MASUKAN BARANG'+'</div>');
				$('#hpsCtk').remove()
			}else if(kembali < tot) {
				$('#ganti').html('<div style="color:red;" class="babi px-3 py-2 pt-2 pb-1">'+'UANG KURANG'+'</div>');
				$('#hpsCtk').remove()
			}
	    });
	});

	$('.tutup').click(function() {
		/* Act on the event */

	});
});


function kolom()
{
  site_url = '<?=site_url()?>';
  $.get(site_url+'/myigniter/daftarkeranjang', function(data) {
    $(".keranjang").html(data);
  });
}

function total()
{
  site_url = '<?=site_url()?>';
  $.get(site_url+'/myigniter/total', function(data) {
      let pao = Math.ceil(data / 1000);
      let papi = pao*1000;
      
    $("#total, .totalan").html(papi).priceFormat({
		prefix: 'Rp. ',
	    thousandsSeparator: ',',
	    centsLimit: 0
    });
  });
}

function konfirmasi()
{
    setTimeout(function(){
   	  site_url = '<?=site_url()?>';
	  var id = $("#kode").val();

      $.get(site_url+'/myigniter/keranjang/'+id, function() {
        /*optional stuff to do after success */
        $("#kode").val('');
        kolom();
        total();
      }).done(function() {
		$("#tombol").removeClass('disabled');
	  });
     //  $('#form').submit();
    }, 1000);// <-- untuk mengukur waktu scan, perhitungannya mengunakan milisecond
}

function hapusSemua()
{
	site_url = '<?=site_url()?>';
	$.get(site_url+'/myigniter/delete', function() {
		/*optional stuff to do after success */
		kolom();
        total();	
	});
	document.getElementById('bayare').value = 'Rp. 0';
	$('#ganti').html('<div style="color:#8e8e8e;" class="babi px-3 py-2 pt-2 pb-1">Rp. 0</div>');
	$('#hpsCtk').remove();

}

// === keydown ===
document.onkeydown = function(evt) {
                        evt = evt || window.event;
                        if (evt.keyCode == 113) {
                            // hapusSemua();
							document.getElementById("kode").focus();
                        }
                        if (evt.keyCode == 115) {
                            // hapusSemua();
							document.getElementById("bayare").focus();
                        }
                        if (evt.keyCode == 120) {
                            hapusSemua();
                        }
                    };
</script>