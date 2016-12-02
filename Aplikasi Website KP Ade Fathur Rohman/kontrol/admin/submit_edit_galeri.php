<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['btn-uplod'])) {
		$id = $_POST['id'];
		$nama=$_POST['nama'];
		$isi = $_POST['isi'];
		$poto=rand(1000,100000)."-".$_FILES['poto']['name'];
		$poto_lok=$_FILES['poto']['tmp_name'];
		$folder="gmb/galeri/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);
		if($_FILES['poto']['size'] > 0 && $_FILES['poto']['error'] == 0){

			if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
				$sql1 = mysql_query(" UPDATE tb_galeri SET judul_poto='$nama',  
				jls_poto='$isi', poto='$poto_final' WHERE id_poto='$id'");
			}
		}else{
				$sql1 = mysql_query(" UPDATE tb_galeri SET judul_poto='$nama', 
				jls_poto='$isi' WHERE id_poto='$id'");
		}
		
}
header("Location: galeri.php");
?>