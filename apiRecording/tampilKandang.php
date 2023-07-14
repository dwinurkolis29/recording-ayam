<?php 
    include 'database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conn = mysqli_connect($DB_SERVER_LOC, $DB_USER, $DB_PASS, $DB_NAME);
        $username = $_POST['username'];
        $sql = "SELECT * , concat('http://$ip/recording/public/img/kandang/',gambar_k) as url 
        FROM kandang k, peternak p, USER u 
        WHERE k.id_peternak= p.id_peternak AND p.id_user = u.id_user AND u.username = '$username'
        order by id_kandang asc";
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