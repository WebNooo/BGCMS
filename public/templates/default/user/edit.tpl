<article class="short-story">
    <div class="short-left">
        <h1>Пользователь: {uname}</h1>
    </div><br>
    <div class="basecont"><div class="dpad">
            <div class="userinfo">
                <div class="lcol">
                    <div class="avatar"><img width="100" height="100" src="{photo}" alt=""/></div>
                </div>
                <div class="rcol" style="width:84%;margin-top: -100px; margin-right: 0px;">
                    <ul>
                        <li><label class="grey">Полное имя:</label> <b><input title="" type="text" name="fullname" value="{fullname}" class="f_input" /></b></li>
                        <li><label class="grey">Email:</label> <b><input title="" type="text" name="fullname" value="{editmail}" class="f_input" /></b></li>
                        <li><label class="grey">Пол:</label> <b>{gender}</b></li>
                        <li><label class="grey">Группа:</label> {group}</li>
                        <li></li>
                    </ul>
                    <ul class="ussep">
                        <li><span class="grey">Дата регистрации:</span> <b>{create_time}</b></li>
                        <li><span class="grey">Последнее посещение:</span> <b>{auth_time}</b></li>
                    </ul>
                    <ul class="ussep">
                        <li><span class="grey">Место жительства:</span> <b>{country}/{city}</b></li>
                    </ul>
                </div>

                <div class="clr"></div>
                <input class="sendreg" type="submit" name="submit" value="Отправить" />

            </div>
        </div></div>
</article>
