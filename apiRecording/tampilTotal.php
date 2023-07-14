<?php 
    include 'database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conn = mysqli_connect($DB_SERVER_LOC, $DB_USER, $DB_PASS, $DB_NAME);
        $id_periode = $_POST['id_periode'];

        $sql = "SELECT SUM(terima_pakan_r) AS TterimaPakan, 
        SUM(habis_pakan_r) AS ThabisPakan,
        SUM(retur_pakan_r) AS TreturPakan, 
        SUM(mati_ayam_r) AS TmatiAyam,
        SUM(terima_pakan_r) - (SUM(habis_pakan_r) + SUM(retur_pakan_r)) AS sisaPakan,
        kandang.kapasitas_k - SUM(recording.mati_ayam_r) AS sisaAyam 
        FROM recording JOIN kandang 
        ON recording.id_kandang = kandang.id_kandang
        WHERE recording.id_periode = '$id_periode'";
        
        $result = mysqli_query($conn,$sql);
		
       
        if(mysqli_num_rows($result)>0){
            header("Access-Control-Allow-Origin: *");
            header("Conetent-type: application/json; charset=UTF-8");

            $data_mhs = array();
            while($mhs = mysqli_fetch_assoc($result)){
                array_push($data_mhs, $mhs);
            }
            echo json_encode($data_mhs);
  }
}
?>