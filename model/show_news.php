<div class="card mb-4">
    <a href="detail_berita.php?id=<?php echo $row[0]?>"><img src="../uts_pemweb/admin/gambar/<?= $row[5]?>" width='700px' height='500px'></a>
    <div class="card-body">
        <h2><a href="detail_berita.php?id=<?php echo $row[0]?>" class="card-title"><?php echo $row[1];?></a></h2>
        <p>penulis: <?php echo $row[2];?></p>
        <?php
            $kategori = "SELECT kategori FROM kategori WHERE id_berita = $row[0]";
            $kat = $con->query($kategori);
            $count = 1;
            echo "<p>kategori: ";
            foreach($kat->fetch_all() as $row_kat){
                echo $row_kat[0]."  ";
            }
            echo "</p>";
        ?>
        <p class="text-muted">Tanggal Publish: <?php echo $row[4]; ?></p>
    </div>
</div>
