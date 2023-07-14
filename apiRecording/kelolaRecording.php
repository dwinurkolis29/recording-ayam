<?php
    include 'database.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $conn = mysqli_connect($DB_SERVER_LOC,$DB_USER,$DB_PASS,$DB_NAME);
        $mode = $_POST['mode'];
        $respon = array(); $respon['kode']= '000';
        switch($mode){
            case "insert":
                $id_peternak = $_POST['id_peternak'];
                $id_kandang = $_POST['id_kandang'];
                $id_periode = $_POST['id_periode'];
                $umur = $_POST['umur'];
                $terima = $_POST['terima'];
                $habis = $_POST['habis'];
                $retur = $_POST['retur'];
                $mati = $_POST['mati'];
                $berat = $_POST['berat'];

                    $sql= "INSERT INTO recording(id_peternak,id_kandang,id_periode,umur_r,terima_pakan_r,habis_pakan_r,retur_pakan_r,mati_ayam_r,berat_ayam_r) 
                            VALUES('$id_peternak','$id_kandang','$id_periode','$umur','$terima','$habis','$retur','$mati','$berat')";
                    $result = mysqli_query($conn,$sql);
                            if($result){
                                echo json_encode($respon); exit();
                            }else{
                                $respon['kode']= "111";
                                echo json_encode($respon); exit();
                            }
                
                break;
            case "update":
                $id_recording = $_POST['id_recording'];
                $umur = $_POST['umur'];
                $terima = $_POST['terima'];
                $habis = $_POST['habis'];
                $retur = $_POST['retur'];
                $mati = $_POST['mati'];
                $berat = $_POST['berat'];
                $tanggal = $_POST['tanggal'];

                $sql= "update recording set umur_r ='$umur',terima_pakan_r ='$terima',habis_pakan_r ='$habis',
                retur_pakan_r ='$retur', mati_ayam_r ='$mati', berat_ayam_r ='$berat', updated_at='$tanggal'
                where id_recording = '$id_recording' ";
                    $result = mysqli_query($conn,$sql);
                            if($result){
                                echo json_encode($respon); exit();
                            }else{
                                $respon['kode']= "111";
                                echo json_encode($respon); exit();
                            }
                
                break;
              
            case "delete":
                $id_recording = $_POST['id_recording'];   
                             
                    $sql = "delete from recording where id_recording ='$id_recording'";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        echo json_encode($respon); exit();
                    }else{
                        $respon['kode']= "111";
                        echo json_encode($respon); exit();
                    }
                
                break;
  }
}
?>