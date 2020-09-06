<?php include ('koneksi.php'); ?>
<?php
$kodebuku = $_GET['kodebuku'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE kodebuku='$kodebuku'");
if (mysqli_num_rows($sql) == 0){

}else{
    $row = mysqli_fetch_assoc($sql);
}
if (isset($_POST['save'])) {
    $kodebuku   = $_POST['kodebuku'];
    $judulbuku	= $_POST['judulbuku'];
    $pengarang	= $_POST['pengarang'];
    $penerbit	= $_POST['penerbit'];
    $kota       = $_POST['kota'];
    $tahun      = $_POST['tahun'];

    $update = mysqli_query($koneksi, "UPDATE tb_buku SET judulbuku='$judulbuku', 
			pengarang='$pengarang', penerbit='$penerbit', kota='$kota', 
            tahun='$tahun' WHERE kodebuku='$kodebuku'") or die(mysqli_error($koneksi));
			if($update){
?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.
    </div>
    <meta http-equiv="refresh" content="1; url=index.php"/>
<?php    
    } else {
?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di Simpan.
    </div>
    <?php } } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="form-horizontal" action="" method="post">
    <table>
        <!-- <tr>
        <td>Kode Buku</td>
        <td>:</td>
        <td><input type="text" name="kodebuku" class="form-control" maxlenght="10" value="<?php echo $row ['kodebuku']; ?>"></td>
        </tr> -->
        
        <tr>
        <td>Judul Buku</td>
        <td>:</td>
        <td><input type="text" name="judulbuku" class="form-control" value="<?php echo $row ['judulbuku']; ?>"></td>
        </tr>

        <tr>
        <td>Pengarang</td>
        <td>:</td>
        <td><input type="text" name="pengarang" class="input-group form-control" value="<?php echo $row ['pengarang']; ?>"></td>
        </tr>

        <tr>
        <td>Penerbit</td>
        <td>:</td>
        <td><input type="text" name="penerbit" class="form-control" value="<?php echo $row ['penerbit']; ?>"></td>
        </tr>

        <tr>
        <td>Kota</td>
        <td>:</td>
        <td><input type="text" name="kota" class="form-control" value="<?php echo $row ['kota']; ?>"></td>
        </tr>

        <tr>
        <td>Tahun</td>
        <td>:</td>
        <td>
            <select name="tahun">
                <option value="<?= $row['tahun'];?>"><?= $row['tahun'];?></option>
                <?php
                    $tahun = date('Y');
                    session_start();
                    for ($i=0; $i < 100 ; $i++) { 
                        $_SESSION['tahun'] = $tahun;
                        $tahun = $tahun-1;
                        ?>
                        <option value="<?=$tahun;?>"><?=$tahun;?></option>
                        <?php
                    }
                ?>
            </select>
        </td>
        </tr>

        <tr>
            <input type="hidden" name="kodebuku" value="<?php echo $row ['kodebuku']; ?>">
        <td><button type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">Simpan</button></td>
        <td><button type="reset" class="btn btn-sm btn-warning" value="Reset">Reset</button></td>
        <td><button><a href="index.php" value="Kembali">Kembali</a></button></td>
        </tr>
    </table>
    </form>
</body>
</html>