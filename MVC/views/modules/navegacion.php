<!--<nav>
	<ul>
		<li><a href="">Registro</a></li>
		Para navegar al URL podemos hacerlo mediante la propiedad GET, la cual la toma del URL, se representa por el simbolo "?"
		<li><a href="index.php?action=ingresar">Ingreso</a></li>
		<li><a href="">Usuario</a></li>
		<li><a href="">Registro Categorias</a></li>
		<li><a href="">Categorias</a></li>
		<li><a href="">Registro Productos</a></li>
		<li><a href="">Productos</a></li>
		<li><a href="">Salir</a></li>
	</ul>
</nav>-->

<nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menú</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Usuarios</a>
                        <ul class="sub-menu children dropdown-menu">                            
                        	<li><i class="fa fa-puzzle-piece"></i><a href="index.php">Registro</a></li>
                        	<li><i class="fa fa-puzzle-piece"></i><a href="index.php?action=usuarios">Ver</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Categorias</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="index.php?action=categorias">Ver Categorias</a></li>
                            <li><i class="fa fa-table"></i><a href="index.php?action=registroCategorias">Registrar Categorias</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Productos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="index.php?action=registroProducto">Registrar</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="index.php?action=productos">Ver</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?action=salir">Salir</a></li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>