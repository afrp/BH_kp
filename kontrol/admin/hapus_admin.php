<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include "../database.php";

	$id 	= $_GET['id'];
	$query_select = mysql_query("select gambar_adm from tb_adm where user_adm = '$id'");
	$fetch_select = mysql_fetch_array($query_select);
	
	//$dir = "gmb/artikel/$fetch_select[gbr_write]";
	
	$query_hapus = mysql_query("delete from tb_adm where user_adm ='$id'");
	unlink("gmb/admin/".$fetch_select['gambar_adm']);
	if($query_hapus){ 
		?>
			<script>
				alert("Hapus Berhasil !!!");
				location.href = "admin.php";
			</script>
		<?php
	}
?>