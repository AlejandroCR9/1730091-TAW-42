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
            <div class="scrollbar-sidebar scrollbar-container ps--active-y">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboard</li>
                        <li>
                            <router-link :to="{name: 'dash'}">
                                <i class="metismenu-icon pe-7s-rocket"></i> Inicio
                            </router-link>
                        </li>
                        
                        <div v-if="this.$cookies.get('tipo') ==1"> <!--Esta seccion no la debe de ver el usuario-->
                            <li class="app-sidebar__heading">Seccion 1</li>
                            <li>
                                <a href="">
                                    <i class="metismenu-icon pe-7s-car"></i>
                                    Alergias
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <router-link :to="{name: 'veralergia'}">
                                            <i class="metismenu-icon pe-7s-rocket"></i>Ver Alergias
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'crearalergia'}">
                                            <i class="metismenu-icon pe-7s-rocket"></i>Registrar Alergia
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="metismenu-icon pe-7s-car"></i>
                                    Padecimientos
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <router-link :to="{name: 'verpadecimiento'}">
                                            <i class="metismenu-icon pe-7s-rocket"></i>Ver Padecimientos
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'crearpadecimiento'}">
                                            <i class="metismenu-icon pe-7s-rocket"></i>Registrar Padecimiento
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="metismenu-icon pe-7s-car"></i>
                                    Medicamentos
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <router-link :to="{name: 'vermedicamento'}">
                                            <i class="metismenu-icon pe-7s-rocket"></i>Ver Medicamentos
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'crearmedicamento'}">
                                            <i class="metismenu-icon pe-7s-rocket"></i>Registrar Medicamentos
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                        </div>
                        <li class="app-sidebar__heading">Seccion 2</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-car"></i>
                                    Citas
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <!--El medico no podra ver las citas de otros medicos-->
                                <li v-if="this.$cookies.get('tipo') == 1 || this.$cookies.get('tipo') == 3">
                                    <router-link :to="{name: 'vercita'}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Ver Citas
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'crearcita'}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Registrar Cita
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li v-if="this.$cookies.get('tipo') == 2"><!--Solo el doctor tiene pacientes asignados-->
                            <router-link :to="{name: 'vermispacientes'}">
                                <i class="metismenu-icon pe-7s-rocket"></i> Mis pacientes
                            </router-link>
                        </li>
                        <li v-if="this.$cookies.get('tipo') == 2"> <!--Solo a los doctores se les comparten-->
                            <a href="">
                                <i class="metismenu-icon pe-7s-car"></i>
                                 Expedientes compartidos
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li><!--Solo el doctor tiene pacientes asignados-->
                                    <router-link :to="{name: 'miscompartidos'}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Compartidos con otros
                                    </router-link>
                                </li>
                                <li><!--Solo el doctor tiene pacientes asignados-->
                                    <router-link :to="{name: 'mecompartieron'}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Compartidos conmigo
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li v-if="this.$cookies.get('tipo') == 2"><!--Solo el doctor tiene pacientes asignados-->
                            <router-link :to="{name: 'vermiscitas' , params: { mis: 1 }}">
                                <i class="metismenu-icon pe-7s-rocket"></i> Citas sin atender
                            </router-link>
                        </li>
                        <li v-if="this.$cookies.get('tipo') == 2"><!--Solo el doctor tiene pacientes asignados-->
                            <router-link :to="{name: 'vermiscitas' , params: { mis: 2 }}">
                                <i class="metismenu-icon pe-7s-rocket"></i> Historial de Citas
                            </router-link>
                        </li>
                        
                        <li class="app-sidebar__heading">Seccion 3</li>
                        <li v-if="this.$cookies.get('tipo') == 1 || this.$cookies.get('tipo') == 3"> <!--Solo las secretarias y el admin puede registrar pacientes-->
                            <a href="#">
                                <i class="metismenu-icon pe-7s-car"></i>
                                Pacientes
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <router-link :to="{name: 'verpaciente'}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Ver Pacientes
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'crearpaciente'}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Registrar Paciente
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li v-if="this.$cookies.get('tipo') == 1"><!--Solo el admin puede registrar medicos-->
                            <a href="#">
                                <i class="metismenu-icon pe-7s-car"></i>
                                Médicos
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <router-link :to="{name: 'vermedico'}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Ver Médicos
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'crearmedico'}" >
                                        <i class="metismenu-icon pe-7s-rocket"></i>Registrar Médico
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li v-if="this.$cookies.get('tipo') != 3"> <!--Esta seccion no la debe de ber la secre-->
                            <a href="#">
                                <i class="metismenu-icon pe-7s-car"></i>
                                Secretario(a)s
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <router-link :to="{name: 'versecretaria'}" >
                                        <i class="metismenu-icon pe-7s-rocket"></i>Ver Secretaria
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'crearsecretaria'}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>Registrar Secretaria
                                    </router-link>
                                </li>
                            </ul>
                        </li>                       
                    </ul>
                </div>
            </div>
        </div>
        
        <router-view></router-view>
        
    </div>
</template>

<script>
       
    export default {
        
        mounted() {
            //console.log() //Cookie del tipo de usuario en sesion
            console.log('Component mounted.')    
        }, methods: {
            
        }
    }
    
</script>
