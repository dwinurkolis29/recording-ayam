<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout2/header.php') ?>

<?= $this->include('layout2/sidebar.php'); ?>

<?= $this->include('layout2/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>Periode </h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Recording</li>
      <li class="breadcrumb-item active">Kelola Data Periode</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="">

    <?php if (session()->has('successDPer')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo session('successDPer'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php endif; ?>
    <?php if (session()->has('successEPer')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo session('successEPer'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php endif; ?>
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
          <p>Berikut adalah seluruh data periode setiap kandang.</p>
          <div>
            <a href="<?=base_url()?>/periode/inputDataPerPpl" class="btn btn-primary btn-icon-split btn-sm float-right">
              <span class="icon text-white-50">
                <i class="bi bi-plus"></i>
              </span>
              <span class="text">Tambah Data</span>
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
                <th scope="col">Id</th>
                <th scope="col">Nama Peternak</th>
                <th scope="col">Nama Kandang</th>
                <th scope="col">Tipe DOC</th>
                <th scope="col">Periode ke</th>
                <th scope="col">tgl Mulai</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($periode as $key => $value): ?>
                        <tr>
                            <td><?=$value->id_periode?></td>
                            <td><?=$value->nama_p?></td>
                            <td><?=$value->nama_k?></td>
                            <td><?=$value->jenis_doc?></td>
                            <td><?=$value->periode?></td>
                            <td><?=$value->tgl_periode?></td>
                            <td>
                                <a href="<?= base_url() ?>/periode/ubahDataPPL/<?=$value->id_periode?>" role="button" class="btn btn-warning" ><i class="bi bi-pencil-square"></i></a>
                                <a href="#" onclick="confirmDelete('<?= base_url() ?>/periode/hapusDataPPL/<?=$value->id_periode?>')"  role="button" class="btn btn-danger" ><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
                    <script>
                    $(document).ready(function() {
                        $('#tabelUser').DataTable();
                    } );

                    function confirmDelete(url) {
                        Swal.fire({
                            title: 'Konfirmasi',
                            text: 'Apakah Anda yakin ingin menghapus item ini?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Jika pengguna menekan tombol "Ya, Hapus", lakukan tindakan penghapusan
                                window.location.href = url;
                            }
                        });
                    }  
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

<?= $this->include('layout/footer.php') ?>

<?= $this->endSection() ?>