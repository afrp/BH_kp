<?php
session_start();
include 'database.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$result = mysql_query("select * from tb_adm where user_adm='".$username."' and pass_adm='".$password."'");

$rowCheck = mysql_num_rows($result);

if ($rowCheck > 0) {
    $row = mysql_fetch_array($result);
    $gbr = $row['gambar_adm'];
    while (is_array($row)) {
        $_SESSION['username'] = $username;

        if (isset($_SESSION['username'])) {
            if ($row['level_adm'] == "admin") {
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin/index.php">';
                exit;
                $_SESSION['username'] = $username;
            } elseif ($row['level_adm'] == "Admin Super") {
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=user/index.php">';
                exit;
                $_SESSION['username'] = $username;
                
            }
        }
        if ($row['level_adm'] == "admin") {
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin/index.php">';
                exit;
                $_SESSION['username'] = $username;
            } elseif ($row['level_adm'] == "Admin Super") {
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=user/index.php">';
                exit;
                $_SESSION['username'] = $username;
                
            }
    }
} else {
    echo 'passwor salah saudara';
    
}
?>