<article class="short-story">
<div class="short-left"><h1>Восстановить пароль</h1></div><br>
<div class="baseform">
	<table class="tableform">
		<tr>
			<td class="label">
				Ваш логин или E-Mail на сайте:
			</td>
			<td><input class="f_input" type="text" name="lostname" /></td>
		</tr>
		[sec_code]<tr>
			<td class="label">
				<br>Введите код<br />с картинки:<span class="impot">*</span>
			</td>
			<td>
				<div><br>{code}</div>
				<div><br><input class="f_input" style="width:115px" maxlength="45" name="sec_code" size="14" /></div>
			</td>
		</tr>[/sec_code]
		[recaptcha]<tr>
			<td class="label">
				<br>Введите два слова,<br />показанных на изображении:<span class="impot">*</span>
			</td>
			<td>
				<div><br>{recaptcha}</div>
			</td>
		</tr>[/recaptcha]
	</table>
	<div class="fieldsubmit">
		<br><button class="sendreg" name="submit" type="submit"><span>Отправить</span></button>
	</div>
</div>
</article>     