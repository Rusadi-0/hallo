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
                            <li class="breadcrumb-item active">Omset Hari Ini</li>
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
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Penyetoran Hari Ini</h5>
                            <div class="card-body">

                                <script>
                                    if (<?php foreach ($omset as $o) {echo $o;}?> != <?= date('Y-m-d'); ?>) {
                                        if (<?= date("Hi"); ?> > 2144) {
                                            document.writeln( /*html*/ `
                                <form action="<?= base_url('OmsetSatu/omset'); ?>" method="post">
                                    <div class="form-group row">
                                        <label for="1k" class="col-sm-4 col-form-label"><strong>Rp. 1.000 ,-</strong> <i style="color:#acb861;font-size:19px;" class="mdi mdi-cash-usd"></i></label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0" id="" name="1k" placeholder=". . . " required class="form-control" id="inputEmail3">
                                        </div>
                                    </div>                            
                                    <div class="form-group row">
                                        <label for="2k" class="col-sm-4 col-form-label"><strong>Rp. 2.000 ,-</strong> <i style="color:#929ba6;font-size:19px;" class="mdi mdi-cash-usd"></i></label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0" id="" name="2k" placeholder=". . . " required class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="5k" class="col-sm-4 col-form-label"><strong>Rp. 5.000 ,-</strong> <i style="color:#9c6d17;font-size:19px;" class="mdi mdi-cash-usd"></i></label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0" id="" name="5k" placeholder=". . . " required class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="10k" class="col-sm-4 col-form-label"><strong>Rp. 10.000 ,-</strong> <i style="color:#d154a7;font-size:19px;" class="mdi mdi-cash-usd"></i></label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0" id="" name="10k" placeholder=". . . " required class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="20k" class="col-sm-4 col-form-label"><strong>Rp. 20.000 ,-</strong> <i style="color:#4bc477;font-size:19px;" class="mdi mdi-cash-usd"></i></label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0" id="" name="20k" placeholder=". . . " required class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="50k" class="col-sm-4 col-form-label"><strong>Rp. 50.000 ,-</strong> <i style="color:#52abff;font-size:19px;" class="mdi mdi-cash-usd"></i></label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0" id="" name="50k" placeholder=". . . " required class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="100k" class="col-sm-4 col-form-label"><strong>Rp. 100.000 ,-</strong> <i style="color:#fc5c2b;font-size:19px;" class="mdi mdi-cash-usd"></i></label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0" id="" name="100k" placeholder=". . . " required class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label"><strong>Jumlah Kembalian diambil</strong></label>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input onclick="angsulan(1)" required placeholder="1" id="tum1" class="col-2 btn btn-outline-primary">
                                                <input onclick="angsulan(2)" required placeholder="2" id="tum2" class="col-2 btn btn-outline-primary">
                                                <input onclick="angsulan(3)" required placeholder="3" id="tum3" class="col-2 btn btn-outline-primary">
                                                <input name="nama_penyetor" type="hidden" value="<?= $user["name"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-5">
                                        <div class="col-sm-12">
                                        <div id="jahh">
                                            <button type="submit" id="jah" onclick="oh()" class="btn btn-block btn-primary mt-2" class="btn btn-primary mt-2"><i class='mdi mdi-content-save'></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>`)
                                        } else {
                                            document.writeln("<div class='text-center'><h5>Waktu Penyetoran dimulai</h5><h5><strong>Jam 09.45 PM s/d 12.00 AM</strong></h5><div id='f5ff'><botton onclick='f5()' class='btn btn-primary'>Refresh</button></div></div>");

                                            function f5() {
                                                window.location.reload();
                                                document.getElementById("f5ff").innerHTML = "<botton class='btn btn-primary disabled'><i class='fa fa-spin fa-spinner'></i> Refresh</button>"
                                            };
                                        };
                                    } else {
                                        <?php foreach ($getAkhir as $om) : ?>
                                            document.writeln(/*html*/`
                                                <div class="container">
                                                    <div class="text-center">
                                                    <h2>Berhasil Direkam</h2>
                                                    <h1 style="font-size:150px;color:rgb(0, 186, 77);" class="mdi mdi-checkbox-marked-circle-outline animate__animated animate__bounceIn animate__delay-1s"></h1>
                                                    <br>
                                                    <br>
                                                    <br>
                                                        <div class="row">
                                                        <div class="col-md-6"><h6>Penyetor Hari ini :</h6></div>
                                                        <div class="col-md-6"><strong><h5><?= $om["nama_penyetor"]; ?></h5></strong></div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-6"><h6>Laba Pendapatan Hari ini :</h6></div>
                                                        <div class="col-md-6"><strong><h5><?= "Rp. " . number_format($om['nilai_omset'], 0, '', ','); ?></h5></strong></div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-6"><h6>Waktu Disetor :</h6></div>
                                                        <div class="col-md-6"><strong><h5><?= date("g:i A", $om['waktu_stor']); ?></h5></strong></div>
                                                        </div> 
                                                    </div>
                                                </div>
                                `);
                                        <?php endforeach; ?>
                                    }
                                    setTimeout(function() {
                                        window.location.reload(1);
                                    }, <?php
                                        $j = 21;
                                        $m = 30;
                                        $d = 00;


                                        $jam = ($j * (60 * 60 * 1000)) - (date("H") * (60 * 60 * 1000));
                                        $menit = ($m * (60 * 1000)) - (date("i") * (60 * 1000));
                                        $detik = ($d * 1000) - (date("s") * 1000);

                                        $waktu = $jam + $menit + $detik;

                                        ?><?php

                                            if ($waktu > 0) {
                                                echo $waktu;
                                            } else {
                                                echo (1000 * 60 * 60 * 24) * 3;
                                            }


                                            ?>);
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Upah Kasir bulan ini</h5>
                            <div class="card-body text-center">
                            <?php
                            $qTot = "SELECT SUM(nilai_omset) FROM omset WHERE nama_penyetor='" . $user['name'] . "' AND bulan IN (DATE_FORMAT(NOW(), '%m%Y'))";
                            $qKem = "SELECT SUM(jumlah_kembalian) FROM omset WHERE nama_penyetor='" . $user['name'] . "' AND bulan IN (DATE_FORMAT(NOW(), '%m%Y'))";
                            $qStor = "SELECT COUNT(nama_penyetor) FROM omset WHERE nama_penyetor='" . $user['name'] . "' AND bulan IN (DATE_FORMAT(NOW(), '%m%Y'))";
                            $tot = $this->db->query($qTot)->row_array();
                            $kem = $this->db->query($qKem)->row_array();
                            $stor = $this->db->query($qStor)->row_array();
                            ?>
                            <?php foreach ($tot as $tt) : ?>
                            <?php foreach ($kem as $km) : ?>
                            <?php foreach ($stor as $st) : ?>
                            <?php
                            if($st == 0){
                                echo '<h5 class="card-title"> Tidak ada data : </h5><h3><strong>NIHIL</strong></h3>';
                            } else {
                                echo "Banyak Stor Bulan ini : " . $st . " kali";
                                echo "<br>";
                                echo "Total : " . number_format($tt, 0, '', ',');
                                echo "<br>";
                                $kkn = $km*250000;
                                echo "kembalian : " . number_format($kkn, 0, '', ',');
                                $hhs = $tt-$kkn;
                                echo "<br>";
                                echo "Hasil : " . number_format($hhs, 0, '', ',');
                                echo "<br>";
                                echo "laba kotor barang (90%) :";
                                echo "<br>";
                                $adb = ($hhs * 9.0909090909090901) / 100;
                                echo number_format(round($hhs - $adb), 0, '', ',');
                                echo "<br>";
                                echo "laba bersih pendapatan (10%) :";
                                echo "<br>";
                                echo number_format(round($adb), 0, '', ',');
                                echo "<br>";
                                $hayuk = round(($adb * 20) / 100);
                            }
                            ?>
                            <br>
                            

                                <script>
                                let jujuk = <?=$hayuk;?> / 1000;
                                let jujus = Math.round(jujuk);
                                
                                    document.writeln('<h5 class="card-title">Total upah 20% dibulatkan : </h5><h3><strong data-toggle="tooltip" data-placement="left" title="" data-original-title="'+ new Intl.NumberFormat().format(jujuk) +'">Rp ' + new Intl.NumberFormat().format(jujus*1000) + '</strong></h3>');
                                </script>
                            </div>
                            <?php endforeach;?>
                            <?php endforeach;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Omset Bulan <?= date("F"); ?></h5>
                    <div class="card-body">
                        <table id="myUse" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">tgl</th>
                                    <th scope="col">Laba Bersih</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php setlocale(LC_ALL, 'id-ID', 'id_ID');
                                $dateNow = date('mY');
                                $dataB = "SELECT * FROM omset WHERE bulan IN ($dateNow) AND NOT id='1' ORDER BY id DESC;";
                                $omsetBulan = $this->db->query($dataB)->result_array();
                                ?>
                                <?php foreach ($omsetBulan as $om) : ?>
                                    <?php $hasilPersen = ($om['nilai_omset'] - ($om['jumlah_kembalian'] * 250000)) * 9.0909090909090909090909090901/100; ?>
                                    <!--10%-->
                                    <?php $hasilOmset = ($om['nilai_omset'] - ($om['jumlah_kembalian'] * 250000)) - $hasilPersen; ?>
                                    <tr>
                                        <td scope="row"><?= strftime("%d", strtotime($om['tanggal_stor'])); ?></td>
                                        <td><?php 
                                        $hoss = $hasilPersen / 1000;
                                        $hosa = round($hoss);
                                        if ($hasilPersen < 0) {
                                                echo 0;
                                            } else {
                                                echo number_format(($hosa*1000), 0, '', ',');
                                            }; ?>
                                        </td>  
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihat<?= $om['id']; ?>">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
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
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





        <script>
            let sep = document.getElementById('sep');

            function sepp() {
                sep.setAttribute('disabled', true);
                sep.innerHTML = "<i class='fa fa-spin fa-spinner'></i> Loading";
                setTimeout(nno, 5000);

            }

            function nno() {
                sep.removeAttribute('disabled');
                sep.innerHTML = "<i class='mdi mdi-content-save'></i> SIMPAN";
            }

            function angsulan(d) {
                let tum1 = document.getElementById('tum1');
                let tum2 = document.getElementById('tum2');
                let tum3 = document.getElementById('tum3');
                if (d == 1) {
                    tum1.setAttribute('name', 'kembalian');
                    tum1.setAttribute('value', 1);
                    tum1.setAttribute('readonly', true);
                    tum1.setAttribute('required', true);
                    tum1.className = "col-2 btn btn-primary";
                    tum2.removeAttribute('name');
                    tum2.removeAttribute('required');
                    tum2.removeAttribute('value');
                    tum2.removeAttribute('readonly');
                    tum2.className = "col-2 btn btn-outline-primary";
                    tum3.removeAttribute('name');
                    tum3.removeAttribute('required');
                    tum3.removeAttribute('value');
                    tum3.removeAttribute('readonly');
                    tum3.className = "col-2 btn btn-outline-primary";
                } else if (d == 2) {
                    tum2.setAttribute('name', 'kembalian');
                    tum2.setAttribute('value', 2);
                    tum2.setAttribute('readonly', true);
                    tum2.setAttribute('required', true);
                    tum2.className = "col-2 btn btn-primary";
                    tum1.removeAttribute('name');
                    tum1.removeAttribute('required');
                    tum1.removeAttribute('value');
                    tum1.removeAttribute('readonly');
                    tum1.className = "col-2 btn btn-outline-primary";
                    tum3.removeAttribute('name');
                    tum3.removeAttribute('required');
                    tum3.removeAttribute('value');
                    tum3.removeAttribute('readonly');
                    tum3.className = "col-2 btn btn-outline-primary";
                } else if (d == 3) {
                    tum3.setAttribute('name', 'kembalian');
                    tum3.setAttribute('value', 3);
                    tum3.setAttribute('readonly', true);
                    tum3.setAttribute('required', true);
                    tum3.className = "col-2 btn btn-primary";
                    tum1.removeAttribute('name');
                    tum1.removeAttribute('required');
                    tum1.removeAttribute('value');
                    tum1.removeAttribute('readonly');
                    tum1.className = "col-2 btn btn-outline-primary";
                    tum2.removeAttribute('name');
                    tum2.removeAttribute('required');
                    tum2.removeAttribute('value');
                    tum2.removeAttribute('readonly');
                    tum2.className = "col-2 btn btn-outline-primary";
                }


            }
        </script>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->