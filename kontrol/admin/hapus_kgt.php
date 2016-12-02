<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../kegiatan.php");
}
include "../database.php";

	$id 	= $_GET['id'];
	$query_select = mysql_query("select gbr_kgt from tb_kegiatan where id_kgt = '$id'");
	$fetch_select = mysql_fetch_array($query_select);
	
	$query_hapus = mysql_query("delete from tb_kegiatan where id_kgt ='$id'");
	unlink("gmb/keg/".$fetch_select['gbr_kgt']);
	if($query_hapus){ 
		?>
			<script>
				alert("Hapus Berhasil !!!");
				location.href = "kegiatan.php";
			</script>
		<?php
	}
?>