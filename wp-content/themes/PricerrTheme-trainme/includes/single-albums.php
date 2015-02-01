<?php
/**
 * The template for displaying single menu entries
 *
 *
 */

 $settings = get_option( "ntl_theme_settings" );

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	

	<div class="outer">
		<div class="frameset container clear">
			<?php if ($settings['ntl_disable_audio'] != 'off'){	?>
			<div class="clear headtop">	
				<div class="page-title" >
					<h1 class="vfont"><?php the_title(); ?></h1>
				</div>
										
				<?php echo lets_get_albumselector(); ?>						
				<?php echo lets_get_musicplayer(); ?>
					
			</div>				
			<?php } else { ?>
			
			<div class="clear headtop" style="height: auto;">					
				<div class="page-title" style="width: 100%; margin-bottom: 40px;">
					<h1 class="vfont"><?php the_title(); ?></h1>
				</div>			
			</div>
			
			<?php } ?>

<div class="bodymid hfeed hpage">
	<?php if ($settings['ntl_disable_audio'] != 'off'){	?>
		<div class="drawer">&nbsp;</div>
	<?php } ?>
	<div id="main" style="margin-bottom: 0px;">
		<div id="content" role="main">
			<div class="container clear">
				<div class="grid8 first">	
					<div id="content" role="main">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<div class="themusic">
								<?php
									$name_meta = get_post_meta(get_the_ID(), 'netlabs_artname' , true);
									if ($settings['ntl_auto_play'] == 'off'){
 										$tautoplay = 'false';
 									} else {
 										$tautoplay = 'true';
 									}
									$output = '';
									$atext = "''";
									$jsoutput1 = '<script type="text/javascript"><!--
var foxInline = [
';
									$jsoutput2 = 'var mp3j_info = [
{ list:mp3jNew_0, type:"MI", tr:0, lstate:false, loop:false, play_txt:"#USE_G#", pause_txt:' . $atext   .', pp_title: ' . $atext   . ', autoplay:' . $tautoplay  . ', has_ul:1, transport:"playpause", status:"full", download:true, vol:55, height:105 }';									
									$arrImages =& get_children('post_type=attachment&orderby=menu_order&order=DESC&post_mime_type=audio/mpeg&post_parent=' . get_the_ID() );
									if ($arrImages){
										$countr = 1;
										$mcounter = 1;
										foreach ( $arrImages as $attachment ) {
											if ($countr %2 == 0)	{$alter = 'salt';} else {$alter ='';}
											$image_attributes = wp_get_attachment_url( $attachment->ID );
											$p1 = get_post_meta($attachment->ID, '_nets_musname' , true);
											$p2 = get_post_meta($attachment->ID, '_nets_muslink' , true); 
											$p3 = get_post_meta($attachment->ID, '_nets_musdownl' , true); 
											$p4 = get_post_meta($attachment->ID, '_nets_lyrlist' , true); 
											$p5 = get_post_meta($attachment->ID, '_nets_altlink' , true);
											$upload_dir = wp_upload_dir();
											
											
											if ($p5 && $p5 != 'No Link') {
												$a_link = $upload_dir['baseurl'] . '/audio/' . $p5;
											} else {
												$a_link = wp_get_attachment_url( $attachment->ID );
											}
											
											
											
											if ($p1) {
												$names_meta = $p1;
											}  else {
												$names_meta = $name_meta;
											}
											
											$cont = '';
											
											if ($p4  && $p4 != 0){
												
												$postkey = get_post($p4);
												$con = $postkey->post_content;
												$tcon = $postkey->post_title;
												$cont = apply_filters('the_content', $con);
												$cont = str_replace(']]>', ']]>', $cont);
												
											}
											
											$output .= '
											<div class="singletitle ' . $alter . ' clear">';
											
											if ($cont) {
												$output .= '<div id="lyr' . $countr . '" class="lyricspost"><h4 class="vfont">' .  $tcon  . '</h4>' . $cont   .  '</div>';
											}
											
											if ($settings['ntl_disable_audio'] != 'off'){
											
											$output .= '<div class="ui360 dwnl">
											
														<div style="font-size:14px; line-height:22px !important; margin:0 !important;">
															<span id="playpause_wrap_mp3j_' . $countr  . '" class="wrap_inline_mp3j" style="font-weight:700;">
																<span class="group_wrap">
																	<span class="bars_mp3j">
																		<span class="loadB_mp3j" id="load_mp3j_' . $countr  . '"></span>
																		<span class="posbarB_mp3j" id="posbar_mp3j_' . $countr  . '"></span>
																	</span>
																	<span class="indi_mp3j" id="indi_mp3j_' . $countr  . '"></span>
																</span>
																<span class="buttons_mp3j" id="playpause_mp3j_' . $countr  . '">&nbsp;</span>
															</span>
														</div></div>';											
											}
											
											if ($cont) {
												$output .= '<span class="dwnl dwnlmore lyrics smallfont"><a href="#" class="viewlyrics" style="color: #313131; padding-top: 0px;margin-top: -5px;" title="view lyrics" rel="#lyr' . $countr . '">' . __('Lyrics', 'localize')  .  '</a></span>';
											}
											
											if ($p2) {
											$output .= '<span class="dwnl dwnlmore"><a href="' . $p2  . '" title="' . __('Buy this track', 'localize')  .  '" target="_blank"><img src="' . get_template_directory_uri() . '/images/shop.png"></a></span>';
											}
											if ($p3 && $p3 != 'No Link') {
											$output .= '<span class="dwnl dwnlmore"><a href="' . lets_get_dwnl($p3)  . '" title="' . __('Download this track', 'localize')  .  '"><img src="' . get_template_directory_uri() . '/images/download.png"></a></span>';
											}
											
											$output .= '<p class="smallfont">' . $countr . '. ' . $attachment->post_title . '<br/><span class="albumartist">' . $names_meta  . ' &nbsp;</span></p></div>';
											
											if ($countr == 1){
											$ptitle = htmlspecialchars($attachment->post_title);
											$ptitle = str_replace("'","&#039;",$ptitle);
											$jsoutput1 .= '{name: "' . $ptitle . '", mp3: "' . $a_link  . '", artist: "' . $names_meta  . '"}';
											} else {
											$ptitle = htmlspecialchars($attachment->post_title);
											$ptitle = str_replace("'","&#039;",$ptitle);	
											$jsoutput1 .= ',
{name: "' . $ptitle . '", mp3: "' . $a_link  . '", artist: "' . $names_meta  . '"}';												
											}
											$jscountr = $countr - 1;
											$jsoutput2 .= ',
{ list:foxInline, type:"single", tr:' .  $jscountr . ', lstate:' .  $atext  . ', loop:false, play_txt:"#USE_G#", pause_txt:' .  $atext  .  ', pp_title:' .  $atext  .  ', autoplay:false, has_ul:0, transport:"playpause", status:"basic", download:false, vol:55, height:' .  $atext . ' }';
											$countr++;
											$mcounter++;
										}
									}
									$jsoutput1 .= '
];

