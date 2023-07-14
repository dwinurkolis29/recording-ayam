<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<!-- ======= batas ======= -->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>PT Brantas Abadi Sentosa</h1>
    <h2>Recording</h2>
  </div><!-- End Page Title -->





  <!-- tabel recording -->
  <div class="box-wrapper">
    <div class="box">
      <?php foreach ($profil as $key => $value) : ?>
        <h5 class="title">
          <td> Peternak : <?= $value->nama_p ?></td>
        </h5>
        <h5 class="title">
          <td> Alamat Kandang : <?= $value->alamat_k ?></td>
        </h5>
        <h5 class="title">
          <td> Tgl Chick : <?= $value->tgl_periode ?></td>
        </h5>
        <h5 class="title">
          <td> Kandang : <?= $value->nama_k ?></td>
        </h5>
    </div>

    <div class="box">
      <h5 class="title">
        <td> PPL : <?= $value->nama_ppl ?></td>
      </h5>
      <h5 class="title">
        <td> Periode Ke : <?= $value->periode ?></td>
      </h5>
      <h5 class="title">
        <td> Jenis DOC : DOC</td>
      </h5>
      <h5 class="title">
        <td> Populasi : <?= $value->kapasitas_k ?> ekor</td>
      </h5>
    <?php endforeach; ?>
    </div>
  </div>

  <div class="box-wrappers">
    <!-- Primary Color Bordered Table -->
    <div class="boxes">
      <table id="tabelRecord" class="table table-bordered">
        <thead>
          <tr>
            <!-- <th scope="col">Id</th> -->
            <th width="10px" style="text-align:center;" scope="col">Umur</th>
            <th width="70px" style="text-align:center;" scope="col">Terima Pakan</th>
            <th style="text-align:center;" scope="col">Habis <br> Pakan</th>
            <th style="text-align:center;" scope="col">Retur <br> Pakan</th>
            <th style="text-align:center;" scope="col">Mati <br> Ayam</th>
            <th style="text-align:center;" scope="col">Berat <br> Ayam</th>
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
    </div>

    <div class="boxess">
      <table id="tabelUser" class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center">Total <br> Pakan</th>
            <th scope="col" class="text-center">Sisa <br> Ayam</th>
            <th width="60px" class="text-center">FCR</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($results as $row) : ?>
            <?php if (!is_null($row->fcr_ayam)) : ?>
              <tr>
                <td style="text-align:center;"><?= $row->habis_pakan; ?></td>
                <td style="text-align:center;"><?= $row->sisa_ayam; ?></td>
                <td style="text-align:center;"><?= $row->fcr_ayam; ?></td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>

  </div>

  <div class="footer">
    <h3>KOMENTAR: </h3>
    <div class="box-footer">
      <div class="ttd">
        <p>Administrasi</p><br><br><br><br>
        <p>(_______________)</p>
      </div>
      <div class="ttd">
        <p>PPL</p><br><br><br><br>
        <p>(_______________)</p>
      </div>
      <div class="ttd">
        <p>Mitra</p><br><br><br><br>
        <p>(_______________)</p>
      </div>
      <div class="ttd">
        <p>Ka. Unit</p><br><br><br><br>
        <p>(_______________)</p>
      </div>
    </div>
  </div>

</main><!-- End #main -->

<style>
  h1 {
    text-align: center;
    font-size: 35;
    margin-top: 30;
  }

  h2 {
    text-align: center;
    font-size: 25;
  }

  p{
    text-align: center;
  }

  h3 {
    text-align: left;
    font-size: 20;
    margin-left: 280;
    position: absolute;
  }

  .box-wrapper {
    margin-top: 30;
    margin-left: 280;
    display: flex;
    justify-content: space-between;
  }

  .box {
    flex: 1;
    margin-left: 20;
    width: 350;
  }

  .box-wrappers {
    margin-top: 20;
    margin-left: 20;
    text-align: center;
  }

  .boxes {
    flex: 50;
    width: 500;
    height: 100;
    display: inline-block;
    margin-left: -4;
  }

  .boxess {
    /* margin-top: 1; */
    flex: 50;
    width: 250;
    height: 100;
    display: inline-block;
    margin-left: -4;
  }

  .footer {
    position: absolute;
    bottom: -700;
    width: fit-content;
    height: fit-content;
    /* tinggi dari footer */
  }

  .box-footer {
    margin-left: 200;
    margin-right: 200;
    margin-top: 40;
    display: flex;
    justify-content: center;
  }

  .ttd {
    flex: 1;
    width: 200;
    margin-left: 30;
  }
</style>

<script>
  window.print();
</script>
<!-- ======= batas ======= -->

<?= $this->endSection() ?>