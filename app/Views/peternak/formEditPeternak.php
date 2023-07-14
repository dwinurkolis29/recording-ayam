<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Formulir Perubahan Data Peternak</h1>
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
          <h5 class="card-title">Ubah Data Peternak</h5>

          <!-- General Form Elements -->
          <form action="<?=base_url()?>/peternak/simpanUbahData/<?= $id_peternak?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $gambar_p?>">
          
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
              <label for="inputText" class="col-sm-2 col-form-label">Nomor Induk Kependudukan</label>
              <div class="col-sm-10">
                <input name="nik_p" type="text" class="form-control" value="<?= $nik_p?>">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input name="nama_p" type="text" class="form-control" value="<?= $nama_p?>">
              </div>
            </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk_p" id="gridRadios1" value="Laki-laki" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Laki-laki
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk_p" id="gridRadios2" value="Perempuan">
                      <label class="form-check-label" for="gridRadios2">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input name="tgLahir_p" type="date" class="form-control" value="<?= $tgLahir_p?>">
                  </div>
                </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input name="alamat_p" type="text" class="form-control" value="<?= $alamat_p?>">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
              <img style='height:100px' src="<?= base_url('img/profil/' .$gambar_p); ?>" alt="Gambar">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Profil</label>
              <div class="col-sm-10">
                <input name="gambar_p" type="file" class="form-control" value="<?= $gambar_p?>">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit Button</label>
              <div class="col-sm-10">
                <button type="submit" value="Simpan" class="btn btn-primary">Submit Form</button>
              </div>
            </div>
            <a href="<?=base_url()?>/peternak/sidebar" class="btn btn-warning">Kembali</a>
            

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