<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme-TrainMe
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/
if (!function_exists('PricerrTheme_do_register_scr')) {
    function PricerrTheme_do_register_scr() {
        global $wpdb, $wp_query, $current_theme_locale_name;

        if (!is_array($wp_query->query_vars))
            $wp_query->query_vars = array();

        header('Content-Type: ' . get_bloginfo('html_type') . '; charset=' . get_bloginfo('charset'));

        do_action('register_form_social_connect');

        switch ($_REQUEST["action"]) {

            case 'register':
                require_once(ABSPATH . WPINC . '/registration-functions.php');

                $user_login = sanitize_user(str_replace(" ", "", $_POST['user_login']));
                $user_email = trim($_POST['user_email']);
                $user_password = $_POST['user_password'];
                $user_reppassword = $_POST['user_reppassword'];
                $user_paypal_email = $_POST['user_paypal_email'];

                $errors = PricerrTheme_register_new_user_sitemile($user_login, $user_password, $user_reppassword, $user_email);

                if (!is_wp_error($errors)) { // if no error then $errors is $uid
                    $ok_reg = 1;
                    PricerrTheme_update_paypal_email_function($errors, $user_paypal_email);

                    if (!empty($_FILES['user_avatar']["tmp_name"])) {
                        $user_avatar = $_FILES['user_avatar'];
                        PricerrTheme_update_avatar_function($errors, $user_avatar);
                    }
                }

                if (1 == $ok_reg) { //continues after the break;

                    global $real_ttl;
                    $real_ttl = __("Registration Complete", $current_theme_locale_name);
                    add_filter('wp_title', 'PricerrTheme_sitemile_filter_ttl', 10, 3);

                    get_header();
                    global $current_theme_locale_name;

                    ?>

                    <div class="my_box3 text-center">
                        <div class="padd10 white-wrapper">
                            <div class="content-wrapper-narrow">
                                <h4 class="text-center"><?php _e('Registration Complete', $current_theme_locale_name) ?></h4>
                                <br>
                                <div class="register-confirm-content">
                                    <div class="confirm-container">
                                        <?php printf(__('<div class="confirm-label pright0 col-sm-5">Username:</div><div class="confirm-info col-sm-7">%s</div>', $current_theme_locale_name), "<strong>" . esc_html($user_login) . "</strong>") ?>
                                    </div>
                                    <div class="confirm-container">
                                        <?php printf(__('<div class="confirm-label pright0 col-sm-5">Password:</div><div class="confirm-info col-sm-7">%s</div>', $current_theme_locale_name), '<strong>' . __('emailed to you', $current_theme_locale_name) . '</strong>') ?>
                                    </div>
                                    <div class="confirm-container">
                                        <?php printf(__('<div class="confirm-label pright0 col-sm-5">E-mail:</div><div class="confirm-info col-sm-7">%s</div>', $current_theme_locale_name), "<strong>" . esc_html($user_email) . "</strong>") ?>
                                    </div>
                                    <br>
                                    <div class="reminder">
                                        <?php _e("Please check your <strong>Spam Mail</strong> folder if your account information does not appear within 5 minutes.", $current_theme_locale_name); ?>
                                    </div>
                                </div>

                                <div class="register-conform-button">
                                    <!--<input type="submit" class="register-button" value="<?php _e('Sign Up', $current_theme_locale_name) ?>" id="submits" name="submits"/>-->
                                    <a class="login-button" href="wp-login.php"><?php _e('Login', $current_theme_locale_name); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    get_footer();

                    die();
                    break;
                }
            //continued from the error check above

            default:

                global $real_ttl;
                $real_ttl = __("Register", $current_theme_locale_name);
                add_filter('wp_title', 'PricerrTheme_sitemile_filter_ttl', 10, 3);

                get_header();

                ?>

                    <div class="my_box3_login text-center">
                        <div class="padd10 white-wrapper">
                            <div class="register-form">
                            <!--<div class="box-title"><?php _e("Register", $current_theme_locale_name); ?> - <?php echo get_bloginfo('name'); ?></div>-->
                                <div class="box-content clear">
                                    <?php if (is_wp_error($errors) && isset($_POST['action'])) { ?>
                                        <div class="error">
                                            <ul>
                                                <?php
                                                foreach ($errors->get_error_messages() as $error) {
                                                    echo "<li>" . $error . "</li>";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <div class="login-submit-form">
                                        <form method="post" id="register-form" enctype="multipart/form-data">
                                            <?php do_action('register_form'); ?>
                                            <!--<div class="or">OR</div>-->
                                            <input type="hidden" name="action" value="register"/>
                                            <div class="register-group">
                                                <div class="col-sm-3">
                                                    <div class="register-label">
                                                        <label for="register-username"><?php _e('Username', $current_theme_locale_name) ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="do_input register-textbox" name="user_login" id="user_login" size="30" maxlength="20" value="<?php echo esc_html($user_login); ?>"/>
                                                </div>
                                            </div>
                                            <div class="register-group">
                                                <div class="col-sm-3">
                                                    <div class="register-label">
                                                        <label for="register-email"><?php _e('E-mail', $current_theme_locale_name) ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="do_input register-textbox" name="user_email" id="user_email" size="30" maxlength="100" value="<?php echo esc_html($user_email); ?>"/>
                                                </div>
                                            </div>
                                            <div class="register-group">
                                                <div class="col-sm-3">
                                                    <div class="register-label">
                                                        <label for="register-password"><?php _e('New Password', $current_theme_locale_name); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="password" class="do_input register-textbox" name="user_password" id="user_password" size="34" value="<?php echo esc_html($user_password); ?>"/>
                                                </div>
                                            </div>
                                            <div class="register-group">
                                                <div class="col-sm-3">
                                                    <div class="register-label">
                                                        <label for="register-reppassword"><?php _e('Repeat Password', $current_theme_locale_name); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="password" class="do_input register-textbox" name="user_reppassword" id="user_reppassword" size="34" value="<?php echo esc_html($user_reppassword); ?>"/>
                                                </div>
                                            </div>
                                            <div class="register-group">
                                                <div class="col-sm-3">
                                                    <div class="register-label">
                                                        <label for="register-avatar"><?php echo __('Avatar', $current_theme_locale_name); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <img id="avatar-img" src="<?php echo get_bloginfo('template_url') . "/images/noav.jpg" ?>" alt="avatar preview"/><input id="user_avatar" type="file" class="do_input register-textbox" name="user_avatar" size="34" value="<?php echo esc_html($user_avatar); ?>"/>
                                                </div>
                                            </div>
                                            <div class="register-group">
                                                <div class="col-sm-3">
                                                    <div class="register-label">
                                                        <label for="register-paypal"><?php echo __('PayPal Email', $current_theme_locale_name); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="do_input register-textbox" name="user_paypal_email" id="user_paypal_email" size="34" value="<?php echo esc_html($user_paypal_email); ?>" placeholder="Optional"/>
                                                </div>
                                            </div>
                                            <div class="register-group">
                                                <!-- TODO: change hard coded link in a tag -->
                                                <p class="agree-terms">By Clicking “Sign Up” below, you are agreeing to the Campus Lessons <a href="http://yuezhang.org/webdsc003/trainme/terms-conditions/">Terms and Conditions</a>.</p>
                                            </div>
                                            <div class="register-group">
                                                <!--<label for="submitbtn">&nbsp;</label>-->
                                                <input type="submit" class="register-button" value="<?php _e('Sign Up', $current_theme_locale_name) ?>" id="submits" name="submits"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                get_footer();

                die();
                break;
            case 'disabled':

                global $real_ttl;
                $real_ttl = __("Registration Disabled", $current_theme_locale_name);
                add_filter('wp_title', 'PricerrTheme_sitemile_filter_ttl', 10, 3);

                get_header();

                ?>
                <div class="clear10"></div>
                <div class="my_box3">
                    <div class="padd10">
                        <div class="box-title"><?php _e('Registration Disabled', $current_theme_locale_name) ?></div>
                        <div class="box-content clear">
                            <p><?php _e('User registration is currently not allowed.', $current_theme_locale_name) ?>
                                <br/>
                                <a href="<?php echo get_settings('home'); ?>/" title="<?php _e('Go back to the blog', $current_theme_locale_name) ?>"><?php _e('Home', $current_theme_locale_name) ?></a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php

                get_footer();

                die();
                break;
        }
    }
}
?>