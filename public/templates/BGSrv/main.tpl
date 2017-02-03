<!doctype html>
<html lang="ru">
<head>
    {headers}
    <link href="{skin}/styles/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="wrapper container">
    <header>
        <a href="/">BlackGame</a>
    </header>
    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/">Главная страница</a></li>
            <li><a href="/">Главная страница</a></li>
            <li><a href="/">Главная страница</a></li>
            <li><a href="/">Главная страница</a></li>
        </ul>
    </nav>
    <div class="row">
        <aside class="col-md-3">
            {login}
        </aside>
        <section class="col-md-9">
            <div class="row">{speedbar}</div>
            <div class="row">{info}{content}</div>
        </section>
    </div>
</div>

</body>
{ajax}
</html>