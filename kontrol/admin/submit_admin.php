<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';

if (isset($_POST['btn-uplod'])) {
	$user = $_POST['usernya'];
	$password = md5($_POST['passnya']);
	$nama=$_POST['namanya'];
	$level=$_POST['levelnya'];
	$poto=rand(1000,100000)."-".$_FILES['potonya']['name'];
	$poto_lok=$_FILES['potonya']['tmp_name'];
	$folder="gmb/admin/";
	$poto_baru=strtolower($poto);
	$poto_final=str_replace('','-', $poto_baru);

		$sql = mysql_query("SELECT * from tb_adm where user_adm='$user'");
		if(mysql_num_rows($sql)==0){
		    if (move_uploaded_file($poto_lok, $folder.$poto_final)) {
				$sql1=mysql_query("INSERT into tb_adm (user_adm, pass_adm, nama_adm, level_adm, gambar_adm) 
				VALUES ('$user','$password', '$nama', '$level','$poto_final')");
			}
		}else{
			?>
		    <script>
				alert("User sudah digunakan");
				location.href = "admin.php";
			</script>
		<?php
		}

}
header("Location: admin.php");


?>