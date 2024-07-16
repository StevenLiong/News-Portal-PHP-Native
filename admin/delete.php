<?php
include('include/config.php');
if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];

    $query   = "SELECT * FROM berita WHERE id_berita='$id_berita'";
    $hasil   = mysqli_query($con, $query);
}else {
    die ("Error. Tidak ada ID yang dipilih Silakan cek kembali! ");
}

if (!empty($id_berita) && $id_berita != "") {
    $hapus_kat = "DELETE FROM kategori WHERE id_berita='$id_berita'";
    $kat = mysqli_query($con, $hapus_kat);

    $hapus_komen = "DELETE FROM komentar WHERE id_berita='$id_berita'";
    $kat = mysqli_query($con, $hapus_komen);

    $hapus_berita = "DELETE FROM berita WHERE id_berita='$id_berita'";
    $sql = mysqli_query($con, $hapus_berita);
    
    if ($sql && $kat) {
        ?>
            <script language="JavaScript">
            alert('Seluruh Data Berita <?= $id_berita ?> Berhasil dihapus!');
            document.location='index.php?page=lihat';
            </script>
        <?php
    } else {
        echo "<font color=red><center>Data Berita gagal dihapus</center></font>";
        var_dump($id_berita);
    }
}
