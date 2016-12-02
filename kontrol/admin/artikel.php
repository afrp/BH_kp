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

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]
    <link rel="stylesheet" href="assets/js/colorbox.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.colorbox.js"></script>-->
    
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
                        <a  href="#"> <strong> <b> <?php echo $_SESSION['username'] ?> </b></strong></a>
                    </li>

                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="artikel.php"><i class="fa fa-venus "></i>Artikel </a>
                        
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
                        <h1 class="page-head-line">Data Artikel</h1>
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
                        <a href="input_artikel.php" class="btn btn-success btn-lg" id="tambah"><i class="fa fa-plus-circle"></i> Tambah Artikel</a>
                          
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
                                            <th>Isi</th>                                            
                                            <th>Penulis</th>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $input_cari = @$_POST['cari_art']; 
                                        $cari = @$_POST['cari'];
                                        if($cari) {
                                        if($input_cari != "") {
                                        $sql = mysql_query("select * from tb_artikel where id_akl LIKE '%$input_cari%' or judul_akl LIKE '%$input_cari%' or isi_akl LIKE '%$input_cari%' or nama_write LIKE '%$input_cari%' order by tgl_input DESC") or die (mysql_error());   
                                        } else {
                                        $sql = mysql_query("select * from tb_artikel  order by tgl_input DESC") or die (mysql_error());
                                        }
                                        } else {
                                        $sql = mysql_query("select * from tb_artikel  order by tgl_input DESC") or die (mysql_error());
                                        }

                                       $cek = mysql_num_rows($sql);

                                       if($cek < 1) {
                                        ?>
                                        <tr>
                                          <td colspan="7" align="center style="padding:10px;""> Data Tidak Ditemukan</td>
                                         </tr>
                                    <?php
                                }else{
                                      while ($row = mysql_fetch_array($sql)) {
                                      ?>
                                        <tr>
                                            <td><?php echo $row['id_akl']; ?></td>
                                            <td><?php echo $row['judul_akl']; ?></td>
                                            <td><a href="" class="edit-record" data-id="<?php echo $row['id_akl']; ?>" data-target="#edit-record">lihat Artikel</a></td>
                                            
                                            <td><?php echo $row['nama_write']; ?></td>
                                            <td><p><a class="group2" href="gmb/artikel/<?php echo $row['gbr_write'] ?>">Lihat Foto</a></p></td>
                                            <td><?php echo $row['isi_write']; ?></td>
                                            <td><a href="edit_artikel.php?id=<?php echo $row['id_akl']; ?>" class="btn btn-primary btn-xs">Edit</a>
                                            <a href="" data-href="hapus_artikel.php?id=<?php echo $row['id_akl']; ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete">Hapus</a></td>
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
    <?php include "hasil.php" ?>
    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS 
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    
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
