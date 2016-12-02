<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Pesantren Baitul Hikmah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">         
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="sejarah.php">Sejarah</a></li>
                            <li><a href="visi.php">Visi dan misi</a></li>
                            <li><a href="pengasuh.php">Pengasuh</a></li>
                        </ul>
                    </li>
                    <li><a href="kegiatan.php">Kegiatan</a></li>
                    <li><a href="karya.php">Karya</a></li>
                    <li><a href="galeri.php">Galeri</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">FAQ <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog.php">Artikel</a></li>
                            <li><a href="berita.php">Berita</a></li>
                            <li><a href="faq.php">Pertanyaan</a></li>                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header><!--/header-->
    <?php 
    include 'kontrol/database.php';
    $per_page = 2;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $per_page;
    $sql= "select * from tb_berita order by tgl_bta desc limit 1, $per_page";
    $queri= mysql_query($sql);
    $queri2= mysql_query("select * from tb_berita order by tgl_bta desc limit 0, 1");
    $awal=mysql_fetch_assoc($queri2);
    ?>
    <section id="main-slider" class="no-margin">
        <div class="carousel slide wet-asphalt">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"> </li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="item active" style="background-image: url(kontrol/admin/gmb/berita/<?php echo $awal['gambar_bta']; ?>)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content centered">
                                    <h2 class="animation animated-item-1"><a href="berita-item.php?id=<?php echo $awal['id_bta'] ?>"><?php echo $awal['judul_bta']; ?></a></h2>
                                    <p class="animation animated-item-2"><?php echo $awal['head_bta']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                while($masuk=mysql_fetch_array($queri)) { 
                
             ?>
                <div class="item" style="background-image: url(kontrol/admin/gmb/berita/<?php echo $masuk['gambar_bta']; ?>)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content centered">
                                    <h2 class="animation animated-item-1"> <a href="berita-item.php?id=<?php echo $masuk['id_bta'] ?>"><?php echo $masuk['judul_bta']; ?></a></h2>
                                    <p class="animation animated-item-2"><?php echo $masuk['head_bta']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }                
            ?>
                
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="icon-angle-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="icon-angle-right"></i>
        </a>
    </section><!--/#main-slider-->
 <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center">
                        <h2>ARTIKEL ILMIAH</h2>
                        <p>Artikel, Opini, Karya Ilmiah Pesantren Baitul Hikmah</p>
                    </div>
                    <?php 
                        $per_baris = 4;
                        $baris = (isset($_GET['baris'])) ? (int)$_GET['baris'] : 1;
                        $mulai = ($baris - 1) * $per_baris;
                        $sql1= "select * from tb_artikel order by tgl_input desc limit $mulai, $per_baris";
                        $queri1= mysql_query($sql1);                    

                    ?>
                    <div class="gap"></div>
                    <div class="row">
                <?php                                               
                            while($abis=mysql_fetch_assoc($queri1)) { 
                      ?>
                <div class="col-md-3 col-xs-6">
                    <div class="center">
                        <p><a href="blog-item.php?id=<?php echo $abis['id_akl'] ?>"><?php echo $abis['judul_akl'] ?></a></p>
                        <p><img class="img-responsive img-thumbnail img-circle" src="kontrol/admin/gmb/artikel/<?php echo $abis['gbr_write'] ?>" height="260px" width="160px" alt="" ></p>
                        <h5><small class="designation muted">Oleh </small><?php echo $abis['nama_write'] ?></h5>
                        
                    </div>
                </div>
                <?php
                }
                ?>
                
            </div><!--/.row-->
                </div>
            </div>
        </div>
    </section><!--/#testimonial-->

    <section id="testimonial" class="alizarin">
        <div class="container">
                    <div class="center">
                        <h2>Berita Lainnya</h2>
                        <p></p>
                    </div>
                    <?php 
                        $sql_lain= "select * from tb_berita order by tgl_bta desc limit 0, 4";
                        $queri_lain= mysql_query($sql_lain);
                    ?>
                     <div class="gap"></div>
                     <div class="row">
                      <?php
                            while($abus=mysql_fetch_array($queri_lain)) { 
                      ?>  
                        <div class="col-md-6">
                            <blockquote>
                                <p><a href="berita-item.php?id=<?php echo $abus['id_bta'] ?>"><?php echo $abus['judul_bta']; ?></a></p>
                                <small>oleh <cite title="Source Title"><?php echo $abus['head_bta']; ?></cite></small>
                            </blockquote>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
        </div>
    </section><!--/#recent-works-->

   

    <section id="bottom" class="wet-asphalt">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>Tentang Kami</h4>
                    <p>Pesantren Hikmah Yogyakarta merupakan sebuah asrama yang dihuni oleh mahasiswa yang ingin mengembangkan kemampuan bahasa utamanya bahasa inggris, selain itu sebagai tempat Diskusi berbagai macam bidang ilmu yang dimiliki para santri. serta tempat mengkaji kitab Kuning</p>
                    <p></p>
                </div><!--/.col-md-3-->                

                
                <div class="col-md-3 col-sm-6" >
                    <h4>Alamat</h4>
                    <address>
                        <strong>Pesantren Baitul Hikmah</strong><br>
                        Blok Krapyak Kulon No. 177<br>
                        Kel. Panggugharjo Kec. Sewon<br>
                        Bantul 55188<br>
                        <abbr title="Phone">P:</abbr> (0274) 000-0000
                    </address>
                    
                </div> <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a target="_blank" href="http://pesantrenbaitulhikmahjogja.com" title="">BaitulHikmah</a>.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>