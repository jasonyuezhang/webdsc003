<?php
	/*
	 *
	 *  Template Name: Portal Page
	 *
	 */
	global $wp_query;
	$query_vars = $wp_query->query_vars;
	$job_category  = $query_vars['job_category'];
	$page    = $query_vars['page'];
	$my_page = $page;
	$job_sort   = $query_vars['job_sort'];
	$job_tax   = $query_vars['job_tax'];
	$term_search = $query_vars['term_search'];
	
	if ( empty( $term_search ) ) $term_search = $_GET['term_search'];
?>
<!DOCTYPE html>
    <head>
        <title>
        <?php

            if ( ( $job_tax == "category" or $job_tax == "location" ) and !empty( $job_category ) )
            {
                $tt = get_term_by( 'slug', $job_category, 'job_cat' );

                if ( $job_tax == "location" ) $tt = get_term_by( 'slug', $job_category, 'job_location' );
                global $skm_ttl;
                $skm_ttl = sprintf( __( 'all posted groups in %s - %s', 'PricerrTheme' ), $tt->name, get_bloginfo( 'name' ) );
                echo $skm_ttl;
            }
            else wp_title( ' ', true );
        ?>
        </title>
        <!--<link rel="stylesheet" type="text/css" media="all" href="<?php  bloginfo( 'stylesheet_url' ); ?>" />-->
        <link rel="pingback" href="<?php  bloginfo( 'pingback_url' ); ?>" />
        <?php
            wp_enqueue_script( "jquery" );
            wp_head();
            do_action( 'PricerrTheme_before_head_tag_open' );
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                jQuery(".portal-circle").children("a").hover(function() {
                    $(this).toggleClass("portal-hover");
                    $(this).children(".portal-logo").toggleClass("portal-logo-hover");
                    $(this).parent().toggleClass("portal-circle-hover");
                });
            });

        </script>
        <script type="text/javascript" src="<?php  echo get_bloginfo( 'template_url' ); ?>/javascript/my-script.js"></script>
        <script type="text/javascript">
            function suggest(inputString){
                if(inputString.length == 0) {
                    jQuery('#suggestions').fadeOut();
                } else {
                jQuery('#big-search').addClass('load');
                    jQuery.post("<?php  bloginfo( 'siteurl' ); ?>/wp-admin/admin-ajax.php?action=autosuggest_it", {queryString: ""+inputString+""}, function(data){
                        if(data.length >0) {
                            var stringa = data.charAt(data.length-1);
                            if(stringa == '0') data = data.slice(0, -1);
                            else data = data.slice(0, -2);
                            jQuery('#suggestions').fadeIn();
                            jQuery('#suggestionsList').html(data);
                            jQuery('#big-search').removeClass('load');
                        }
                    });
                }
            }
            function fill(thisValue) {
                jQuery('#big-search').val(thisValue);
                setTimeout("jQuery('#suggestions').fadeOut();", 600);
            }
            jQuery(document).ready(function(){
                jQuery(".expnd_col").click(function() {
                    var rels = jQuery(this).attr('rel');
                    jQuery("#term_submenu" + rels).toggle();
                    return false;
                });
            });
        </script>
        <?php
            $PricerrTheme_color_for_footer = get_option( 'PricerrTheme_color_for_footer' );

            if ( !empty( $PricerrTheme_color_for_footer ) )
            {
                echo '<style> #footer { background:#'.$PricerrTheme_color_for_footer.' }</style>';
            }

            $PricerrTheme_color_for_bk = get_option( 'PricerrTheme_color_for_bk' );

            if ( !empty( $PricerrTheme_color_for_bk ) )
            {
                echo '<style> body { background:#'.$PricerrTheme_color_for_bk.' }</style>';
            }

            $PricerrTheme_color_for_top_links = get_option( 'PricerrTheme_color_for_top_links' );

            if ( !empty( $PricerrTheme_color_for_top_links ) )
            {
                echo '<style> .top-links { background:#'.$PricerrTheme_color_for_top_links.' }</style>';
            }

            //----------------------
            $PricerrTheme_home_page_layout = get_option( 'PricerrTheme_home_page_layout' );

            if ( PricerrTheme_is_home() ):
                if ( $PricerrTheme_home_page_layout == "4" ):
                    echo '<style>#content { float:right } #right-sidebar { float:left; }</style>';
                endif;

                if ( $PricerrTheme_home_page_layout == "5" ):
                    echo '<style>#content { width:100%; } .main-how-it-works{ width:100% }</style>';
                endif;

                if ( $PricerrTheme_home_page_layout == "3" ):
                    echo '<style>#content { width:520px } .title_holder { width:385px; } #left-sidebar{	margin-right:15px;}
                                                    .main-how-it-works { width:520px; } .i_will_mainbox{ width:240px } .how-does-it-work-btn { top:30% }</style>';
                endif;

                if ( $PricerrTheme_home_page_layout == "2" ):
                    echo '<style>#content { width:520px } #left-sidebar{ float:right } #left-sidebar{ margin-right:15px; } .title_holder { width:385px; }
                                                    .main-how-it-works { width:520px; } .i_will_mainbox{ width:240px } .how-does-it-work-btn { top:30% }</style>';
                endif;
            endif;

            if ( is_tax() or is_archive() )
            {
                $opt = get_option( 'PricerrTheme_taxonomy_page_with_sdbr' );

                if ( $opt != "no" )
                {
                    echo '<style> .post_thumb { width:180px; } .title_holder { width:455px } </style>';
                }
                else
                {
                    echo '<style> #content { width:100% } </style>';
                }

            }

            $PricerrTheme_enable_second_footer = get_option( 'PricerrTheme_enable_second_footer' );

            if ( $PricerrTheme_enable_second_footer == "yes" )
            {
                echo '<style>#footer { margin-top:0; }</style>';
            }

        ?>
        <meta name = "viewport" content = "width = device-width">
    </head>
    <body <?php body_class(); ?> >
    <div id="header">
        <div class="middle-header-bg">
            <div class="middle-header" id="middle-header-id">
                <?php
                $logo = get_option('PricerrTheme_logo_url');
                if (empty($logo)) {
                    $logo = get_bloginfo('template_url') . '/images/logo.png';
                }
                ?>
                <a href="<?php bloginfo('siteurl'); ?>"><img id="logo" src="<?php echo $logo; ?>" /></a>

                 <?php
                 if (!is_user_logged_in())
                 {
                 ?>
                <div class="login-link">
                    <div><a href="<?php echo wp_registration_url( home_url() ); ?>"><h4>Register</h4></a></div>
                    <div><h4>&nbsp;/&nbsp;</h4></div>
                    <div><a href="<?php echo wp_login_url( home_url() ); ?>"><h4>Log In</h4></a></div>
                </div>
                 <?php
                 } else {
                 ?>
                     <!--TO DO-->
                 <?php
                 }
                 ?>
            </div> <!-- middle-header-bg -->
        </div>
    </div>
    <div id="row" style="background-color: #f7f7f7;">
        <div class="col-xs-12 portal">
            <div class="col-sm-6">
                <div class="left-portal">
                    <div class="portal-circle trainme">
                        <a href="<?php echo site_url(); ?>/trainme">
                            <span class="portal-logo">Train Me</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="right-portal">
                    <div class="portal-circle gorupme">
                        <a href="<?php echo site_url(); ?>/groupme">
                            <span class="portal-logo">Group Me</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="col-xs-12 center">
            <span class="slogan-line-1">At your campus, at your convenience</span>
            <span class="slogan-line-2">Let’s get active</span>
        </div>
    </div>
    <div class="guide-section">
        <div class="guide-link-groups">
            <div class="col-sm-5">
                <a class="student-htu-link feature_job" href="<?php echo PricerrTheme_switch_how_to_use_from_portal_page('student'); ?>">Student</a>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-5">
                <a class="trainer-htu-link feature_job" href="<?php echo PricerrTheme_switch_how_to_use_from_portal_page('trainer'); ?>">Trainer</a>
            </div>
        </div>
        <div id="how-to-use">
            <?php
                if (PricerrTheme_get_current_how_to_use() == "trainer") {
                    putRevSlider("trainer_how_to_use");
                } else {
                    putRevSlider("student_how_to_use");
                }
            ?>
        </div>
    </div>
    <div id="portal-footer"><!-- START FOOTER -->
        <div id="footer-bottom" class="clear">
            <div class="control-size clear">
                <div class="one">
                    <div class="one-half">
                        <?php echo $options_theme['footer_text']; ?>
                    </div>

                    <div class="one-half last">
                        <?php
                        wp_nav_menu( array( 'theme_location' => 'footer_menu' ,
                            'container' => false,
                            'menu_class' => 'menu',
                            'menu_id' => 'menu-footer',
                            'fallback_cb' => 'footer_fallback'
                        ) );
                        ?>
                    </div>
                </div>
            </div>
        </div><!--END FOOTER-BOTTOM-->
    </div><!-- END FOOTER -->
<?php wp_footer(); ?>