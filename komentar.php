<?php
    include('include/config.php');
    $email = $_POST['username'];
    $query = "SELECT id_user FROM user WHERE email = '$email'";
    $query = $con->query($query);
    $result = $query->fetch_assoc();
    // var_dump($result);
    // echo $result['id_user'];
    if($result){
        $id_user = $result['id_user'];
    }else{
        die();
    }
    $comment = $_POST['comment'];
    $id_berita = $_POST['berita'];
    $currdate = date('Y-m-d');

    do{
        $id_komen = rand(10000,99999);
        $rnd_id_komen = mysqli_query($con, "SELECT id_komen FROM komentar WHERE id_komen = '$id_komen'");
    }while(mysqli_fetch_assoc($rnd_id_komen));

    if($comment != ""){
        mysqli_query($con, "INSERT INTO komentar VALUES ('$id_komen','$id_user', '$id_berita', '$currdate', 0, '$comment')");
        echo "<script type='text/javascript'> document.location = 'detail_berita.php?id="."$id_berita"."'; </script>";
    }else{
        echo "<script>alert('komantar kosong');</script>";
        echo "<script type='text/javascript'> document.location = 'detail_berita.php?id="."$id_berita"."'; </script>";
    }
