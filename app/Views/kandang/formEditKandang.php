<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

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

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ubah Data Kandang</h5>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/kandang/simpanUbahData/<?= $id_kandang?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="gambarLama" value="<?= $gambar_k?>">
          
          <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Pilih Peternak</label>
                  <div class="col-sm-10">
                    <select name="id_peternak" id="id_peternak" class="form-select" >
                    <?php foreach ($peter as $key => $value): ?>
                      <option value="<?=$value->id_peternak?>" selected><?=$value->nama_p?></option>
                      <?php endforeach;?>
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
                      <?php foreach ($petugas as $key => $value): ?>
                      <option id="id_ppl" value="<?=$value->id_ppl?>" selected><?=$value->nama_ppl?></option>
                      <?php endforeach;?>
                      <?php foreach($ppl as $p) : ?>
                      <option value="<?= $p['id_ppl']?>"><?=$p['nama_ppl']?></option>
                      <?php endforeach?>
                    </select>
                  </div>
                </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Kandang</label>
                <div class="col-sm-10">
                  <input name="nama_k" type="text" class="form-control" value="<?= $nama_k?>">
                </div>
              </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Kandang</label>
                  <div class="col-sm-10">
                    <select name="jenis_k" id="jenis_k" class="form-select" >
                      <option id="jenis_k" selected><?= $jenis_k?></option>
                      <option value="Open House">Open House</option>
                      <option value="Close House">Close House</option>
                      <option value="Semi Open Close">Semi Open Close</option>
                    </select>
                  </div>
                </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Kapasitas</label>
              <div class="col-sm-10">
                <input name="kapasitas_k" type="text" class="form-control" value="<?= $kapasitas_k?>">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input name="alamat_k" type="text" class="form-control" value="<?= $alamat_k?>">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
              <img style='height:100px' src="<?= base_url('img/kandang/' .$gambar_k); ?>" alt="Gambar">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Profil</label>
              <div class="col-sm-10">
                <input name="gambar_k" type="file" class="form-control" value="<?= $gambar_k?>">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button  type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
              </div>
            </div>
            <a href="<?=base_url()?>/kandang/sidebar" class="btn btn-warning">Kembali</a>

          </form><!-- End General Form Elements -->

          <script>
            function showAlert() {
                      Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil diubah!',
                        icon: 'success'
                      });
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