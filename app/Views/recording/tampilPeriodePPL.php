<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout2/header.php') ?>

<?= $this->include('layout2/sidebar.php'); ?>

<?= $this->include('layout2/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>Recording Ayam </h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Recording</li>
      <li class="breadcrumb-item active">Kelola Recording</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="">

          <?php if (session()->has('successIP')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo session('successIP'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php endif; ?>
<!--batas-->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Periode</h5>
          <p>Silahkan pilih kandang ayam yang ingin dikelola. <br> Berikut adalah seluruh data periode setiap kandang.</p>
          <div>
          <?php foreach ($periode as $key => $value): ?>
          <?php endforeach; ?>
            <a href="<?=base_url()?>/periode/inputDataPPL/<?=$value->id_kandang?>" class="btn btn-primary btn-icon-split btn-sm float-right">
              <span class="icon text-white-50">
                <i class="bi bi-plus"></i>
              </span>
              <span class="text">Tambah Periode</span>
            </a>
          </div>
                    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $field => $error) : ?>
                        <div class="alert alert-danger">
                            <p><?= $error ?></p>
                        </div>
                        <?php endforeach ?>
                    <?php endif ?>
          <!-- Primary Color Bordered Table -->
          <table id="tabelUser" class="table table-bordered">
            <thead>
              <tr>
                <th style="display: none;" scope="col">Id</th>
                <th scope="col">No.</th>
                <th scope="col">Periode ke</th>
                <th scope="col">Nama Kandang</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Tgl Mulai Periode</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1;?>
            <?php foreach ($periode as $key => $value): ?>
                        <tr>
                            <td style="display: none;"><?=$value->id_periode?></td>
                            <td><?php echo $no; ?></td>
                            <td><?=$value->periode?></td>
                            <td><?=$value->nama_k?></td>
                            <td><?=$value->alamat_k?></td>
                            <td><?=$value->tgl_periode?></td>
                            <td>
                                <a href="<?=base_url()?>/recording/recordingPPL/<?=$value->id_periode?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
            <?php $no++;?>
            <?php endforeach; ?>
            </tbody>
            
          </table>
          <br><a href="<?=base_url()?>/peternak/pilihanPPL" class="btn btn-warning">Kembali</a>
                    <script>
                    $(document).ready(function() {
                        $('#tabelUser').DataTable();
                    } );
                    </script>
          <!-- End Primary Color Bordered Table -->

        </div>
      </div>
<!--batas-->

    </div>
  </div>
</section>

</main><!-- End #main -->
<!-- ======= batas ======= -->

<?= $this->include('layout2/footer.php') ?>

<?= $this->endSection() ?>