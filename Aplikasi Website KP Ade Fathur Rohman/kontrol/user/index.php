<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>CMS Admin</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<style media="all" type="text/css">
@import "../css/all.css";
</style>
</head>
<body>
<div id="main">
  <div id="header"> <a href="#" class="logo"><img src="img/logo.gif" width="101" height="29" alt="" /></a>
    <ul id="top-navigation">
      <li class="active"><span><span>Homepage</span></span></li>
      <li><span><span><a href="#">Users</a></span></span></li>
      <li><span><span><a href="#">Orders</a></span></span></li>
      <li><span><span><a href="#">Settings</a></span></span></li>
      <li><span><span><a href="#">Statistics</a></span></span></li>
      <li><span><span><a href="#">Design</a></span></span></li>
      <li><span><span><a href="../logout.php">LogOut</a></span></span></li>
    </ul>
  </div>
  <div id="middle">
    <div id="left-column">
      <h3>Header</h3>
      <ul class="nav">
        <li><a href="#">Halaman Utama</a></li>
        <li><a href="#">Statistik</a></li>
        <li><a href="#">Tampilan</a></li>
        <li><a href="#">Kemarin</a></li>
        <li><a href="#">Survey</a></li>
      </ul>
      <a href="#" class="link">Link here</a> <a href="#" class="link">Link here</a> </div>
    <div id="center-column">
      <div class="top-bar"><h1>User</h1>
        <div class="breadcrumbs"><a href="#"><?php echo $_SESSION['username'] ?></a></div>
      </div>
      <br />
      
      <div class="row">
                    <div class="col-md-12">
                        Berhasil login user
                        <?php
                        include "../database.php";
                        $sql = "select *from user where username='" . $_SESSION['username'] . "'";
                        $result = mysql_query($sql);
                        $row=  mysql_fetch_array($result);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $row['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><?php echo $row['password']; ?></td>
                                </tr>
                                <tr>
                                    <td>Level</td>
                                    <td><?php echo $row['level']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?php echo $row['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $row['alamat']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </div>
      
    </div>
    <div id="right-column"> <strong class="h">INFO</strong>
      <div class="box">Web masih dalam tahap pengembangan, mohon maaf apabila anda terganggu dengan halaman yang kurang rapi, sekali kami minta maaf dan harap maklum </div>
    </div>
  </div>
  <div id="footer"></div>
</div>
</body>
</html>
