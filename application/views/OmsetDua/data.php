<script>
// START LABA BULAN INI
    let gugu = <?php foreach ($getAll as $gg) {
                    echo $gg;
                } ?>;//variabel gugu adalah untuk mrnampilkan semua data nilai_omset bulan sekarang
    let gigi = <?php foreach ($getAss as $ss) {
                    echo $ss * 250000;
                } ?>;//variabel gigi adalah untuk menampilkan semuada data jumlah_kembalian bulan sekarang
    let huhu = gugu - gigi; //variabel huhu adalah nilai dari SUM data nilai_omset dikurang SUM data jumlah_kembalian
    let bbbb = huhu * 9.0909090909090909090909090901 / 100;
    let hihi = huhu - bbbb;
// END LABA BULAN INI



// START UPAH 20%
    let cca = Math.ceil((bbbb * 20) / 100);
    let ccb = cca / 1000;
    let ccc = Math.round(ccb)*1000;
// END UPAH 20%
</script>
</header>
<!-- End Navigation Bar=============================================================================-->

<!-- ISI ================================================================================================= -->
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Kasir</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('nama_penyetor', '<small class="text-danger pl-3">', '</small>'); ?>
        <?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>

        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Omset Tahun <?= date("Y"); ?></h5>
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Stacked bar chart</h4>
                                    <p class="text-muted m-b-30 font-14 d-inline-block text-truncate w-100">You can also set your bar chart to
                                        stack the series bars on top of each other easily by using the stackBars
                                        property in your configuration.</p>
                                <div id="stacked-bar-chart" class="ct-chart ct-golden-section"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Laba Bulan ini</h5>
                            <div class="card-body text-center">
                                <script>
                                    document.writeln('<h5 class="card-title">Laba Modal</h5><h3><strong>Rp ' + new Intl.NumberFormat().format(Math.round(hihi)) + '</strong></h3><br>');
                                    document.writeln('<h5 class="card-title">Laba Bersih</h5><h3><strong>Rp ' + new Intl.NumberFormat().format(Math.round(bbbb)) + '</strong></h3>');
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-weather-rainy"></i> Upah Kasir 20% per bulan</h5>
                            <div class="card-body text-center">
                                <script>
                                    document.writeln('<h5 class="card-title">Total hasil dibulatkan : </h5><h3><strong data-toggle="tooltip" data-placement="left" title="" data-original-title="'+ new Intl.NumberFormat().format(cca) +'">Rp ' + new Intl.NumberFormat().format(ccc) + '</strong></h3>');
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="card m-b-30">
                    <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Omset Tahun <?= date("Y"); ?></h5>
                    <div class="card-body">
                        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambah"><i class="mdi mdi-plus-box"></i> Tambah Data</button>
                        <table id="myUse" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Laba Bersih</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php setlocale(LC_ALL, 'id-ID', 'id_ID');
                                $dateNow = date('Y');
                                $dataB = "SELECT * FROM omset WHERE tahun IN ($dateNow) AND NOT id='1' ORDER BY id DESC;";
                                $omsetBulan = $this->db->query($dataB)->result_array();
                                ?>
                                <?php $i = 1; ?>
                                <?php foreach ($omsetBulan as $om) : ?>
                                    <?php $hasilPersen = ($om['nilai_omset'] - ($om['jumlah_kembalian'] * 250000)) * 9.0909090909090909090909090901/100; ?>
                                    <!--10%-->
                                    <?php $hasilOmset = ($om['nilai_omset'] - ($om['jumlah_kembalian'] * 250000)) - $hasilPersen; ?>
                                    <tr>
                                        <td scope="row"><?= strftime("%Y-%m-%d", strtotime($om['tanggal_stor'])); ?></td>
                                        <td><?= strftime("%B", strtotime($om['tanggal_stor'])); ?></td>
                                        <td><?php 
                                        $hoss = $hasilPersen / 1000;
                                        $hosa = round($hoss);
                                        if ($hasilPersen < 0) {
                                                echo 0;
                                            } else {
                                                echo number_format(($hosa*1000), 0, '', ',');
                                            }; ?></td>
                                        <td>
                                            <div class="button-items">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#lihat<?= $om['id']; ?>">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $om['id']; ?>">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                                <button type="button" class="btn btn-success" onclick="edit<?= $om['id']; ?>()">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                            </div>
                                        </td>


                                        <!-- Modal Lihat-->
                                        <div class="modal fade" id="lihat<?= $om['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-6 mr-auto"><strong>Laba Pendapatan</strong></div>
                                                                <div class="col-md-6 mr-auto">: <?= "Rp. " . number_format($om['nilai_omset'], 0, '', ','); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mr-auto"><strong>Kembalian Digunakan</strong></div>
                                                                <div class="col-md-6 mr-auto">:

                                                                    <?php if ($hasilOmset < 0) : ?>
                                                                        -
                                                                    <?php else : ?>
                                                                        <?= $om["jumlah_kembalian"]; ?> Kali <?php $pop = $om["jumlah_kembalian"] * 250000;
                                                                        echo "(Rp. " . number_format($pop, 0, '', ',').")";
                                                                        ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mr-auto"><strong>Laba Modal (90%)</strong></div>
                                                                <div class="col-md-6 mr-auto">:
                                                                    <?php if ($hasilOmset < 0) : ?>
                                                                        Rp. 0
                                                                    <?php else : ?>
                                                                        <?= "Rp. " . number_format($hasilOmset, 0, '', ','); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mr-auto"><strong>Laba Bersih (10%)</strong></div>
                                                                <div class="col-md-6 mr-auto">:
                                                                    <?php if ($hasilOmset < 0) : ?>
                                                                        Rp. 0
                                                                    <?php else : ?>
                                                                        <?= "Rp. " . number_format($hasilPersen, 0, '', ','); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mr-auto"><strong>Nama Penyetor</strong></div>
                                                                <div class="col-md-6 mr-auto">: <?= $om["nama_penyetor"]; ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mr-auto"><strong>Hari/Waktu Disetor</strong></div>
                                                                <div class="col-md-6 mr-auto">: <?= strftime("%A", strtotime($om['tanggal_stor'])); ?>/<?= date("g:i A", $om['waktu_stor']); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mr-auto"><strong>Tanggal Disetor</strong></div>
                                                                <div class="col-md-6 mr-auto">: <?= strftime("%d %B %Y", strtotime($om['tanggal_stor'])); ?></div>
                                                            </div>
                                                            <?php if ($om['nilai_omset'] == 0) : ?>
                                                                <div class="row">
                                                                    <div class="col-md-6 mr-auto"><strong>Keterangan</strong></div>
                                                                    <div class="col-md-6 mr-auto">: <?= $om['keterangan']; ?></div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus<?= $om['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Data?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <stronge>Tanggal : <?= strftime("%d %B %Y", strtotime($om['tanggal_stor'])); ?></stronge><br>
                                                        <stronge>Laba pendapatan : <?= "Rp. " . number_format($om['nilai_omset'], 0, '', ','); ?></stronge><br>
                                                        <stronge>Laba Bersih : <?= "Rp. " . number_format(($om['nilai_omset'] - ($om['jumlah_kembalian']*250000))*9.0909090909090909090901/100, 0, '', ','); ?></stronge>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" onclick="hapus<?= $om['id']; ?>()">Yakin</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function hapus<?= $om['id']; ?>() {
                                                window.location = "<?= base_url('OmsetDua/delete/') . $om['id']; ?>";
                                            }

                                            function edit<?= $om['id']; ?>() {
                                                window.location = "<?= base_url('OmsetDua/edit/') . $om['id']; ?>";
                                            }
                                        </script>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('OmsetDua/data'); ?>" method="post">
                    <div class="form-group row">
                        <label for="nilai_omset" class="col-sm-4 col-form-label"><strong>Laba Pendapatan</strong></label>
                        <div class="col-sm-8">
                            <input type="number" min="0" id="nilai_omset" name="nilai_omset" placeholder=". . . " required class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_kembalian" class="col-sm-4 col-form-label"><strong>Jumlah Kembalian</strong></label>
                        <div class="col-sm-8">
                            <input type="number" min="0" id="jumlah_kembalian" name="jumlah_kembalian" placeholder=". . . " required class="form-control">
                        </div>
                    </div>
                    <input name="nama_penyetor" type="hidden" value="<?= $user["name"]; ?>">
                    <div class="form-group row mt-5">
                        <div class="col-sm-6">
                            <div id="jahh">
                                <button type="submit" id="jah" onclick="oh()" class="btn btn-block btn-primary mt-2" class="btn btn-primary mt-2"><i class='mdi mdi-content-save'></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $persen = 9.0909090909090909090901;?>
