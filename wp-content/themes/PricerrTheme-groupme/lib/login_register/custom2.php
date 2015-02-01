<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

include 'sett.php';
include 'login.php';
include 'register.php';


add_action('init', 'PricerrTheme_do_login_register_init', 99);

//=======================================================

function PricerrTheme_do_login_register_init()
{
    global $pagenow;

    if (isset($_GET['action']) && $_GET['action'] == "register") {
        PricerrTheme_do_register_scr();
    }

    switch ($pagenow) {
        case "wp-login.php":


            PricerrTheme_do_login_scr();
            break;
        case "wp-register.php":


            PricerrTheme_do_register_scr();
            break;
    }
}

//=========================================================


?>