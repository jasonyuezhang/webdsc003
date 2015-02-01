<?php
function my_admin_styles() 
{   
    wp_register_style( 'fitness_admin_style', SYSTEM_ROOT."/includes/fitness_admin_style.css");
    wp_enqueue_style( 'fitness_admin_style' );    
    wp_enqueue_style('thickbox'); 
}
add_action('admin_print_styles', 'my_admin_styles'); 

function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('my-upload');
    echo '<meta name="SYSTEM_VAR_PREFIX" content="'.SYSTEM_VAR_PREFIX.'">';
    
}

function my_admin_jquery() {
    wp_register_script( 'fitness_admin', SYSTEM_ROOT."/includes/fitness_admin.js");
    wp_enqueue_script('fitness_admin');
    wp_register_script("fitness_dashboard_twitter", SYSTEM_ROOT."/includes/twitter.js"); 
    wp_enqueue_script('fitness_dashboard_twitter');  
}
add_action('admin_print_scripts', 'my_admin_jquery');

// Add custom taxonomies and custom post types counts to dashboard
add_action( 'right_now_content_table_end', 'my_add_counts_to_dashboard' );
function my_add_counts_to_dashboard() {
    // Custom taxonomies counts
    $taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
    foreach ( $taxonomies as $taxonomy ) {
        $num_terms  = wp_count_terms( $taxonomy->name );
        $num = number_format_i18n( $num_terms );
        $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
        $associated_post_type = $taxonomy->object_type;
        if ( current_user_can( 'manage_categories' ) ) {
            $num = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . '</a>';
            $text = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $text . '</a>';
        }
        echo '<td class="first b b-' . $taxonomy->name . 's">' . $num . '</td>';
        echo '<td class="t ' . $taxonomy->name . 's">' . $text . '</td>';
        echo '</tr><tr>';
    }

    // Custom post types counts
    $post_types = get_post_types( array( '_builtin' => false ), 'objects' );
    foreach ( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
        if ( current_user_can( 'edit_posts' ) ) {
            $num = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . '</a>';
            $text = '<a href="edit.php?post_type=' . $post_type->name . '">' . $text . '</a>';
        }
        echo '<td class="first b b-' . $post_type->name . 's">' . $num . '</td>';
        echo '<td class="t ' . $post_type->name . 's">' . $text . '</td>';
        echo '</tr>';

        if ( $num_posts->pending > 0 ) {
            $num = number_format_i18n( $num_posts->pending );
            $text = _n( $post_type->labels->singular_name . ' pending', $post_type->labels->name . ' pending', $num_posts->pending );
            if ( current_user_can( 'edit_posts' ) ) {
                $num = '<a href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $num . '</a>';
                $text = '<a href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $text . '</a>';
            }
            echo '<td class="first b b-' . $post_type->name . 's">' . $num . '</td>';
            echo '<td class="t ' . $post_type->name . 's">' . $text . '</td>';
            echo '</tr>';
        }
    }
}

add_filter('manage_edit-gallery_item_columns', 'add_new_gallery_item_columns');

function add_new_gallery_item_columns($gallery_item_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';

    $new_columns['title'] = __('Gallery Item', 'column name');
    
    $new_columns['author'] = __('Author');

    $new_columns['gallery_category'] = __('Gallery Categories');
    $new_columns['tags'] = __('Tags');
    
    $new_columns['thumb'] = __('Thumb');

    $new_columns['date'] = __('Date', 'column name');

    return $new_columns;
}

// Add to admin_init function
add_action('manage_gallery_item_posts_custom_column', 'manage_gallery_item_columns', 10, 2);

function manage_gallery_item_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {

    case 'gallery_category':
        // Get number of images in gallery
        echo get_the_term_list( $id, 'gallery_category', '', ', ', '' );
        break;    
        
    case 'thumb':
        echo the_post_thumbnail( array(100, 60) );
        break;
    default:
        break;
    } // end switch
}


add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
    $defaults['fitness_post_thumbs'] = __('Thumb');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
    if($column_name === 'fitness_post_thumbs'){
        echo the_post_thumbnail( array(100, 60) );
    }
}

add_post_type_support( 'page', 'excerpt' );


