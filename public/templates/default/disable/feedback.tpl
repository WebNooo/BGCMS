<article class="short-story">
<div class="short-left"><h1>Обратная связь</h1></div>
<div class="baseform">
	<table class="tableform">
	[not-logged]
		<tr>
			<td class="label">
				Ваше имя:<span class="impot">*</span>
			</td>
			<td><input type="text" maxlength="35" name="name" class="f_input" /></td>
		</tr>
		<tr>
			<td class="label">
				<br>Ваш E-Mail:<span class="impot">*</span>
			</td>
			<td><br><input type="text" maxlength="35" name="email" class="f_input" /></td>
		</tr>
	[/not-logged]
		<tr>
			<td class="label">
				<br>Кому:<span class="impot">*</span>
			</td>
			<td><br>{recipient}</td>
		</tr>
		<tr>
			<td class="label">
				<br>Тема:<span class="impot">*</span>
			</td>
			<td><br><input type="text" maxlength="45" name="subject" class="f_input" /></td>
		</tr>
		<tr>
			<td class="label" valign="top">
				<br>Сообщение:
			</td>
			<td><br><textarea name="message" style="width: 380px; height: 160px" class="f_textarea"></textarea></td>
		</tr>
		[sec_code]<tr>
			<td class="label">
				<br>Введите код:<span class="impot">*</span>
			</td>
			<td>
				<div><br>{code}</div>
				<div><br><input type="text" maxlength="45" name="sec_code" style="width:115px" class="f_input" /></div>
			</td>
		</tr>[/sec_code]
		[recaptcha]<tr>
			<td class="label">
				<br>Введите два слова, показанных на изображении:<span class="impot">*</span>
			</td>
			<td>
				<div><br>{recaptcha}</div>
			</td>
		</tr>[/recaptcha]
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
		<br><button name="send_btn" class="sendreg" type="submit"><span>Отправить</span></button>
	</div>
</div>
</article>