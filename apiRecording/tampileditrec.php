<?php 
    include 'database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conn = mysqli_connect($DB_SERVER_LOC, $DB_USER, $DB_PASS, $DB_NAME);
        $id_periode = $_POST['id_periode'];
        $id_recording = $_POST['id_recording'];
        $sql = "SELECT id_recording, umur_r, terima_pakan_r, habis_pakan_r, retur_pakan_r, mati_ayam_r, berat_ayam_r 
        FROM recording r, periode p 
        WHERE r.id_periode = p.id_periode AND r.id_periode = '$id_periode' and r.id_recording = '$id_recording'
        ORDER BY umur_r ASC";
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