// START LABA BULAN INI
    let varTotalPendapatanPerbulan = <?php foreach ($getAll as $gg) {
                    echo $gg;
                } ?>;//variabel varTotalPendapatanPerbulan adalah untuk mrnampilkan semua data nilai_omset bulan sekarang
    let varTotalKembalianPerbulan = <?php foreach ($getAss as $ss) {
                    echo $ss * 250000;
                } ?>;//variabel varTotalKembalianPerbulan adalah untuk menampilkan semuada data jumlah_kembalian bulan sekarang
    let varTotalOmzetPerbulan = varTotalPendapatanPerbulan - varTotalKembalianPerbulan; //variabel varTotalOmzetPerbulan adalah nilai dari SUM data nilai_omset dikurang SUM data jumlah_kembalian
    let persenanProfit = <?=$hasilPersenProfit;?>;
    let varProfitPerbulan = varTotalOmzetPerbulan / persenanProfit;
    let varTotalAsetPerbulan = varTotalOmzetPerbulan - varProfitPerbulan;
// END LABA BULAN INI



// START UPAH 20%
    let varPersenanUpah = 20;
    let varHasilUpah = (varProfitPerbulan * varPersenanUpah) / 100;
    let varPembulatan = 1000;
    let varUpahDibulatkan = Math.round(varHasilUpah / varPembulatan)* varPembulatan;
// END UPAH 20%