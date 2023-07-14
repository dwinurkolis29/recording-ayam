<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>Kandang Ayam </h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Kandang</li>
      <li class="breadcrumb-item active">Kelola Data Kandang</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="">

  <?php if (session()->has('successIKandang')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successIKandang'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <?php if (session()->has('successEKandang')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successEKandang'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <?php if (session()->has('successDKandang')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successDKandang'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
<!--batas-->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Kandang Ayam</h5>
          <p>Berikut adalah seluruh data Kandang Ayam.</p>
          <div>
            <a href="<?=base_url()?>/kandang/inputData" class="btn btn-primary btn-icon-split btn-sm float-right">
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
                <th scope="col">Nama kandang</th>
                <th scope="col">Nama Peternak</th>
                <th scope="col">PPL</th>
                <th scope="col">Jenis</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Gambar</th>
                <th scope="col" width="70px" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($ppl as $key => $value): ?>
            <?php endforeach; ?>
            <?php foreach ($kandang as $key => $value): ?>
                        <tr>
                            <td><?=$value->id_kandang?></td>
                            <td><?=$value->nama_k?></td>
                            <td><?=$value->nama_p?></td>
                            <td><?=$value->nama_ppl?></td>
                            <td><?=$value->jenis_k?></td>
                            <td><?=$value->kapasitas_k?></td>
                            <td><?=$value->alamat_k?></td>
                            <td><img style='height:70px' src="<?= base_url('img/kandang/' . $value->gambar_k); ?>" alt="Gambar"></td>
                            <td>
                                <a href="<?= base_url() ?>/kandang/ubahData/<?=$value->id_kandang?>" role="button" class="btn btn-warning" ><i class="bi bi-pencil-square"></i></a>
                                <a href="#" onclick="confirmDelete('<?= base_url() ?>/kandang/hapusData/<?=$value->id_kandang?>')" role="button" class="btn btn-danger" ><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
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