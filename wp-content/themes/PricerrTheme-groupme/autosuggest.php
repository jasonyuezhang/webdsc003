<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/


add_action('wp_ajax_autosuggest_it', 'PricerrTheme_autosuggest_it');
add_action('wp_ajax_nopriv_autosuggest_it', 'PricerrTheme_autosuggest_it');


function PricerrTheme_autosuggest_it()
{

    include('classes/stem.php');
    include('classes/cleaner.php');
    global $wpdb;

    $string = $_POST['queryString'];
    $stemmer = new Stemmer;
    $stemmed_string = $stemmer->stem($string);

    $clean_string = new jSearchString();
    $stemmed_string = $clean_string->parseString($stemmed_string);

    $new_string = '';
    foreach (array_unique(split(" ", $stemmed_string)) as $array => $value) {
        if (strlen($value) >= 1) {
            $new_string .= '' . $value . ' ';
        }
    }


    //$new_string = substr ( $new_string,0, ( strLen ( $new_string ) -1 ) );
    $new_string = htmlspecialchars($_POST['queryString']);


    if (strlen($new_string) > 0):

        $split_stemmed = split(" ", $new_string);


        $sql = "SELECT DISTINCT COUNT(*) as occurences, " . $wpdb->prefix . "posts.post_title, " . $wpdb->prefix . "posts.ID FROM " . $wpdb->prefix . "posts,
			" . $wpdb->prefix . "postmeta WHERE " . $wpdb->prefix . "posts.post_status='publish' and
			" . $wpdb->prefix . "posts.post_type='job'
			
					AND " . $wpdb->prefix . "posts.ID = " . $wpdb->prefix . "postmeta.post_id
					AND " . $wpdb->prefix . "postmeta.meta_key = 'closed'
					AND " . $wpdb->prefix . "postmeta.meta_value = '0'
			
			AND (";

        while (list ($key, $val) = each($split_stemmed)) {
            if ($val != '' && strlen($val) > 0) {
                $sql .= "(" . $wpdb->prefix . "posts.post_title LIKE '%" . $val . "%' OR " . $wpdb->prefix . "posts.post_content LIKE '%" . $val . "%') OR";
            }
        }

        $sql = substr($sql, 0, (strlen($sql) - 3)); //this will eat the last OR
        $sql .= ") GROUP BY " . $wpdb->prefix . "posts.post_title ORDER BY occurences DESC LIMIT 10";


        /*
        SELECT DISTINCT COUNT(*) as occurences, wp_posts.post_title FROM wp_posts, wp_postmeta WHERE wp_posts.post_status='publish' and wp_posts.post_type='job' AND wp_posts.ID = wp_postmeta.post_id AND wp_postmeta.meta_key = 'closed' AND wp_postmeta.meta_value = '0' AND ((wp_posts.post_title LIKE '%test%' OR wp_posts.post_content LIKE '%test%')) GROUP BY wp_posts.post_title ORDER BY occurences DESC LIMIT 10 */

        $r = $wpdb->get_results($sql, ARRAY_A);

        if (count($r) > 0):


            foreach ($r as $row) {


                echo '<ul id="sk_auto_suggest">';
                $prm = get_permalink($row['ID']);

                echo '<li onClick="window.location=\'' . $prm . '\';">' . PricerrTheme_wrap_the_title($row['post_title'], $row['ID']) . '</li>';

                echo '</ul>';

            }
        else:


            echo '<ul>';

            echo '<li onClick="fill(\'' . $new_string . '\');">' . __('No results found', 'PricerrTheme') . '</li>';

            echo '</ul>';


        endif;
    endif;


}


?>