<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Admin</title>
    <link rel="stylesheet"
          href="<?php echo \system\config::$site_adr; ?>admin/template/vendors/bower_components/animate.css/animate.min.css">
    <link rel="stylesheet"
          href="<?php echo \system\config::$site_adr; ?>admin/template/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet"
          href="<?php echo \system\config::$site_adr; ?>admin/template/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet"
          href="<?php echo \system\config::$site_adr; ?>admin/template/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css">

    <link href="<?php echo \system\config::$site_adr; ?>admin/template/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <link href="<?php echo \system\config::$site_adr; ?>admin/template/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo \system\config::$site_adr; ?>admin/template/css/app.min.css" type="text/css">

    <link href="<?php echo \system\config::$site_adr; ?>admin/template/vendors/farbtastic/farbtastic.css" rel="stylesheet">

    <link href="<?php echo \system\config::$site_adr; ?>java/dist/summernote.css" rel="stylesheet">

    <link href="<?php echo \system\config::$site_adr; ?>admin/template/vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid.min.css" rel="stylesheet">

    <script src="<?php echo \system\config::$site_adr; ?>admin/template/js/page-loader.min.js"></script>
</head>

<body>
<!-- Header -->
<header id="header">
    <div class="logo">
        <a href="<?php echo \system\config::$site_adr . \system\config::$admin_file; ?>">
            BlackGame
            <small>Панель администратора</small>
        </a>
        <i class="logo__trigger zmdi zmdi-menu" data-mae-action="block-open" data-mae-target="#navigation"></i>
    </div>

    <ul class="top-menu">
        <li class="top-menu__trigger hidden-lg hidden-md">
            <a href=""><i class="zmdi zmdi-search"></i></a>
        </li>

        <li class="top-menu__apps dropdown hidden-xs hidden-sm">
            <a data-toggle="dropdown" href="">
                <i class="zmdi zmdi-apps"></i>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="">
                        <i class="zmdi zmdi-calendar"></i>
                        <small>Календарь</small>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="zmdi zmdi-file-text"></i>
                        <small>Файлы</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="zmdi zmdi-email"></i>
                        <small>Почта</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="zmdi zmdi-trending-up"></i>
                        <small>Аналитика</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="zmdi zmdi-view-headline"></i>
                        <small>Новости</small>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="zmdi zmdi-image"></i>
                        <small>Галерея</small>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown hidden-xs">
            <a data-toggle="dropdown" href=""><i class="zmdi zmdi-more-vert"></i></a>
            <ul class="dropdown-menu dropdown-menu--icon pull-right">
                <li class="hidden-xs">
                    <a data-mae-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> Полноэкранный режим</a>
                </li>
                <li>
                    <a data-mae-action="clear-localstorage" href=""><i class="zmdi zmdi-delete"></i> Очистить Локальное
                        хранилище</a>
                </li>
                <li>
                    <a href=""><i class="zmdi zmdi-face"></i> Настройки конфиденциальности</a>
                </li>
                <li>
                    <a href=""><i class="zmdi zmdi-settings"></i> Другие настройки</a>
                </li>
            </ul>
        </li>
        <li class="top-menu__alerts" data-mae-action="http://bootstrapsale.com/projects/maed/v1/block-open"
            data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__messages">
            <a href=""><i class="zmdi zmdi-notifications"></i></a>
        </li>
        <li class="top-menu__profile dropdown">
            <a data-toggle="dropdown" href="">
                <img src="/shared/admin/template/demo/img/profile-pics/1.jpg">
            </a>

            <ul class="dropdown-menu pull-right dropdown-menu--icon">
                <li>
                    <a href="profile-about.html"><i class="zmdi zmdi-account"></i> Профиль</a>
                </li>
                <li>
                    <a href=""><i class="zmdi zmdi-input-antenna"></i> Безпасность</a>
                </li>
                <li>
                    <a href=""><i class="zmdi zmdi-settings"></i> Настройки</a>
                </li>
                <li>
                    <a href=""><i class="zmdi zmdi-time-restore"></i> Выйти</a>
                </li>
            </ul>
        </li>
    </ul>

    <!--    <form class="top-search">-->
    <!--        <input type="text" class="top-search__input" placeholder="Поиск по людям, новостям, файлам">-->
    <!--        <i class="zmdi zmdi-search top-search__reset"></i>-->
    <!--    </form>-->
</header>

