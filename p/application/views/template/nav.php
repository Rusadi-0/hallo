<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a  style="font-size: 22px;" class="navbar-brand" href="<?= base_url('')?>">Mesin Kasir</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style="font-size: 14px;" class="ml-4 collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('')?>"><i class="bi-cart4"></i> Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/barang')?>"><i class="bi-box-seam"></i> Data Barang</a>
        </li>
      </ul>
    </div>
  </div>
</nav>