<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../berita.php");
}
include "../database.php";

	$id 	= $_GET['id'];
	$query_select = mysql_query("select gambar_bta from tb_berita where id_bta = '$id'");
	$fetch_select = mysql_fetch_array($query_select);
	
	$query_hapus = mysql_query("delete from tb_berita where id_bta ='$id'");
	unlink("gmb/berita/".$fetch_select['gambar_bta']);
	if($query_hapus){ 
		?>
			<script>
				alert("Hapus Berhasil !!!");
				location.href = "berita.php";
			</script>
		<?php
	}
?>