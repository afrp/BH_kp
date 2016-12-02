
<?php 
include '../database.php';
$id=$_GET['id'];
$cari_kd=mysql_query("select * from tb_artikel where id_akl='$id'");
$pecah=mysql_fetch_array($cari_kd);
echo "<p>".$pecah['isi_akl']."</p>";
?>