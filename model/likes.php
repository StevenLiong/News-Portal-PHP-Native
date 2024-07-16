<?php
    include('../include/config.php');

    if(isset($_POST['id_komen'])){
    $id_komen = $_POST['id_komen'];
    
    $like = "UPDATE komentar SET jmlhlike = jmlhlike+1 WHERE id_komen = '$id_komen'";
    $r = $con->query($like);
    
    $like = "SELECT * FROM komentar where id_komen = '$id_komen'";
    $r = $con->query($like);
    $ry = $r->fetch_assoc();
    if($r){
        echo $ry['jmlhlike'];
    }
    }
?>