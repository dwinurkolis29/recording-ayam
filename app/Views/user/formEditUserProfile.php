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
        <li class="breadcrumb-item">Profile</li>
        <li class="breadcrumb-item active">Ubah Data Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <!-- =========section======= -->
  <section class="section">
    <div class="row">
      <div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ubah Data Profile</h5>

            <!-- General Form Elements -->
            <form action="<?= base_url() ?>/user/simpanUbahDataUser/<?= $id_user ?>" method="POST" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input name="username" value="<?= $username ?>" type="text" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input name="password" value="<?= $password ?>" type="text" class="form-control">
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