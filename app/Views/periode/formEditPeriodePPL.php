<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout2/header.php') ?>

<?= $this->include('layout2/sidebar.php'); ?>

<?= $this->include('layout2/topbar.php') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Formulir Perubahan Data Kandang</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Kelola Data</li>
      <li class="breadcrumb-item active">Ubah Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!-- =========section======= -->
<section class="section">
  <div class="row">
    <div>

<?php if (session()->has('successDPer')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo session('successDPer'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php endif; ?>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ubah Data Kandang</h5>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/periode/simpanUbahDataPPL/<?= $id_periode?>" method="POST" enctype="multipart/form-data">

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                  <div class="col-sm-10">
                    <input name="tgl_periode" type="date" class="form-control" value="<?= $tgl_periode?>">
                  </div>
                </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
              </div>
            </div>
            <a href="<?=base_url()?>/periode/sidebarPPL" class="btn btn-warning">Kembali</a>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>

  </div>
</section>
<!-- =========section======= -->
</main><!-- End #main -->

<?= $this->include('layout2/footer.php') ?>

<?= $this->endSection() ?>