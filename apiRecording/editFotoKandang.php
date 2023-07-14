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
                $imstr = $_POST['image'];
                $file = $_POST['file'];
                $path = "../public/img/kandang/";

                
                    if ($imstr ==""){
                        $sql= "update kandang set gambar_k = '$file' where id_kandang ='$id_kandang'";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            echo json_encode($respon); exit();
                        }else{
                            $respon['kode']= "111";
                            echo json_encode($respon); exit();
                        }
                    }else{
                         if(file_put_contents($path.$file, base64_decode($imstr))==false){
                                
                                $respon['kode']= "111";
                                echo json_encode($respon); exit();
                        }
                        else{

                            $sql= "update kandang set gambar_k = '$file' where id_kandang ='$id_kandang'";
                            $result = mysqli_query($conn,$sql);
                            if($result){
                                echo json_encode($respon); exit();
                            }else{
                                $respon['kode']= "111";
                                echo json_encode($respon); exit();
                            }
                        }
                    }
                
                break;
              
            case "delete":
            
                
                break;
  }
}
?>