<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir | Data Barang</title>
    <!-- <link rel="stylesheet" href="jquery.dataTables.css"> -->
    <link rel="stylesheet" href="<?=base_url('assets/barang');?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url('assets/barang');?>/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?=base_url('assets/barang');?>/css/fixedHeader.bootstrap4.css">
    <link rel="stylesheet" href="<?=base_url('assets/barang');?>/css/responsive.bootstrap4.css">
    <link rel="stylesheet" href="<?=base_url('assets/barang');?>/css/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/barang');?>/icons/font/bootstrap-icons.css">
    <script src="<?=base_url('assets/barang');?>/js/jquery-3.6.0.js"></script>
    <script src="<?=base_url('assets/barang');?>/js/jquery.dataTables.js"></script>
    <script src="<?=base_url('assets/barang');?>/js/dataTables.bootstrap4.js"></script>
    <script src="<?=base_url('assets/barang');?>/js/dataTables.fixedHeader.js"></script>
    <script src="<?=base_url('assets/barang');?>/js/dataTables.responsive.js"></script>
    <script src="<?=base_url('assets/barang');?>/js/responsive.bootstrap4.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var table = $('#myTable').DataTable({
                    responsive: true,
                    "order": [[ 4, "desc"]]
                });

                new $.fn.dataTable.FixedHeader(table);
            });
        </script>
        <style>
            *{
				font-size: 13px;
				font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
			}
            body{
				/* background: radial-gradient(circle at top left, #d6ffe3,#e1feeb); */
				/* background: radial-gradient(circle at top left, #DEFCF9,#CADEFC,#C3BEF0, #CCA8E9); */
				/* background-size: cover;
				background-repeat: no-repeat;
				height: 100vh; */
                background-color: #F5F7F3;
			}
        </style>
</head>
<body>
<nav style="background-color: #32426A;" class="navbar navbar-expand-md navbar-dark fixed-top">
  <div class="container-fluid">
    <a  style="font-size: 23px;" class="navbar-brand" href="<?= base_url('')?>">KTNoor</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style="font-size: 14px;" class="ml-4 collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mx-4 mb-2 mb-md-0">
        <li class="nav-item mx-2">
          <a class="nav-link " aria-current="page" href="<?= base_url('')?>"><i class="bi-cart4"></i> Pembayaran</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link active" href="<?= base_url('/barang')?>"><i class="bi-box-seam"></i> Data Barang</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid mt-1 mb-5">
    <a href="<?= base_url()?>">Kasir</a>
    <div style="background: rgba(255, 255, 255, 0.3);border-radius: 9px;" class="card mt-5 shadow-lg">
        <div class="m-4">
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#barangBaru">
                    <i class="bi-plus-lg"></i> Tambah Barang
                </button>
                <table id="myTable" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 0.1cm;">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th style="width: 0.1cm;">Opsi</th>
                        </tr>
                    </thead>        
                    <tbody>
                        <?php foreach($barang as $bg):?>
                        <tr>
                            <td><?= $bg['id']?></td>
                            <td><?= strtoupper($bg['nama']);?> <small style="position: fixed; opacity: 0;"></small></td>
                            <td>Rp. <?= number_format($bg['harga_jual'])?></td>
                            <td><?= $bg['stok']?></td>
                            <td  style="width: 0.1cm;">
                            <small style="position: fixed; opacity: 0;"><?= $bg['tgl']?></small>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $bg['id']?>" class="py-0 px-1 btn btn-outline-success"><i class="bi-pencil-square"></i></button>
                                    <button onclick="hpss<?= $bg['id']?>()" class="py-0 px-1 btn btn-outline-danger"><i class="bi-trash3-fill"></i></button>
                                    <script>
                                        function hpss<?= $bg['id']?>(){
                                            var jar = confirm("yakin hapus? <?= $bg['nama']?>");
                                            if(jar){
                                                window.location.href = "<?= base_url('barang/hapus').'/'. $bg['id'] ?>"
                                            }
                                        }
                                    </script>
                                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $bg['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="<?= base_url('barang/edit/').'/'. $bg['id']?>" method="POST">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Code Barang</label>
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="id" value="<?= $bg['id']?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?=  strtoupper($bg['nama'])?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Harga Beli</label>
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="harga_beli" value="<?= $bg['harga_beli']?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Harga Jual</label>
                                                    <input readonly type="number" class="form-control" id="exampleFormControlInput1" name="harga_jual" value="<?= $bg['harga_jual']?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Stok Barang</label>
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="stok" value="<?= $bg['stok']?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi-door-closed"></i> Keluar</button>
                                                <button type="submit" class="btn btn-primary"><i class="bi-save2"></i> Simpan</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>        
        </div>
    </div>
</div>

<div class="modal fade" id="barangBaru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url('barang/tambah/')?>" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Code Barang</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" required name="id">
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
                    <label for="exampleFormControlInput1" class="form-label">Stok Barang</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="stok">
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('barang/tambahCepat/')?>">mode cepat <== </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi-door-closed"></i> Keluar</button>
                <button type="submit" class="btn btn-primary"><i class="bi-save2"></i> Simpan</button>
            </div>
            </div>
        </div>
        </div>
    </form>
</div>


<!-- modal baru -->

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>