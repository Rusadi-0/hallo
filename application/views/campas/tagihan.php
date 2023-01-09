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
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <!-- input campas -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="row">
                <!-- start campas dan barang --> 
                    <div class="col-md-12 col-lg-12 col-xl-12"> <!-- start pertama -->
                         <div class="card m-b-30">
                              <h5 class="card-header mt-0"><i class="mdi mdi-timer"></i> List Campas</h5>
                              <div class="card-body">
                                   <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Select</label>
                                        <div class="col-sm-10">
                                             <select class="form-control">
                                                  <option>Pilih</option>
                                                  <?php foreach($campas as $c):?>
                                                  <option><?= $c['namaCampas'];?></option>
                                                  <?php endforeach;?>
                                             </select>
                                        </div>
                                   </div>
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" value="<?= date("Y-m-d");?>" id="example-date-input">
                                        </div>
                                    </div>
                              </div>
                         </div>
                    </div> <!-- end pertama -->
                    <div class="col-md-12 col-lg-12 col-xl-12"><!-- start kedua -->
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-timer"></i> List Campas</h5>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-2 col-form-label">code barang</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" min="0" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-2 col-form-label">nama barang</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" min="0" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-2 col-form-label">total harga</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" min="0" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-2 col-form-label">jumah barang</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" min="0" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end kedua -->
                <!-- end campas dan barang -->
               </div>
            </div>
            <!-- end input campas -->
            <!-- start daftar campas -->
            <div class="col-md-6 col-lg-6 col-xl-6">
               <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                         <div class="card m-b-30">
                              <h5 class="card-header mt-0"><i class="mdi mdi-timer"></i> List Campas</h5>
                              <div class="card-body">
                              <table id="myTable" class="table table-hover">
                                        <thead>
                                             <tr>
                                                  <th scope="col">#</th>
                                                  <th>Nama</th>
                                                  <th>Alamat</th>
                                                  <th>Telepon</th>
                                                  <th>Rekening</th>
                                                  <th>Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i=1;?>
                                             <?php foreach ($campas as $c) : ?>
                                             <tr>
                                                  <td><?= $i++;?></td>
                                                  <td><?= $c["namaCampas"];?></td>
                                                  <td><?= $c["alamatCampas"];?></td>
                                                  <td><?= $c["teleponCampas"];?></td>
                                                  <td><?= $c["rekeningCampas"];?></td>
                                                  <td>
                                                       <div class="button-items">
                                                            <button type="button" class="btn btn-danger" onclick="hapus<?= $c['id']; ?>()">
                                                                 <i class="mdi mdi-delete"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success" onclick="edit<?= $c['id']; ?>()">
                                                                 <i class="mdi mdi-pencil"></i>
                                                            </button>
                                                       </div>
                                                       <script>
                                                            function hapus<?= $c['id']; ?>() {
                                                                 let yakinD = confirm("yakin hapus?");
                                                                 if(yakinD){
                                                                      window.location = "<?= base_url('campas/delete/') . $c['id']; ?>";
                                                                 };
                                                            }

                                                            function edit<?= $c['id']; ?>() {
                                                                 window.location = "<?= base_url('campas/edit/') . $c['id']; ?>";
                                                            }
                                                       </script>
                                                  </td>
                                             </tr>
                                             <?php endforeach;?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </div>
            </div>
            <!-- end daftar campas -->
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->