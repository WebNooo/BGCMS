<article class="short-story">
<div class="short-left"><h1>Статистика сайта</h1></div><br>
<div class="basecont statistics">
	<ul class="lcol reset">
		<li><h5 class="blue">Новости:</h5></li>
		<li>Общее кол-во новостей: <b class="blue">{news_num}</b></li>
		<li>Из них опубликовано: <b class="blue">{news_allow}</b></li>
		<li>Опубликовано на главной: <b class="blue">{news_main}</b></li>
		<li>Ожидает модерации: <b class="blue">{news_moder}</b></li>
	</ul><br>
	<ul class="lcol reset">
		<li><h5 class="blue">Пользователи:</h5></li>
		<li>Общее кол-во пользователей: <b class="blue">{user_num}</b></li>
		<li>Из них забанено: <b class="blue">{user_banned}</b></li>
	</ul><br>
	<ul class="lcol reset">
		<li><h5 class="blue">Комментарии:</h5></li>
		<li>Кол-во комментариев: <b class="blue">{comm_num}</b></li>
		<li><a href="/?do=lastcomments">Посмотреть последние</a></li>
	</ul>
	<br clear="all" />
	<div class="dpad infoblock radial">
		<ul class="reset">
			<li>За сутки: <span class="blue">Добавлено {news_day} новостей и {comm_day} комментариев, зарегистрировано {user_day} пользователей</span></li>
			<li>За неделю: <span class="blue">Добавлено {news_week} новостей и {comm_week} комментариев, зарегистрировано {user_week} пользователей</span></li>
			<li>За месяц: <span class="blue">Добавлено {news_month} новостей и {comm_month} комментариев, зарегистрировано {user_month} пользователей</span></li>
		</ul>
	</div>
</div><br>
<div class="short-left">Общий размер базы данных: {datenbank}</div><br>    
<div class="basecont">
	<div class="pheading">
        <div class="short-left"><h1>Лучшие пользователи</h1></div><br> 
		<table width="100%" class="userstop">{topusers}</table>
	</div>
</div>
</article>