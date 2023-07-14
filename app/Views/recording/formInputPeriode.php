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

          <?php if (session()->has('success')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo session('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php endif; ?>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/periode/simpanDataPeriode" method="POST" enctype="multipart/form-data">
          
          <?php foreach ($kandang as $key => $value): ?>      
          <input type="hidden" class="form-control" name="id_kandang" value="<?=$value->id_kandang?>">
          <?php endforeach;?>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Pilih DOC</label>
                  <div class="col-sm-10">
                    <select name="id_doc" id="id_doc" class="form-select" >
                      <option id="id_doc" selected>-- Pilih DOC --</option>
                      <?php foreach($doc as $p) : ?>
                      <option value="<?= $p['id_doc']?>"><?=$p['jenis_doc']?></option>
                      <?php endforeach?>
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

            
          </form><!-- End General Form Elements -->
              <button onclick="goBack()" class="btn btn-warning">Kembali</button>
          <script>
          function goBack() {
            window.history.go(-1);
          }
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