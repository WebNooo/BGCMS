<!doctype html>
<html>
<head>
    {headers}
    <link rel="stylesheet" type="text/css" href="{skin}/style/reset.css">
    <link rel="stylesheet" type="text/css" href="{skin}/style/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{skin}/style/styles.css">
    <link rel="stylesheet" type="text/css" href="{skin}/style/engine.css">
</head>
<body>
<header>
    <div id="top-header">
        <div class="center">
            <a href="/" id="logo">Black<b>Game</b></a>
            <ul id="top-nav">
                <li><a href="/">Главная</a></li>
                <li><a href="/forum">Сообщество</a></li>
                <li><a href="/page/contact.html">Контакты</a></li>
                <li><a href="/page/rules.html">Правила</a></li>
            </ul>
            <input type="text" id="search-icon" name="SSearch" placeholder="Поиск...">
        </div>
    </div>
    <div id="bottom-header">
        <div class="center">
            <div id="speedbar">
                <i class="fa fa-compass"></i>
                {breadcrumbs}
            </div>
            <div id="mini-profile">
                {login}
            </div>
        </div>
    </div>
</header>

<div id="wrapper">
    <div id="content-wrap">
        {info}
        {content}
    </div>
    <aside>
        <div class="side-block nav-block">
            <div class="block-title"><h3>Меню</h3><i class="fa fa-list"></i></div>
            <div class="block-content">
                <ul class="nav-ul">
                    <!-- <li><a href="/buy/vip">Купить VIP</a></li>
                     <li><a href="http://bans.bgsrv.ru">Банлист</a></li>
                               <li><a href="#">меню</a></li>
                               <li><a href="#">меню</a></li>
                               <li><a href="#">меню</a></li>
                               <li><a href="#">меню</a></li>
                               <li><a href="#">меню</a></li>
                               <li class="dropdown"><a href="#">меню</a>
                                 <ul>
                                   <li><a href="#">меню 1</a></li>
                                   <li><a href="#">меню 2</a></li>
                                   <li><a href="#">меню 3</a></li>
                                   <li><a href="#">меню 4</a></li>
                                   <li><a href="#">меню 5</a></li>
                                   <li><a href="#">меню 6</a></li>
                                 </ul>
                               </li>-->
                </ul>
            </div>
        </div>
        <div class="side-block">
            {vote}
        </div>
        <div class="side-block">
            <div class="block-title"><h3>Реклама</h3><i class="fa fa-thumbs-up"></i></div>
            <div class="block-content">
                <div class="reklam" style="line-height: 250px;">Ширина: 200px</div>
            </div>
        </div>
    </aside>
</div>

<footer>
    <div id="top-footer">
        <div class="center">
            <ul>
                <li><a href="#">О Системе</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Правила</a></li>
                <li class="top-li"><a href="#">Подняться на верех</a></li>
            </ul>
        </div>
    </div>
    <div id="bottom-footer">
        <div class="center">
            <div id="logo-box">
                <span>Black<b>Game</b></span>
                <i>Подняться на верх...</i>
            </div>
            <ul>
                <li>88x31</li>
                <li>88x31</li>
                <li><!--LiveInternet counter-->
                    <script type="text/javascript">
                        document.write("<a href='//www.liveinternet.ru/click' " +
                            "target=_blank><img src='//counter.yadro.ru/hit?t12.6;r" +
                            escape(document.referrer) + ((typeof(screen) == "undefined") ? "" :
                                ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                                    screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                            ";" + Math.random() +
                            "' alt='' title='LiveInternet: показано число просмотров за 24" +
                            " часа, посетителей за 24 часа и за сегодня' " +
                            "border='0' width='88' height='31'><\/a>")
                    </script><!--/LiveInternet-->
                </li>
            </ul>
        </div>
    </div>
</footer>
{ajax}
<!-- JS ================ -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter42155949 = new Ya.Metrika({
                    id: 42155949,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/42155949" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<script src="{skin}/js/code.js"></script>
<!-- JS end ================ -->
</body>
</html>