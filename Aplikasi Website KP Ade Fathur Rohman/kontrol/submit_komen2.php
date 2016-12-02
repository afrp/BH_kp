<?php
session_start();
include 'database.php';
require_once 'function.php';

date_default_timezone_set("Asia/Jakarta");
if($_POST["submit"]=="kirim")
{
$nama=$_POST["nama"];
$email=$_POST["email"];
$komentar=$_POST["pesan"];
$art_id=$_POST["id_art"];
$tgl = date("Y/m/d h:i:s");
$emai = check_email($_POST['email']);

if(empty($nama))
$nama='anonymous';

if (!$emai) {                                            
echo "<meta http-equiv='refresh' content='3; url=../berita-item.php?id={$art_id}'>";
die("<script> alert('format email anda Tidak Sesuai');</script>");
}                                        }

if(empty($komentar)){
echo "<meta http-equiv='refresh' content='3; url=../berita-item.php?id={$art_id}'>";
die("<script> alert('Komentarnya Silahkan di isi Dulu');</script>");
}

if(strcmp($_SESSION['code'], $_POST['code']) != 0)
    {
 		echo "<meta http-equiv='refresh' content='3; url=../berita-item.php?id={$art_id}'>";
	die("<script> alert('Kode Captcha Tidak Sama');</script>");   
    }
 
$sql=mysql_query("INSERT INTO tb_komentar (id_akl, nama, email, komentar, waktu_komen)
VALUES ('$art_id','$nama','$email', '$komentar','$tgl')");
 
if($sql){ 
		?>
			<script>
				alert("Koment berhasil masuk !!!");
				location.href = "../berita-item.php?id=<?php echo $art_id?>";
			</script>
		<?php
	}

?>