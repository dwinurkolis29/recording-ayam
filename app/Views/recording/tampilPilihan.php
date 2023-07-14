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

            <form id="form" action="<?= base_url() ?>/periode/recording" method="POST">

              <div class="col-md-6">
                <label for="inputState" class="form-label">Peternak</label>
                <select size="5" name="id_peternak" id="id_peternak" class="form-select">
                  <!-- <option selected>--Pilih Peternak--</option> -->
                  <?php foreach ($peternak as $p) : ?>
                    <option value="<?= $p['id_peternak'] ?>"><?= $p['nama_p'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="col-md-6">
                <label for="inputState" class="form-label">kandang</label>
                <select name="id_kandang" id="id_kandang" class="form-select">
                </select>
              </div><br>

              <div class="col md-6">
                <div class="col-md-6">
                  <button type="submit" onclick="submitForm()" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

            <script>
              $(document).ready(function() {
                $('#id_peternak').change(function() {
                  var id_peternak = $("#id_peternak").val();
                  $.ajax({
                    url: '<?= base_url('kandang/kandang') ?>', // Ganti dengan URL yang sesuai ke controller dan method yang akan memuat data tambahan
                    type: 'POST',
                    data: {
                      id_peternak: id_peternak
                    },
                    success: function(response) {
                      $('#id_kandang').html(response); // Memuat data tambahan ke elemen dengan ID 'sub-data'
                    }
                  });
                });
              });

              function submitForm() {
                Swal.fire({
                  title: 'Proses Pencarian Data!',
                  html: 'Otomatis ditutup <b></b> detik.',
                  timer: 2000,
                  timerProgressBar: true,
                  didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                      b.textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  var data = $('#id_kandang').val(); // Mengambil nilai input
                  $.ajax({
                    url: $('#form').attr('action'),
                    type: 'POST',
                    data: {
                      id_kandang: id_kandang
                    },
                    success: function(response) {
                      // Lakukan sesuatu setelah permintaan berhasil
                    }
                  });
                })
              }
            </script>
          </div>
        </div>
        <!--batas-->

      </div>
    </div>
  </section>

</main><!-- End #main -->
<!-- ======= batas ======= -->

<?= $this->include('layout/footer2.php') ?>

<?= $this->endSection() ?>