<?php foreach ($kemjan as $k1) {
    $t1 = $k1 * 250000;
} ?>
<?php foreach ($kemfeb as $k2) {
    $t2 = $k2 * 250000;
} ?>
<?php foreach ($kemmar as $k3) {
    $t3 = $k3 * 250000;
} ?>
<?php foreach ($kemapr as $k4) {
    $t4 = $k4 * 250000;
} ?>
<?php foreach ($kemmei as $k5) {
    $t5 = $k5 * 250000;
} ?>
<?php foreach ($kemjun as $k6) {
    $t6 = $k6 * 250000;
} ?>
<?php foreach ($kemjul as $k7) {
    $t7 = $k7 * 250000;
} ?>
<?php foreach ($kemagus as $k8) {
    $t8 = $k8 * 250000;
} ?>
<?php foreach ($kemsep as $k9) {
    $t9 = $k9 * 250000;
} ?>
<?php foreach ($kemokt as $k10) {
    $t10 = $k10 * 250000;
} ?>
<?php foreach ($kemnop as $k11) {
    $t11 = $k11 * 250000;
} ?>
<?php foreach ($kemdes as $k12) {
    $t12 = $k12 * 250000;
} ?>

<script src="<?= base_url('assets/'); ?>plugins/chartist/js/chartist.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
<script>
//Stacked bar chart

