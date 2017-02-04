/forum/:num-:any.html|CForum/forum/$1|Forum|no
/forum/topic/:num-:any.html|CForum/topic/$1|Topic|no
|{%index%}|Главная страница|no
/post/:num-:any.html|CPost/fullPost/$1|Полная новость|no
/post/edit/:num|CPost/editPost/$1|Редактирование новости|no
/post/delete/:num|CPost/deletePost/$1|Удаление новости|no
/post/page/:num|{%index%}/$1||no
/sort/:any/:any|CPost/sortPost/$1/$2|Сортировка|no
/sort/:any/:any/page/:num|CPost/sortPost/$1/$2/page/$3|Сортировка|no
/page/:any.html|CStatic/index/$1|Страница|no
/forum|CForum/index|Сообщество|no
/adduser|CUser/addUser|Регистрация|no
/user/:any|CUser/profileUser/$1|Профиль пользователя|no
/resetuser|CUser/resetUser|Восстановление пароля|no
/profile|CUser/profileUser|Профиль пользователя|yes
/profile/update|CUser/updateUser|Редактирование профиля|yes
/logout|CUser/exitUser|Выход|yes
/:any|CMain/exception|Страница не найдена|no
