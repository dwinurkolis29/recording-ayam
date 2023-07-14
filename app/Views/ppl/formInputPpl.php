<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Formulir Penambahan Data Petugas Penyuluh Lapangan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<?php if (session()->has('danger')): ?> 
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
      <?php echo session('danger'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<!-- =========section======= -->
<section class="section">
  <div class="row">
    <div>

    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $field => $error) : ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-octagon me-1"></i>
                            <?= $error ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        <?php endforeach ?>
                    <?php endif ?>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data PPL Baru</h5>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/ppl/simpanData" method="POST" enctype="multipart/form-data">

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nomor Induk Pegawai</label>
              <div class="col-sm-10">
                <input minlength="18" name="nip_ppl" type="number" class="form-control" required>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input name="nama_ppl" type="text" class="form-control">
              </div>
            </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk_ppl" id="gridRadios1" value="Laki-laki" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Laki-laki
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk_ppl" id="gridRadios2" value="Perempuan">
                      <label class="form-check-label" for="gridRadios2">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input name="tgLahir_ppl" type="date" class="form-control">
                  </div>
                </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input name="alamat_ppl" type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Pilih Gambar</label>
              <div class="col-sm-10">
                <input name="gambar_ppl" type="file" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input name="username" type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input name="password" type="password" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
              </div>
            </div>
            <a href="<?=base_url()?>/ppl/sidebar" class="btn btn-warning">Kembali</a>

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