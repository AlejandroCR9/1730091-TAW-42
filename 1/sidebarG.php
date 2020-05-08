<?php
  include_once "conn.php";
  
  $usuario = $_SESSION['idUsuario'];


  $sql="SELECT gamerTag, rutaFoto FROM usuarios WHERE idUsuario = '$usuario'";
  $datos=mysqli_query($conn,$sql);
  $reg=mysqli_fetch_array($datos);

  $pic=substr($reg['rutaFoto'],6);
?>


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../gamer.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <!--<i class="fas fa-laugh-wink"></i>-->
    <?php print_r ("<img src='$pic' width='50'></img>"); ?>
  </div>
  <div class="sidebar-brand-text mx-3"><?php echo $reg['gamerTag'] ?></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="../../gamer.php">
    <i class="fa fa-tasks"></i>
    <span>Escritorio</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Módulos
</div>

<!-- Nav Item - Tables -->
<li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
    <i class="fa fa-trophy"></i>
    <span>Torneos</span></a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="../torneos/mis-torneos.php">
        Mis torneos       
      </a>
      <a class="dropdown-item" href="../torneos/panel.php">
        Registrar torneo        
      </a>
    </div>
</li>

<!-- Nav Item - Charts 
<li class="nav-item">
  <a class="nav-link" href="../juegos/panel.php">
    <i class="fa fa-envelope"></i>
    <span>Invitaciones</span></a>
</li>-->

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="../historial/panel.php">
    <i class="fa fa-dollar"></i>
    <span>Historial de rentas y monedas</span></a>
</li>



<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->