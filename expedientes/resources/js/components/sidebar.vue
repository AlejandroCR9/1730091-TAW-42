<template>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboard</li>
                        <li>
                            <router-link to="/Alex/1730091-TAW-42/expedientes/public/" class="mm-active">
                                <i class="metismenu-icon pe-7s-rocket"></i> Inicio
                            </router-link>
                        </li>
                        <li class="app-sidebar__heading">Seccion 1</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-car"></i>
                                Alergias
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <router-link to="/Alex/1730091-TAW-42/expedientes/public/alergias">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Ver Alergias
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/Alex/1730091-TAW-42/expedientes/public/alergias/crear">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Registrar Alergia
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-car"></i>
                                Padecimientos
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <router-link to="/Alex/1730091-TAW-42/expedientes/public/padecimientos">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Ver Padecimientos
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="/Alex/1730091-TAW-42/expedientes/public/padecimientos/crear">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Registrar Padecimiento
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="app-sidebar__heading">Seccion 2</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-car"></i>
                                Otra lista
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <router-link to="" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Ver Citas
                                    </router-link>
                                </li>
                                <li>
                                    <router-link to="" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Registrar Cita
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <transition>
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
