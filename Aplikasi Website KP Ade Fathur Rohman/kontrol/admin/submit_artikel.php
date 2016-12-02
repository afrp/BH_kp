<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';
date_default_timezone_set("Asia/Jakarta");
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

		if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
		$sql1=mysql_query("INSERT into tb_artikel (id_akl, judul_akl, isi_akl,gbr_write, nama_write,isi_write, tgl_input) 
			VALUES ('$id','$jud','$isi', '$poto_final','$aut','$ket','$tgl')");
		}
		

	header("Location: artikel.php");
?>