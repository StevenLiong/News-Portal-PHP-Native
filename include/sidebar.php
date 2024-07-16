<div class="col-md-4">
  <!-- Categories Widget -->
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <?php 
            $query=mysqli_query($con,"SELECT kategori FROM kategori GROUP BY 1");
            while($row=mysqli_fetch_array($query)) {
            ?>
              <li>
                <a href="kategori.php?id_kat=<?= $row['kategori']?>"><?php echo $row['kategori'];?></a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
