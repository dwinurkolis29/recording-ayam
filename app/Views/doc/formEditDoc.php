<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Formulir Penambahan Data DOC</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Kelola Data</li>
      <li class="breadcrumb-item active">Ubah Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<?php if (session()->has('success')): ?>
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('success'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<!-- =========section======= -->
<section class="section">
  <div class="row">
    <div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ubah Data DOC</h5>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/doc/simpanUbahData/<?= $id_doc?>" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Jenis DOC</label>
              <div class="col-sm-10">
                <input name="jenis_doc" value="<?= $jenis_doc?>" type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Keterangan DOC</label>
              <div class="col-sm-10">
                <input name="keterangan_doc" value="<?= $keterangan_doc?>" type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
              </div>
            </div>
            <a href="<?=base_url()?>/doc" class="btn btn-warning">Kembali</a>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>

  </div>
</section>
<!-- =========section======= -->
</main><!-- End #main -->

<?= $this->include('layout/footer.php') ?>

<?= $this->endSection() ?>