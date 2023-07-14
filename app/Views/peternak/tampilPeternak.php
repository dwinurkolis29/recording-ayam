<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>Peternak </h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Peternak</li>
      <li class="breadcrumb-item active">Kelola Data Peternak</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="">

<?php if (session()->has('successIPet')): ?> 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successIPet'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->has('successUPet')): ?> 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successUPet'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->has('successDPet')): ?> 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successDPet'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (session()->has('successUUPet')): ?> 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successUUPet'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!--batas-->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Peternak</h5>
          <p>Berikut adalah seluruh data Peternak.</p>
          <div>
            <a href="<?=base_url()?>/peternak/inputData" class="btn btn-primary btn-icon-split btn-sm float-right">
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
                <th  scope="col">No.</th>
                <th scope="col">Nama Peternak</th>
                <th scope="col">PPL</th>
                <th scope="col">Nomor Induk Kependudukan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Foto</th>
                <th scope="col" width="120px" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            <?php foreach ($peternak as $key => $value): ?>
                        <tr>
                            <td style="display: none;"><?=$value->id_peternak?></td>
                            <td><?php echo $no; ?></td>
                            <td><?=$value->nama_p?></td>
                            <td><?=$value->nama_ppl?></td>
                            <td><?=$value->nik_p?></td>
                            <td><?=$value->alamat_p?></td>
                            <td><img style='height:70px' src="<?= base_url('img/profil/' . $value->gambar_p); ?>" alt="Gambar"></td>
                            <td>
                                <a href="<?=base_url()?>/peternak/detailPeternak/<?=$value->id_peternak?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="<?= base_url() ?>/peternak/ubahData/<?=$value->id_peternak?>" role="button" class="btn btn-warning" ><i class="bi bi-pencil-square"></i></a>
                                <a href="#" onclick="confirmDelete('<?= base_url() ?>/peternak/hapusData/<?=$value->id_peternak?>')"  role="button" class="btn btn-danger" ><i class="bi bi-trash3"></i></a>
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

                    document.getElementById("hidden").style.display = "none";
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