<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['btn-uplod'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$isi = $_POST['isi'];		
		$poto=rand(1000,1000000)."-".$_FILES['poto']['name'];
		$poto_lok=$_FILES['poto']['tmp_name'];
		$folder="gmb/karya/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);

		if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
		$sql1=mysql_query("INSERT into tb_karya (id_karya, judul_karya, jelas_karya, gbr_karya) 
			VALUES ('$id','$nama','$isi','$poto_final')");
		}
		
}

	header("Location: karya.php");
?>