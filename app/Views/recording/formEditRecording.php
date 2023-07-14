<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Formulir Perubahan Data Recording Ayam</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Recording</li>
      <li class="breadcrumb-item active">Ubah Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<?php if (session()->has('successURec')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successURec'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- =========section======= -->
<section class="section">
  <div class="row">
    <div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ubah Data Recording</h5>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/recording/simpanUbahData/<?= $id_recording?>" method="POST" enctype="multipart/form-data">
          <div class="perhitungan">
          <input name="id_periode" type="hidden" class="form-control" value="<?= $id_periode?>">
          
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Umur Ayam</label>
              <div class="col-sm-10">
                <input name="umur_r" type="text" class="form-control" value="<?= $umur_r?>">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Terima Pakan</label>
              <div class="col-sm-10">
                <input id="terima_pakan_r" name="terima_pakan_r" type="text" class="form-control" value="<?= $terima_pakan_r?>">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Habis Pakan</label>
              <div class="col-sm-10">
                <input id="habis_pakan_r" name="habis_pakan_r" type="text" class="form-control" value="<?= $habis_pakan_r?>">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Retur Pakan</label>
              <div class="col-sm-10">
                <input id="retur_pakan_r" name="retur_pakan_r" type="text" class="form-control" value="<?= $retur_pakan_r?>">
              </div>
            </div>


            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Mati Ayam</label>
              <div class="col-sm-10">
                <input id="mati_ayam_r" name="mati_ayam_r" type="text" class="form-control" value="<?= $mati_ayam_r?>">
              </div>
            </div>


            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Berat Ayam</label>
              <div class="col-sm-10">
                <input name="berat_ayam_r" type="text" class="form-control" value="<?= $berat_ayam_r?>">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
              </div>
            </div>
            <a href="<?=base_url()?>/recording/recording/<?=$id_periode?>" class="btn btn-warning">Kembali</a>
          </div>
          </form><!-- End General Form Elements -->

          <script type="text/javascript" src="<?=base_url()?>/jquery-3.2.1.js" ></script>
          <script type="text/javascript">
            $(".perhitungan").keyup(function(){
              var terima_pakan_r = parseInt($("#terima_pakan_r").val())
              var habis_pakan_r = parseInt($("#habis_pakan_r").val())
              var retur_pakan_r = parseInt($("#retur_pakan_r").val())
              // var sisa_pakan_r = parseInt($("#sisa_pakan_r").val())
              var mati_ayam_r = parseInt($("#mati_ayam_r").val())
              // var sisa_ayam_r = parseInt($("#sisa_ayam_r").val())

              var sisa_pakan_r = terima_pakan_r - habis_pakan_r - retur_pakan_r;
              $("#sisa_pakan_r").attr("value",sisa_pakan_r)
            });
          </script>

        </div>
      </div>

    </div>

  </div>
</section>
<!-- =========section======= -->
</main><!-- End #main -->

<?= $this->include('layout/footer.php') ?>

<?= $this->endSection() ?>