<?php 
    include 'database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conn = mysqli_connect($DB_SERVER_LOC, $DB_USER, $DB_PASS, $DB_NAME);
        $id_periode = $_POST['id_periode'];
        // $id_periode = 1;

        // Langkah 2: Menjalankan query dalam loop
        $data_mhs = array(); // Array untuk menyimpan data

        for ($i = 1; $i <= 40; $i++) {
            $sql = "SELECT SUM(habis_pakan_r) AS habis_pakan,
            (SELECT umur_r FROM recording WHERE umur_r = $i AND id_periode = $id_periode )AS umur_ayam,
            (SELECT berat_ayam_r FROM recording WHERE umur_r = $i AND id_periode = $id_periode )/1000 AS berat_ayam,
            (kandang.kapasitas_k - SUM(recording.mati_ayam_r)) AS sisa_ayam,
            (SELECT berat_ayam_r FROM recording WHERE umur_r = $i AND id_periode = $id_periode)
            /1000*(kandang.kapasitas_k - SUM(recording.mati_ayam_r)) AS total_berat_ayam,
            round(SUM(habis_pakan_r)*50 / ((SELECT berat_ayam_r FROM recording WHERE umur_r = $i AND id_periode = $id_periode)
            /1000*(kandang.kapasitas_k - SUM(recording.mati_ayam_r))),2) AS fcr_ayam
            FROM recording
            JOIN kandang ON recording.id_kandang = kandang.id_kandang
            WHERE id_periode = $id_periode AND umur_r BETWEEN '1' AND '$i'";
            $result = $conn->query($sql);
        
            // Langkah 3: Memproses hasil query
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Menambahkan data ke array
                    $data_mhs[] = $row;
                }
            }
        }

        // Mengonversi array menjadi format JSON
        $jsonData = json_encode($data_mhs);

        // Menampilkan hasil JSON
        echo $jsonData;
        

}
?>

