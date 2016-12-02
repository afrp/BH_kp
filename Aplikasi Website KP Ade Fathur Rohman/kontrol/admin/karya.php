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
                        <a href="kegiatan.php"><i class="fa fa-code "></i>Kegiatan</a>
                    </li>

                    <li>
                        <a class="active-menu" href="karya.php"><i class="fa fa-road "></i>Karya</a>
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
                        <h1 class="page-head-line">Data Karya</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                
                <div class="alert  alert-info">
                    <div class="current-notices">

                            <h4>Pencarian</h4>
                    <hr />
                           <form method="post">
                            <input type="text" class="form-control" id="cariArtikel" name="cari_art" placeholder="Masukan Kata Kunci" />
                            <button class="btn btn-success" id="cari" name="cari" value="Cari"><i class="fa fa-search"></i> Cari</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>

                        <a href="input_karya.php" class="btn btn-success btn-lg" id="tambah"><i class="fa fa-plus-circle"></i> Tambah Karya</a>
                          
                          <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>
            
                <div class="modal-body">
                    <p>Apakah Anda yakin akan menghapus data ini?</p>
                    <p>Data Mungkin tidak bisa dikembalikan</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Judul</th>
                                            <th>Penjelasan</th>
                                            <th>Gambar</th>
                                            <th></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $input_cari = @$_POST['cari_art']; 
                                        $cari = @$_POST['cari'];
                                        if($cari) {
                                        if($input_cari != "") {
                                        $sql = mysql_query("select *from tb_karya where id_karya LIKE '%$input_cari%' or judul_karya LIKE '%$input_cari%' or jelas_karya LIKE '%$input_cari%' or gbr_karya LIKE '%$input_cari%'") or die (mysql_error());   
                                        } else {
                                        $sql = mysql_query("select *from tb_karya") or die (mysql_error());
                                        }
                                        } else {
                                        $sql = mysql_query("select *from tb_karya") or die (mysql_error());
                                        }

                                       $cek = mysql_num_rows($sql);

                                       if($cek < 1) {
                                        ?>
                                        <tr>
                                          <td colspan="7" align="center style="padding:10px;""> Data Tidak Ditemukan</td>
                                         </tr>
                                    <?php
                                }else{
                                      while ($baris = mysql_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $baris['id_karya']; ?></td>
                                            <td><?php echo $baris['judul_karya']; ?></td>
                                            <td><?php echo $baris['jelas_karya']; ?></td>
                                            <td><a href="gmb/karya/<?php echo $baris['gbr_karya'] ?>" target="_blank">Lihat Foto</a></td>
                                            <td><a href="edit_karya.php?id=<?php echo $baris['id_karya']; ?>" class="btn btn-primary btn-xs">Edit</a>
                                            <a href="#" data-href="hapus_karya.php?id=<?php echo $baris['id_karya']; ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete">Hapus</a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                
                
            <!-- /. PAGE INNER  -->
        
        <!-- /. PAGE WRAPPER  -->
    </div>
    </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
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
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>
</body>
</html>
