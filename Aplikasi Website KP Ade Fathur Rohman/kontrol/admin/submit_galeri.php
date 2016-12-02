<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';
if (isset($_POST['btn-uplod'])) {
		$id = $_POST['idnya'];
		$nama = $_POST['namanya'];
		$isi = $_POST['isinya'];		
		$poto=rand(10000,10000000)."-".$_FILES['potonya']['name'];
		$poto_lok=$_FILES['potonya']['tmp_name'];
		$folder="gmb/galeri/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);

		if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
		$sql1=mysql_query("INSERT into tb_galeri (id_poto, jls_poto, judul_poto, poto) 
			VALUES ('$id','$isi','$nama','$poto_final')");
		}		
}
	header("Location: galeri.php");
?>