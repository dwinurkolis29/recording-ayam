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
                $id_peternak = $_POST['id_peternak'];
                $nama = $_POST['nama'];
                $jk = $_POST['jk'];
                $tgl = $_POST['tgl'];
                $alamat = $_POST['alamat'];
                
                $sql= "update peternak set nama_p = '$nama', jk_p = '$jk', tgLahir_p = '$tgl', alamat_p = '$alamat' 
                where id_peternak ='$id_peternak'";

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