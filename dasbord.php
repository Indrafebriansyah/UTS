<?php
    session_start();
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
                <h3>Dashboard</h3>
                <div class="box">
                    <h4>Selamat Datang <?php echo $_SESSION['a_global']->nama_admin ?></h4>
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