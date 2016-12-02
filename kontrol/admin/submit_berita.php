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
		$het=$_POST['hed'];
		$poto=rand(1000,100000)."-".$_FILES['poto']['name'];
		$poto_lok=$_FILES['poto']['tmp_name'];
		$folder="gmb/berita/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);

		if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
		$sql1=mysql_query("INSERT into tb_berita (id_bta, judul_bta, head_bta, gambar_bta, isi_bta, tgl_bta, pengirim) 
			VALUES ('$id','$jud', '$het', '$poto_final','$isi','$tgl','$aut')");
		}
		


	header("Location: berita.php");
?>