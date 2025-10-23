<?php
session_start();
include 'konek.php';
$level = "pemohon";

// profil
$profil = mysqli_fetch_array(mysqli_query($konek, "select * from profil"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pelayanan Surat Keterangan Online Kelurahan Tanjakan </title>
    <!-- core CSS -->
    <link href="main/css/bootstrap.min.css" rel="stylesheet">
    <link href="main/css/font-awesome.min.css" rel="stylesheet">
    <link href="main/css/animate.min.css" rel="stylesheet">
    <link href="main/css/owl.carousel.css" rel="stylesheet">
    <link href="main/css/owl.transitions.css" rel="stylesheet">
    <link href="main/css/prettyPhoto.css" rel="stylesheet">
    <link href="main/css/main.css" rel="stylesheet">
    <link href="main/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Riot&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        #cta2 {
            background: #242a33 url(demo1/img/foto_depan_baldes.jpeg) no-repeat 50% 50%;
            background-size: cover;
            color: #fff;
            padding-top: 70px;
        }

        .titleLogo {
            font-family: monospace;
        }
    </style>
</head>
<!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="margin-top: 15px; color:black; font-weight:bold;" href="index.php"><span class="titleLogo">Balai Desa Tanjakan</span></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Beranda</a></li>
                        <li class="scroll"><a href="#portfolio">Profil</a></li>
                        <li class="scroll"><a href="#meet-team">Pengumuman</a></li>
                        <li class="scroll"><a href="#features">Jadwal</a></li>
                        <li class="scroll"><a href="#services">Informasi</a></li>
                        <li class="scroll"><a href="pegawai.php">Pegawai</a></li>
                        <li class="scroll"><a href="#get-in-touch">Lokasi</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->

    <section id="cta2">
        <div class="container" style="min-height: 500px;">
            <div class="text-center">
                <img src="main/img/logo banten2.png" width="125px">
                <h2 class="wow fadeInUp" style="color: yellow;" data-wow-duration="300ms" data-wow-delay="0ms"><span style="color: yellow;">PELAYANAN</span> SURAT KETERANGAN <br> DESA Tanjakan</h2>
                <p class="wow fadeInUp" style="color: red; font-weight:bold;" data-wow-duration="300ms" data-wow-delay="100ms">KLIK LOGIN UNTUK REQUEST PEMBUATAN SURAT KETERANGAN ONLINE</p>
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms"">
                           <!-- Button trigger modal -->
                           <a href=" login.php" type="submit" class="btn btn-md btn-warning">Login</a>
                            <a href="register.php" type="submit" class="btn btn-md btn-warning">Daftar</a>
                        </div>
                    </div>
                </div>
                <!-- <img class="img-responsive wow fadeIn" src="main/images/cta2/cta2-img.png" alt="" data-wow-duration="300ms" data-wow-delay="300ms"> -->
            </div>
        </div>
    </section>


    <section id="portfolio">
        <div class="container" style="margin-top: 30px;">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Profil</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="dataFoto/profil/<?= $profil['poto']; ?>" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="media-body">
                            <p><?=isset($profil['text']) ? $profil['text'] : 'Dokumen yang berisi informasi menyeluruh tentang suatu desa,mencakup aspek geografis,demografis,sosial budaya, hingga visi dan misi.'; ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="meet-team">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Pengumuman</h2>
            </div>

            <div class="row">
                <div class="features">
                    <?php
                    $query = mysqli_query($konek, "select * from pengumuman");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-md-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                            <div class="media service-box">
                                <div class="card" style="background-color:#f5f5f5;padding:20px;">
                                    <img class="card-img-top" src="dataFoto/pengumuman/<?= $data['poto']; ?>" alt="Card image cap" width="50px">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $data['judul']; ?></h5>
                                        <p class="card-text"><?= substr($data['isi'], 0, 10);; ?></p>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $data['id_pengumuman']; ?>">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $data['id_pengumuman']; ?>" ...>
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pengumuman</h5>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <img src="dataFoto/pengumuman/<?= $data['poto']; ?>" width="50%" alt="">
                                        </center>
                                        <h4 class="text-center">Judul : <?= $data['Judul']; ?></h4>
                                        <hr>
                                        <p><?= $data['isi']; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    <?php
                    } //
                    ?>
                    <!--/.col-md-4-->
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#services-->

    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Waktu Pelayanan</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="main/img/attendance.png" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <img src="main/img/clock.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">SENIN - KAMIS</h4>
                            <p>07.00 - 14.00 WIB</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <img src="main/img/clock.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">JUM'AT</h4>
                            <p>07.00 - 11.00 WIB</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <img src="main/img/clock.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">SABTU - MINGGU</h4>
                            <p>LIBUR</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Prosedur Permohonan Surat</h2>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="main/img/number.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Login</h4>
                                <p>Pemohon Surat melakukan login, melalui halaman Login.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="main/img/number2.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Menginput Data</h4>
                                <p>Input data pemohon dengan sebelumnya melakukan Login dengan username dan password.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="main/img/number3.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Mengajukan Surat Permohonan</h4>
                                <p>Setelah input data pemohon dengan lengkap dan benar, Pemohon memilih Surat yang mau direquest serta melengkapi data request, Kemudian Dikirim dan Menunggu persetujuan dari Staff.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="main/img/number4.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Permohonan Disetujui</h4>
                                <p>Permohonan di setujui oleh Staff, kemudian Staff akan mencetak surat sesuai request surat yang diajukan, pemohon mengambil surat yang sudah dicetak dan bertandatangan di Kantor Balai Desa Tanjakan.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#services-->

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">LOKASI</h2>
            </div>
        </div>
    </section>
    <!--/#get-in-touch-->


    <section id="contact">
        <div>
            <iframe src="https://www.google.com/maps/embed?qXzKqkWocKdAQGfc9" width="100%" height="650px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y'); ?> KANTOR BALAI DESA Tanjakan, kecamatan rajeg, Kab tangerang,Provinsi Banten,
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="https://www.instagram.com/fachrishofiyyuddin/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100005519746461" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCzdAstXxirdPWsTcdyl9DQg" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://github.com/fachrishofiyyuddin" target="_blank"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script src="main/js/jquery.js"></script>
    <script src="main/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="main/js/owl.carousel.min.js"></script>
    <script src="main/js/mousescroll.js"></script>
    <script src="main/js/smoothscroll.js"></script>
    <script src="main/js/jquery.prettyPhoto.js"></script>
    <script src="main/js/jquery.isotope.min.js"></script>
    <script src="main/js/jquery.inview.min.js"></script>
    <script src="main/js/wow.min.js"></script>
    <script src="main/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</body>

</html>