new Chartist.Bar('#stacked-bar-chart', {
  labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
  series: [
    [<?php foreach ($jan as $b1) {
                                $oo1 = (($b1 - $t1) * $persen / 100);
                                echo round($oo1);
                                } ?>,<?php foreach ($feb as $b2) {
                                $oo2 = (($b2 - $t2) * $persen / 100);
                                echo round($oo2);
                            } ?>,<?php foreach ($mar as $b3) {
                                $oo3 = (($b3 - $t3) * $persen / 100);
                                echo round($oo3);
                            } ?>,<?php foreach ($apr as $b4) {
                                $oo4 = (($b4 - $t4) * $persen / 100);
                                echo round($oo4);
                            } ?>,<?php foreach ($mei as $b5) {
                                $oo5 = (($b5 - $t5) * $persen / 100);
                                echo round($oo5);
                            } ?>,<?php foreach ($jun as $b6) {
                                $oo6 = (($b6 - $t6) * $persen / 100);
                                echo round($oo6);
                            } ?>,<?php foreach ($jul as $b7) {
                                $oo7 = (($b7 - $t7) * $persen / 100);
                                echo round($oo7);
                            } ?>,<?php foreach ($agus as $b8) {
                                $oo8 = (($b8 - $t8) * $persen / 100);
                                echo round($oo8);
                            } ?>,<?php foreach ($sep as $b9) {
                                $oo9 = (($b9 - $t9) * $persen / 100);
                                echo round($oo9);
                            } ?>,<?php foreach ($okt as $b10) {
                                $oo10 = (($b10 - $t10) * $persen / 100);
                                echo round($oo10);
                            } ?>,<?php foreach ($nop as $b11) {
                                $oo11 = (($b11 - $t11) * $persen / 100);
                                echo round($oo11);
                            } ?>,<?php foreach ($des as $b12) {
                                $oo12 = (($b12 - $t12) * $persen / 100);
                                echo round($oo12);
                            } ?>]
  ],
  
}, {
  stackBars: false,
  axisY: {
    labelInterpolationFnc: function(value) {
      return (value / 1000000);
    }
  },
  plugins: [
    Chartist.plugins.tooltip()
  ]
}).on('draw', function(data) {
  if(data.type === 'bar') {
    data.element.attr({
      style: 'stroke-width: 19px'
    });
  }
});
</script>