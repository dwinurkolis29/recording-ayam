<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>Recording Ayam</h1>
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

<!--batas-->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Kandang Ayam</h5>
          <p>Silahkan pilih kandang ayam yang ingin dikelola. <br>Berikut adalah seluruh data Kandang Ayam.</p>

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
                <th scope="col">Nama kandang</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($kandang as $key => $value): ?>
                        <tr>
                            <td><?=$value->id_kandang?></td>
                            <td><?=$value->nama_p?></td>
                            <td><?=$value->nama_k?></td>
                            <td>
                                <a href="<?=base_url()?>/periode/recording/<?=$value->id_kandang?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
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

<?= $this->include('layout/footer.php') ?>

<?= $this->endSection() ?>