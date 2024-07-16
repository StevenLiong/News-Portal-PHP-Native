<?php 
include('include/config.php');
include('include/header.php');
?>

<div class="container">
    <div class="row" style="margin-top: 4%">
        <div class="col-md-8">
        <?php
            $query = "SELECT * FROM berita";
            $result = $con->query($query);

            foreach($result->fetch_all() as $row){
            include('model/show_news.php');
            } 
        ?>
        </div>
        <?php include('include/sidebar.php');?>
    </div>
</div>

<?php include('include/footer.php');?>
    