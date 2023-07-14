<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Formulir Penambahan Data Akun</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!-- =========section======= -->
<section class="section">
  <div class="row">
    <div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Akun Baru</h5>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/user/simpanData" method="POST" enctype="multipart/form-data">
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
              <label for="inputText" class="col-sm-2 col-form-label">Level</label>
              <div class="col-sm-10">
                <input name="level" type="text" class="form-control" value="admin" disabled>
              </div>
            </div>

                <!-- <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Pilih Level</label>
                  <div class="col-sm-10">
                    <select name="level" id="level" class="form-select" >
                      <option id="level" selected>-- Pilih Level --</option>
                      <option value="admin">Admin</option>
                      <option value="ppl">PPL</option>
                      <option value="peternak">Peternak</option>
                    </select>
                  </div>
                </div> -->

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
              </div>
            </div>
            <a href="<?=base_url()?>/user/sidebar" class="btn btn-warning">Kembali</a>


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
              const tombol = document.querySelector('#tombol');
              tombol.addEventListener('click', function(){
                Swal({
                  title: 'Hello',
                  text: 'latihan',
                  type: 'warning'
                });
              });
            </script>

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