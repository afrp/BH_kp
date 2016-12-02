<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['btn-uplod'])) {
		$id = $_POST['id'];
		$judul=$_POST['judul'];
		$nama=$_POST['nama'];
		$email=$_POST['email'];
		$isi = $_POST['isi'];
		$jawab=$_POST['jawab'];		

		$sql1 = mysql_query(" UPDATE tb_tanya SET judul_tanya='$judul', nama_tanya='$nama',email_tanya='$email', 
				isi_tanya='$isi', jawab_tanya='$jawab' WHERE id_tanya='$id'");
		
		
}
header("Location: faq.php");
?>