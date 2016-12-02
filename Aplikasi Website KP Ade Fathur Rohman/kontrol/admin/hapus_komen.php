<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../faq.php");
}
include "../database.php";

	$id 	= $_GET['id'];
	$query_hapus = mysql_query("delete from tb_komentar where id_komen ='$id'");
	if($query_hapus){ 
		?>
			<script>
				alert("Hapus Berhasil !!!");
				location.href = "komentar.php";
			</script>
		<?php
	}
?>