<section id="main">
    <aside id="notifications">
        <ul class="tab-nav tab-nav--justified tab-nav--icon">
            <li><a class="user-alert__messages" href="#notifications__messages" data-toggle="tab"><i
                            class="zmdi zmdi-email"></i></a></li>
            <li><a class="user-alert__notifications" href="#notifications__updates" data-toggle="tab"><i
                            class="zmdi zmdi-notifications"></i></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane" id="notifications__messages">
                <div class="list-group">
                    <a href="" class="list-group-item media">
                        <div class="pull-left">
                            <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/1.jpg">
                        </div>

                        <div class="media-body">
                            <div class="list-group__heading">David Villa Jacobs</div>
                            <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Etiam mattis lobortis sapien non posuere
                            </small>
                        </div>
                    </a>

                    <a href="" class="list-group-item media">
                        <div class="pull-left">
                            <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/5.jpg">
                        </div>
                        <div class="media-body">
                            <div class="list-group__heading">Candice Barnes</div>
                            <small class="list-group__text">Quisque non tortor ultricies, posuere elit id, lacinia purus
                                curabitur.
                            </small>
                        </div>
                    </a>

                    <a href="" class="list-group-item media">
                        <div class="pull-left">
                            <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/3.jpg">
                        </div>
                        <div class="media-body">
                            <div class="list-group__heading">Jeannette Lawson</div>
                            <small class="list-group__text">Donec congue tempus ligula, varius hendrerit mi hendrerit
                                sit amet. Duis ac quam sit amet leo feugiat iaculis
                            </small>
                        </div>
                    </a>

                    <a href="" class="list-group-item media">
                        <div class="pull-left">
                            <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/4.jpg">
                        </div>
                        <div class="media-body">
                            <div class="list-group__heading">Darla Mckinney</div>
                            <small class="list-group__text">Duis tincidunt augue nec sem dignissim scelerisque.
                                Vestibulum rhoncus sapien sed nulla aliquam lacinia
                            </small>
                        </div>
                    </a>

                    <a href="" class="list-group-item media">
                        <div class="pull-left">
                            <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/2.jpg">
                        </div>
                        <div class="media-body">
                            <div class="list-group__heading">Rudolph Perez</div>
                            <small class="list-group__text">Phasellus a ullamcorper lectus, sit amet viverra quam. In
                                luctus tortor vel nulla pharetra bibendum
                            </small>
                        </div>
                    </a>
                </div>

                <a href="" class="btn btn--float">
                    <i class="zmdi zmdi-plus"></i>
                </a>
            </div>

            <div class="tab-pane" id="notifications__updates">
                <div class="list-group">
                    <a href="" class="list-group-item media">
                        <div class="pull-right">
                            <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/1.jpg">
                        </div>

                        <div class="media-body">
                            <div class="list-group__heading">David Villa Jacobs</div>
                            <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Etiam mattis lobortis sapien non posuere
                            </small>
                        </div>
                    </a>

                    <a href="" class="list-group-item">
                        <div class="list-group__heading">Candice Barnes</div>
                        <small class="list-group__text">Quisque non tortor ultricies, posuere elit id, lacinia purus
                            curabitur.
                        </small>
                    </a>

                    <a href="" class="list-group-item">
                        <div class="list-group__heading">Jeannette Lawson</div>
                        <small class="list-group__text">Donec congue tempus ligula, varius hendrerit mi hendrerit sit
                            amet. Duis ac quam sit amet leo feugiat iaculis
                        </small>
                    </a>

                    <a href="" class="list-group-item media">
                        <div class="pull-right">
                            <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/4.jpg">
                        </div>
                        <div class="media-body">
                            <div class="list-group__heading">Darla Mckinney</div>
                            <small class="list-group__text">Duis tincidunt augue nec sem dignissim scelerisque.
                                Vestibulum rhoncus sapien sed nulla aliquam lacinia
                            </small>
                        </div>
                    </a>

                    <a href="" class="list-group-item media">
                        <div class="pull-right">
                            <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/2.jpg">
                        </div>
                        <div class="media-body">
                            <div class="list-group__heading">Rudolph Perez</div>
                            <small class="list-group__text">Phasellus a ullamcorper lectus, sit amet viverra quam. In
                                luctus tortor vel nulla pharetra bibendum
                            </small>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </aside>

    <?php include SYS . "/admin/views/menu.php"; ?>

    <section id="content">
        <div id="AContent">
