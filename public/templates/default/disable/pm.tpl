[pmlist]
<div class="short-left"><h1>������ ���������</h1></div><br>
[/pmlist]
[newpm]
<div class="short-left"><h1>����� ���������</h1></div><br>
[/newpm]
[readpm]
<div class="short-left"><h1>���� ���������</h1></div><br>
[/readpm]
<div class="basecont">
<article class="short-story">    
<div class="dpad">
<div class="pm_status">
	<div class="pm_status_head">��������� �����</div>
	<div class="pm_status_content">����� ������������ ��������� ��������� ��:
{pm-progress-bar}
{proc-pm-limit}% �� ������ ({pm-limit} ���������)
	</div>
</div>
<div style="padding-top:10px;">[inbox]�������� ���������[/inbox] | 
[outbox]������������ ���������[/outbox] | 
[new_pm]��������� ���������[/new_pm]</div>
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
				����:
			</td>
			<td><input type="text" name="name" value="{author}" class="f_input" /></td>
		</tr>
		<tr>
			<td class="label">
				<br>����:<span class="impot">*</span>
			</td>
			<td><br><input type="text" name="subj" value="{subj}" class="f_input" /></td>
		</tr>
		<tr>
			<td class="label">
				<br>���������:<span class="impot">*</span>
			</td>
			<td class="editorcomm">
			<br>{editor}<br />
			<div class="checkbox"><input type="checkbox" id="outboxcopy" name="outboxcopy" value="1" /> <label for="outboxcopy">��������� ��������� � ����� "������������"</label></div>
			</td>
		</tr>
		[sec_code]
		<tr>
			<td class="label">
				<br>���:<span class="impot">*</span>
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
				<br>������� ��� �����, ���������� �� �����������:<span class="impot">*</span>
			</td>
			<td>
				<div><br>{recaptcha}</div>
			</td>
		</tr>
		[/recaptcha]
		[question]
			<tr>
				<td class="label">
					<br>������:
				</td>
				<td>
					<div><br>{question}</div>
				</td>
			</tr>
			<tr>
				<td class="label">
					<br>�����:<span class="impot">*</span>
				</td>
				<td>
					<div><br><input type="text" name="question_answer" id="question_answer" class="f_input" /></div>
				</td>
			</tr>
		[/question]
	</table>
	<div class="fieldsubmit">
		<br><button type="submit" name="add" class="sendreg">���������</button>
	</div>	
</div>
[/newpm]
</article>     
[readpm]
    <div class="short-story comment-post">
      <header>
       
<br /> {date} 

 <ul>
          <li>�������: {author}</li>
      			<li>������: [online]<img src="{THEME}/images/online.png" style="vertical-align: middle;" title="������������ ������" alt="������������ ������" />[/online][offline]<img src="{THEME}/images/offline.png" style="vertical-align: middle;" title="������������ offline" alt="������������ offline" />[/offline]</li>
			<li>[declination={comm-num}]����������|�|�|��[/declination]</li>
			<li>[declination={news-num}]���������|�|�|�[/declination]</li>
    			 
				<li>[complaint]������������[/complaint]</li>
				<li>[ignore]������������[/ignore]</li>
				<li>[del]�������[/del]</li>
		         </ul>
      </header>
      <img src="{foto}" class="noava-comment">
      <div class="comm-text">{text}</div>
      [reply]<span class="comm-reply">��������<i class="fa fa-mail-forward"></i></span>[/reply]
 </div>    
[/readpm]
</div>    