function all_names($post_or_page)
{
    global $wpdb;
    $results = $wpdb->get_results("SELECT post_name FROM $wpdb->posts
        WHERE post_status = 'publish' AND post_type = '$post_or_page' ORDER BY post_title");

    foreach ($results as $result) 
    {
        $names[] = $result->post_name;
    }
    return $names;
}

function all_titles($post_or_page)
{
global $wpdb;
    $results = $wpdb->get_results("SELECT post_title FROM $wpdb->posts 
    WHERE post_status = 'publish' AND post_type = '$post_or_page' ORDER BY post_title");

    foreach ($results as $result) 
    {
        $titles[] = $result->post_title;
    }
    return $titles;
}

function all_IDs($post_or_page)
{
    global $wpdb;
    $results = $wpdb->get_results("SELECT ID FROM $wpdb->posts
        WHERE post_status = 'publish' AND post_type = '$post_or_page' ORDER BY post_title");

    foreach ($results as $result) 
    {
        $IDs[] = $result->ID;
    }
    return $IDs;
}

function fitness_what_to_show($field, $default, $echo = true)
{
    $saved = get_option($field);
    if ($saved == "") $show = $default;
    else $show = $saved;
    
    if ($echo) echo $show; else return $show;
}

function fitness_form_text($id, $title = null, $width = 500, $default = null, $desc = null, $class = null)
{
    $html = "<tr valign='top' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "  <input type='text' name='$id' id='$id' value=\"". fitness_what_to_show($id, $default, false)."\" style='width:" . $width . "px'/>\n";
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    echo $html;
}


function fitness_form_textarea($id, $title = null, $width = 500, $rows = 4, $default = null, $desc = null, $class = null)
{
    $html = "<tr valign='top' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<textarea rows='$rows' name='$id' id='$id' style='width:" . $width . "px'>". fitness_what_to_show($id, $default, false) ."</textarea>\n";
    //$html .= fitness_what_to_show($id, $default, false)."\n";
    //$html .= "</textarea>\n"; 
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    echo $html;
}


function fitness_form_select($id, $title = null, $options = null, $default = "Please select", $desc = null, $class = null)
{
    $default_selected = "";
    $db_value = get_option($id);
    if ($db_value == $default || $db_value == "") $default_selected = 'selected="selected"'; 
    $html = "<tr valign='top'  id='tr_$id' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<select id='$id' name='$id' >\n"; 
    if ($default != "") $html .= "<option ". $default_selected .">$default</option>\n";
    $no_of_options = count($options);
    foreach ($options as $value => $option)
    {
        if ($db_value == $value) $selected = 'selected="selected"'; else $selected = "";
        $html .= "<option value=\"$value\" $selected>$option</option>\n";
    }
    $html .= "</select>\n";
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "</td>\n";
    $html .= "</tr>\n";
    
    
    
    
    echo $html;
    
}

function fitness_form_upload($id = "", $title = null, $default = null, $desc = "Upload file, or choose it from the media library", $submit = "Upload", $class = null)
{
    $html = "<tr valign='top'  id='tr_$id' class='$class'>\n";
    $html .= "<th scope='row'><label for='$id'>$title</label></th>\n";
    $html .= "<td>\n";
    $html .= "<input id='$id' type='text' style='width:400px' name='$id' value='".fitness_what_to_show($id, $default, false)."' />\n";
    $html .= "<input id='$id"."_button' type='button' value='$submit' />\n";
    $html .= "<script type=\"text/javascript\">\n";
    $html .= "jQuery(document).ready(function() {\n";
    $html .= "jQuery('#$id"."_button').click(function() {\n";
    $html .= "formfield = jQuery('#$id').attr('name');\n";
    $html .= "tb_show('Select image', 'media-upload.php?type=image&amp;TB_iframe=true');\n"; 
    $html .= "window.send_to_editor = function(html) {\n"; 
    $html .= "imgurl = jQuery('img',html).attr('src');\n"; 
    $html .= "jQuery('#$id').val(imgurl);\n"; 
    $html .= "tb_remove();\n";
    $html .= "}\n";
    $html .= "return false;\n";
    $html .= "});\n";
    $html .= "})\n"; 
    $html .= "</script>\n"; 
    $html .= "<span class='description'>$desc</span>\n";
    $html .= "<div id='". $id ."_show'><img src='".fitness_what_to_show($id, $default, false)."'></div>\n"; 
    $html .= "</td>\n";
    $html .= "</tr>\n";
    
    echo $html;
}

function fitness_form_submit()
{
    $html = "<p class='submit'> \n";
    $html .= "<input type='submit' value='Save Changes' class='button-primary' id='submit' name='submit'>\n";
    $html .= "</p>\n";
    echo $html;
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'blog-square', 270, 270, true ); //300 pixels wide (and unlimited height)

}

function default_options()
{
    add_option(SYSTEM_VAR_PREFIX."color", "orange"); 
    
    add_option(SYSTEM_VAR_PREFIX."logo", SYSTEM_ROOT."/images/logo-min.png");
    add_option(SYSTEM_VAR_PREFIX."logo2", SYSTEM_ROOT."/images/logo-min.png");
    
    add_option(SYSTEM_VAR_PREFIX."custom_google_font", "font-family: 'Oswald', sans-serif;");
    add_option(SYSTEM_VAR_PREFIX."custom_google_font_href", "<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css' />");
    
    add_option(SYSTEM_VAR_PREFIX."boxed_stretched", "stretched");
    
    add_option(SYSTEM_VAR_PREFIX."blog_single_page_style", "6");
    
    add_option(SYSTEM_VAR_PREFIX."use_captcha", "no");
    
    add_option(SYSTEM_VAR_PREFIX."email_to", "youremail@youremail.com");
    add_option(SYSTEM_VAR_PREFIX."email_from", "youremail@youremail.com");
    
    add_option(SYSTEM_VAR_PREFIX."contact_form_location", "Chicago");
    add_option(SYSTEM_VAR_PREFIX."contact_form_zoom", "15");  
}
if (get_option(SYSTEM_VAR_PREFIX."color") == "" || get_option(SYSTEM_VAR_PREFIX."use_captcha") == "" || get_option(SYSTEM_VAR_PREFIX."blog_single_page_style") == "" ) default_options();


 add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() 
{
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'FitnessWP updates', 'custom_dashboard_system');
}

function custom_dashboard_system() 
{
    ?>
    <h4>Follow us on <a href="http://twitter.com/user">Twitter</a> to get latest updates.  </h4>
<div id="fitness_dashboard_twitter"></div>    
    <?php
}

// Create the function to use in the action hook

function example_remove_dashboard_widgets() {
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
} 

// Hoook into the 'wp_dashboard_setup' action to register our function

add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );


?>