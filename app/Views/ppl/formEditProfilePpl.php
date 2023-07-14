<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout2/header.php') ?>

<?= $this->include('layout2/sidebar.php'); ?>

<?= $this->include('layout2/topbar.php') ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Perubahan Data Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

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
            <h5 class="card-title">Ubah Profile</h5>

            <!-- General Form Elements -->
            <form action="<?= base_url() ?>/ppl/simpanUbahDataPPL/<?= $id_ppl ?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="gambarLama" value="<?= $gambar_ppl ?>">

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nomor Induk Pegawai</label>
                <div class="col-sm-10">
                  <input name="nip_ppl" type="text" class="form-control" value="<?= $nip_ppl ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input name="nama_ppl" type="text" class="form-control" value="<?= $nama_ppl ?>">
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
                  <input name="tgLahir_ppl" type="date" class="form-control" value="<?= $tgLahir_ppl ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input name="alamat_ppl" type="text" class="form-control" value="<?= $alamat_ppl ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <img style='height:100px' src="<?= base_url('img/profil/' . $gambar_ppl); ?>" alt="Gambar">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Profil</label>
                <div class="col-sm-10">
                  <input name="gambar_ppl" type="file" class="form-control" value="<?= $gambar_ppl ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
                <div class="col-sm-10">
                  <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
                </div>
              </div>
              <a href="<?= base_url() ?>/ppl/profile" class="btn btn-warning">Kembali</a>

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