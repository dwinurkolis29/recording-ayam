<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>




<!-- ======= batas ======= -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Jenis DOC</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Data</li>
        <li class="breadcrumb-item active">Kelola Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php if (session()->has('successIDoc')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successIDoc'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <?php if (session()->has('successUDoc')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successUDoc'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <?php if (session()->has('successDDoc')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successDDoc'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <section class="section">
    <div class="row">
      <div class="">

        <!--batas-->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Daftar Data</h5>
            <p>Berikut adalah seluruh data.</p>
            <div>
              <a href="<?= base_url() ?>/doc/inputData" class="btn btn-primary btn-icon-split btn-sm float-right">
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
                  <th scope="col">No</th>
                  <th scope="col">Jenis DOC</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col" width="70px" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($doc as $doc) : ?>
                  <tr>
                    <td><?= $doc['id_doc']; ?></td>
                    <td><?= $doc['jenis_doc']; ?></td>
                    <td><?= $doc['keterangan_doc']; ?></td>
                    <td>
                      <a href="<?= base_url() ?>/doc/ubahData/<?= $doc['id_doc']; ?>" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                      <a href="#" onclick="confirmDelete('<?= base_url() ?>/doc/hapusData/<?= $doc['id_doc']; ?>')" role="button" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <script>
              $(document).ready(function() {
                $('#tabelUser').DataTable({
                  dom: 'lfrtBip',
                  buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
                });
              });

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

              function showAlert() {
                Swal.fire({
                  title: 'Berhasil',
                  text: 'Data berhasil diubah!',
                  icon: 'success'
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