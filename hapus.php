<?php include "koneksi.php";
    if ($_GET) {
        if (empty($_GET['kodebuku'])) {
?>
<b>Data yang dihapus tidak ada</b>
<?php
        }
        else {
            $mySql = "DELETE FROM tb_buku WHERE kodebuku='".$_GET['kodebuku']."'";
            $myQry = mysqli_query($koneksi, $mySql) or die("Error hapus data ".mysqli_error($koneksi));
        if ($myQry) {
?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil dihapus.
    </div>
    <meta http-equiv="refresh" content="1; url=index.php"/>
<?php
        }
        }
    }
?>