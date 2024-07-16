<?php
include('include/config.php');

if(isset($_POST['submit'])){
$judul = htmlspecialchars($_POST["judul"]);
$penulis = htmlspecialchars($_POST["penulis"]);
$kategori = htmlspecialchars($_POST['kategori']);
$konten = htmlspecialchars($_POST["konten"]);
$tglpublish = htmlspecialchars($_POST["tglpublish"]);

$imgfile = $_FILES["gambar"]["name"];
    $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    if(!in_array($extension,$allowed_extensions))
    {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    echo "<script type='text/javascript'> document.location = 'add.php'; </script>";
    return false;
    }
    else
    {
    // rename the image file
    $imgnewfile=md5($imgfile).$extension;
    // Code for move image into directory
    move_uploaded_file($_FILES["gambar"]["tmp_name"],"gambar/".$imgnewfile);
    

    do{
        $id_berita = rand(1,1000);
        $result = mysqli_query($con, "SELECT id_berita FROM berita WHERE id_berita = '$id_berita'");
    }while(mysqli_fetch_assoc($result));

$query=mysqli_query($con, "INSERT INTO berita(id_berita, judul, penulis, konten, tglpublish, gambar) VALUES('$id_berita', '$judul', '$penulis', '$konten', '$tglpublish', '$imgnewfile')");
$query_kat = mysqli_query($con, "INSERT INTO kategori VALUES ('$id_berita', '$kategori')");
if($query && $query_kat){
echo "<script>alert('Data Berhasil Di Input :)');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}else{
echo "<script>alert('Data gagal Di Input :(');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../vendor/bootstrap-3.3.7/dist/css/bootstrap.min.css'>
    <style>
    label {
      display: block;
    }

    li {
      list-style-type: none;
    }
    </style>
  
    <title>ADMIN</title>
</head>
<body>
    
    <nav class='navbar navbar-default' role='navigation'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand' href='admin.php'>Admin News Portal</a>
        </div>
        <div>
          <ul class='nav navbar-nav navbar-right'>
              <li>
                <a class="navbar-brand" href="#">ADMIN</a>
              </li>
              <li class="navbar-brand">
                <form action="index.php" method="POST">                  
                <a href="admin/logout.php">
                    <button type="button" name="back" class="btn btn-danger" style="color:black;">LOGOUT</button>
                </a>
                </form>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    </header>
  <main>
    <div class='container'>
      <h1 class='text-center'>Add News</h1>
      <form method="POST"  enctype="multipart/form-data">
        <!-- <div class='form-group row'>
          <label class='col-sm-3' for='id_berita'>Nomor Berita:</label>
          <div class='col-sm-6'>
            <input class='form-control' type='text' name='id_berita' id="id_berita" required>
          </div>
        </div> -->
        <div class='form-group row'>
          <label class='col-sm-3' for='judul'>Judul:</label>
          <div class='col-sm-6'>
            <input class='form-control' type='text' name='judul' id="judul" required>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='kategori'>Kategori:</label>
          <div class='col-sm-6'>
            <select class="form-control form-control-sm" name="kategori" id="kategori" required>
              <option value=""></option>
              <option value="Comedy">Comedy</option>
              <option value="Sports">Sports</option>
              <option value="Politics">Politics</option>
              <option value="Religion">Religion</option>
              <option value="Business">Business</option>
              <option value="Financial">Financial</option>
              <option value="Entertainment">Entertainment</option>
              <option value="Health">Health</option>
              <option value="Food">Food</option>
              <option value="Education">Education</option>
              <option value="Science">Science</option>
              <option value="Technology">Technology</option>
            </select>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='penulis'>Penulis:</label>
          <div class='col-sm-6'>
            <input class='form-control' type='text' name='penulis' id="penulis" required>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='konten'>Konten:</label>
          <div class='col-sm-6'>
            <textarea class="summernote" name="konten" id="konten" style="width:600px; height:300px;" required></textarea>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='tglpublish'>Tanggal Publish:</label>
          <div class='col-sm-6'>
            <input class='form-control' type="date" name="tglpublish" id="tglpublish" required>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='gambar'>Gambar Berita:</label>
          <div class='col-sm-6'>
          <input type="file" name="gambar" id="gambar" required>
          </div>
        </div>
        <button type='submit' name='submit' class='btn btn-primary'>Add Data</button>
        <a href="index.php">
        <button type="button" name="back" class="btn btn-info" style="color:black;">Back</button>
      </a>
      </form>
    </div>
  </main>