<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah cepat</title>
    <link rel="stylesheet" href="<?=base_url('assets/barang');?>/css/bootstrap.css">
</head>
<body>
    <div class="container my-5">
        <form action="<?= base_url('barang/tbhCpt/')?>" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Code Barang</label>
                <input type="number" class="form-control" required autofocus id="exampleFormControlInput1" name="id" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="harga_beli">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="harga_jual">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stok Barang</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="stok">
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi-save2"></i> Simpan</button>
            <a href="../barang/" type="button" class="btn btn-outline-secondary"><i class="bi-save2"></i> Kembali</a>
        </form>
    </div>
</body>
</html>