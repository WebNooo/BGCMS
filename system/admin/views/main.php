<div id="content__grid" data-columns>
    <div class="card widget-analytic">
        <div class="card__header">
            <h2>Пользователи
                <small>Кол-во пользователей сайта</small>
            </h2>
        </div>
        <div class="card__body">
            <div class="widget-analytic__info">
                <i class="zmdi zmdi-account-circle"></i>
                <h2><?php echo \system\Mysql::num(\system\Mysql::query("SELECT * FROM users")); ?>
                    <!--<small style="color: green;">+40</small>--></h2>
            </div>
        </div>
    </div>

    <div class="card widget-analytic">
        <div class="card__header">
            <h2>Website Traffics
                <small>Nullam Adipiscing Pellentesque</small>
            </h2>
        </div>
        <div class="card__body">
            <div class="widget-analytic__info">
                <i class="zmdi zmdi-caret-up-circle"></i>
                <h2>356,785K</h2>
            </div>
        </div>
    </div>

    <div class="card widget-analytic">
        <div class="card__header">
            <h2>Total Sales
                <small>Purus Malesuada Consectetur</small>
            </h2>
        </div>
        <div class="card__body">
            <div class="widget-analytic__info">
                <i class="zmdi zmdi-caret-down-circle"></i>
                <h2>$458,778</h2>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card__header">
            <h2>Комментарии
                <small>Список последних комментариев</small>
            </h2>
        </div>

        <div class="list-group">
            <a href="" class="list-group-item media">
                <div class="pull-left">
                    <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/1.jpg">
                </div>

                <div class="media-body">
                    <div class="list-group__heading">David Villa Jacobs</div>
                    <small class="list-group__text">Sorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                        mattis lobortis sapien non posuere
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
                    <small class="list-group__text">Donec congue tempus ligula, varius hendrerit mi hendrerit sit amet.
                        Duis ac quam sit amet leo feugiat iaculis
                    </small>
                </div>
            </a>

            <a href="" class="list-group-item media">
                <div class="pull-left">
                    <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/4.jpg">
                </div>
                <div class="media-body">
                    <div class="list-group__heading">Darla Mckinney</div>
                    <small class="list-group__text">Duis tincidunt augue nec sem dignissim scelerisque. Vestibulum
                        rhoncus sapien sed nulla aliquam lacinia
                    </small>
                </div>
            </a>

            <a href="" class="list-group-item media">
                <div class="pull-left">
                    <img class="avatar-img" src="/shared/admin/template/demo/img/profile-pics/2.jpg">
                </div>
                <div class="media-body">
                    <div class="list-group__heading">Rudolph Perez</div>
                    <small class="list-group__text">Phasellus a ullamcorper lectus, sit amet viverra quam. In luctus
                        tortor vel nulla pharetra bibendum
                    </small>
                </div>
            </a>

            <a href="" class="view-more">
                <i class="zmdi zmdi-long-arrow-right"></i> View all
            </a>
        </div>
    </div>

    <div class="card widget-past-days">
        <div class="card__header">
            <h2>Статистика
                <small>Информация за все время</small>
            </h2>
        </div>
        <div class="list-group list-group--striped">
            <div class="list-group-item">
                <div class="widget-past-days__info">
                    <small>Посещение сайта</small>
                    <h3><?php echo \system\Mysql::num(\system\Mysql::query("SELECT * FROM visitors WHERE v_date='" . date("Y-m-d", time()) . "'")); ?></h3>
                </div>
            </div>

            <div class="list-group-item">
                <div class="widget-past-days__info">
                    <small>Комментарии</small>
                    <h3>13,965</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card widget-pie-grid">
        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
            <div class="chart-pie" data-percent="92" data-pie-size="80">
                <span class="chart-pie__value">92</span>
            </div>
            <div class="widget-pie-grid__title">Email<br> Scheduled</div>
        </div>
        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
            <div class="chart-pie" data-percent="11" data-pie-size="80">
                <span class="chart-pie__value">11</span>
            </div>
            <div class="widget-pie-grid__title">Email<br> Bounced</div>
        </div>
        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
            <div class="chart-pie" data-percent="52" data-pie-size="80">
                <span class="chart-pie__value">52</span>
            </div>
            <div class="widget-pie-grid__title">Email<br> Opened</div>
        </div>
        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
            <div class="chart-pie" data-percent="44" data-pie-size="80">
                <span class="chart-pie__value">44</span>
            </div>
            <div class="widget-pie-grid__title">Storage<br>Remaining</div>
        </div>
        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
            <div class="chart-pie" data-percent="78" data-pie-size="80">
                <span class="chart-pie__value">78</span>
            </div>
            <div class="widget-pie-grid__title">Web Page<br> Views</div>
        </div>
        <div class="col-xs-4 col-sm-6 col-md-4 widget-pie-grid__item">
            <div class="chart-pie" data-percent="32" data-pie-size="80">
                <span class="chart-pie__value">32</span>
            </div>
            <div class="widget-pie-grid__title">Server<br> Processing</div>
        </div>
    </div>