<?php 
   include 'database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conn = mysqli_connect($DB_SERVER_LOC, $DB_USER, $DB_PASS, $DB_NAME);
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM user u , peternak p, kandang k 
        WHERE username = '$username' AND password = '$password' and p.id_user = u.id_user and k.id_peternak = p.id_peternak ";
        $result = mysqli_query($conn, $query);
       
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