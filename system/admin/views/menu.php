<?php

$site_adr = system\config::$site_adr . system\config::$admin_file;


$array = array (
    'main'     => array ( \admin\lang::$menu_main_page, "zmdi zmdi-home" ),
    'settings' => array ( \admin\lang::$menu_settings, "zmdi zmdi-settings" ),
    'users'    => array ( \admin\lang::$menu_users, "zmdi zmdi-account-box", array ( 'users' => \admin\lang::$menu_list_users, 'users&f=groups' => \admin\lang::$menu_list_group) ),
    'post'     => array ( \admin\lang::$menu_posts, "zmdi zmdi-view-list", array ( 'post&f=add' => \admin\lang::$menu_add_post , 'post' => \admin\lang::$menu_list_post, 'post&f=category' => \admin\lang::$menu_list_category) ),
    'static_page' => array ( \admin\lang::$menu_static_page, "zmdi zmdi-pages" ),
    'edit_skin' => array(\admin\lang::$menu_temp_edit, "zmdi zmdi-border-color"),
    'routing' => array(\admin\lang::$menu_routing, "zmdi zmdi-router"),

);

function genMenu ( $array )
{
    $site_adr = system\config::$site_adr . system\config::$admin_file;

    if ( !isset( $_GET[ 'c' ] ) ) $_GET[ 'c' ] = "main";
    foreach ( $array as $key => $value ) {
        if ( $_GET[ 'c' ] == $key ) $activ = "class='navigation__active'"; else $activ = "";
        if ( !isset( $value[ 2 ] ) ) {
            echo "<li $activ><a href='$site_adr?c=$key'><i class=\"$value[1]\"></i>$value[0]</a></li>";
        } else {
            if ( array_key_exists ( $_GET[ 'c' ], $value[ 2 ] ) ) $open = "navigation__sub--active navigation__sub--toggled"; else $open = "";
            echo "<li class = \"navigation__sub {$open}\"><a href data-mae-action=\"submenu-toggle\"><i class = \"$value[1]\" aria-hidden = \"true\"></i>$value[0]</a><ul>";
            foreach ( $value[ 2 ] as $item => $val ) {
                if (isset($_GET['f'])) $f = explode('=', $item); else $f=array();
                if (empty($f[1])) {
                    if ($_GET['c'] == $item AND !isset($_GET['f'])) $activ1 = "class='navigation__active'"; else $activ1 = "";
                }else{
                    if ($_GET['f'] == $f[1] AND isset($_GET['c'])) $activ1 = "class='navigation__active'"; else $activ1 = "";
                }
                echo "<li $activ1><a href = \"$site_adr?c=$item\">$val</a></li>";
            }
            echo "</ul></li>";

        }

    }

}
?>

<aside id="navigation">
    <div class="navigation__header">
        <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
    </div>

    <div class="navigation__toggles">
        <a href="" class="active" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__messages">
            <i class="zmdi zmdi-email"></i>
        </a>
        <a href="" data-mae-action="block-open" data-mae-target="#notifications" data-toggle="tab" data-target="#notifications__updates">
            <i class="zmdi zmdi-notifications"></i>
        </a>
    </div>

    <div class="navigation__menu c-overflow">
        <ul>
            <?php genMenu($array); ?>
        </ul>
    </div>
</aside>