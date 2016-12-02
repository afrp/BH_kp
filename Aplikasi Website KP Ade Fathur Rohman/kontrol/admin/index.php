<?php
session_start();
if (!$_SESSION['username']) {
    header("Location: ../index.html");
}
include '../database.php';
$usern=$_SESSION['username'];
$res=mysql_query("select * from tb_adm where user_adm='".$usern."'");
$arai=mysql_fetch_array($res);
$man=$arai['gambar_adm'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Baitulhikmah</title>
    
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
    <link href="assets/css/style.css" rel="stylesheet" />
     
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="index.php">Admin BaitulHikmah 

                </a>
            </div>

            <div class="notifications-wrapper">
<ul class="nav">                                  
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user-plus"></i> My Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
               
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="gmb/admin/<?php echo $man ?>" class="img-circle" width="120px" hight="150px" />

                           
                        </div>

                    </li>
                     <li>
                        <a  href="#"> <strong> <?php echo $_SESSION['username'] ?> </strong></a>
                    </li>

                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a  href="artikel.php"><i class="fa fa-venus "></i>Artikel </a>
                        
                    </li>
                    
                    <li>
                        <a href="berita.php"><i class="fa fa-bolt "></i>Berita</a>
                        
                    </li>
                   
                     
                     <li>
                        <a href="kegiatan.php"><i class="fa fa-code "></i>Kegiatan</a>
                    </li>

                    <li>
                        <a href="karya.php"><i class="fa fa-road "></i>Karya</a>
                    </li>

                    <li>
                        <a href="galeri.php"><i class="fa fa-inbox "></i>Galeri</a>
                    </li>
                                       
                    <li>
                        <a href="faq.php"><i class="fa fa-flag "></i>FAQ</a>
                    </li>
                   <li>
                        <a href="profil.php"><i class="fa fa-dashcube "></i>Profil</a>
                    </li>
                    <li>
                        <a href="admin.php"><i class="fa fa-key "></i>Admin</a>
                    </li>
                   <li>
                        <a href="komentar.php"><i class="fa fa-code "></i>Komentar</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            Selamat Datang admin, ini adalah jumlah seluruh data yang ada pada Tabel.
                        </div>
                    </div>
                </div>
                <?php 
                    
                    $berita = 'select count(id_bta) as num from tb_berita';
                    $artikel= 'select count(id_akl) as num from tb_artikel';
                    $kegiatan= 'select count(id_kgt) as num from tb_kegiatan';
                    $karya= 'select count(id_karya) as num from tb_karya';
                    $galeri='select count(id_poto) as num from tb_galeri';
                    $faq='select count(id_tanya) as num from tb_tanya';
                    $adm= 'select count(user_adm) as num from tb_adm';
                    $komen= 'select count(id_komen) as num from tb_komentar';
                    
                    $hasil1=mysql_query($berita);
                    $result1=mysql_fetch_assoc($hasil1);
                    $jmlberita=$result1['num'];
                    
                    $hasil2=mysql_query($artikel);
                    $result2=mysql_fetch_assoc($hasil2);
                    $jmlartikel=$result2['num'];

                    $hasil3=mysql_query($kegiatan);
                    $result3=mysql_fetch_assoc($hasil3);
                    $jmlkegiatan=$result3['num'];

                    $hasil4=mysql_query($karya);
                    $result4=mysql_fetch_assoc($hasil4);
                    $jmlkarya=$result4['num'];

                    $hasil5=mysql_query($galeri);
                    $result5=mysql_fetch_assoc($hasil5);
                    $jmlgaleri=$result5['num'];

                    $hasil6=mysql_query($faq);
                    $result6=mysql_fetch_assoc($hasil6);
                    $jmlfaq=$result6['num'];

                    $hasil7=mysql_query($adm);
                    $result7=mysql_fetch_assoc($hasil7);
                    $jmladm=$result7['num'];

                    $hasil8=mysql_query($komen);
                    $result8=mysql_fetch_assoc($hasil8);
                    $jmlkomen=$result8['num'];


                ?>
                <div class="row">
            <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-one">
                            <a href="#">
                                <span><?php echo $jmlberita  ?></span>
                                 <h3>Berita</h3>
                            </a>
                        </div>
                        </div>
              <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-two">
                            <a href="#">
                                <span ><?php echo $jmlartikel ?></span>
                                 <h3>Artikel</h3>
                            </a>
                        </div>
                        </div>
             <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-three">
                            <a href="#">
                                <span ><?php echo $jmlkegiatan ?></span>
                                 <h3>Kegiatan</h3>
                            </a>
                        </div>
                        </div>
              <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-four">
                            <a href="#">
                                <span ><?php echo $jmlkarya ?></span>
                                <h3>Karya</h3>
                            </a>
                        </div>
                        </div>
                <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-one">
                            <a href="#">
                                <span ><?php echo $jmlgaleri ?></span>
                                <h3>Galeri</h3>
                            </a>
                        </div>
                        </div>
                <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-two">
                            <a href="#">
                                <span ><?php echo $jmlfaq ?></span>
                                <h3>FAQ</h3>
                            </a>
                        </div>
                        </div>
                <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-three">
                            <a href="#">
                                <span ><?php echo $jmladm ?></span>
                                <h3>Admin</h3>
                            </a>
                        </div>
                        </div>
                <div class=" col-md-3 col-sm-3">
                <div class="style-box-one Style-one-clr-four">
                            <a href="#">
                                <span ><?php echo $jmlkomen ?></span>
                                <h3>Komentar</h3>
                            </a>
                        </div>
                        </div>  
            </div>
        </div>
        
    </div>
        </div>
   
    <footer >
        &copy; 2015 Baitul Hikmah |  <a href="http://www.designbootstrap.com/" target="_blank"></a>
    </footer>
    
    <script src="assets/js/jquery-1.11.1.js"></script>
   
    <script src="assets/js/bootstrap.js"></script>
    
    <script src="assets/js/jquery.metisMenu.js"></script>
    
    <script src="assets/js/custom.js"></script>


</body>
</html>
