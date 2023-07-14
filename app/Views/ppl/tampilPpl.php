<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>Petugas Penyuluh Lapangan </h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">PPL</li>
      <li class="breadcrumb-item active">Kelola Data PPL</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="">

<?php if (session()->has('successIPpl')): ?>    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successIPpl'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->has('successUPpl')): ?>    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successUPpl'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->has('successDPpl')): ?>    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successDPpl'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->has('successUUPpl')): ?>    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successUUPpl'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!--batas-->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar PPL</h5>
          <p>Berikut adalah seluruh data PPL.</p>
          <div>
            <a href="<?=base_url()?>/ppl/inputData" class="btn btn-primary btn-icon-split btn-sm float-right">
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
                <th style="display: none;" scope="col">Id</th>
                <th scope="col">No.</th>
                <th scope="col">Nama PPL</th>
                <th scope="col">Nomor Induk Pegawai</th>
                <th scope="col">Alamat</th>
                <th scope="col">Gambar</th>
                <th scope="col" width="120px" class="text-center" >Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            <?php foreach ($ppl as $key => $value): ?>
                        <tr>
                            <td style="display: none;" ><?=$value->id_ppl?></td>
                            <td><?php echo $no; ?></td>
                            <td><?=$value->nama_ppl?></td>
                            <td><?=$value->nip_ppl?></td>
                            <td><?=$value->alamat_ppl?></td>
                            <td><img style='height:70px' src="<?= base_url('img/profil/' . $value->gambar_ppl); ?>" alt="Gambar"></td>
                            <td>
                                <a href="<?=base_url()?>/ppl/detailPPL/<?=$value->id_ppl?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="<?= base_url() ?>/ppl/ubahData/<?=$value->id_ppl?>" role="button" class="btn btn-warning" ><i class="bi bi-pencil-square"></i></a>
                                <a href="#" onclick="confirmDelete('<?= base_url() ?>/ppl/hapusData/<?=$value->id_ppl?>')" role="button" class="btn btn-danger" ><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
            </tbody>
          </table>
                    <script>
                    $(document).ready(function() {
                        $('#tabelUser').DataTable( {
                            dom: 'lfrtBip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        } );
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