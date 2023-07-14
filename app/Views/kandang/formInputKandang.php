<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Formulir Penambahan Data Kandang Ayam</h1>
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
          <h5 class="card-title">Data Kandang Baru</h5>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/kandang/simpanData" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Pilih Peternak</label>
                  <div class="col-sm-10">
                    <select size="4" name="id_peternak" id="id_peternak" class="form-select" >
                      <!-- <option id="id_peternak" selected>-- Pilih Peternak --</option> -->
                      <?php foreach($peternak as $p) : ?>
                      <option value="<?= $p['id_peternak']?>"><?=$p['nama_p']?></option>
                      <?php endforeach?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Pilih PPL</label>
                  <div class="col-sm-10">
                    <select name="id_ppl" id="id_ppl" class="form-select" >
                      <option id="id_ppl" selected>-- Pilih PPL --</option>
                      <?php foreach($ppl as $p) : ?>
                      <option value="<?= $p['id_ppl']?>"><?=$p['nama_ppl']?></option>
                      <?php endforeach?>
                    </select>
                  </div>
                </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Kandang</label>
                <div class="col-sm-10">
                  <input name="nama_k" type="text" class="form-control">
                </div>
              </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Kandang</label>
                  <div class="col-sm-10">
                    <select name="jenis_k" id="jenis_k" class="form-select" >
                      <option id="jenis_k" selected>-- Pilih Jenis --</option>
                      <option value="Open House">Open House</option>
                      <option value="Close House">Close House</option>
                      <option value="Semi Open Close">Semi Open Close</option>
                    </select>
                  </div>
                </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Kapasitas</label>
              <div class="col-sm-10">
                <input name="kapasitas_k" type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input name="alamat_k" type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Foto Kandang</label>
              <div class="col-sm-10">
                <input name="gambar_k" type="file" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
              </div>
            </div>
            <a href="<?=base_url()?>/kandang/sidebar" class="btn btn-warning">Kembali</a>

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