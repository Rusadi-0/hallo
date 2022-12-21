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
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>

<script>
    if(<?=$user['role_id'];?> == <?=209;?>){
      window.location.href = "https://tknoor.000webhostapp.com/admin/OmsetSatu";
    }
</script>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->