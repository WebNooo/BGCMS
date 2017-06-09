-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 09 2017 г., 04:18
-- Версия сервера: 5.6.35-cll-lve
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cp354793_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(255) NOT NULL,
  `link_cat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_cat`, `name_cat`, `link_cat`) VALUES
(1, 'Информация', 'information'),
(2, 'Обновления', 'update'),
(3, 'Counter-Strike 1.6', 'cs16'),
(4, 'Counter-Strike Go', 'csgo');

-- --------------------------------------------------------

--
-- Структура таблицы `category_to_post`
--

CREATE TABLE `category_to_post` (
  `id_to` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_to_post`
--

INSERT INTO `category_to_post` (`id_to`, `post_id`, `cat_id`) VALUES
(1, 23, 2),
(16, 38, 0),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(6, 0, 0),
(7, 29, 0),
(8, 30, 1),
(9, 31, 1),
(10, 32, 1),
(11, 33, 1),
(12, 34, 1),
(13, 35, 1),
(14, 36, 1),
(15, 37, 1),
(17, 39, 0),
(18, 40, 1),
(19, 41, 1),
(20, 42, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `name_city` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id_city`, `name_city`, `country_id`) VALUES
(1, 'Не известно', 1),
(62, 'Рязань', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `text_comment` text NOT NULL,
  `date_comment` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `id_p`, `id_author`, `text_comment`, `date_comment`) VALUES
(1, 23, 1, 'sdas', 1489994900),
(2, 23, 1, 'dasrvewgtrwe', 1489994906),
(3, 23, 1, 'fsdgd', 1496442762);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `name_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id_country`, `name_country`) VALUES
(1, 'Не известно'),
(2, 'Россия');

-- --------------------------------------------------------

--
-- Структура таблицы `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `name_forum` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `forum`
--

INSERT INTO `forum` (`id_forum`, `name_forum`) VALUES
(1, 'Information'),
(2, 'Version'),
(3, 'Updates'),
(4, 'Talk');

-- --------------------------------------------------------

--
-- Структура таблицы `forum_messages`
--

CREATE TABLE `forum_messages` (
  `id_msg` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `author_msg` int(11) NOT NULL,
  `text_msg` text NOT NULL,
  `date_msg` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `forum_sub`
--

CREATE TABLE `forum_sub` (
  `id_sub` int(11) NOT NULL,
  `name_sub` varchar(255) NOT NULL,
  `forum_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `forum_sub`
--

