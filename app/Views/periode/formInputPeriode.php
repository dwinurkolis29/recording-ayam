<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Formulir Penambahan Data Periode</h1>
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
            <h5 class="card-title">Data Periode Baru</h5>

            <!-- General Form Elements -->
            <form action="<?= base_url() ?>/periode/simpanData" method="POST" enctype="multipart/form-data">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pilih Kandang</label>
                <div class="col-sm-10">
                  <select size="4" name="id_kandang" id="id_kandang" class="form-select">
                    <!-- <option id="id_kandang" selected>-- Pilih Kandang --</option> -->
                    <?php foreach ($kandang as $p) : ?>
                      <option value="<?= $p['id_kandang'] ?>"><?= $p['nama_k'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pilih DOC</label>
                <div class="col-sm-10">
                  <select name="id_doc" id="id_doc" class="form-select">
                    <option id="id_doc" selected>-- Pilih DOC --</option>
                    <?php foreach ($doc as $p) : ?>
                      <option value="<?= $p['id_doc'] ?>"><?= $p['jenis_doc'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Periode ke</label>
                <div class="col-sm-10">
                  <input name="periode" type="text" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-10">
                  <input name="tgl_periode" type="date" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
                <div class="col-sm-10">
                  <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
                </div>
              </div>
              <a href="<?= base_url() ?>/periode/sidebar" class="btn btn-warning">Kembali</a>

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