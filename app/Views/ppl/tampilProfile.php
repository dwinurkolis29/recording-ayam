<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout2/header.php') ?>

<?= $this->include('layout2/sidebar.php'); ?>

<?= $this->include('layout2/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">

    <?php if (session()->has('successUPpl')): ?>    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successUPpl'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
   <?php if (session()->has('successEPpl')): ?>    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      <?php echo session('successEPpl'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="col-xl-4">
      
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        <?php foreach ($ppl as $key => $value): ?>
          <img src="<?= base_url('img/profil/' . $value->gambar_ppl); ?>" alt="Profile" class="rounded-circle">
          <h2><?=$value->nama_ppl?></h2>
        <?php endforeach; ?>
          <h3>PPL PT BAS</h3>
          <!-- <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div> -->
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
        
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Akun</button>
            </li>

          </ul>
          <div class="tab-content pt-2">
        <?php foreach ($ppl as $key => $value): ?>
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
            
            
              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">NIP</div>
                <div class="col-lg-9 col-md-8"><?=$value->nip_ppl?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Nama</div>
                <div class="col-lg-9 col-md-8"><?=$value->nama_ppl?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                <div class="col-lg-9 col-md-8"><?=$value->jk_ppl?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                <div class="col-lg-9 col-md-8"><?=$value->tgLahir_ppl?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">alamat</div>
                <div class="col-lg-9 col-md-8"><?=$value->alamat_ppl?></div>
              </div>

              <div class="text-center">
              <a href="<?= base_url() ?>/ppl/ubahDataPPL/<?=$value->id_ppl?>" role="button" class="btn btn-warning" >Ubah data</a>
              </div>

            </div>
        <?php endforeach; ?>

        <?php foreach ($user as $key => $value): ?>
            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form>

                <div class="row mb-3">
                  <div class="col-lg-3 col-md-4 label">Username</div>
                  <div class="col-lg-9 col-md-8">: <?=$value->username?></div>
                </div>

                <div class="row mb-3">
                  <div class="col-lg-3 col-md-4 label">Password</div>
                  <div class="col-lg-9 col-md-8"> : <?=$value->password?></div>
                </div>

                <div class="text-center">
                  <a href="<?= base_url() ?>/user/ubahDataUser/<?=$value->id_user?>" role="button" class="btn btn-warning" >Ubah data</a>
                </div>
              </form><!-- End Change Password Form -->
        <?php endforeach; ?>
            </div>

          </div><!-- End Bordered Tabs -->
        
        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
<!-- ======= batas ======= -->

<?= $this->include('layout2/footer.php') ?>

<?= $this->endSection() ?>