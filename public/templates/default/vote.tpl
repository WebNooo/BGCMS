<div class="block-title"><h3>�����</h3><i class="fa fa-group"></i></div>
<div class="block-content">
<form id="poll-form">
<div id="poll-title">{title}</div>
[votelist]<form method="post" name="vote" action=''>[/votelist]
{list}
[votelist]
<input type="hidden" name="vote_action" value="vote" />
<input type="hidden" name="vote_id" id="vote_id" value="{vote_id}" />
<button type="submit" onclick="doVote('vote'); return false;" >��������</button>
</form>
[/votelist]
</form>
</div>