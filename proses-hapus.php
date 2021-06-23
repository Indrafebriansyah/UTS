<?php
    include 'db.php';
    if(isset($_GET['idb'])){
        $berita = mysqli_query($conn, "SELECT gambar FROM tb_berita WHERE id_berita = '".$GET['idb']."' ");
        $p = mysqli_fetch_object($berita);
        unlink('./berita/' .$p->gambar);
        $delete = mysqli_query($conn, "DELETE FROM tb_berita WHERE id_berita = '".$_GET['idb']."' ");
        echo '<script>window.location="adm_berita.php</script>'; 

    }

?>