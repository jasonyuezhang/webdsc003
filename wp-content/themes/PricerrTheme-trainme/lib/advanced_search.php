<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

function PricerrTheme_posts_where($where)
{

	global $wpdb, $term;
	$where .= " AND ({$wpdb->posts}.post_title LIKE '%$term%' OR {$wpdb->posts}.post_content LIKE '%$term%')";

	return $where;
}

function PricerrTheme_adv_src_area_function()
{

	$my_order = PricerrTheme_get_current_order_by_thing();
	$start_date_filter = PricerrTheme_get_start_date_filter();
	$college_filter = PricerrTheme_get_college_filter();

	?>
	<div class="filter_jobs">
		<div class="padd5">
			<div class="col-sm-4 clear pleft0">
				<div class="filter_div"><?php _e("Sort by:", 'PricerrTheme'); ?></div>
				<ul id="filter_jobs_list">
					<li>
						<a href="<?php echo PricerrTheme_filter_switch_link_from_home_page('post_date'); ?>" <?php echo($my_order == "post_date" ? 'class="active_link"' : ""); ?>><?php _e("Post Date", "PricerrTheme"); ?></a>
					</li>
					<li>
						<a href="<?php echo PricerrTheme_filter_switch_link_from_home_page('start_date'); ?>" <?php echo($my_order == "start_date" ? 'class="active_link"' : ""); ?>><?php _e("Start Date", "PricerrTheme"); ?></a>
					</li>
					<li>
						<a href="<?php echo PricerrTheme_filter_switch_link_from_home_page('rating'); ?>" <?php echo($my_order == "rating" ? 'class="active_link"' : ""); ?>><?php _e("Rating", "PricerrTheme"); ?></a>
					</li>
				</ul>
			</div>
			<div class="col-sm-3 clear pleft0">
				<div class="filter_div"><?php _e("College:", 'PricerrTheme'); ?></div>
				<div>
					<div class="college-dropdown">
						<select id="college-filter" class="college-dropdown">
							<option value="" <?php echo ($college_filter == "") ? "selected":"" ?>>All Colleges</option>
							<option value="ucsd" <?php echo ($college_filter == "ucsd") ? "selected":"" ?>>UCSD</option>
							<option value="sdsu" <?php echo ($college_filter == "sdsu") ? "selected":"" ?>>SDSU</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-sm-3 clear pleft0">
				<div class="filter_div"><?php _e("Start Date:", 'PricerrTheme'); ?></div>
				<div id="date_filter_jobs_list">
					<div class="date-filter-container">
						<input id="date-filter" type="button" value="<?php echo $start_date_filter; ?>">
						<a id="filter-clear" href="<?php echo PricerrTheme_filter_change_start_date(""); ?>">&times;</a>
						<a id="date-filter-search" href="<?php echo PricerrTheme_filter_change_start_date($start_date_filter); ?>">Search</a>
					</div>
				</div>
			</div>
			<?php
			$view = PricerrTheme_get_current_view_grid_list();
			echo '<div class="switchers col-sm-2 clear pright0">';
			echo '<div class="switch-view-link-container">';
			if ($view != "grid") {
				echo '<a href="' . PricerrTheme_switch_link_from_home_page('grid') . '" class="grid-jobs"></a>';
				echo '<a href="' . PricerrTheme_switch_link_from_home_page('list') . '" class="list-jobs-selected"></a>';
			} else {
				echo '<a href="' . PricerrTheme_switch_link_from_home_page('grid') . '" class="grid-jobs-selected"></a>';
				echo '<a href="' . PricerrTheme_switch_link_from_home_page('list') . '" class="list-jobs"></a>';
			}
			echo '</div>';
			echo '<div class="filter_div switch-view-link">' . __('Switch View:', 'PricerrTheme') . '</div>';
			echo '</div>'; ?>
		</div>
	</div>
	<?php

	$meta_querya = array();

	global $term;
	$term = trim(strip_tags($_GET['term1']));

	if (!empty($_GET['term1'])) {
		add_filter('posts_where', 'PricerrTheme_posts_where');

	}

	if (isset($_GET['order'])) $order = $_GET['order'];
	else $order = "DESC";

	if (isset($_GET['orderby'])) $orderby = $_GET['orderby'];
	else $orderby = "meta_value";

	if (isset($_GET['meta_key'])) $meta_key = $_GET['meta_key'];
	else $meta_key = "featured";

//	if ($my_order == "new") {
//		$orderby = "date";
//		$meta_key = "";
//	}
//
//	if ($my_order == "views") {
//		$orderby = "meta_value";
//		$meta_key = "views";
//	}

	if ($my_order == "post_date") {
		$orderby = "date";
		$meta_key = "";
	}

	if ($my_order == "start_date") {
		$meta_key = "start_datetime";
		$orderby = "meta_value_num";
	}

	if ($my_order == "rating") {
		$meta_key = "trainer_score";
		$orderby  = "meta_value_num";
	}

//	if ($my_order == "express") {
//		$express = array(
//			'key' => 'max_days',
//			'value' => "1",
//			'compare' => '='
//		);
//	}
//
//	if ($my_order == "instant") {
//		$instant = array(
//			'key' => 'instant',
//			'value' => "1",
//			'compare' => '='
//		);
//	}

	$closed = array(
		'key' => 'active',
		'value' => "1",
		//'type' => 'numeric',
		'compare' => '='
	);

	if (!empty($start_date_filter)) {
		$start_date_array = array(
			'key' => 'start_date',
			'value' => $start_date_filter,
			//'type' => 'numeric',
			'compare' => '='
		);
	}

	if (!empty($college_filter)) {
		$college_array = array(
			'key' => 'college',
			'value' => $college_filter,
			'compare' => '='
		);
	}

	if (isset($_GET['featured'])) {
		if ($_GET['featured'] == "1"):
			$featured = array(
				'key' => 'featured',
				'value' => "1",
				//'type' => 'numeric',
				'compare' => '='
			);
		endif;
	}

	if (!empty($_GET['job_location_cat'])) $loc = array(
		'taxonomy' => 'job_location',
		'field' => 'slug',
		'terms' => $_GET['job_location_cat']

	);
	else $loc = '';


	if (!empty($_GET['job_cat'])) $adsads = array(
		'taxonomy' => 'job_cat',
		'field' => 'slug',
		'terms' => $_GET['job_cat']

	);
	else $adsads = '';

	array_push($meta_querya, $closed);
//	array_push($meta_querya, $express);
//	array_push($meta_querya, $instant);
//	array_push($meta_querya, $featured);
	array_push($meta_querya, $start_date_array);
	array_push($meta_querya, $college_array);

	//-----------------------------------------------------

	$nrpostsPage = 10;

	if (isset($_GET['pj'])) $pj = $_GET['pj'];
	else $pj = 1;

	$my_page = $pj;


	$args = array('posts_per_page' => $nrpostsPage, 'paged' => $pj, 'post_type' => 'job', 'order' => $order, 'meta_query' => $meta_querya, 'meta_key' => $meta_key, 'orderby' => $orderby, 'tax_query' => array($loc, $adsads));
	$the_query = new WP_Query($args);

	$nrposts = $the_query->found_posts;
	$totalPages = ceil($nrposts / $nrpostsPage);
	$pagess = $totalPages;


	?>

	<div id="content">


		<?php


		// The Loop
		$my_arr = array();
		$i = 0;

		if ($the_query->have_posts()):
			while ($the_query->have_posts()) : $the_query->the_post();


				if ($view != "grid")
					PricerrTheme_get_post();
				else
					PricerrTheme_get_post_thumbs();


			endwhile;
			//********************** pagination ***********************************
			?>

			<div class="nav">
				<?php

				$batch = 10; //ceil($page / $nrpostsPage );
				$end = $batch * $nrpostsPage;
				$pages_curent = $my_page;

				if ($end > $pagess) {
					$end = $pagess;
				}
				$start = $end - $nrpostsPage + 1;

				if ($start < 1) $start = 1;

				$links = '';


				$raport = ceil($my_page / $batch) - 1;
				if ($raport < 0) $raport = 0;

				$start = $raport * $batch + 1;
				$end = $start + $batch - 1;
				$end_me = $end + 1;
				$start_me = $start - 1;

				if ($end > $totalPages) $end = $totalPages;
				if ($end_me > $totalPages) $end_me = $totalPages;

				if ($start_me <= 0) $start_me = 1;

				$previous_pg = $page - 1;
				if ($previous_pg <= 0) $previous_pg = 1;

				$next_pg = $pages_curent + 1;
				if ($next_pg > $totalPages) $next_pg = 1;


				//PricerrTheme_get_browse_jobs_link($job_tax, $job_category, 'new', $page)

				if ($my_page > 1)
					echo '<a href="' . PricerrTheme_get_adv_search_pagination_link($previous_pg) . '"><< ' . __('Previous', 'PricerrTheme') . '</a>';
				echo '<a href="' . PricerrTheme_get_adv_search_pagination_link($start_me) . '"><<</a>';

				//------------------------
				//echo $start." ".$end;
				for ($i = $start; $i <= $end; $i++) {
					if ($i == $pages_curent) {
						echo '<a class="activee" href="#">' . $i . '</a>';
					} else {

						echo '<a href="' . PricerrTheme_get_adv_search_pagination_link($i) . '">' . $i . '</a>';

					}
				}

				//----------------------

				if ($totalPages > $my_page)
					echo '<a href="' . PricerrTheme_get_adv_search_pagination_link($end_me) . '">>></a>';
				echo '<a href="' . PricerrTheme_get_adv_search_pagination_link($next_pg) . '">' . __('Next', 'PricerrTheme') . ' >></a>';

				?>
			</div> <?php


		//*********************************************************************

		else:

			_e('No results found.', 'PricerrTheme');

		endif;

		?>


	</div>

	<!--<div id="right-sidebar">
		<ul class="xoxo">
			<li class="widget-container">
				<h4 class="title widget-title"><?php _e('Search Filters', 'PricerrTheme') ?></h4>

				<form method="get">
					<table width="100%">
						<tr>
							<td><?php _e('Category:', 'PricerrTheme') ?></td>
							<td><?php

								$selected = $_GET['job_cat'];
								echo PricerrTheme_get_categories_slug_2_top_header('job_cat', $selected, __("Everything", 'PricerrTheme'), "my_select_1") ?></td>
						</tr>


						<tr>
							<td><?php _e('Location:', 'PricerrTheme') ?></td>
							<td><?php

								$selected = $_GET['job_location_cat'];
								echo PricerrTheme_get_categories_slug_2_top_header('job_location', $selected, __("Everywhere", 'PricerrTheme'), "my_select_2") ?></td>
						</tr>


						<tr>
							<td></td>
							<td><br/><input type="submit" value="<?php _e('Filter Results', 'PricerrTheme') ?>"
							                name="research_me"/></td>
						</tr>

					</table>
				</form>
			</li>


			<?php dynamic_sidebar('other-page-area'); ?>
		</ul>
	</div>-->
<?php

}

?>