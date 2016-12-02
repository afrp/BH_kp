<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Karya | Pesantren Baitul Hikmah</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
<?php 
     
        include 'kontrol/database.php';
        include 'kontrol/sempit.php';
        $batas = 2;
        $pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
         
        if ( empty( $pg ) ) {
        $posisi = 0;
        $pg = 1;
        } else {
        $posisi = ( $pg - 1 ) * $batas;
        }
?>
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

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Karya</h1>
                    <p>Pesantren Baitul Hikmah</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>                        
                        <li class="active">Karya</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="pricing">
        <div class="container">
            <div class="center">
                <h2>Karya Pesantren Baitul Hikmah</h2>
                <p class="lead">Berisi penerjemahan buku buku mengenai kajian kajian islam kontemporer dan klasik</p>
            </div><!--/.center-->   
            <div class="gap"></div>
            <div id="pricing-table" class="row">
                <?php 
                    $baca = mysql_query("select * from tb_karya order by id_karya limit $posisi, $batas");
                    $no = 1+$posisi;
                    while ($lihat=mysql_fetch_array($baca)) {
                ?>
                <div class="col-lg-12 col-xs-6">
                    <ul class="plan plan1">  
                        <li class="plan-name">
                            <h3><?php echo $lihat['judul_karya']; ?></h3>
                        </li>
                        <li >
                            <div class="">
                                <img src="kontrol/admin/gmb/karya/<?php echo $lihat['gbr_karya']; ?>" class="img-responsive img-thumbnail" height="180" width="150">
                            </div>
                        </li>
                        <li>
                            <p><?php echo readmore(rapikan($lihat['jelas_karya']));?></p>
                        </li>
                        <li>
                            <a class="btn btn-default" href="karya-item.php?id=<?php echo $lihat['id_karya'] ?>">Read More <i class="icon-angle-right"></i></a>
                        </li> 
                    </ul>
                </div><!--/.col-md-3-->
                        <?php
                        $no++;
                    }
                    ?>
                    <ul class="pagination pagination-sm">
                        <?php
                        $jml_data = mysql_num_rows(mysql_query("SELECT * FROM tb_berita"));
                        
                        $JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
                         
                        //Navigasi ke sebelumnya
                        if ( $pg > 1 ) {
                        $link = $pg-1;
                        $prev = "<a href='?pg=$link'>Sebelumnya </a>";
                        } else {
                        $prev = "Sebelumnya ";
                        }
                         
                        //Navigasi nomor
                        $nmr = '';
                        for ( $i = 1; $i<= $JmlHalaman; $i++ ){
                         
                        if ( $i == $pg ) {
                        $nmr .= $i . " ";
                        } else {
                        $nmr .= "<a href='?pg=$i'>$i</a> ";
                        }
                        }
                         
                        //Navigasi ke selanjutnya
                        if ( $pg < $JmlHalaman ) {
                        $link = $pg + 1;
                        $next = " <a href='?pg=$link'>Selanjutnya</a>";
                        } else {
                        $next = " Selanjutnya";
                        }
                        ?>
                        <?php echo  $prev,$nmr,$next ?>
                        
                    </ul>
            </div> 
        </div>
    </section><!--/#pricing-->

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