';
									$jsoutput2 .= '
]
//--></script>
';
									echo $output;
									echo $jsoutput1;
									echo $jsoutput2;
								?>
								</div>
								
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</div><!-- #post-## -->
					</div><!-- #content -->
				</div><!-- #container -->
				<div class="grid4">
					<?php 
					$a_lnk = get_post_meta(get_the_ID(), 'netlabs_ltb1label' , true); 
					$b_lnk = get_post_meta(get_the_ID(), 'netlabs_ltb1address' , true); 
					$c_lnk = get_post_meta(get_the_ID(), 'netlabs_ltb2label' , true); 
					$d_lnk = get_post_meta(get_the_ID(), 'netlabs_ltb2address' , true); 
					if ($a_lnk || $c_lnk) {
						if (!$c_lnk) {
							echo '<p class="menu-download darkbox clear" style="margin-top: 20px;"><a class="mfull" href="' . $b_lnk .'" title="' . __('buy from', 'localize')  .  ' ' . $a_lnk . '">' . $a_lnk .'</a></p>';
						} elseif (!$a_lnk) {
							echo '<p class="menu-download darkbox clear" style="margin-top: 20px;"><a class="mfull" href="' . $d_lnk .'" title="' . __('buy from', 'localize')  .  ' ' . $c_lnk . '">' . $c_lnk .'</a></p>';
						} else {
							echo '<p class="menu-download darkbox clear" style="margin-top: 20px;"><a href="' . $b_lnk .'" title="' . __('buy from', 'localize')  .  ' ' . $a_lnk . '">' . $a_lnk .'</a><a href="' . $d_lnk .'" title="' . __('buy from', 'localize')  .  ' ' . $c_lnk . '">' . $c_lnk .'</a></p>';
						}
					}
					?>
					<div class="menu-content">
						<div class="mencontent">
							<div class="imgblock">
								<div class="imlk menimg" >
									<?php the_post_thumbnail('albmlink'); ?> 
								</div> 
							</div>							
						</div>
					</div> 
				
				</div>
			</div>
		</div>
	</div>


<?php endwhile; ?>

</div>

<?php lets_make_carousel(); ?>


								
<?php get_footer(); ?>
