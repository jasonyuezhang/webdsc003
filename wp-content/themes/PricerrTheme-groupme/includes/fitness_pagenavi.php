<?php
/*
Plugin Name: wp-pagenavi_fitness
Plugin URI: http://lesterchan.net/gallery/programming.php
Description: Adds a more advanced paging navigation to your WordPress blog.
Version: 2.20
Author: Lester 'GaMerZ' Chan
Author URI: http://lesterchan.net
*/


/*  
	Copyright 2007  Lester Chan  (email : gamerz84@hotmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


### Create Text Domain For Translations
function pagenavi_fitness_textdomain() {
	load_plugin_textdomain('wp-pagenavi_fitness', 'pagenavi_fitness.php');
}


### Function: Page Navigation Option Menu





### Function: Page Navigation: Boxed Style Paging
function wp_pagenavi_fitness() {
	global $wpdb, $wp_query;
	pagenavi_fitness_init(); //Calling the pagenavi_fitness_init() function
    //print_r($wp_query);
	if (!is_single()) {
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$pagenavi_fitness_options = get_option('pagenavi_fitness_options');
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
        
        //echo "$posts_per_page $paged $numposts $max_page";
		/*
		$numposts = 0;
		if(strpos(get_query_var('tag'), " ")) {
		    preg_match('#^(.*)\sLIMIT#siU', $request, $matches);
		    $fromwhere = $matches[1];			
		    $results = $wpdb->get_results($fromwhere);
		    $numposts = count($results);
		} else {
			preg_match('#FROM\s*+(.+?)\s+(GROUP BY|ORDER BY)#si', $request, $matches);
			$fromwhere = $matches[1];
			$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		}
		$max_page = ceil($numposts/$posts_per_page);
		*/
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pagenavi_fitness_options['num_pages']);
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		if($max_page > 1 || intval($pagenavi_fitness_options['always_show']) == 1) {
			$pages_text = str_replace("%CURRENT_PAGE%", $paged, $pagenavi_fitness_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", $max_page, $pages_text);
			echo '<div class="wp-pagenavi">'."\n";
			switch(intval($pagenavi_fitness_options['style'])) {
				case 1:
					echo ' <span class="pages">'.$pages_text.'</span> ';
					if ($paged >= $pages_to_show_minus_1 && $pages_to_show < $max_page) {
						echo ' <a href="'.get_pagenum_link().'" title="'.$pagenavi_fitness_options['first_text'].'">'.$pagenavi_fitness_options['first_text'].'</a> ';
						if(!empty($pagenavi_fitness_options['dotleft_text'])) {
							echo ' <span class="extend">'.$pagenavi_fitness_options['dotleft_text'].'</span> ';
						}
					}
					previous_posts_link($pagenavi_fitness_options['prev_text']);
					for($i = $start_page; $i  <= $end_page; $i++) {						
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", $i, $pagenavi_fitness_options['current_text']);
							echo ' <span class="current">'.$current_page_text.'</span> ';
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", $i, $pagenavi_fitness_options['page_text']);
							echo ' <a href="'.get_pagenum_link($i).'" title="'.$page_text.'">'.$page_text.'</a> ';
						}
					}
					next_posts_link($pagenavi_fitness_options['next_text'], $max_page);
					if ($end_page < $max_page) {
						if(!empty($pagenavi_fitness_options['dotright_text'])) {
							echo ' <span class="extend">'.$pagenavi_fitness_options['dotright_text'].'</span> ';
						}
						echo ' <a href="'.get_pagenum_link($max_page).'" title="'.$pagenavi_fitness_options['last_text'].'">'.$pagenavi_fitness_options['last_text'].'</a> ';
					}
					break;
				case 2;
					echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="get">'."\n";
					echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";
					for($i = 1; $i  <= $max_page; $i++) {
						$page_num = $i;
						if($page_num == 1) {
							$page_num = 0;
						}
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", $i, $pagenavi_fitness_options['current_text']);
							echo '<option value="'.get_pagenum_link($page_num).'" selected="selected" class="current">'.$current_page_text."</option>\n";
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", $i, $pagenavi_fitness_options['page_text']);
							echo '<option value="'.get_pagenum_link($page_num).'">'.$page_text."</option>\n";
						}
					}
					echo "</select>\n";
					echo "</form>\n";
					break;
			}
			echo '</div>'."\n";
		}
	}
}


### Function: Page Navigation: Drop Down Menu (Deprecated)
function wp_pagenavi_fitness_dropdown() { 
	wp_pagenavi_fitness(); 
}


### Function: Page Navigation Options

function pagenavi_fitness_init() {
	// Add Options
	$pagenavi_fitness_options = array();
	$pagenavi_fitness_options['pages_text'] = __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','wp-pagenavi_fitness');
	$pagenavi_fitness_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_fitness_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_fitness_options['first_text'] = __('&larr;; First','wp-pagenavi_fitness');
	$pagenavi_fitness_options['last_text'] = __('Last &rarr;','wp-pagenavi_fitness');
	$pagenavi_fitness_options['next_text'] = __('&rarr;','wp-pagenavi_fitness');
	$pagenavi_fitness_options['prev_text'] = __('&larr;','wp-pagenavi_fitness');
	$pagenavi_fitness_options['dotright_text'] = __('...','wp-pagenavi_fitness');
	$pagenavi_fitness_options['dotleft_text'] = __('...','wp-pagenavi_fitness');
	$pagenavi_fitness_options['style'] = 1;
	$pagenavi_fitness_options['num_pages'] = 5;
	$pagenavi_fitness_options['always_show'] = 0;
	//add_option('pagenavi_fitness_options', $pagenavi_fitness_options, 'pagenavi_fitness Options');
	
	$update_pagenavi_fitness_queries = array();
	$update_pagenavi_fitness_queries[] = update_option('pagenavi_fitness_options', $pagenavi_fitness_options);
	foreach($update_pagenavi_fitness_queries as $update_pagenavi_fitness_query) {
				$update_pagenavi_fitness_query;
				}
}
?>
