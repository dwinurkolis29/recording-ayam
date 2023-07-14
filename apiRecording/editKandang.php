<?php
    include 'database.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $conn = mysqli_connect($DB_SERVER_LOC,$DB_USER,$DB_PASS,$DB_NAME);
        $mode = $_POST['mode'];
        $respon = array(); $respon['kode']= '000';
        switch($mode){
            case "insert":
                
                break;
            case "update":
                $id_kandang = $_POST['id_kandang'];
                $nama = $_POST['nama'];
                $jenis = $_POST['jenis'];
                $kapasitas = $_POST['kapasitas'];
                $alamat = $_POST['alamat'];
                
                $sql= "update kandang set nama_k = '$nama', jenis_k = '$jenis', kapasitas_k = '$kapasitas', alamat_k = '$alamat' 
                where id_kandang ='$id_kandang'";

                            $result = mysqli_query($conn,$sql);
                            if($result){
                                echo json_encode($respon); exit();
                            }else{
                                $respon['kode']= "111";
                                echo json_encode($respon); exit();
                            }
                            
                break;
              
            case "delete":
            
                
                break;
  }
}
?>