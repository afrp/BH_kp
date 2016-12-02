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
		$head=$_POST['head'];
		$isi = $_POST['isi'];
		$tgl = date("Y/m/d h:i:s");
		$aut=$_POST['pengirim'];
		$poto=rand(1000,100000)."-".$_FILES['poto']['name'];
		$poto_lok=$_FILES['poto']['tmp_name'];
		$folder="gmb/berita/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);
		if($_FILES['poto']['size'] > 0 && $_FILES['poto']['error'] == 0){

			if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
				$sql1 = mysql_query(" UPDATE tb_berita SET judul_bta='$jud', head_bta='$head' ,gambar_bta='$poto_final', 
				isi_bta='$isi', pengirim='$aut', tgl_bta= '$tgl' WHERE id_bta='$id'");
			}
		}else{
				$sql1 = mysql_query(" UPDATE tb_berita SET judul_bta='$jud', head_bta='$head', 
				isi_bta='$isi', pengirim='$aut', tgl_bta= '$tgl' WHERE id_bta='$id'");		
		}
		
}
header("Location: berita.php");
?>