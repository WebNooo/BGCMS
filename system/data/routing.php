/im|CUser/im|Личные сообщения|yes
/search/:any|CPost/search/$1|Поиск|no
/forum/:num/:any.html|CForum/forum/$1|Сообщество|no
/forum/topic/:num/:num/:any.html|CForum/topic/$2|Сообщество|no
|{%index%}|Главная страница|no
/post/:num-:any.html|CPost/fullPost/$1|Полная новость|no
/post/edit/:num|CPost/editPost/$1|Редактирование новости|no
/post/delete/:num|CPost/deletePost/$1|Удаление новости|no
/post/page/:num|{%index%}/$1||no
/sort/:any/:any|CPost/sortPost/$1/$2|Сортировка|no
/sort/:any/:any/:num|CPost/sortPost/$1/$2/$3|Сортировка|no
/page/:any.html|CStatic/index/$1|Страница|no
/forum|CForum/index|Сообщество|no
/adduser|CUser/addUser|Регистрация|no
/user/:any|CUser/profileUser/$1|Профиль пользователя|no
/resetuser|CUser/resetUser|Восстановление пароля|no
/resetuser/:any|CUser/resetUser/$1|Подтверждение смены пароля|no
/profile|CUser/profileUser|Профиль пользователя|yes
/profile/update|CUser/updateUser|Редактирование профиля|yes
/logout|CUser/exitUser|Выход|yes
/:any|System/exception|Страница не найдена|no
