<?php
    include('include/config.php');

    // $query = ("SELECT  judul, penulis, konten, tglpublish, gambar FROM berita");
    // $result = $con->query($query);
    // $berita = $result->fetch_assoc();
    // $query = "SELECT * FROM berita";
    // var_dump($berita);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../vendor/bootstrap-3.3.7/dist/css/bootstrap.min.css'>

  
    <title>ADMIN</title>
</head>
<body>
    
    <nav class='navbar navbar-default' role='navigation'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand' href='index.php'>Admin News PHP</a>
        </div>
        <div>
          <ul class='nav navbar-nav navbar-right'>
              <li>
                <a class="navbar-brand" href="#">ADMIN</a>
              </li>
              <li class="navbar-brand">
                <form action="index.php" method="POST">                  
                <a href="logout.php">
                    <button type="button" name="back" class="btn btn-danger" style="color:black;">LOGOUT</button>
                </a>
                </form>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <table id="news" class="table table-striped table-bordered" style="width:100%">
    <button type="button" class="btn btn-primary float-right" onclick="location.href = 'add.php' ">Add</button>
    <thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th>Penulis</th>
				<th>Konten</th>
				<th>Tanggal</th>
        <th>Gambar</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
        <?php
        $no = 0;
        
        $query = mysqli_query($con,"SELECT  id_berita, judul, penulis, konten, tglpublish, gambar FROM berita");
        $rowcount=mysqli_num_rows($query);
        if($rowcount==0)
        {
        ?>

        <?php 
        } else {
        while($row=mysqli_fetch_array($query))
        {
          $no++;
          $kategori = mysqli_query($con, "SELECT kategori FROM kategori WHERE id_berita = '$row[id_berita]'");
        ?>
        <tr>
            <td><?php echo htmlentities ($no); ?></td>
            <td><?php echo htmlentities ($row['judul']); ?></td>
            <td><?php while($row_kat=mysqli_fetch_array($kategori)) echo htmlentities ($row_kat['kategori'].' '); ?></td>
            <td><?php echo htmlentities ($row['penulis']); ?></td>
            <td><?php echo htmlentities ($row['konten']); ?></td>
            <td><?php echo htmlentities ($row['tglpublish'] ); ?></td>
            <td><?php echo "<img src='gambar/$row[gambar]'width='100' height='100'/>"; ?></td>
            <td>

            <button type="button" class="btn btn-primary float-right" onclick="location.href = 'update.php?id=<?= $row['id_berita'] ?>' ">Update</button>
            <button type="button" class="btn btn-danger float-right" onclick="location.href = 'delete.php?id=<?= $row['id_berita'] ?>' ">Delete</button>
			</td>
        </tr>
        <?php } }?>
		</tbody>
	</table>

</body>
</html>