<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pertanyaan | Pesantren Baitul Hikmah</title>
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
                    <h1>Pertanyaan</h1>
                    <p>Silahkan isi form untuk sekedar saran atau pertanyaan, in syaa allah kami akan menjawab.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li class="active">Pertanyaan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    
<?php
    include 'kontrol/database.php'; 
    $cari_kd=mysql_query("select max(id_tanya) as kode from tb_tanya");
    $lagi_cari=mysql_fetch_array($cari_kd);
    $kode=substr($lagi_cari['kode'], 2,5);
    $tambah=$kode+1;
    if ($tambah<10) {
        $id="TA00".$tambah;
    }elseif ($tambah<100) {
        $id="TA0".$tambah;
    }else{
        $id="TA".$tambah;
    }
?>
    <section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-8">
                <h4>Form Pertanyaan atau Saran</h4>
                <!--<div class="status alert alert-success" style="display: none"></div>-->
                <form class="form-horizontal" role="form" method="POST" action="kontrol/input_tanya.php">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="subjek" placeholder="Judul">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="email" placeholder="Alamat Email">
                            </div>
                            
                            <button type="submit" class="btn btn-danger btn-lg" value="kirim" name="submit">Submit</button>
                            
                        </div>
                        <div class="col-sm-7">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Isi Pertanyaan atau Saran"></textarea>
                        </div>
                        <input type="hidden" class="form-control" name="idnya" value="<?php echo $id ?>" >
                    </div>
                </form>
            </div><!--/.col-sm-8-->
            <div class="col-sm-4">
                <h4>Our Location</h4>
                <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.0405128574411!2d110.36205965093784!3d-7.827007748219426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1453301039576"></iframe>
            </div><!--/.col-sm-4-->
        </div>
    </section><!--/#contact-page-->

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