<?php 
    include('include/config.php');
    include('include/header.php');
    
    $postid=$_GET['id'];    
    $query = "SELECT * FROM berita WHERE id_berita = '$postid'";
    $result = $con->query($query);
    $berita = $result->fetch_assoc();
?>

<div class="container">
    <div class="row" style="margin-top: 4%">
        <div class="col-md-8 center card-body">
            
            <h2 class="card-title"><?php echo $berita['judul'];?></h2>
            <p>penulis: <?php echo $berita['penulis'];?></p>
            <?php
                $queryCat = "SELECT kategori FROM kategori WHERE id_berita = '$berita[id_berita]'";
                $queryCat = $con->query($queryCat);
                
                echo "<p>kategori: ";
                foreach($queryCat->fetch_all() as $kat)
                    echo $kat[0]."  ";
                
                echo "</p>";
            ?>
            <p class="text-muted">Tanggal Publish: <?php echo $berita['tglpublish']; ?></p>
            <?php echo "<img src='admin/gambar/$berita[gambar]' width='700px' height='400px'/>"; ?>
            <p><?php echo $berita['konten'];?></p>


            <div class="comment" action="komentar.php">
            <h5>Comment:</h5>
            <?php if(isset($_SESSION['user'])){ ?>
                <form method="post" action="komentar.php">
                    <input type="hidden" name="username" value="<?= $_SESSION['user'] ?>">
                    <input type="hidden" name="berita" value="<?= $berita['id_berita'] ?>">
                    <textarea rows="5" cols="60" name="comment"></textarea><br>
                    <button type="submit" class="btn w-md btn-bordered btn-success waves-effect waves-light">Post</button>
                </form>
            <?php }else{ ?>
                <form method="post" action="komentar.php">
                    <textarea rows="5" cols="60" name="comment" required></textarea><br>
                    <a href="login.php">
                        <button type="button" class="btn w-md btn-bordered btn-success waves-effect waves-light">Post</button>
                    </a>
                </form>
            <?php } ?>
                <div>
                <?php
                $query = "SELECT * FROM komentar WHERE id_berita = '$berita[id_berita]'";
                $result = $con->query($query);

                foreach($result->fetch_all() as $comment){
                    include('model/show_comment.php');
                }
                ?>
                </div>
            </div>
            
        </div>
        <?php include('include/sidebar.php');?>
    </div>
</div>

<?php include('include/footer.php');
