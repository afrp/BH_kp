<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../artikel.php");
}
include "../database.php";

	$id 	= $_GET['id'];
	$query_select = mysql_query("select gbr_write from tb_artikel where id_akl = '$id'");
	$fetch_select = mysql_fetch_array($query_select);
	
	//$dir = "gmb/artikel/$fetch_select[gbr_write]";
	
	$query_hapus = mysql_query("delete from tb_artikel where id_akl ='$id'");
	unlink("gmb/artikel/".$fetch_select['gbr_write']);
	if($query_hapus){ 
		?>
			<script>
				alert("Hapus Berhasil !!!");
				location.href = "artikel.php";
			</script>
		<?php
	}
?>