INSERT INTO `forum_sub` (`id_sub`, `name_sub`, `forum_id`) VALUES
(1, 'Новости', 1),
(2, 'Релизы', 2),
(3, 'Старые версии', 2),
(4, '1.0', 3),
(5, '1.1', 3),
(6, '1.2', 3),
(7, 'All', 4),
(8, 'РОФЛ!!!!', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `forum_topic`
--

CREATE TABLE `forum_topic` (
  `id_topic` int(11) NOT NULL,
  `id_sf` int(11) NOT NULL,
  `title_topic` varchar(255) NOT NULL,
  `text_topic` text NOT NULL,
  `author_topic` int(11) NOT NULL,
  `date_topic` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `forum_topic`
--

INSERT INTO `forum_topic` (`id_topic`, `id_sf`, `title_topic`, `text_topic`, `author_topic`, `date_topic`) VALUES
(1, 1, 'test news1', 'test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1test news1', 1, 1),
(2, 1, 'test news2', 'test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2test news2', 2, 1),
(3, 4, 'обновление от 21.04', 'ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ацумау ', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `idg` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `admin_style` text NOT NULL,
  `site_style` text NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0',
  `admin_settings` int(1) NOT NULL DEFAULT '0',
  `admin_posts` int(1) NOT NULL DEFAULT '0',
  `admin_users` int(1) NOT NULL DEFAULT '0',
  `admin_pages` int(1) NOT NULL DEFAULT '0',
  `site_view` int(1) NOT NULL DEFAULT '1',
  `site_add_post` int(1) NOT NULL DEFAULT '0',
  `site_edit_posts` int(1) NOT NULL DEFAULT '0',
  `site_add_comment` int(1) NOT NULL DEFAULT '0',
  `site_edit_comments` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`idg`, `title`, `admin_style`, `site_style`, `is_admin`, `admin_settings`, `admin_posts`, `admin_users`, `admin_pages`, `site_view`, `site_add_post`, `site_edit_posts`, `site_add_comment`, `site_edit_comments`) VALUES
(1, 'Администратор', '<span style=\"color:red\">{%title%}</span>', '<span style=\"color:red\">{%title%}</span>', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Модератор', '<span style=\"color:green\">{%title%}</span>', '<span style=\"color:green\">{%title%}</span>', 1, 0, 0, 1, 0, 1, 1, 1, 1, 0),
(4, 'Пользователь', '<span class=\"g_user\">{%title%}</span>', '<span class=\"g_user\">{%title%}</span>', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `mail_message`
--

CREATE TABLE `mail_message` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `function` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mail_message`
--

INSERT INTO `mail_message` (`id`, `title`, `message`, `function`) VALUES
(1, 'Регистрация пользователя', 'Поздравляем вас с успешной регистрацией на сайте <a href=\"{%site_url%}\">{%site_title%}</a>!\n<br>\nТеперь вам доступен весь функционал нашего ресурса!\n<br>\nВаш логин для авторизации: {%username%}\nВаш пароль для авторизации: {%password%}\n\nЕсли вы не проходили процесс регистрации на данном сайте, то перейдите по данной ссылке <a href=\"{%site_url%}/stopuser/{%username%}\"!\n<br>\nТак же это письмо не требует ответа!\nЕсли вы напишите ответ он проигнорируется!', 'adduser'),
(2, 'Восстановление пароля', 'Вы запросили восстановление пароля для вашего аккаунта!<br>\nДля продолжения перейдите по ссылке: <a href=\"{%reset_password%}\">{%reset_password%}</a><br><br><br>\nЕсли вы не запрашивали смену пароля, проигнорируйте данное письмо!', 'resetuser1'),
(3, 'Новый пароль', 'Вы успешно изменили ваш пароль, для в хода в аккаунт перейдите на сайт \r\n<a href=\"{%site%}\">{%site%}</a>\r\n\r\n<br><br>\r\nИмя пользователя: {%username%}\r\nНовый пароль: {%new_password%}\r\n', 'resetuser2');

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `function` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `modules`
--

INSERT INTO `modules` (`id`, `function`, `status`, `title`) VALUES
(1, 'CUser/authUser', 1, 'Авторизация'),
(2, 'System/visitors', 1, 'Список посетивших пользователей'),
(3, 'System/vote', 1, 'Опрос');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short` text NOT NULL,
  `full` text NOT NULL,
  `add_date` int(11) NOT NULL,
  `sort_date` date NOT NULL,
  `fixed` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL,
  `comments-num` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `category` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id_post`, `author`, `title`, `short`, `full`, `add_date`, `sort_date`, `fixed`, `views`, `comments-num`, `publish`, `category`) VALUES
(23, 1, 'BGSystem cистема управления вашим сайтом', '<h4 style=\"text-align: center; line-height: 1;\"><b>Привет, [user] добро пожаловать на [site_title]</b></h4><p style=\"text-align: center; line-height: 1;\"><br></p><p style=\"text-align: left; line-height: 1;\">Этот сайт работает под управление CMS BGSystem(BlackGame System)</p><p style=\"text-align: left; line-height: 1;\">Это полноценная система основанная на современных технологиях которая поможет вам легко и просто управлять вашей информацией и представит ее пользователю в таком виде в котором вы захотите</p><p style=\"text-align: left; line-height: 1;\">Данная система имеет ряд особых оснащений для полного управления как игровыми серверами так и хостингом серверов!</p><p style=\"line-height: 1;\">Возможность установить любой модуль из нашего репозитория в один клик!</p><p style=\"line-height: 1;\">Весь функционал системы описан в полной статье</p>', '<h1 style=\"font-family: Roboto, sans-serif; line-height: 1; text-align: center;\">BlackGame System</h1><p style=\"line-height: 1;\"><b>Описание возможностей системы:</b></p><ol><li style=\"line-height: 1;\">Магазин модулей у вас в панели администратора &nbsp;(Полное описание после доработки и отладки модуля)</li><li style=\"line-height: 1;\">Полноценный форум. (Полное описание после доработки и отладки модуля)</li><li style=\"line-height: 1;\">Система новостей с комментариями, сортировками, поиском и другими функциями &nbsp;(Полное описание после доработки и отладки модуля)</li><li style=\"line-height: 1;\">Удобный и простой шаблонизатор который позволит вам изменить сайт под себя</li><li style=\"line-height: 1;\">Мощнейшая панель администрации которая позволит вам управлять каждым уголком вашего проекта</li><li style=\"line-height: 1;\">Скорость работы, простота и гибкость для любых потребностей</li></ol><p style=\"line-height: 1;\"><br></p>', 1484882820, '2017-01-20', 1, 340, 0, 1, 1),
(76, 1, 'Установка сервера cs 1.6 на linux(Ubuntu/Debian)', '<p style=\"text-align: center; \">&lt;?php echo phpinfo(); ?&gt;</p><p>Данная статья научит вас устанавливать игровой сервер Counter-Strike 1.6</p><p>Подробнее в полной новости...</p>', '<p style=\"line-height: 2;\"><font face=\"Arial\"><span style=\"font-size: 14px;\">Здравствуй дорогой друг сегодня мы будем устанавливать сервер Counter-Strike 1.6</span></font></p><p style=\"line-height: 2;\"><span style=\"font-weight: 700;\"><font face=\"Arial\"><span style=\"font-size: 14px;\">1. Установка дополнительных компонентов</span></font></span></p><pre style=\"line-height: 2;\"><font color=\"#000000\">&gt; sudo dpkg --add-architecture i386<br>&gt; apt-get update<br>&gt; apt-get install screen<br>&gt; apt-get install&nbsp;lib32gcc1</font></pre><p style=\"line-height: 2;\"><span style=\"font-weight: 700;\"><span style=\"font-size: 14px;\">2. Добавим пользователя для нашего сервера</span></span></p><p style=\"line-height: 2;\"><span style=\"font-weight: 700;\"><span style=\"font-size: 14px;\"></span></span></p><pre style=\"line-height: 2;\"><span style=\"font-size: 12px;\">&gt; adduser cs16user</span></pre><div><span style=\"font-size: 14px;\">Далее вам нужно ввести пароль и повтор пароля(При вводе он не отображается)&nbsp;</span></div><div><div><br></div><pre>Adding user `cs16user\' ...<br>Adding new group `cs16user\' (1002) ...<br>Adding new user `cs16user\' (1003) with group `cs16user\' ...<br>Creating home directory `/home/cs16user\' ...<br>Copying files from `/etc/skel\' ...<br><u>Enter new UNIX password:</u> <b>ТУТ ПАРОЛЬ</b><br><u>Retype new UNIX password:</u><b> ПОВТОР ПАРОЛЯ</b></pre></div><div><br></div><div>Далее Вам предложат заполнить дополнительную информацию, можете пропустить эти строки нажатием <b>Enter</b></div><div><b><br></b></div><div><pre>passwd: password updated successfully<br>Changing the user information for jony<br>Enter the new value, or press ENTER for the default<br>&nbsp; &nbsp; &nbsp; &nbsp; Full Name []: <b>Можно пропустить</b><br>&nbsp; &nbsp; &nbsp; &nbsp; Room Number []: <b>Можно пропустить</b><br>&nbsp; &nbsp; &nbsp; &nbsp; Work Phone []: <b>Можно пропустить</b><br>&nbsp; &nbsp; &nbsp; &nbsp; Home Phone []: <b>Можно пропустить</b><br>&nbsp; &nbsp; &nbsp; &nbsp; Other []:<br>Is the information correct? [Y/n] <b>y (Соглашаемся что информация корректная)</b></pre><div style=\"font-weight: bold;\"><br></div></div><div>Далее добавим нашего пользователя в группу sudo</div><div><br></div><pre style=\"line-height: 2;\"><font color=\"#000000\">&gt; usermod -a -G sudo </font>cs16user</pre><p style=\"line-height: 2;\">Ну и теперь можем войти на вашего пользователя через SSH или командой</p><pre style=\"line-height: 2;\">&gt; su cs16user&nbsp;</pre><p style=\"line-height: 2;\"><span style=\"font-weight: 700;\"><font face=\"Arial\"><span style=\"font-size: 14px;\">3.Скачаем и установим SteamCMD</span></font></span></p><p style=\"line-height: 2;\"><font face=\"Arial\"><span style=\"font-size: 14px;\">&nbsp; &nbsp;&nbsp;</span><span style=\"font-weight: 700;\"><span style=\"font-size: 14px;\">3.1</span></span><span style=\"font-size: 14px;\">&nbsp;Для начала создадим папку для клиента Steam, затем загрузим в нее архив с клиентом</span></font></p><pre style=\"line-height: 2;\"><font color=\"#000000\">&gt; mkdir ~/SteamCMD<br>&gt; cd ~/SteamCMD<br>&gt; wget <a href=\"http://media.steampowered.com/client/steamcmd_linux.tar.gz\">http://media.steampowered.com/client/steamcmd_linux.tar.gz</a></font></pre><p style=\"line-height: 2;\">&nbsp; &nbsp;&nbsp;<font face=\"Arial\"><span style=\"font-weight: 700;\"><span style=\"font-size: 14px;\">3.2</span></span><span style=\"font-size: 14px;\">&nbsp;Теперь распакуем и удалим данный архив т.к. он нам больше не понадобиться.</span></font></p><pre style=\"line-height: 2;\"><font color=\"#000000\">&gt; tar xfz steamcmd_linux.tar.gz<br>&gt; rm steamcmd_linux.tar.gz</font></pre><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">&nbsp; &nbsp;</span><span style=\"font-weight: 700;\"><span style=\"font-size: 14px;\">3.3&nbsp;</span></span><span style=\"font-size: 14px;\">Выдадим права на запуск Steamклиента</span><br></p><pre style=\"line-height: 2;\"><font color=\"#000000\">&gt; chmod +x steamcmd.sh</font></pre><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\"><span style=\"font-weight: 700;\">4. Установка сервера</span></span></p><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-weight: 700;\">4.1&nbsp;</span>Теперь запустим наш Steam клиент</span></p><pre style=\"line-height: 2;\"><font color=\"#000000\">&gt; ./steamcmd.sh</font></pre><p style=\"line-height: 2;\">&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size: 14px;\">&nbsp;Начнется процесс обновления и после его завершения вы должны увидеть следующие</span></p><pre style=\"line-height: 2;\"><font color=\"#000000\">Steam Console Client (c) Valve Corporation<br>-- type quit to exit --<br>Loading Steam API...OK.<br>Steam&gt;</font></pre><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">&nbsp; &nbsp;&nbsp;<span style=\"font-weight: 700;\">4.2</span>&nbsp;Загрузка сервера</span></p><p style=\"line-height: 2;\">&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size: 14px;\">Авторизируемся&nbsp;как анонимный&nbsp;пользователь</span></p><pre style=\"line-height: 2;\"><span style=\"font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; white-space: pre-wrap;\"><font color=\"#000000\"><span style=\"font-weight: 700;\">Steam&gt;</span>login anonymous</font></span></pre><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><font face=\"Consolas, Lucida Console, Courier New, monospace\"><span style=\"font-size: 12px; white-space: pre-wrap;\"><span style=\"font-size: 14px;\">После чего должны увидеть такое сообщение</span><span style=\"font-size: 14px;\"> </span></span></font></p><p style=\"line-height: 2;\"></p><pre style=\"line-height: 2;\"><font color=\"#000000\"><font face=\"Consolas, Lucida Console, Courier New, monospace\"><span style=\"white-space: pre-wrap;\">Connecting anonymously to Steam Public...Logged in OK<br></span></font><font face=\"Consolas, Lucida Console, Courier New, monospace\"><span style=\"white-space: pre-wrap;\">Waiting for license info...OK<br></span></font><span style=\"font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; white-space: pre-wrap;\"><span style=\"font-weight: 700;\">Steam&gt;</span></span></font></pre><p style=\"line-height: 2;\"></p><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">&nbsp; &nbsp; Теперь укажем куда загружать наш сервер</span></p><pre style=\"line-height: 2;\"><font color=\"#000000\"><span style=\"font-weight: 700;\">Steam&gt;</span>force_install_dir ../server1</font></pre><p style=\"line-height: 2;\">&nbsp;&nbsp;<span style=\"font-size: 14px;\">&nbsp;&nbsp;Ну и теперь начинаем саму загрузку, возможно у вас сервер загрузиться не полностью, повторите данную команду несколько раз до полной загрузки</span></p><pre style=\"line-height: 2;\"><font color=\"#000000\"><span style=\"font-weight: 700;\">Steam&gt;</span>app_update 90 validate</font></pre><p style=\"line-height: 2;\">&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size: 14px;\">По окончанию загрузки мы увидим сообщение</span></p><pre style=\"line-height: 2;\"><font color=\"#000000\">Success! App 90 fully installed.</font></pre><div style=\"line-height: 2;\"><span style=\"font-size: 14px;\">&nbsp;&nbsp;&nbsp;&nbsp;Ну и выйдем из Steam клиента</span></div><div style=\"line-height: 2;\"><br></div><div style=\"line-height: 2;\"><pre style=\"line-height: 2;\"><font color=\"#000000\"><span style=\"font-weight: 700;\">Steam&gt;</span>exit</font></pre><p style=\"line-height: 2;\">&nbsp;&nbsp;&nbsp;<span style=\"font-weight: 700;\">&nbsp;<span style=\"font-size: 14px;\">4.3</span></span><span style=\"font-size: 14px;\">&nbsp;Устранение недочетов</span></p><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-size: 14px;\">Создадим папку в домашней директории пользователя из под которого вы будите запускать сервер</span></p><pre style=\"line-height: 2;\"><font color=\"#000000\">&gt; mkdir ~/.steam<br>&gt; ln -s ~/SteamCMD/linux32 ~/.steam/sdk32</font></pre><p style=\"line-height: 2;\"><span style=\"font-weight: 700;\"><span style=\"font-size: 14px;\">5. Запуск сервера</span></span></p><pre style=\"line-height: 2;\"><font color=\"#000000\">&gt; cd ../server1<br>&gt; ./hlds_run -game cstrike +ip 0.0.0.0 +maxplayers 20 +map de_dust2</font></pre><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">Ну и если сервер успешно запустился мы увидим в консоле следующие</span></p><pre style=\"line-height: 2;\"><font color=\"#000000\">Auto-restarting the server on crash<br>Console initialized.<br>Using breakpad crash handler<br>Setting breakpad minidump AppID = 10<br>Forcing breakpad minidump interfaces to load<br>Looking up breakpad interfaces from steamclient<br>Calling BreakpadMiniDumpSystemInit<br>Protocol version 48<br>Exe version 1.1.2.7/Stdio (cstrike)<br>Exe build: 13:12:29 Aug 29 2013 (6153)<br>STEAM Auth Server<br>Server IP address 0.0.0.0:27015<br>[S_API FAIL] SteamAPI_Init() failed; SteamAPI_IsSteamRunning() failed.<br>Looking up breakpad interfaces from steamclient<br>Calling BreakpadMiniDumpSystemInit<br>couldnt exec listip.cfg<br>couldnt exec banned.cfg<br>Connection to Steam servers successful.<br>VAC secure mode is activated.</font></pre><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">Поздравляю вы успешно запустили сервер :)</span></p><p style=\"line-height: 2;\"><span style=\"font-weight: 700;\"><span style=\"font-size: 14px;\">6. Дополнительно</span></span></p><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">Данное сообщение не является ошибкой, оно сообщает о том что у вас не запущен Steam клиент!</span></p><pre style=\"line-height: 2;\"><font color=\"#000000\">[S_API FAIL] SteamAPI_Init() failed; SteamAPI_IsSteamRunning() failed.</font></pre><p style=\"line-height: 2;\"><span style=\"font-size: 14px;\">Не обращайте внимания, на роботу сервера это не влияет&nbsp;</span></p></div>', 1495421700, '2017-05-22', 0, 61, 0, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `static`
--

CREATE TABLE `static` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `static` text NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `static`
--

INSERT INTO `static` (`id`, `description`, `static`, `name`) VALUES
(1, 'Правила сайта', '<h2>На сайте BGSrv.ru запрещается:</h2>\n<ol>\n<li>Любая деятельность, незаконная на территории РФ:\n<ul>\n<li>Обсуждение и пропаганда терроризма и любых противоправных действий, предусмотренных УК РФ, ГК РФ, КоАП РФ.</li>\n<li>Обсуждение изготовления взрывчатых веществ, ссылки на подобные материалы или инструкции по изготовлению.</li>\n<li>Обсуждение или планирование убийства, воровства, разбойного нападения, а также любая помощь в этом, в любом виде.</li>\n<li>Обсуждение наркоторговли и наркотиков, курительных смесей. А также упоминание или ссылки на сайты, содержание которых может помочь в поиске мест продажи наркотических средств.</li>\n<li>Преступления в сфере информационных технологий (хакерство, фишинг, нарушение авторских прав).</li>\n<li>Порнография, копрофилия, педофилия, зоофилия в любом виде.</li>\n<li>Разжигание межнациональной, расовой, религиозной или какой-либо другой розни (вражды).</li>\n</ul>\n</li>\n<li>Употребление нецензурной и ненормативной лексики в любом её виде, вне зависимости от языка. Равно как и любые провокации или спекуляции вокруг завуалированности таких слов. А также нецензурные или ненормативные имена (ники) пользователей. Также запрещена обсценная лексика.</li>\n<li>Любая реклама, равно как и упоминания алкогольной продукции, сигарет, проституции, БАДов и лекарственных препаратов. Обсуждение или побуждение к покупке или потреблению всего вышеперечисленного.</li>\n<li>Прямые, косвенные или завуалированные оскорбления других пользователей портала. Угрозы личной расправой или другими деструктивными действиями, которые могут привести к конфликту. Провокации в любом их виде и на любую тему, а также хамское и неуважительное отношение к остальным пользователям портала. Равно как и оскорбления посредством изменения имени пользователя.</li>\n<li>Реклама в любом виде, в том числе реклама организаций, товаров, ресурсов Интернета, размещение реферальных ссылок и самореклама. Любая коммерческая деятельность, включая торговлю играми, аккаунтами, ключами или игровой валютой. Под коммерческой деятельностью подразумевается продажа чего-либо за деньги или их эквивалент.</li>\n<li>Реферальные ссылки на интернет-магазины игровой продукции или игр. Равно как и любые реферальные ссылки.</li>\n<li>Деятельность связанная с распространением информации содержащей клевету, либо порочащие деловую или личную репутацию организаций или людей.</li>\n<li>Провокации вокруг, а равно и обсуждение тем напрямую или косвенно связанных с политикой, идеологиями, религиями или национальностями.</li>\n<li>Умышленное засорение разделов сайта бесполезными, неинформативными сообщениями, сообщениями, состоящими из беспорядочно повторяющихся символов, а также многократная отправка идентичных сообщений, в том числе сообщений, состоящих из картинок или спецсимволов, растягивающих страницу сайта в любую из сторон. А также постоянное использование транслита, Caps Lock или излишнее применение тэгов форматирования текста таким образом, что это будет мешать другим участникам проекта.</li>\n<li>Активность по искусственному увеличению показателей профиля. Деятельность, связанная с накруткой каких-либо показателей, а также автоматизация таких процессов. Например: количества загруженного контента, подписок на игры, отметок «мне нравится», накрутка бонусов, друзей или просмотров добавленного контента и т.д.</li>\n<li>Отправлять сообщения или размещать материалы, содержащие текст, изображения и скрипты, использующиеся для некорректного отображения страниц сайта у других пользователей, в том числе использование ошибок сайта. Вставлять в сообщения HTML-код/скрипт с целью сбора информации о других пользователях.</li>\n<li>Создание дополнительных аккаунтов. На одного человека должен приходиться только один аккаунт.</li>\n<li>Создавать новые темы с названиями, не отражающими суть проблемы или вопроса.</li>\n<li>Размещать контент нарушающий права третьих лиц.</li>\n<li>Публичное осуждение решений Администрации PlayGround.ru (в т.ч. модераторов, как представителей Администрации) в части модерирования и/или администрирования форума/сайта, пререкаться и спорить с модератором или администраторами.</li>\n<li>Троллинг в любом его виде.</li>\n<li>Полностью запрещено размещение на любых страницах сайта ссылок на скачивание полных версий любых игр, утекших в сеть бета-версий.</li>\n</ol>\n<h2>Примечание:</h2>\n<ol>\n<li>Администрация BGSrv.ru оставляет за собой право не вступать в переписку с пользователями по вопросам наказаний за нарушение данных правил. Санкции накладываются без предварительного предупреждения и дальнейшему обжалованию не подлежат.</li>\n<li>Администраторы и модераторы имеют право преимущественного трактования тех или иных пунктов правил сайта в случае заявлений о наличии двойного смысла в таких пунктах со стороны пользователя.</li>\n<li>Данный список правил может быть дополнен или изменен в любое время без предварительного уведомления.</li>\n<li>Незнание данных правил не освобождает вас от ответственности за их нарушение.</li>\n</ol>\n<h2>Авторские права:</h2>\n<ol>\n<li>Контент, размещенный пользователем, может быть удален администрацией сайта в любой момент без предварительного уведомления пользователя по просьбе третьих лиц, правообладателей или иным причинам. Администрация сайта не несет никакой ответственности перед пользователем за подобные действия.</li>\n<li>Если вы являетесь правообладателем и ваша интеллектуальная собственность без разрешения опубликована у нас на сайте — незамедлительно свяжитесь с нами через почту support@bgsrv.ru. В кратчайшие сроки мы сделаем недоступной вашу собственность для пользователей.</li>\n</ol>\n<center>{accept_button}</center>', 'rules');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `auth_date` int(11) NOT NULL,
  `registration_date` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `country` int(11) NOT NULL DEFAULT '1',
  `city` int(11) NOT NULL DEFAULT '1',
  `ip` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `comm-num` int(11) DEFAULT '0',
  `posts-num` int(11) NOT NULL DEFAULT '0',
  `gender` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `auth_date`, `registration_date`, `online`, `country`, `city`, `ip`, `token`, `group_id`, `fullname`, `comm-num`, `posts-num`, `gender`) VALUES
(1, '20167', '4cbfa30bf0f4fb6440015bba187b9649', 'webnooo@gmail.com', 1496963139, 1495823593, 1496970497, 2, 62, '109.195.163.194', '4mz0wOrCSvVA0ZZ_FfISty6oA', 1, 'Jony Kook', 0, 0, 1),
(2, 'jonys', '4cbfa30bf0f4fb6440015bba187b9649', 'nooo52@mail.ru', 0, 1495823820, 0, 1, 1, '109.195.163.195', '', 4, '', 0, 0, 0),
(3, 'jony', '4cbfa30bf0f4fb6440015bba187b9649', 'nooo62@mail.ru', 0, 1495823887, 0, 1, 1, '109.195.163.194', '', 4, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `v_ip` varchar(50) NOT NULL,
  `v_date` varchar(255) NOT NULL,
  `v_agent` text NOT NULL,
  `v_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `visitors`
--

INSERT INTO `visitors` (`id`, `v_ip`, `v_date`, `v_agent`, `v_type`) VALUES
(1, '109.195.163.194', '2017-06-02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', ''),
(2, '40.77.167.116', '2017-06-02', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', ''),
(3, '37.9.118.24', '2017-06-03', 'Mozilla/5.0 (compatible; YandexMetrika/2.0; +http://yandex.com/bots)', ''),
(4, '109.195.163.194', '2017-06-03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', ''),
(5, '178.154.200.16', '2017-06-03', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', ''),
(6, '178.154.189.37', '2017-06-03', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', ''),
(7, '217.69.134.200', '2017-06-03', 'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/2.0; +http://go.mail.ru/help/robots)', 'user'),
(8, '40.77.167.116', '2017-06-03', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(9, '95.108.129.200', '2017-06-03', 'Mozilla/5.0 (compatible; YandexMetrika/2.0; +http://yandex.com/bots)', 'Yandex'),
(10, '128.69.221.186', '2017-06-03', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', 'user'),
(11, '157.55.39.74', '2017-06-03', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(12, '95.85.34.52', '2017-06-03', 'SafeDNSBot (https://www.safedns.com/searchbot)', 'user'),
(13, '5.18.201.215', '2017-06-04', 'Mozilla/5.0 (Windows NT 6.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1468.0 Safari/537.36', 'user'),
(14, '66.249.76.45', '2017-06-04', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'Google'),
(15, '157.55.39.117', '2017-06-04', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(16, '54.196.30.74', '2017-06-04', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; pl; rv:1.9) Gecko/2008052906 Firefox/3.0', 'user'),
(17, '141.8.132.72', '2017-06-04', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(18, '141.8.142.85', '2017-06-04', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(19, '178.154.200.20', '2017-06-04', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(20, '5.255.253.68', '2017-06-04', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(21, '178.154.189.37', '2017-06-04', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(22, '95.108.179.18', '2017-06-04', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(23, '109.195.163.194', '2017-06-04', 'Mozilla/5.0 (Linux; Android 6.0; ASUS_X008D Build/MRA58K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36', 'user'),
(24, '46.48.13.161', '2017-06-04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'user'),
(25, '178.154.200.16', '2017-06-04', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(26, '66.102.9.57', '2017-06-04', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 'Google'),
(27, '146.120.204.162', '2017-06-04', 'a.pr-cy.ru', 'user'),
(28, '66.249.93.15', '2017-06-04', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko; Google Page Speed Insights) Chrome/41.0.2272.118 Mobile Safari/537.36', 'Google'),
(29, '66.249.93.14', '2017-06-04', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko; Google Page Speed Insights) Chrome/41.0.2272.118 Safari/537.36', 'Google'),
(30, '93.171.203.15', '2017-06-04', 'a.pr-cy.ru', 'user'),
(31, '146.120.204.211', '2017-06-04', 'a.pr-cy.ru', 'user'),
(32, '146.120.204.6', '2017-06-04', 'a.pr-cy.ru', 'user'),
(33, '93.171.202.244', '2017-06-04', 'a.pr-cy.ru', 'user'),
(34, '180.76.15.25', '2017-06-04', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)', 'user'),
(35, '141.8.142.58', '2017-06-04', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(36, '5.255.253.26', '2017-06-05', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(37, '46.48.13.161', '2017-06-05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'user'),
(38, '141.8.142.25', '2017-06-05', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(39, '141.8.142.61', '2017-06-05', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(40, '163.172.4.153', '2017-06-05', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'user'),
(41, '180.76.15.140', '2017-06-05', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)', 'user'),
(42, '213.159.38.90', '2017-06-05', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:52.0) Gecko/20100101 Firefox/52.0', 'user'),
(43, '40.77.167.116', '2017-06-05', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(44, '37.9.118.29', '2017-06-05', 'Mozilla/5.0 (compatible; YandexMetrika/2.0; +http://yandex.com/bots)', 'Yandex'),
(45, '91.189.112.7', '2017-06-05', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 'user'),
(46, '54.80.35.23', '2017-06-05', 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3 GTB6 (.NET CLR 3.5.30729)', 'user'),
(47, '178.154.200.35', '2017-06-05', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(48, '207.46.13.18', '2017-06-05', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(49, '94.45.81.87', '2017-06-05', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en; rv:1.9.2) Gecko/20100115 MRA 5.6 (build 03278) Firefox/3.6 (.NET CLR 3.5.30729)', 'user'),
(50, '178.154.200.35', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(51, '95.108.213.14', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(52, '141.8.142.58', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(53, '93.158.152.40', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(54, '141.8.142.62', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(55, '141.8.132.41', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(56, '5.255.253.36', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(57, '180.76.15.158', '2017-06-06', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)', 'user'),
(58, '66.102.9.59', '2017-06-06', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 'Google'),
(59, '146.120.204.139', '2017-06-06', 'a.pr-cy.ru', 'user'),
(60, '93.171.203.15', '2017-06-06', 'a.pr-cy.ru', 'user'),
(61, '66.249.93.14', '2017-06-06', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko; Google Page Speed Insights) Chrome/41.0.2272.118 Mobile Safari/537.36', 'Google'),
(62, '66.249.93.15', '2017-06-06', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko; Google Page Speed Insights) Chrome/41.0.2272.118 Safari/537.36', 'Google'),
(63, '93.171.202.244', '2017-06-06', 'a.pr-cy.ru', 'user'),
(64, '146.120.204.22', '2017-06-06', 'a.pr-cy.ru', 'user'),
(65, '212.193.117.227', '2017-06-06', 'Mozilla/5.0 (compatible; statdom.ru/Bot; +http://statdom.ru/bot.html)', 'user'),
(66, '40.77.167.89', '2017-06-06', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(67, '217.69.143.65', '2017-06-06', 'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/Robots/2.0; +http://go.mail.ru/help/robots)', 'Mail.RU'),
(68, '66.102.9.157', '2017-06-06', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko; Google Web Preview) Chrome/41.0.2272.118 Safari/537.36', 'Google'),
(69, '109.195.163.194', '2017-06-06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', 'user'),
(70, '95.108.179.22', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(71, '141.8.132.72', '2017-06-06', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(72, '141.8.142.26', '2017-06-07', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(73, '95.108.179.18', '2017-06-07', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(74, '207.46.13.105', '2017-06-07', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(75, '178.154.200.52', '2017-06-07', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(76, '212.193.117.245', '2017-06-07', 'Mozilla/5.0 (compatible; statdom.ru/Bot; +http://statdom.ru/bot.html)', 'user'),
(77, '87.242.74.135', '2017-06-07', '', 'user'),
(78, '95.108.213.13', '2017-06-07', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(79, '109.234.156.66', '2017-06-07', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/43.0.2357.81 Chrome/43.0.2357.81 Safari/537.36', 'user'),
(80, '180.76.15.10', '2017-06-07', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)', 'user'),
(81, '217.69.143.67', '2017-06-07', 'Mozilla/5.0 (compatible; Linux x86_64; Mail.RU_Bot/Robots/2.0; +http://go.mail.ru/help/robots)', 'Mail.RU'),
(82, '37.9.118.24', '2017-06-07', 'Mozilla/5.0 (compatible; YandexMetrika/2.0; +http://yandex.com/bots)', 'Yandex'),
(83, '91.189.112.7', '2017-06-07', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36', 'user'),
(84, '157.55.39.64', '2017-06-07', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(85, '66.102.9.57', '2017-06-07', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 'Google'),
(86, '146.120.204.15', '2017-06-07', 'a.pr-cy.ru', 'user'),
(87, '66.249.93.15', '2017-06-07', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko; Google Page Speed Insights) Chrome/41.0.2272.118 Mobile Safari/537.36', 'Google'),
(88, '93.171.203.15', '2017-06-07', 'a.pr-cy.ru', 'user'),
(89, '66.249.93.13', '2017-06-07', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko; Google Page Speed Insights) Chrome/41.0.2272.118 Safari/537.36', 'Google'),
(90, '146.120.204.245', '2017-06-07', 'a.pr-cy.ru', 'user'),
(91, '93.171.202.244', '2017-06-07', 'a.pr-cy.ru', 'user'),
(92, '146.120.204.130', '2017-06-07', 'a.pr-cy.ru', 'user'),
(93, '141.8.132.10', '2017-06-07', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(94, '178.154.200.54', '2017-06-07', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(95, '95.108.129.200', '2017-06-07', 'Mozilla/5.0 (compatible; YandexMetrika/2.0; +http://yandex.com/bots)', 'Yandex'),
(96, '144.76.110.236', '2017-06-08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'user'),
(97, '157.55.39.250', '2017-06-08', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(98, '217.69.143.217', '2017-06-08', 'Mozilla/5.0 (X11; Linux x86_64; rv:18.0) Gecko/20100101 Firefox/18.0', 'user'),
(99, '157.55.39.64', '2017-06-08', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'Bing'),
(100, '93.158.152.84', '2017-06-08', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(101, '141.8.132.10', '2017-06-08', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'Yandex'),
(102, '148.251.223.21', '2017-06-08', 'Mozilla/5.0 (compatible; openstat.ru/Bot)', 'user'),
(103, '202.46.53.144', '2017-06-08', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', 'user'),
(104, '109.195.163.194', '2017-06-08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', 'user'),
(105, '109.195.163.194', '2017-06-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Индексы таблицы `category_to_post`
--
ALTER TABLE `category_to_post`
  ADD PRIMARY KEY (`id_to`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Индексы таблицы `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`);

--
-- Индексы таблицы `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD PRIMARY KEY (`id_msg`);

--
-- Индексы таблицы `forum_sub`
--
ALTER TABLE `forum_sub`
  ADD PRIMARY KEY (`id_sub`);

--
-- Индексы таблицы `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idg`);

--
-- Индексы таблицы `mail_message`
--
ALTER TABLE `mail_message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Индексы таблицы `static`
--
ALTER TABLE `static`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `category_to_post`
--
ALTER TABLE `category_to_post`
  MODIFY `id_to` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `forum_messages`
--
ALTER TABLE `forum_messages`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `forum_sub`
--
ALTER TABLE `forum_sub`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `mail_message`
--
ALTER TABLE `mail_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT для таблицы `static`
--
ALTER TABLE `static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
