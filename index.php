<?php include('koneksi.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button><a href="tambah.php">Tambah Data</a></button> <br><hr>
<table class="table table-striped table-hover" style="width: 100%;">
        <tr>
            <!-- <th>Kode Buku</th> -->
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Kota</th>
            <th>Tahun</th>
            <th>Tools</th>
        </tr>
        <?php
            $mySql = "SELECT * FROM tb_buku";
            $myQry = mysqli_query($koneksi, $mySql) or die ("Query salah : ".mysqli_error($koneksi));
            $nomor = 1;
            while ($kolomData = mysqli_fetch_array($myQry)) {
        ?>
        <tr align="center">
            <!-- <td><?php echo $kolomData['kodebuku']; ?></td> -->
            <td><?php echo $kolomData['judulbuku']; ?></td>
            <td><?php echo $kolomData['pengarang']; ?></td>
            <td><?php echo $kolomData['penerbit']; ?></td>
            <td><?php echo $kolomData['kota']; ?></td>
            <td><?php echo $kolomData['tahun']; ?></td>
            <td>
                <button><a href="edit.php?kodebuku=<?php echo $kolomData['kodebuku'];?>" title="Edit Data" class="btn btn-edit btn-sm">Edit</a></button>
                <button><a href="hapus.php?kodebuku=<?php echo $kolomData['kodebuku'];?>" title="Hapus Data" onclick="return confirm ('Apakah Anda Ingin Menghapus Data Ini?')" class="btn btn-danger btn-sm">Hapus</a></button>
            </td>
        </tr>        
        <?php    } ?>
    </table>
    <br><hr>
    <button><a href="cetak.php">Cetak Data</a></button>
</body>
</html>