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
		$folder="gmb/keg/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);
		if($_FILES['poto']['size'] > 0 && $_FILES['poto']['error'] == 0){

			if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
				$sql1 = mysql_query(" UPDATE tb_kegiatan SET nama_kgt='$nama', gbr_kgt='$poto_final', 
				isi_kgt='$isi' WHERE id_kgt='$id'");
			}
		}else{
				$sql1 = mysql_query(" UPDATE tb_kegiatan SET nama_kgt='$nama', 
				isi_kgt='$isi' WHERE id_kgt='$id'");
		}
		
}
header("Location: kegiatan.php");
?>