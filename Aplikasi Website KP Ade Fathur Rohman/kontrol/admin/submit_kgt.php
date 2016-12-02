<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';
if (isset($_POST['btn-uplod'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$isi = $_POST['isinya'];		
		$poto=rand(1000,100000)."-".$_FILES['poto']['name'];
		$poto_lok=$_FILES['poto']['tmp_name'];
		$folder="gmb/keg/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);

		if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
		$sql1=mysql_query("INSERT into tb_kegiatan (id_kgt, nama_kgt, isi_kgt, gbr_kgt) 
			VALUES ('$id','$nama','$isi','$poto_final')");
		}
		
}

	header("Location: kegiatan.php");
?>