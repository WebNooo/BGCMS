<div class="block-title"><h3>Опрос</h3><i class="fa fa-group"></i></div>
<div class="block-content">
    <form id="poll-form">
        <div id="poll-title">{title}</div>
            {list}
            <input type="hidden" name="vote_action" value="vote" />
            <input type="hidden" name="vote_id" id="vote_id" value="{vote_id}" />
            <button type="submit" onclick="doVote('vote'); return false;" >Ответить</button>
    </form>
</div>