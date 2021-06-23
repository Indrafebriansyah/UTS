<div class="isi-slider">
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  $query = "SELECT * FROM gambar"; // Tampilkan semua data gambar
  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
  $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
  if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
      echo "<img src='images/".$data['nama']."'></td>";
    }}?>
</div>
