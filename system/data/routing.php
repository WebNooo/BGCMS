|{%index%}|Главная страница|false
/post/:num-:any.html|CPost/fullPost/$1|Полная новость|false
/post/edit/:num|CPost/editPost/$1|Редактирование новости|false
/post/delete/:num|CPost/deletePost/$1|Удаление новости|false
/post/page/:num|{%index%}/$1||false
/sort/:any/:any|CPost/sortPost/$1/$2|Сортировка|false
/sort/:any/:any/page/:num|CPost/sortPost/$1/$2/page/$3|Сортировка|false
/page/:any.html|CStatic/index/$1|Страница|false
/forum|CForum/index|Сообщество|false
/adduser|CUser/addUser|Регистрация|false
/user/:any|CUser/profileUser/$1|Профиль пользователя|false
/resetuser|CUser/resetUser|Восстановление пароля|false
/profile|CUser/profileUser|Профиль пользователя|true
/profile/update|CUser/updateUser|Редактирование профиля|true
/logout|CUser/exitUser|Выход|true
/:any|CMain/exception|Страница не найдена|false