<?php
include('include/config.php');

if(isset($_POST['update'])){
    $id_berita = htmlspecialchars($_POST["id_berita"]);
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

        $query=mysqli_query($con, "UPDATE berita SET judul='$judul', penulis='$penulis', konten='$konten', tglpublish='$tglpublish', gambar='$imgnewfile' WHERE id_berita = '$id_berita'");
        $query_kat = mysqli_query($con, "UPDATE kategori SET kategori='$kategori' WHERE id_berita = '$id_berita'");
        if($query && $query_kat){
            echo "<script>alert('Data Berhasil Di Update :)'); wait();</script>";
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }else{
            echo "<script>alert('Data gagal Di Update :)');</script>";
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
  
    <title>Update News</title>
</head>
<body>
    
    <nav class='navbar navbar-default' role='navigation'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand' href='admin.php'>Admin News PHP</a>
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
      <h1 class='text-center'>Update News</h1>
        <?php            
            $id_berita = htmlspecialchars($_GET["id"]);
            $get_detail_berita = mysqli_query($con, "SELECT * FROM berita WHERE id_berita = '$id_berita'");
            $detail_berita = mysqli_fetch_array($get_detail_berita);
        ?>

      <form method="POST" enctype="multipart/form-data">
        <div class='form-group row'>
          <div class='col-sm-6'>
            <input class='form-control' type='hidden' name='id_berita' id="id_berita" value="<?= $detail_berita['id_berita'] ?>">
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='judul'>Judul:</label>
          <div class='col-sm-6'>
            <input class='form-control' type='text' name='judul' id="judul" value="<?= $detail_berita['judul'] ?>" required>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='kategori'>Kategori:</label>
          <div class='col-sm-6'>
          <select class="form-control form-control-sm" name="kategori" id="kategori" value="<?= $detail_berita['kategori'] ?>" required>
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
            <input class='form-control' type='text' name='penulis' id="penulis" value="<?= $detail_berita['penulis'] ?>" required>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='konten'>Konten:</label>
          <div class='col-sm-6'>
            <textarea class="summernote" name="konten" id="konten" style="width:600px; height:300px;" required> <?php echo $detail_berita['konten']; ?> </textarea>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='tglpublish'>Tanggal Publish:</label>
          <div class='col-sm-6'>
            <input class='form-control' type="date" name="tglpublish" id="tglpublish" value="<?= $detail_berita['tglpublish'] ?>" required>
          </div>
        </div>
        <div class='form-group row'>
          <label class='col-sm-3' for='gambar'>Gambar Berita:</label>
          <div class='col-sm-6'>
          <input type="file" name="gambar" id="gambar" value="<?= $detail_berita['gambar'] ?>" required>
          </div>
        </div>
        <button type='submit' name='update' class='btn btn-primary'>Update</button>
        <a href="index.php">
            <button type="button" name="back" class="btn btn-info" style="color:black;">Back</button>
        </a>
      </form>
    </div>
  </main>