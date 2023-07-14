<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('layout/header.php') ?>

<?= $this->include('layout/sidebar.php'); ?>

<?= $this->include('layout/topbar.php') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Recording Ayam </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Recording</li>
        <li class="breadcrumb-item">Kelola Recording</li>
        <li class="breadcrumb-item ">Daftar Periode</li>
        <li class="breadcrumb-item active">Recording Ayam</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8">

        <?php if (session()->has('successURec')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            <?php echo session('successURec'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- tabel recording -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Recording Ayam</h5>

            <div class="row">
              <div class="col-lg-6">
                <?php foreach ($profil as $key => $value) : ?>
                  <h5 class="title">
                    <td>Profile</td>
                  </h5>
                  <h5 class="title">
                    <td> Peternak : <?= $value->nama_p ?></td>
                  </h5>
                  <h5 class="title">
                    <td> Kandang : <?= $value->nama_k ?></td>
                  </h5>
                  <h5 class="title">
                    <td id="kapasitas_k"> Kapasitas : <?= $value->kapasitas_k ?></td>
                  </h5>
                  <a href="<?= base_url() ?>/recording/cetakRecording/<?= $value->id_periode ?>" class="btn btn-danger">cetak <i class="bi bi-filetype-pdf"></i></a>
                  <h5></h5>
              </div>
              <div class="col-lg-5"><br>
                <h5 class="title">
                  <td> Alamat Kandang : <?= $value->alamat_k ?></td>
                </h5>
                <h5 class="title">
                  <td> Periode Ke : <?= $value->periode ?></td>
                </h5>
                <h5 class="title">
                  <td> Tgl Mulai : <?= $value->tgl_periode ?></td>
                </h5>
              </div>
            <?php endforeach; ?>
            </div>

            <?php if (!empty($errors)) : ?>
              <?php foreach ($errors as $field => $error) : ?>
                <div class="alert alert-danger">
                  <p><?= $error ?></p>
                </div>
              <?php endforeach ?>
            <?php endif ?>
            <!-- Primary Color Bordered Table -->
            <table id="tabelRecord" class="table table-bordered">
              <thead>
                <tr>
                  <!-- <th scope="col">Id</th> -->
                  <th width="10px" style="text-align:center; justify-content: center;" scope="col">Umur</th>
                  <th width="70px" style="text-align:center;" scope="col">Terima Pakan <br>(Sak)</th>
                  <th style="text-align:center;" scope="col">Habis <br> Pakan <br>(Sak)</th>
                  <th style="text-align:center;" scope="col">Retur <br> Pakan <br>(Sak)</th>
                  <th style="text-align:center;" scope="col">Mati <br> Ayam <br>(Ekor)</th>
                  <th style="text-align:center; font-size: 15;" scope="col">Berat <br> Ayam (Gram)</th>
                  <th width="120px" style="text-align:center;" scope="col">Tanggal <br> Edit</th>
                  <th width="70px" style="text-align:center;" scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recording as $key => $value) : ?>
                  <tr>
                    <td style="display: none;"><?= $value->id_recording ?></td>
                    <td style="display: none;"><?= $value->id_periode ?></td>
                    <td style="display: none;"><?= $value->id_kandang ?></td>
                    <td style="text-align:center;"><?= $value->umur_r ?></td>
                    <td style="text-align:center;"><?= $value->terima_pakan_r ?></td>
                    <td style="text-align:center;"><?= $value->habis_pakan_r ?></td>
                    <td style="text-align:center;"><?= $value->retur_pakan_r ?></td>
                    <td style="text-align:center;"><?= $value->mati_ayam_r ?></td>
                    <td style="text-align:center;"><?= $value->berat_ayam_r ?></td>
                    <td style="text-align:center;"><?= $value->updated_at ?></td>
                    <td style="text-align:center;">
                      <a href="<?= base_url() ?>/recording/ubahData/<?= $value->id_recording ?>" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                  <?php endforeach; ?>
                  </tr>
              </tbody>
              <tr>
                <th style="text-align:center;" scope="col">TOTAL</th>
                <?php foreach ($terima_pakan as $key => $value) : ?>
                  <th style="text-align:center;" scope="col"><?= $value->terima_pakan_r ?></th>
                <?php endforeach; ?>
                <?php foreach ($habis_pakan as $key => $value) : ?>
                  <th style="text-align:center;" scope="col"><?= $value->habis_pakan_r ?></th>
                <?php endforeach; ?>
                <?php foreach ($retur_pakan as $key => $value) : ?>
                  <th style="text-align:center;" scope="col"><?= $value->retur_pakan_r ?></th>
                <?php endforeach; ?>
                <?php foreach ($mati_ayam as $key => $value) : ?>
                  <th style="text-align:center;" scope="col"><?= $value->mati_ayam_r ?></th>
                <?php endforeach; ?>
              </tr>
              <tr>
                <th scope="col">RATA2</th>
                <th></th>
                <?php foreach ($avg_pakan as $key => $value) : ?>
                  <th style="text-align:center;" scope="col" style="text-center"><?= $value->habis_pakan_r ?></th>
                <?php endforeach; ?>
                <th></th>
                <?php foreach ($avg_mati as $key => $value) : ?>
                  <th style="text-align:center;" scope="col" style="text-center"><?= $value->mati_ayam_r ?></th>
                <?php endforeach; ?>
              </tr>
              <tr>
                <th scope="col">SISA</th>
                <?php foreach ($sisa_pakan as $key => $value) : ?>
                  <th style="text-align:center;" colspan="3" scope="col" style="text-center"><?= $value->total ?></th>
                <?php endforeach; ?>
                <?php foreach ($sisa_ayam as $key => $value) : ?>
                  <th style="vertical-align : middle;text-align:center;" scope="col"><?= $value->total_ayam ?></th>
                <?php endforeach; ?>
              </tr>
            </table>
            <?php foreach ($recording as $key => $value) : ?>
            <?php endforeach; ?>
            <a href="<?= base_url() ?>/recording/cetakRecording/<?= $value->id_periode ?>" class="btn btn-danger"><i class="bi bi-filetype-pdf"></i></a>
            <script>
              $(document).ready(function() {
                $('#tabelRecord').DataTable({
                  dom: 'lfrtBip',
                  buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
                });
              });
            </script>

            <script type="text/javascript" src="<?= base_url() ?>/jquery-3.2.1.js"></script>
            <script type="text/javascript">
              $(".perhitungan").keyup(function() {
                // var terima_pakan_r = parseInt($("#terima_pakan_r").val())
                // var habis_pakan_r = parseInt($("#habis_pakan_r").val())
                // var retur_pakan_r = parseInt($("#retur_pakan_r").val())
                var mati_ayam_r = parseInt($("#mati_ayam_r").val())
                var kapasitas_k = parseInt($("#kapasitas_k").val())

                var total_ayam = kapasitas_k - mati_ayam_r;
                $("#total_ayam").attr("value", total_ayam);
              });
            </script>
          </div>
        </div>
      </div>
      <!-- end tabel recording -->

      <div class="col-lg-4"><br><br><br><br><br><br><br><br>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">FCR Ayam</h5>


            <table id="tabelUser" class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" class="text-center">Umur</th>
                  <th scope="col" class="text-center">Total <br> Pakan <br>(Sak)</th>
                  <th scope="col" class="text-center">Sisa Ayam <br>(Ekor)</th>
                  <th width="60px" class="text-center">FCR</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($results as $row) : ?>
                  <?php if (!is_null($row->fcr_ayam)) : ?>
                    <tr>
                      <td><?= $row->umur_ayam; ?></td>
                      <td><?= $row->habis_pakan; ?></td>
                      <td><?= $row->sisa_ayam; ?></td>
                      <td id="fcr"><?= $row->fcr_ayam; ?></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>

              </tbody>
            </table>

          </div>
        </div>
      </div>
      <!-- end frc ayam -->

    </div>
    <!-- grafik perkembangan -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Grafik Perkembangan Ayam</h5>
        <?php foreach ($recording as $key => $value) {
          $umur[] = $value->umur_r;
          $berat[] = $value->berat_ayam_r;
        }
        ?>


        <canvas id="lineChart" weight="600px" style="max-height: 500px;"></canvas>
        <script>
          document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#lineChart'), {
              type: 'line',
              data: {
                labels: <?php echo json_encode($umur); ?>,
                datasets: [{
                    label: 'Berat Ayam (Gram)',
                    data: <?php echo json_encode($berat); ?>,
                    fill: false,
                    borderColor: 'rgb(75, 100, 192)',
                    tension: 0.1
                  },
                  {
                    label: 'Standar Berat Ayam (Gram)',
                    data: [60, 83, 106, 129, 152, 176, 200, 242, 285, 328, 371, 414, 457, 500, 569, 640, 712, 784, 856, 928, 1000, 1072, 1144, 1214, 1284, 1356, 1428, 1500, 1575, 1650, 1725, 1800, 1875, 1955, 2035, 2115, 2195, 2280, 2370, 2455, 2540, 2625],
                    fill: false,
                    borderColor: 'rgb(214, 87, 36)',
                    tension: 0.1
                  }
                ]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          });
        </script>
        <?php foreach ($recording as $key => $value) : ?>
        <?php endforeach; ?>
        <br><a href="<?= base_url() ?>/recording/cetakGrafik/<?= $value->id_periode ?>" class="btn btn-danger"><i class="bi bi-filetype-pdf"></i></a><br>
        <br><a href="<?= base_url() ?>/periode/recordingA/<?= $value->id_kandang ?>" class="btn btn-warning">Kembali</a>

      </div>
    </div>
    <!-- end grafik perkembangan -->


  </section>

</main><!-- End #main -->
<!-- ======= batas ======= -->

<?= $this->include('layout/footer.php') ?>

<?= $this->endSection() ?>