<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashbord | Indra Febriansyah</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">    
    </head>

    <body>
        <!-- header -->
        <header> 
            <div class="container">
                <h1><a href="dasbord.php">Indra Febriansyah</a></h1>
                <ul>
                    <li><a href="dasbord.php">Dashboard</a></li>
                    <li><a href="adm_profil.php">Profil</a></li>
                    <li><a href="adm_berita.php">Berita</a></li>
                    <li><a href="adm_galeri.php">Galery</a></li>
                    <li><a href="adm_kontak.php">Kontak</a></li>
                    <li><a href="keluar.php">Keluar</a></li>
                </ul>
            </div>
        </header>

        <!-- conten -->
        <div class="section">
            <div class="container">
                <h3>Berita</h3>
                <div class="box">
                    <p><a href="tambah_berita.php" style="color: #000;">Tambah Berita</a></p>
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th width="60px">No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'db.php';
                                $no = 1;
                                $berita = mysqli_query($conn, "SELECT * FROM tb_berita ORDER BY id_berita DESC");
                                if(mysqli_num_rows($berita) > 0){
                                while($row = mysqli_fetch_array($berita)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?> </td>
                                <td><?php echo $row['judul'] ?> </td>
                                <td><?php echo $row['deskripsi'] ?> </td>
                                <td><img src="berita/<?php echo $row['gambar'] ?>"></td>
                                <td>
                                    <a href="edit_berita.php?id=<?php echo $row['id_berita'] ?>">EDIT</a> || <a href="proses-hapus.php?idb=<?php echo $row['id_berita']  ?>" onclick="return confirm('Yakin ingin Menghapus?')">Hapus</a>
                                </td>
                            </tr>
                            <?php }}else{ ?>
                                <tr>
                                    <td colspan="5">Tidak Ada Data</td>
                                </tr>
                            
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <small>Copyright &copy; 2021 - Indra Febriansyah</small>
            </div>
        </footer>
    </body>
</html>