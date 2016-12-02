<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LogIn</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
	h1 {text-align:center; animation-name:!important; text-shadow:#0C3; text-outline:#006;}
	h2{text-align:center; animation-iteration-count:!important; text-decoration:blink; border-color:#0C3;}
	.form-group {text-align:center;}
	
</style>
</head>

<body>
<!--
<?php
session_start();
include 'database.php';
 
if(!empty($_POST)){
     
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "select * from user where username='".$username."' and password='".$password."'";
    #echo $sql."<br />";
    $query = mysql_query($sql) or die (mysql_error());
 
    // pengecekan query valid atau tidak
    if($query){
        $row = mysql_num_rows($query);
         
        // jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $_SESSION['isLoggedIn']=1;
            $_SESSION['username']=$username;
            header('Location: index.php');
        }else{
            echo "username atau password salah";
        }
    }
}
?>-->
<h1> Selamat Datang</h1>
<h2>Silakan masukan ID anda untuk masuk</h2>
<form action="lempar_login.php" method="post">
<div class="form-group">
<input type="text" name="username" placeholder="masukan nama">
<input type="password" name="password" placeholder="masukan password">
<input type="submit" value="login">
</div>
</form>
</body>
</html>