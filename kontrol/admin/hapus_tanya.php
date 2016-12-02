<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../faq.php");
}
include "../database.php";

	$id 	= $_GET['id'];
	$query_hapus = mysql_query("delete from tb_tanya where id_tanya ='$id'");
	if($query_hapus){ 
		?>
			<script>
				alert("Hapus Berhasil !!!");
				location.href = "faq.php";
			</script>
		<?php
	}
?>