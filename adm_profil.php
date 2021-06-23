<?php
    session_start();
    include 'db.php';

    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profil | Indra Febriansyah</title>
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
                <h3>Profil</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="control" value="<?php echo $d->nama_admin?>" required>
                        <input type="text" name="user" placeholder="User Name" class="control" value="<?php echo $d->username?>" required>
                        <input type="text" name="hp" placeholder="No HP" class="control" value="<?php echo $d->telp_admin?>" required>
                        <input type="email" name="email" placeholder="Email" class="control" value="<?php echo $d->email_admin?>" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="control" value="<?php echo $d->address_admin?>" required>
                        <input type="submit" name="submit" value="Ubah Profil" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['submit'])){

                            $nama     = $_POST['nama'];
                            $user     = $_POST['user'];
                            $hp       = $_POST['hp'];
                            $email    = $_POST['email'];
                            $alamat   = $_POST['alamat'];

                            $update = mysqli_query($conn, "UPDATE admin SET 
                                            nama  = '".$nama."',
                                            user    = '".$user."',
                                            hp  = '".$hp."',
                                            email = '".$email."',
                                            alamat   = '".$alamat."',
                                            WHERE id_admin = '".$d->id_admin."' ");
                            
                            if($update){
                                echo 'berhasil';
                            }else{
                                echo 'gagal' .mysqli_error($conn);
                            } 

                        }
                    ?>
                </div>

                <h3>Ubah Password</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="password" name="pass1" placeholder="Password Baru" class="control" required>
                        <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="control" required>
                        <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['ubah_password'])){

                            $pass1     = $_POST['pass1'];
                            $pass2     = $_POST['pass2'];

                            if($pass2 != $pass1) {
                                echo '<script>alert("konfirmasi Password Baru Tidak Sesuai")</script>';

                            }else {
                                $u_pass = mysqli_query($conn, "UPDATE admin SET 
                                            password  = '".MD5($pass1)."',
                                            WHERE id_admin = '".$d->id_admin."' ");
                                    
                                if($u_pass){
                                    echo '<script>alert("Ubah Password Berhasil")</script>';
                                    echo '<script>window.location="profil.php"</script>';
                                }else{
                                    echo 'gagal' .mysqli_error($conn);
                                } 
                            }

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
    </body>
</html>