[pmlist]
<div class="short-left"><h1>Список сообщений</h1></div><br>
[/pmlist]
[newpm]
<div class="short-left"><h1>Новое сообщение</h1></div><br>
[/newpm]
[readpm]
<div class="short-left"><h1>Ваши сообщения</h1></div><br>
[/readpm]
<div class="basecont">
<article class="short-story">    
<div class="dpad">
<div class="pm_status">
	<div class="pm_status_head">Состояние папок</div>
	<div class="pm_status_content">Папки персональных сообщений заполнены на:
{pm-progress-bar}
{proc-pm-limit}% от лимита ({pm-limit} сообщений)
	</div>
</div>
<div style="padding-top:10px;">[inbox]Входящие сообщения[/inbox] | 
[outbox]Отправленные сообщения[/outbox] | 
[new_pm]Отправить сообщение[/new_pm]</div>
</div><br />
<div class="clr"></div>
<br />
[pmlist]
<div class="dpad">{pmlist}</div>
[/pmlist]
[newpm]
<div class="baseform">
	<table class="tableform">
		<tr>
			<td class="label">
				Кому:
			</td>
			<td><input type="text" name="name" value="{author}" class="f_input" /></td>
		</tr>
		<tr>
			<td class="label">
				<br>Тема:<span class="impot">*</span>
			</td>
			<td><br><input type="text" name="subj" value="{subj}" class="f_input" /></td>
		</tr>
		<tr>
			<td class="label">
				<br>Сообщение:<span class="impot">*</span>
			</td>
			<td class="editorcomm">
			<br>{editor}<br />
			<div class="checkbox"><input type="checkbox" id="outboxcopy" name="outboxcopy" value="1" /> <label for="outboxcopy">Сохранить сообщение в папке "Отправленные"</label></div>
			</td>
		</tr>
		[sec_code]
		<tr>
			<td class="label">
				<br>Код:<span class="impot">*</span>
			</td>
			<td>
				<div><br>{sec_code}</div>
				<div><br><input type="text" name="sec_code" id="sec_code" style="width:115px" class="f_input" /></div>
			</td>
		</tr>
		[/sec_code]
		[recaptcha]
		<tr>
			<td class="label">
				<br>Введите два слова, показанных на изображении:<span class="impot">*</span>
			</td>
			<td>
				<div><br>{recaptcha}</div>
			</td>
		</tr>
		[/recaptcha]
		[question]
			<tr>
				<td class="label">
					<br>Вопрос:
				</td>
				<td>
					<div><br>{question}</div>
				</td>
			</tr>
			<tr>
				<td class="label">
					<br>Ответ:<span class="impot">*</span>
				</td>
				<td>
					<div><br><input type="text" name="question_answer" id="question_answer" class="f_input" /></div>
				</td>
			</tr>
		[/question]
	</table>
	<div class="fieldsubmit">
		<br><button type="submit" name="add" class="sendreg">Отправить</button>
	</div>	
</div>
[/newpm]
</article>     
[readpm]
    <div class="short-story comment-post">
      <header>
       
<br /> {date} 

 <ul>
          <li>Написал: {author}</li>
      			<li>Статус: [online]<img src="{THEME}/images/online.png" style="vertical-align: middle;" title="Пользователь Онлайн" alt="Пользователь Онлайн" />[/online][offline]<img src="{THEME}/images/offline.png" style="vertical-align: middle;" title="Пользователь offline" alt="Пользователь offline" />[/offline]</li>
			<li>[declination={comm-num}]комментари|й|я|ев[/declination]</li>
			<li>[declination={news-num}]публикаци|я|и|й[/declination]</li>
    			 
				<li>[complaint]Пожаловаться[/complaint]</li>
				<li>[ignore]Игнорировать[/ignore]</li>
				<li>[del]Удалить[/del]</li>
		         </ul>
      </header>
      <img src="{foto}" class="noava-comment">
      <div class="comm-text">{text}</div>
      [reply]<span class="comm-reply">Ответить<i class="fa fa-mail-forward"></i></span>[/reply]
 </div>    
[/readpm]
</div>    