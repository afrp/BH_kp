<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Artikel Rinci | Pesantren Baitul Hikmah</title>
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
    <script language='JavaScript' type='text/javascript'>
        function refreshCaptcha()
         {
         var img = document.images['captchaimg'];
         img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
         }
    </script>
</head><!--/head-->
<body>
<?php 
    
    include  'kontrol/database.php';
    include 'kontrol/sempit.php';  
 ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144716315690681";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

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
                    <h1>Artikel</h1>
                    <p></p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Artikel Lengkap</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">
                <!--<div class="widget search">
                    <form role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>/.search-->
            </aside>        
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <?php  
                           
                            $result= mysql_query("select * from tb_artikel where id_akl='". $_GET['id'] ."'");
                            while ($masuk=mysql_fetch_array($result)) {
                    ?>
                    <div class="blog-item">                        
                        <div class="blog-content">
                            <h3><h3><?php echo $masuk['judul_akl']; ?></h3>
                            <div class="entry-meta">                                
                                <span><i class="icon-calendar"></i> <?php echo $masuk['tgl_input']; ?></span>                                
                            </div>
                            <p><?php echo $masuk['isi_akl']; ?></p>
                            <hr>

                            <p>&nbsp;</p>
                            <div class="author well">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="avatar img-thumbnail" src="kontrol/admin/gmb/artikel/<?php echo $masuk['gbr_write'];?>" alt="" height="160" width="120">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <strong><?php echo $masuk['nama_write']; ?></strong>
                                        </div>
                                        <p><?php echo $masuk['isi_write']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div id="comments">
                            <?php
                            $id=$_GET['id']; 
                            $qomen= mysql_query(" select * from tb_komentar where id_akl='$id'");
                            $adm= mysql_query("select count(id_komen) as num from tb_komentar where id_akl='$id'");                            
                            $result1=mysql_fetch_assoc($adm);
                            $jmlkomen=$result1['num'];

                            ?>
                            <div id="comments-list">
                                    <h3><?php echo $jmlkomen;?> Comments</h3>
                                    <?php
                                    while ($bar=mysql_fetch_assoc($qomen)) {
                                    ?>
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="avatar img-circle" src="" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="well">
                                                <div class="media-heading">
                                                    <strong><?php echo $bar['nama'] ?></strong>&nbsp; <small><?php echo $bar['waktu_komen'] ?></small>
                                                </div>
                                                <p><?php echo $bar['komentar'] ?></p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <?php }?>
                   
                                </div>

                                <div id="comment-form">
                                    <h3>Tinggalkan Komentar</h3>
                                    <form class="form-horizontal" role="form" method="POST" action="kontrol/submit_komen.php">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="nama" placeholder="Nama" >
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" required="required" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <textarea rows="8" class="form-control" required="required" name="pesan" placeholder="Comment"></textarea>
                                            </div>
                                        </div>                                           
                                        <input type="hidden" class="form-control" name="id_art" value="<?php echo $id ?>" >
                                         <div class="controls">
                                                <img  src="generatecaptcha.php?rand=<?php echo rand(); ?>" id='captchaimg' > 
                                                <a href='javascript: refreshCaptcha();'><i class="icon-refresh icon-large"></i></a>                                                 
                                             </div>
                                             <div class="controls">
                                            <input id="code" name="code" type="text" placeholder="Masukan Kode Diatas" required></td>
                                            </div></br>
                                        <button type="submit" class="btn btn-danger btn-lg" value="kirim" name="submit">Submit Komentar</button>
                                    </form>
                                </div><!--/#comment-form-->
                            </div><!--/#comments-->
                        </div>
                    </div>
                    <?php
                }
                ?><!--/.blog-item-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->
   
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