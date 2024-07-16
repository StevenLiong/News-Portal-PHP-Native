<?php 
include('include/config.php');

$captcha;
if(isset($_POST['g-recaptcha-response'])) $captcha=$_POST['g-recaptcha-response'];

if(!$captcha){
    echo "<script>alert('Pls check captcha form');</script>";
    echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
}
$str = "https://www.google.com/recaptcha/api/siteverify?secret=6LccLF0cAAAAALK7yIPrjBjlY2qdYeU0hwU4OwRY". '&response=' . urlencode($captcha);

$response = file_get_contents($str);
$response_keys = json_decode($response, true);

if(!$response_keys["success"]){
    echo "<script>alert('spammer detected');</script>";
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}else{
    $nama_depan = htmlspecialchars($_POST["nama_depan"]);
    $nama_belakang = htmlspecialchars($_POST["nama_belakang"]);
    $email = strtolower(stripslashes($_POST["email"]));
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $tgllahir = $_POST["tgllahir"];
    $gender = $_POST["gender"];
    $imgfile = $_FILES["profilepicture"]["name"];

    $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));

    $allowed_extensions = array(".jpg","jpeg",".png",".gif");

    if(!in_array($extension,$allowed_extensions))
    {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
    return false;
    
    }
    else
    {
    // rename the image file
    $imgnewfile=md5($imgfile).$extension;
    // Code for move image into directory
    move_uploaded_file($_FILES["profilepicture"]["tmp_name"],"profilepic/".$imgnewfile);
    }

    $result = mysqli_query($con, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar');</script>";
    }
    
    do{
        $id_user = rand(10000,99999);
        $result = mysqli_query($con, "SELECT id_user FROM user WHERE id_user = '$id_user'");
    }while(mysqli_fetch_assoc($result));
    
    mysqli_query($con, "INSERT INTO user VALUES ('$id_user', '$nama_depan', '$nama_belakang', '$email', '$tgllahir', '$gender', '$password', '$imgnewfile')");

    echo "<script>alert('selamat anda telah teregistrasi :)');</script>";
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}