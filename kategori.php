<?php 
include('include/config.php');
include('include/header.php');
$id_kat = $_GET['id_kat'];
$query = ("SELECT * FROM berita WHERE id_berita = ANY(SELECT id_berita FROM kategori WHERE kategori.kategori = '$id_kat')");
$query = $con->query($query);
// $result = $query->fetch_assoc();
// var_dump($id_kat);
?>
<div class="container">
    <div class="row" style="margin-top: 4%">
        <div class="col-md-8">
        <?php

            
            // if($row_count == 0){
            //     echo "nothing found";
            // }

            foreach($query->fetch_all() as $row){
                // var_dump($row);
                include('model/show_news.php');
            } 
        ?>
        </div>
        <?php include('include/sidebar.php');?>
    </div>
</div>

<?php include('include/footer.php');?>