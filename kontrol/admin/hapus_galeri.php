<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../kegiatan.php");
}
include "../database.php";

	$id 	= $_GET['id'];
	$query_select = mysql_query("select poto from tb_galeri where id_poto = '$id'");
	$fetch_select = mysql_fetch_array($query_select);
	
	$query_hapus = mysql_query("delete from tb_galeri where id_poto ='$id'");
	unlink("gmb/galeri/".$fetch_select['poto']);
	if($query_hapus){ 
		?>
			<script>
				alert("Hapus Berhasil !!!");
				location.href = "galeri.php";
			</script>
		<?php
	}
?>