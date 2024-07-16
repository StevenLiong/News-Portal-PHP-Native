<?php 
    $query_user = "SELECT CONCAT(nama_depan,' ',nama_belakang), profilepicture FROM user WHERE id_user = '$comment[1]'";
    $result_user = $con->query($query_user);
    $detail_user = $result_user->fetch_all();
    // var_dump($_SESSION['user']);
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<div class="media mb-4" id="example">
    <img class="d-flex mr-3 rounded-circle" src="profilepic/<?= $detail_user[0][1] ?>" width='40px' height='40px'>
    <div class="media-body">
        <h5 class="mt-0"><?php echo $detail_user[0][0];?> <br/>
            <span style="font-size:11px;"><b>at</b> <?php echo $comment[3];?></span>
        </h5>
        <?php echo $comment[5];?>
        <div class="media mb-4">
        <?php if(isset($_SESSION['user'])){ ?>
            <button class="btn_like" id_komen="<?= $comment[0] ?>" email="<?= $_SESSION['user'] ?>">
                <img src="asset/like_button.png" width='20px' height='20px'>
            </button>
        <?php }else{ ?>
            <a href="login.php"><button><img src="asset/like_button.png" width='20px' height='20px'></button></a>
        <?php } ?>
            <p id="like<?= $comment[0] ?>"> <?php echo $comment[4];?> </p>
        </div>
    </div>
</div>

<script>
    $('.btn_like').on('click', function(){
        let a = $(this).attr('id_komen');
        
        $.ajax({
            url: "model/likes.php",
            data: {id_komen:a},
            type: "post",
            success:function(data){
                $("#like" + a).html(data);
            },
            error:function (){
                alert("Tidak bisa like comment!");
            }
        });
    });
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>