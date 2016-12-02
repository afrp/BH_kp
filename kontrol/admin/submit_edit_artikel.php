<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['btn-uplod'])) {
		$id = $_POST['id'];
		$jud = $_POST['judul'];
		$isi = $_POST['isi'];
		$tgl = date("Y/m/d h:i:s");
		$aut=$_POST['pengirim'];
		$ket=$_POST['ket'];
		$poto=rand(1000,100000)."-".$_FILES['poto']['name'];
		$poto_lok=$_FILES['poto']['tmp_name'];
		$folder="gmb/artikel/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);
		if($_FILES['poto']['size'] > 0 && $_FILES['poto']['error'] == 0){

			if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
				$sql1 = mysql_query(" UPDATE tb_artikel SET judul_akl='$jud', isi_akl='$isi',gbr_write='$poto_final',
				nama_write='$aut', isi_write='$ket', tgl_input= '$tgl' WHERE id_akl='$id'");
			}
		}else{
				$sql1 =mysql_query(" UPDATE tb_artikel SET judul_akl='$jud', isi_akl='$isi',
				nama_write='$aut', isi_write='$ket', tgl_input= '$tgl' WHERE id_akl='$id'");		
		}
		
}
header("Location: artikel.php");
?>