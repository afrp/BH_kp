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
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        selector : "textarea",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],

            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

            image_advtab: true ,
            relative_urls: false, 

    });
    </script>
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <a  class="navbar-brand" href="index.php">Admin Baitul Hikmah

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
                        <a  href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="artikel.php"><i class="fa fa-venus "></i>Artikel </a>
                        
                    </li>
                    
                    <li>
                        <a href="berita.php"><i class="fa fa-bolt "></i>Berita</a>
                        
                    </li>
                   
                     
                     <li>
                        <a class="active-menu" href="kegiatan.php"><i class="fa fa-code "></i>Kegiatan</a>
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
                        <h1 class="page-head-line">Edit Kegiatan</h1>
                    </div>
                </div>
                <?php 
    
    $id=$_GET['id'];
    $cari_kd=mysql_query("select * from tb_kegiatan where id_kgt='$id'");
    $pecah=mysql_fetch_array($cari_kd);
 ?>
            <div class="row">            
            <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-body">
                       <form role="form" method="POST" enctype="multipart/form-data" action="submit_edit_kgt.php">
                                      <div class="form-group">
                                        <label for="inputID">ID</label>
                                        <input type="text" class="form-control" id="id_bta" name="id" value="<?php echo $pecah['id_kgt']; ?>" readonly="readonly" />
                                      </div>
                                      <div class="form-group">
                                        <label for="judulBerita">Nama Kegiatan</label>
                                        <input type="text" class="form-control" id="nama_kgt" name="nama" placeholder="Nama Kegiatan" value="<?php echo $pecah['nama_kgt']; ?>"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="isiBerita">Isi Kegiatan</label>
                                        <textarea class="form-control" rows="3" id="isi_kgt" name="isi" placeholder="Isi Kegiatan"><?php echo $pecah['isi_kgt']; ?></textarea>
                                      </div>                                          
                                      <div class="form-group">
                                        <label for="exampleInputFile">Input Gambar Kegiatan</label><br/>
                                        <img src="gmb/keg/<?php echo $pecah['gbr_kgt']; ?>" alt="" width="200" height="150" /><br/><br/>
                                        <input type="file" id="poto_bta" name="poto" />
                                        <!--<p class="help-block">Example block-level help text here.</p>-->
                                      </div>                                      
                                      <button type="submit" class="btn btn-default" name="btn-uplod">Edit</button>
                                                               
                                    </form>
                            </div>
                            </div>
                    </div>

        <!-- /. PAGE WRAPPER  -->
            </div>
    </div>
    </div>
    </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2015 Baitul Hikmah| By : <a href="" target="_blank">DesignBootstrap</a>
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

<script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
</body>
</html>
