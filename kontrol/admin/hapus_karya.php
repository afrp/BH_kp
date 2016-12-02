<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../kegiatan.php");
}
include "../database.php";

	$id 	= $_GET['id'];
	$query_select = mysql_query("select gbr_karya from tb_karya where id_karya = '$id'");
	$fetch_select = mysql_fetch_array($query_select);
	
	$query_hapus = mysql_query("delete from tb_karya where id_karya ='$id'");
	unlink("gmb/karya/".$fetch_select['gbr_karya']);
	if($query_hapus){ 
		?>
			<script>
				alert("Hapus Berhasil !!!");
				location.href = "karya.php";
			</script>
		<?php
	}
?>