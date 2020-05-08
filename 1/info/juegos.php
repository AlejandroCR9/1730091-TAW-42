<?php 
    include_once "../conn.php";
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Gaming Center</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="../css/reset.css">
        <link type="text/css" rel="stylesheet" href="../css/plugins.css">
        <link type="text/css" rel="stylesheet" href="../css/style.css">
        <link type="text/css" rel="stylesheet" href="../css/yourstyle.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="../img/icon.png">
    </head>
    <body>
        <div class="loader">
            <div class="tm-loader">
                <div id="circle"></div>
            </div>
        </div>
        <!--================= main start ================-->
        <div id="main">
            <!--=============== header ===============-->
            <header>
                <!-- Nav button-->
                <div class="nav-button">
                    <span  class="nos"></span>
                    <span class="ncs"></span>
                    <span class="nbs"></span>
                </div>
                <!-- Nav button end -->
                <!-- Logo--> 
                <div class="logo-holder">
                    <a href="index.html" class="ajax"><img src="../img/logo.png" alt=""></a>
                </div>
                <!-- Logo  end--> 			
            </header>
            <!-- Header   end-->
            <!--=============ra== wrapper ===============-->
            <div>
                <!--=============== content-holder ===============-->
                <div class="content-holder elem scale-bg2 transition3">
                    <!--  Content  --> 
                    <div class="content ">
                        <section class="no-padding no-border">
                            <!-- fixed-info-container -->
                            <div class="fixed-info-container">
                                <!-- Filters-->
                                <div class="filter-holder filter-vis-column">
                                    <div class="gallery-filters">
                                        <a href="../login.php" >Ir al sitio</a>		
                                        <a href="torneos.php">Torneos</a>
                                        <a href="plataformas.php" >Plataformas</a>
                                        <a href="juegos.php" class="gallery-filter gallery-filter-active">Juegos</a>
                                        <a href="../index.php" >Regresar</a>
                                    </div>
                                </div>
                                <!-- Filters end -->
                            </div>
                            <!-- fixed-info-container end-->
                            <!-- filters end -->
                            <!-- resize-carousel-holder-->
                            <div class="resize-carousel-holder vis-info">
                                <!-- gallery-items -->
                                <div class="gallery-items   hid-port-info">
                                <?php foreach ($conn->query('SELECT j.titulo AS titulo, p.nombre AS plataforma, SUBSTRING(j.rutaImagen, 4) AS imagen FROM juegos j INNER JOIN plataformas p ON j.idPlataforma = p.idPlataforma') as $row){ ?>
                                    <!-- 1 -->
                                    <div class="gallery-item houses apartments">
                                        <div class="grid-item-holder">
                                            <div class="box-item">
                                                <div class="wh-info-box">
                                                    <div class="wh-info-box-inner at">
                                                        <a href="portfolio-single.html" class="ajax">
                                                        <?php echo $row['titulo'] ?>                                               
                                                        </a>
                                                        <span class="folio-cat">Plataforma: <?php echo $row['plataforma'] ?></span>
                                                    </div>
                                                </div>
                                                <img style="width:300px; height:200px;" src="<?php echo $row['imagen'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 1 end -->
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- end gallery items -->
                            </div>
                        </section>
                    </div>
                    <!--  Content  end --> 
                </div>
                <!-- Content holder  end -->
            </div>
            <!-- wrapper end -->
        </div>
        <!-- Main end -->
        <!--=============== google map ===============-->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY" type="text/javascript"></script> 
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/plugins.js"></script>
        <script type="text/javascript" src="../js/core.js"></script>
        <script type="text/javascript" src="../js/scripts.js"></script>
    </body>
</html>