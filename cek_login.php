<?php
include('include/config.php');
$username=$con->real_escape_string($_POST['username']);
$password=$con->real_escape_string($_POST['password']);
session_start();

$query = "SELECT * FROM `admin` WHERE email='$username'";
$result = $con->query($query);
$cek = $result->fetch_assoc();

$name;$captcha;
if(isset($_POST['username'])) $name= $_POST['username'];
if(isset($_POST['g-recaptcha-response'])) $captcha=$_POST['g-recaptcha-response'];

if(!$captcha){
    echo "<script>alert('Pls check captcha form');</script>";
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
$str = "https://www.google.com/recaptcha/api/siteverify?secret=6LccLF0cAAAAALK7yIPrjBjlY2qdYeU0hwU4OwRY". '&response=' . urlencode($captcha);

$response = file_get_contents($str);
$response_keys = json_decode($response, true);

if(!$response_keys["success"]){
    echo "<script>alert('spammer detected');</script>";
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}else{
    if($cek){
        if($cek['password']==$password){
            $_SESSION['admin'] = 1;
            header("Location: admin/index.php");
        }else{
            echo "<script>alert('Wrong Password');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        }
    }else{
        $query = "SELECT email, `password` FROM `user` WHERE email='$username'";
        $result = $con->query($query);
        $cek = $result->fetch_assoc();
        if($cek['password']==$password){
            $_SESSION['user'] = $cek['email'];
            header("Location: index.php");
        }else{
            echo "<script>alert('Wrong Password');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        }
    }
}


?>
