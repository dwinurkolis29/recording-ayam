<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

<div class="pagetitle">
  <h1>PT BAS</h1>
</div><!-- End Page Title -->

<section class="section">

      <!-- tabel recording -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Recording Ayam</h5>
            <div class="">
            <?php foreach ($profil as $key => $value): ?>
              <h5 class="title"><td>Profile</td></h5>
              <h5 class="title"><td> Peternak : <?=$value->nama_p?></td></h5>
              <h5 class="title"><td> Kandang : <?=$value->nama_k?></td></h5>
              <h5 class="title"><td id="kapasitas_k"> Kapasitas : <?=$value->kapasitas_k?></td></h5>
            </div>
            <div class="">
              <h5 class="title"><td> Alamat Kandang : <?=$value->alamat_k?></td></h5>
              <h5 class="title"><td> Periode Ke : <?=$value->periode?></td></h5>
              <h5 class="title"><td> Tgl Mulai : <?=$value->tgl_periode?></td></h5>
            </div>
            <?php endforeach; ?>

                    <?php if (!empty($errors)) : ?>
                        <?php foreach ($errors as $field => $error) : ?>
                        <div class="alert alert-danger">
                            <p><?= $error ?></p>
                        </div>
                        <?php endforeach ?>
                    <?php endif ?>
          <!-- Primary Color Bordered Table -->
          
        </div>
      </div>
    <!-- end tabel recording -->

          <!-- grafik perkembangan -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Grafik Perkembangan Ayam</h5>
              <?php foreach ($recording as $key => $value){
                $umur[] = $value->umur_r;
                $berat[] = $value->berat_ayam_r;
              }
              ?>
                
              
              <canvas id="lineChart" weight="600px"  style="max-height: 500px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: <?php echo json_encode($umur);?>,
                      datasets: [{
                        label: 'Perkembangan Ayam',
                        data: <?php echo json_encode($berat);?>,
                        fill: false,
                        borderColor: 'rgb(75, 100, 192)',
                        tension: 0.1
                      },
                      {
                        label: 'Standar Bobot Ayam',
                        data: [60,83,106,129,152,176,200,242,285,328,371,414,457,500,569,640,712,784,856,928,1000,1072,1144,1214,1284,1356,1428,1500,1575,1650,1725,1800,1875,1955,2035,2115,2195,2280,2370,2455,2540,2625],
                        fill: false,
                        borderColor: 'rgb(214, 87, 36)',
                        tension: 0.1
                      }]
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
            </div>
          </div>
          <!-- end grafik perkembangan -->

          <!-- <script>window.print();</script> -->
</section>
  <script>
		window.print();
	</script>
</main><!-- End #main -->
<!-- ======= batas ======= -->

<?= $this->include('layout/footer.php') ?>

<?= $this->endSection() ?>