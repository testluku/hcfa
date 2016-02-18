<?php
$url = Request::url();
$user = auth()->user();
$sidebar = SiteHelpers::menus('sidebar');
?>
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full sidebar-light">
                <!-- Alternative Sidebar -->
                <div id="sidebar-alt" tabindex="-1" aria-hidden="true">
                    <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
                    <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll-alt">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Profile -->
                            <div class="sidebar-section">
                                <h2 class="text-light">Perfil</h2>
                                <form action="index.html" method="post" class="form-control-borderless" onsubmit="return false;">
                                    <div class="form-group">
                                        <label for="side-profile-name">Nombre</label>
                                        <input type="text" id="side-profile-name" name="side-profile-name" class="form-control" value="{{ $user->first_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="side-profile-name">Apellido</label>
                                        <input type="text" id="side-profile-name" name="side-profile-name" class="form-control" value="{{ $user->last_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="side-profile-email">Email</label>
                                        <input type="email" id="side-profile-email" name="side-profile-email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="side-profile-password">Nueva Contraseña</label>
                                        <input type="password" id="side-profile-password" name="side-profile-password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="side-profile-password-confirm">Confirmar Contraseña</label>
                                        <input type="password" id="side-profile-password-confirm" name="side-profile-password-confirm" class="form-control">
                                    </div>
                                    <div class="form-group remove-margin">
                                        <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Guardar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END Profile -->


                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="{{ URL::to('dashboard') }}" class="sidebar-title">
                            <img src="{{ asset('sximo/images/'.CNF_LOGO)}}" alt="{{ CNF_APPNAME }}" />
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <!-- a href="{{ URL::to('dashboard') }}" class=" active"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Panel</span></a> -->
                                    <a href="{{ URL::to('lreservas') }}"><i class="fa fa-calendar sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Agenda</span></a>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
                                <a href="{{ URL::to('tasks') }}"><i class="fa fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tareas</span></a>
                                <a href="{{ URL::to('rcitas') }}"><i class="fa fa-calendar-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Citas</span></a>
                                <a href="{{ URL::to('pacientes') }}"><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Pacientes</span></a>
                                <a href="{{ URL::to('datospaciente/update') }}"><i class="fa fa-user-plus sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Nuevo Paciente</span></a>
                                <div class="option-menu">
                                  <i class="fa fa-folder sidebar-nav-icon"></i><span id="admon" class="sidebar-nav-mini-hide">Admon
                                    <div id="sub-menu-admon">
                                      <a href="{{ URL::to('compania') }}">Datos de de facturaci&oacute;n</a>
                                    </div>
                                  </span>
                                </div>

                            </ul>
                            <!-- END Sidebar Navigation -->

                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                    <!-- Sidebar Extra Info -->
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
                        <div class="push-bit">
                            <span class="pull-right">
                                <a href="javascript:void(0)" class="text-muted"><i class="fa fa-plus"></i></a>
                            </span>
                            <small><strong>78 GB</strong> / 100 GB</small>
                        </div>
                        <div class="progress progress-mini push-bit">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"></div>
                        </div>
                        <div class="text-center">
                            <small>{{ Session::get('fid') }}<br> {{ date("H:i F j, Y", strtotime(Session::get('ll'))) }}</small><br>
                            <small><span id="">2015-16</span> &copy; <a href="http://luku.co" target="_blank">Luku</a></small>
                        </div>
                    </div>
                    <!-- END Sidebar Extra Info -->
                </div>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-inverse navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Header Link -->
                            <li class="hidden-xs animation-fadeInQuick">
                                <a href="#"><strong>Bienvenido</strong></a>
                            </li>
                            <!-- END Header Link -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- Search Form -->
                            <li>
                                <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
                                    <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Buscar..">
                                </form>
                            </li>
                            <!-- END Search Form -->

                            <!-- Alternative Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');this.blur();">
                                    <i class="gi gi-settings"></i>
                                </a>
                            </li>
                            <!-- END Alternative Sidebar Toggle Button -->

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('img/placeholders/avatars/avatar9.jpg')}}" alt="avatar">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        <strong>ADMINISTRADOR</strong>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
                                            <i class="gi gi-settings fa-fw pull-right"></i>
                                            Configuración
                                        </a>
                                    </li>
                                    <li class="divider"><li>
                                    <li>
                                        <a href="{{ URL::to('user/logout') }}">
                                            <i class="fa fa-power-off fa-fw pull-right"></i>
                                            Cerrar Sesión
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>

                    <script type="text/javascript">
                      $('#admon').hover(function() {
                        $('#sub-menu-admon').animate({
                          marginLeft: "-30px"
                        },500,function () {

                            $('#admon div').animate({
                              backgroundColor: "#EBEFF2"
                            }, "slow");

                        })
                      }, function () {
                        $('#sub-menu-admon').animate({
                          marginLeft: "-250px"
                        },500,function () {

                          $('#admon div').animate({
                            backgroundColor: "none"
                          }, "slow");

                        })
                      })
                    </script>
