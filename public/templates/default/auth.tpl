[user]<a href="javascript:void(0)" id="profile-button"><img src="{photo}">{username}</a>
<div id="profile-dropdown">
    <div id="left-profile">
        <img src="{photo}" alt="">
        <a href="/logout">Выйти</a>
    </div>
    <ul id="right-profile">
        [admin]<li><a target="_blank" href="/admin.php">Панель администратора</a></li>[/admin]
        <li><a href="/profile">Мой профиль</a></li>
        <li><a href="/im">Личные сообщения</a></li>
        <li><a href="/addpost">Добавить новость</a></li>
    </ul>
</div>
[/user]
[not-user]
<a href="javascript:void(0)" class="not-login" id="auth-modal">Авторизация</a>
<a href="/adduser" class="not-login">Регистрация</a>
<div id="modal-box1">
    <div id="modal-content1">
        <a href="#" class="close">x</a>
            <div id="left-modal">
                <label>Имя пользователя:</label>
                <input type="text" name="auth_username" id="login_name">
                <label>Пароль</label>
                <input type="password" name="auth_password" id="login_password">
                <button name="authStart">Войти</button>
                <a href="/resetaccount">Забыли пароль?</a>
                <a href="/adduser">Регистрация</a>
            </div>
    </div>
</div>
[/not-user]