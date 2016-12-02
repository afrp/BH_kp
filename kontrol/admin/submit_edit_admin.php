<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';

if (isset($_POST['btn-uplod'])) {
		$user = $_POST['usernya'];
		$pass= $_POST['passnya'];
		$nama=$_POST['namanya'];
		$level = $_POST['levelnya'];
		$poto=rand(1000,100000)."-".$_FILES['potonya']['name'];
		$poto_lok=$_FILES['potonya']['tmp_name'];
		$folder="gmb/admin/";
		$poto_baru=strtolower($poto);
		$poto_final=str_replace('','-', $poto_baru);
		if($_FILES['poto']['size'] > 0 && $_FILES['poto']['error'] == 0){

			if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
				$sql1 = mysql_query(" UPDATE tb_adm SET pass_adm='$pass',  
				nama_adm='$nama', level_adm='$level', gambar_adm='$poto_final' WHERE user_adm='$user'");
			}
		}else{
				$sql1 = mysql_query(" UPDATE tb_adm SET pass_adm='$pass',  
				nama_adm='$nama', level_adm='$level' WHERE user_adm='$user'");
		}
		
}
header("Location: admin.php");
?>