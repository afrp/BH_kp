
<?php 
include '../database.php';
$id=$_POST['id'];
$cari_kd=mysql_query("select * from tb_berita where id_bta='$id'");
$pecah=mysql_fetch_array($cari_kd);
echo "<p>".$pecah['isi_bta']."</p>";
?>