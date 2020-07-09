<template>
     <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="main.html"><i class="icon-speedometer"></i> Inicio</a>
                    </li>
                    <li class="nav-title">
                        Menu
                    </li>
                    <!--<li class="nav-item nav-dropdown active">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i> Productos</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <router-link to="/Alex/1730091-TAW-42/practicaL03072020Ventas/public/" class="nav-link"><i class="icon-bag"></i> Ver Productos</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/Alex/1730091-TAW-42/practicaL03072020Ventas/public/crear" class="nav-link"><i class="icon-bag"></i> Insertar Productos</router-link>
                            </li>
                        </ul>
                    </li>-->
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
        <transition>
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {
        mounted() {
             
        }
    }
</script>
