<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>Akun </h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Kelola Akun</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="">

<?php if (session()->has('successIUser')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo session('successIUser'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php endif; ?>
<?php if (session()->has('successUUser')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo session('successUUser'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php endif; ?>
<?php if (session()->has('successDUser')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?php echo session('successDUser'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
<?php endif; ?>

<!--batas-->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Akun</h5>
          <p>Berikut adalah seluruh Akun.</p>
          <div>
            <a href="<?=base_url()?>/user/inputData" class="btn btn-primary btn-icon-split btn-sm float-right">
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
                <th  style="display: none;" scope="col">No</th>
                <th scope="col">No.</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Level</th>
                <th scope="col">Tgl Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $no = 1;?>
            <?php foreach($user as $user): ?>
              <tr>
                            <td style="display: none;" ><?= $user['id_user']; ?></td>
                            <td><?php echo $no ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['password']; ?></td>
                            <td><?= $user['level']; ?></td>
                            <td><?= $user['created_at']; ?></td>
                            <td>
                                <a href="<?= base_url() ?>/user/ubahData/<?= $user['id_user']; ?>" role="button" class="btn btn-warning" ><i class="bi bi-pencil-square"></i></a>
                                <a href="#" onclick="confirmDelete('<?= base_url() ?>/user/hapusData/<?= $user['id_user']; ?>')"  role="button" class="btn btn-danger" ><i class="bi bi-trash3"></i></a>
                            </td>
              </tr>           
            <?php $no++;?>
            <?php endforeach ;?>
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