<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/components-rounded.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/layouts/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/layouts/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('assets/layouts/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
        <style>
            .pace {
              -webkit-pointer-events: none;
              pointer-events: none;

              -webkit-user-select: none;
              -moz-user-select: none;
              user-select: none;
            }

            .pace-inactive {
              display: none;
            }

            .pace .pace-progress {
              background: #2299dd;
              position: fixed;
              z-index: 2000;
              top: 0;
              right: 100%;
              width: 100%;
              height: 20px;
            }

            .ancora:hover, .ancora{
                text-decoration: none;
            }
        </style>
    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo">
                                    <a href="{{ route('candidato.home') }}">
                                        <img src="{{ asset('assets/img/unimontes.png') }}" alt="logo" class="logo-default">
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        @if (Auth::guest())
                                        <a href="{{ route('login') }}" class="btn btn-primary mt-ladda-btn ladda-button" style="margin-top: 10px;"><i class="fa fa-user" aria-hidden="true"></i> Entrar</a>
                                        @else
                                        <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <span class="username username-hide-mobile">{{ strtoupper(Auth::user()->nome) }}</span>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container">
                                <div class="hor-menu  ">
                                    <ul class="nav navbar-nav">

                                        @if(Auth::guest())
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="http://www.ceps.unimontes.br/">CEPS
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="{{url('/')}}">Home
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="{{ route('register') }}">Inscrição</a>
                                        </li>
                                        @endif

                                        @if(!Auth::guest())
                                            @if(Auth::user()->permissao == 1)
                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                <a href="{{ route('candidato.home') }}"> <i class="fa fa-user" aria-hidden="true"></i> Área do candidato</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('candidato.form.alterar.senha') }}">
                                                    <i class="icon-key"></i> Alterar Senha </a>
                                            </li>
                                            @elseif(Auth::user()->permissao == 2)
                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                <a href="{{ route('admin.home') }}">Início</a>
                                            </li>
                                            <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                <a href="{{ route('admin.form.gerar-lista-inscritos') }}"> Gerar Lista de Inscritos
                                                    <span class="arrow"></span>
                                                </a>
                                            </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                             <i class="fa fa-sign-out" aria-hidden="true"></i></i> Sair </a>
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <div class="page-container">
                        <div class="page-content-wrapper">
                            <div class="page-content">
                                <div class="container">
                                    <div class="row">
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success bg-green-jungle bg-font-green-jungle border-green-jungle alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            <i class="fa fa-check-circle" aria-hidden="true"></i> <strong> SUCESSO! </strong> {{ $message }}
                                        </div>
                                        @elseif ($message = Session::get('danger'))
                                        <div class="alert alert-danger bg-red-mint bg-font-red-mint border-red-mint alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> ERRO: </strong> {{ $message }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="page-content-inner">
                                        <div class="row">
                                            <div class="portlet light clearfix @yield('class-portlet')">
                                                <div class="portlet-title">
                                                    <div class="caption font-black-sunglo">
                                                        <span class="caption-subject bold uppercase">@yield('title')</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    @yield('content')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <div class="page-footer">
                        <div class="container"> 2017 &copy; Unimontes </div>
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>

        <script src="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/layouts/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/form-input-mask.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/jquery.mask.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>

        @stack('scripts')

        <script>
            $(document).ready(function() {
                $('#clickmewow').click(function() {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>
