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
                            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Riwayat Anggaran Bulan ini</h5>
                            <div class="card-body">
                                <table id="myUse" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nomor</th>
                                            <th scope="col">Nama Perusahaan</th>
                                            <th scope="col">Tagihan</th>
                                            <th scope="col">tanggal</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>02</td>
                                            <td>pt.jaya abadi</td>
                                            <td>300.000</td>
                                            <td>2022-06-09</td>
                                            <td>
                                                <button class="btn btn-danger">hapus</button>
                                                <button class="btn btn-success">edit</button>
                                                <button class="btn btn-info">lihat</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->