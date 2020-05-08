<?php
  include_once "conn.php";
  
    $sql = "SELECT COUNT(*) FROM torneos WHERE idEstatus=1";
    $result = mysqli_query($conn, $sql);
    $torneos = mysqli_fetch_array($result);

    $sql = "SELECT COUNT(*) FROM plataformas";
    $result = mysqli_query($conn, $sql);
    $plataformas = mysqli_fetch_array($result);

    $sql = "SELECT COUNT(*) FROM juegos";
    $result = mysqli_query($conn, $sql);
    $juegos = mysqli_fetch_array($result);
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
        <link type="text/css" rel="stylesheet" href="css/reset.css">
        <link type="text/css" rel="stylesheet" href="css/plugins.css">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/yourstyle.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="img/icon.png">
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
                			
            </header>
            <!-- Header   end-->
            <!--=============== wrapper ===============-->		
            <div id="wrapper">
                <!--=============== content-holder ===============-->
                <div class="content-holder elem scale-bg2   no-padding">
                     
                    <!--  Content -->
                    <div class="content full-height no-padding home-content ">
                        <!--full-height wrap -->
                        <div class="full-height-wrap">
                            <div class="customNavigation fhsln">
                                <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                                <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                            </div>
                            <!--slideshow-holder -->
                            <div class="synh-slider-holder">
                                <div class="overlay"></div>
                                <div class="synh-slider owl-carousel">
                                    <!-- 1 -->
                                    <div class="item">
                                        <div class="bg" style="background-image:url(img/bg/cover.png)"></div>
                                    </div>
                                    <!-- 2 -->
                                    <div class="item">
                                        <div class="bg" style="background-image:url(img/bg/cover.png)"></div>
                                    </div>
                                    <!-- 3 -->
                                    <div class="item">
                                        <div class="bg" style="background-image:url(img/bg/cover.png)"></div>
                                    </div>
                                </div>
                            </div>
                            <!--slideshow-holder end -->
                            <!-- synh-wrap-holder -->
                            <div class="synh-wrap-holder">
                                <div class="synh-wrap">
                                    <div class="item">
                                      <a href="login.php" class="btn anim-button   trans-btn   transition  fl-l"><span>Entrar al sitio</span><i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                    <div class="item">
                                        <h3>Torneos</h3>
                                        <h4><?php echo $torneos[0]?> torneos próximos</h4>
                                        <a href="info/torneos.php" class=" btn anim-button   trans-btn   transition  fl-l"><span>Ver Torneos</span><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="item">
                                        <h3>Plataformas</h3>
                                        <h4><?php echo $plataformas[0]?> plataformas disponibles</h4>
                                        <a href="info/plataformas.php" class="btn anim-button   trans-btn   transition  fl-l"><span>Ver Plataformas</span><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="item">
                                        <h3>Juegos</h3>
                                        <h4><?php echo $juegos[0]?> juegos disponibles</h4>
                                        <a href="info/juegos.php" class="btn anim-button   trans-btn   transition  fl-l"><span>Ver Juegos</span><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- synh-wrap-holder end  -->
                        </div>
                        <!-- full-height-wrap end  -->  
                    </div>
                    <!-- Content   end -->	 
                    <!-- share  -->
                    <div class="share-inner">
                        <div class="share-container  isShare"  data-share="['facebook','googleplus','twitter','linkedin']"></div>
                        <div class="close-share"></div>
                    </div>
                    <!-- share end -->
                </div>
                <!-- Content holder  end -->
            </div>
            <!-- wrapper end -->
            <!--=============== footer ===============-->
            <footer>
                <div class="policy-box">
                    <span>&#169; Dogma 2015  /  All rights reserved. </span>
                </div>
                <div class="footer-social">
                    <ul>
                        <li><a href="#" target="_blank" ><i class="fa fa-facebook"></i><span>facebook</span></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i><span>twitter</span></a></li>
                        <li><a href="#" target="_blank" ><i class="fa fa-instagram"></i><span>instagram</span></a></li>
                        <li><a href="#" target="_blank" ><i class="fa fa-pinterest"></i><span>pinterest</span></a></li>
                        <li><a href="#" target="_blank" ><i class="fa fa-tumblr"></i><span>tumblr</span></a></li>
                    </ul>
                </div>
            </footer>
            <!-- footer end -->
        </div>
        <!-- Main end -->
        <!--=============== google map ===============-->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY" type="text/javascript"></script> 
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/core.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </body>
</html>