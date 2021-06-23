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
        <title>Berita | Indra Febriansyah</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>    
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="text" name="judul" class="control" placeholder="Judul Berita" required>
                        <textarea name="desc" class="control" placeholder="Deskripsi Berita" required></textarea><br>
                        <input type="file" name="gambar" class="control" required>
                        <input type="submit" name="submit" value="submit" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['submit'])){
                            //print_r($_FILES['gambar']);
                            //menampung inputan form
                            $judul  = $_POST['judul'];
                            $desc   = $_POST['desc'];
                            
                            //menampung data yang di upload
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                            $type1  = explode('.', $filename);
                            $type2  = $type1[1];

                            $newname = 'produk' .time(). '.' .$type2;

                            //menampung format yang diizinkan
                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                            //validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){

                                echo '<script>alert("Format file tidak diizinkan")</script>';
                            }else {
                                move_uploaded_file($tmp_name, './berita/' .$newname);

                                $insert = mysqli_query($conn, "INSERT INTO tb_berita VALUES (
                                    null,
                                    '".$judul."',
                                    '".$desc."',
                                    '".$newname."',
                                    null
                                    ");

                                if($insert){
                                    echo '<script>alert("Tambah Berita Berhasil")</script>';
                                    echo '<script>window.location="adm_berita.php"</script>';
                                }else{
                                    echo 'gagal' .mysqli_error($conn);

                                }
                            }
                            //proses upload dan insert
                        }
                        ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <small>Copyright &copy; 2021 - Indra Febriansyah</small>
            </div>
        </footer>
        <script>
            CKEDITOR.replace( 'desc' );
        </script>
    </body>
</html>