<?php
/*
Plugin Name: Fitness About Us Widget
Plugin URI: http://themeforest.net/user/jaredsdias/
Version: 1.0
Description: About Us
Author: Jared S Dias
Author URI: http://themeforest.net/user/jaredsdias/
License: GPL2
*/
?>
<?php
/**
 * Adds About_Us_Widget widget.
 */
class About_Us_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'About_Us_Widget', // Base ID
			'Fitness : About Us Widget', // Name
			array( 'description' => __( 'A widget displays about us content with social networks', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
        public function widget( $args, $instance ) {
            extract( $args );
			$logoFooter = $instance['logoFooter'];
            $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
            $name = empty($instance['name']) ? '' : apply_filters('widget_name', $instance['name']);
            $about_me = empty($instance['about_me']) ? '' : apply_filters('widget_about_me', $instance['about_me']);
			$aim = empty($instance['aim']) ? '' : apply_filters('widget_aim', $instance['aim']); 
			$apple = empty($instance['apple']) ? '' : apply_filters('widget_apple', $instance['apple']); 
			$behance = empty($instance['behance']) ? '' : apply_filters('widget_behance', $instance['behance']); 
			$blogger = empty($instance['blogger']) ? '' : apply_filters('widget_blogger', $instance['blogger']);
			$cargo = empty($instance['cargo']) ? '' : apply_filters('widget_cargo', $instance['cargo']);
			$delicious = empty($instance['delicious']) ? '' : apply_filters('widget_delicious', $instance['delicious']);  
			$deviantart = empty($instance['deviantart']) ? '' : apply_filters('widget_deviantart', $instance['deviantart']); 
			$digg = empty($instance['digg']) ? '' : apply_filters('widget_digg', $instance['digg']);
			$dopplr = empty($instance['dopplr']) ? '' : apply_filters('widget_dopplr', $instance['dopplr']);
			$dribbble = empty($instance['dribbble']) ? '' : apply_filters('widget_dribbble', $instance['dribbble']); 
			$ember = empty($instance['ember']) ? '' : apply_filters('widget_ember', $instance['ember']);
			$evernote = empty($instance['evernote']) ? '' : apply_filters('widget_evernote', $instance['evernote']);
            $facebook = empty($instance['facebook']) ? '' : apply_filters('widget_facebook', $instance['facebook']);
			$flickr = empty($instance['flickr']) ? '' : apply_filters('widget_flickr', $instance['flickr']);
			$forrst = empty($instance['forrst']) ? '' : apply_filters('widget_forrst', $instance['forrst']);
			$github = empty($instance['github']) ? '' : apply_filters('widget_github', $instance['github']);
			$google = empty($instance['google']) ? '' : apply_filters('widget_google', $instance['google']); 
			$googleplus = empty($instance['googleplus']) ? '' : apply_filters('widget_googleplus', $instance['googleplus']);
			$grooveshark = empty($instance['grooveshark']) ? '' : apply_filters('widget_grooveshark', $instance['grooveshark']);
			$html5 = empty($instance['html5']) ? '' : apply_filters('widget_html5', $instance['html5']);
			$icloud = empty($instance['icloud']) ? '' : apply_filters('widget_icloud', $instance['icloud']);
			$lastfm = empty($instance['lastfm']) ? '' : apply_filters('widget_lastfm', $instance['lastfm']);
			$linkedin = empty($instance['linkedin']) ? '' : apply_filters('widget_linkedin', $instance['linkedin']);
			$metacafe = empty($instance['metacafe']) ? '' : apply_filters('widget_metacafe', $instance['metacafe']);
			$mixx = empty($instance['mixx']) ? '' : apply_filters('widget_mixx', $instance['mixx']);
			$myspace = empty($instance['myspace']) ? '' : apply_filters('widget_myspace', $instance['myspace']);
			$netvibes = empty($instance['netvibes']) ? '' : apply_filters('widget_netvibes', $instance['netvibes']);
			$newsvine = empty($instance['newsvine']) ? '' : apply_filters('widget_newsvine', $instance['newsvine']);
			$orkut = empty($instance['orkut']) ? '' : apply_filters('widget_orkut', $instance['orkut']);
			$paypal = empty($instance['paypal']) ? '' : apply_filters('widget_paypal', $instance['paypal']); 
			$picasa = empty($instance['picasa']) ? '' : apply_filters('widget_picasa', $instance['picasa']); 
			$pinterest = empty($instance['pinterest']) ? '' : apply_filters('widget_pinterest', $instance['pinterest']);
			$posterous = empty($instance['posterous']) ? '' : apply_filters('widget_posterous', $instance['posterous']);
			$reddit = empty($instance['reddit']) ? '' : apply_filters('widget_reddit', $instance['reddit']);
			$rss = empty($instance['rss']) ? '' : apply_filters('widget_rss', $instance['rss']); 
			$skype = empty($instance['skype']) ? '' : apply_filters('widget_skype', $instance['skype']); 
			$stumbleupon = empty($instance['stumbleupon']) ? '' : apply_filters('widget_stumbleupon', $instance['stumbleupon']);
			$technorati = empty($instance['technorati']) ? '' : apply_filters('widget_technorati', $instance['technorati']);
			$tumblr = empty($instance['tumblr']) ? '' : apply_filters('widget_tumblr', $instance['tumblr']); 
            $twitter = empty($instance['twitter']) ? '' : apply_filters('widget_twitter', $instance['twitter']);
			$vimeo = empty($instance['vimeo']) ? '' : apply_filters('widget_vimeo', $instance['vimeo']);
			$wordpress = empty($instance['wordpress']) ? '' : apply_filters('widget_wordpress', $instance['wordpress']);
			$yahoo = empty($instance['yahoo']) ? '' : apply_filters('widget_yahoo', $instance['yahoo']); 
			$yelp = empty($instance['yelp']) ? '' : apply_filters('widget_yelp', $instance['yelp']);
            $youtube = empty($instance['youtube']) ? '' : apply_filters('widget_youtube', $instance['youtube']);
			$zerply = empty($instance['zerply']) ? '' : apply_filters('widget_zerply', $instance['zerply']);
			$zootool = empty($instance['zootool']) ? '' : apply_filters('widget_zootool', $instance['zootool']);
			
			
            
            echo $before_widget;
            if ( ! empty( $title ) )
			echo $before_title . $title . $after_title; ?>
            
            <!-- front display here -->
            <div>
                <div class="logo-footer"><img src="<?php echo$logoFooter;?>" /></div>
                <div style="font-weight: bold; padding: 0 0 2px 0;">
                    <?php echo $name; ?>
                </div>
                <div style="text-align: justify;">
                    <?php echo $about_me; ?>
                </div>
                <div class="social-icons-container">
                <ul>
                	<li>
                    <?php if($aim) { ?>
                        <a href="<?php echo $aim; ?>" target="_blank" title="aim" class="social-aim social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($apple) { ?>
                        <a href="<?php echo $apple; ?>" target="_blank" title="apple" class="social-apple social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($behance) { ?>
                        <a href="<?php echo $behance; ?>" target="_blank" title="behance" class="social-behance social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($blogger) { ?>
                        <a href="<?php echo $blogger; ?>" target="_blank" title="blogger" class="social-blogger social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
					<?php if($cargo) { ?>
					<a href="<?php echo $cargo; ?>" target="_blank" title="cargo" class="social-cargo social-global"></a>
					<?php } ?>
					</li>
                    <li>
                    <?php if($delicious) { ?>
                        <a href="<?php echo $delicious; ?>" target="_blank" title="delicious" class="social-delicious social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($deviantart) { ?>
                        <a href="<?php echo $deviantart; ?>" target="_blank" title="deviantart" class="social-deviantart social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($digg) { ?>
                        <a href="<?php echo $digg; ?>" target="_blank" title="digg" class="social-digg social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($dopplr) { ?>
                        <a href="<?php echo $dopplr; ?>" target="_blank" title="dopplr" class="social-dopplr social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($dribbble) { ?>
                        <a href="<?php echo $dribbble; ?>" target="_blank" title="dribbble" class="social-dribbble social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
					<?php if($ember) { ?>
					<a href="<?php echo $ember; ?>" target="_blank" title="ember" class="social-ember social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($evernote) { ?>
					<a href="<?php echo $evernote; ?>" target="_blank" title="evernote" class="social-evernote social-global"></a>
					<?php } ?>
					</li>
                	<li>
                    <?php if($facebook) { ?>
                        <a href="<?php echo $facebook; ?>" target="_blank" title="facebook" class="social-facebook social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
					<?php if($flickr) { ?>
					<a href="<?php echo $flickr; ?>" target="_blank" title="flickr" class="social-flickr social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($forrst) { ?>
					<a href="<?php echo $forrst; ?>" target="_blank" title="forrst" class="social-forrst social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($github) { ?>
					<a href="<?php echo $github; ?>" target="_blank" title="github" class="social-github social-global"></a>
					<?php } ?>
					</li>
                    <li>
                    <?php if($google) { ?>
                        <a href="<?php echo $google; ?>" target="_blank" title="google" class="social-google social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
					<?php if($googleplus) { ?>
					<a href="<?php echo $googleplus; ?>" target="_blank" title="googleplus" class="social-googleplus social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($grooveshark) { ?>
					<a href="<?php echo $grooveshark; ?>" target="_blank" title="grooveshark" class="social-grooveshark social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($html5) { ?>
					<a href="<?php echo $html5; ?>" target="_blank" title="html5" class="social-html5 social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($icloud) { ?>
					<a href="<?php echo $icloud; ?>" target="_blank" title="icloud" class="social-icloud social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($lastfm) { ?>
					<a href="<?php echo $lastfm; ?>" target="_blank" title="lastfm" class="social-lastfm social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($linkedin) { ?>
					<a href="<?php echo $linkedin; ?>" target="_blank" title="linkedin" class="social-linkedin social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($metacafe) { ?>
					<a href="<?php echo $metacafe; ?>" target="_blank" title="metacafe" class="social-metacafe social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($mixx) { ?>
					<a href="<?php echo $mixx; ?>" target="_blank" title="mixx" class="social-mixx social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($myspace) { ?>
					<a href="<?php echo $myspace; ?>" target="_blank" title="myspace" class="social-myspace social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($netvibes) { ?>
					<a href="<?php echo $netvibes; ?>" target="_blank" title="netvibes" class="social-netvibes social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($newsvine) { ?>
					<a href="<?php echo $newsvine; ?>" target="_blank" title="newsvine" class="social-newsvine social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($orkut) { ?>
					<a href="<?php echo $orkut; ?>" target="_blank" title="orkut" class="social-orkut social-global"></a>
					<?php } ?>
					</li>
                    <li>
                    <?php if($paypal) { ?>
                        <a href="<?php echo $paypal; ?>" target="_blank" title="paypal" class="social-paypal social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($picasa) { ?>
                        <a href="<?php echo $picasa; ?>" target="_blank" title="picasa" class="social-picasa social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($pinterest) { ?>
                        <a href="<?php echo $pinterest; ?>" target="_blank" title="pinterest" class="social-pinterest social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
					<?php if($posterous) { ?>
					<a href="<?php echo $posterous; ?>" target="_blank" title="posterous" class="social-posterous social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($reddit) { ?>
					<a href="<?php echo $reddit; ?>" target="_blank" title="reddit" class="social-reddit social-global"></a>
					<?php } ?>
					</li>
                    <li>
                    <?php if($rss) { ?>
                        <a href="<?php echo $rss; ?>" target="_blank" title="rss" class="social-rss social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($skype) { ?>
                        <a href="<?php echo $skype; ?>" target="_blank" title="skype" class="social-skype social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
					<?php if($stumbleupon) { ?>
					<a href="<?php echo $stumbleupon; ?>" target="_blank" title="stumbleupon" class="social-stumbleupon social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($technorati) { ?>
					<a href="<?php echo $technorati; ?>" target="_blank" title="technorati" class="social-technorati social-global"></a>
					<?php } ?>
					</li>
                    <li>
                    <?php if($tumblr) { ?>
                        <a href="<?php echo $tumblr; ?>" target="_blank" title="tumblr" class="social-tumblr social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($twitter) { ?>
                        <a href="<?php echo $twitter; ?>" target="_blank" title="twitter" class="social-twitter social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($vimeo) { ?>
                        <a href="<?php echo $vimeo; ?>" target="_blank" title="vimeo" class="social-vimeo social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($wordpress) { ?>
                        <a href="<?php echo $wordpress; ?>" target="_blank" title="wordpress" class="social-wordpress social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
                    <?php if($yahoo) { ?>
                        <a href="<?php echo $yahoo; ?>" target="_blank" title="yahoo" class="social-yahoo social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
					<?php if($yelp) { ?>
					<a href="<?php echo $yelp; ?>" target="_blank" title="yelp" class="social-yelp social-global"></a>
					<?php } ?>
					</li>
                    <li>
                    <?php if($youtube) { ?>
                        <a href="<?php echo $youtube; ?>" target="_blank" title="youtube" class="social-youtube social-global"></a>
                    <?php } ?>
                    </li>
                    <li>
					<?php if($zerply) { ?>
					<a href="<?php echo $zerply; ?>" target="_blank" title="zerply" class="social-zerply social-global"></a>
					<?php } ?>
					</li>
                    <li>
					<?php if($zootool) { ?>
					<a href="<?php echo $zootool; ?>" target="_blank" title="zootool" class="social-zootool social-global"></a>
					<?php } ?>
					</li>
                </ul>
                </div>
            </div>
            
             <?php echo $after_widget;
        }
        /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
        public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
                
                $instance['title'] = strip_tags( $new_instance['title'] );
                $instance['name'] = strip_tags( $new_instance['name'] );
				$instance['logoFooter'] = strip_tags( $new_instance['logoFooter'] );
                $instance['about_me'] = strip_tags( $new_instance['about_me'] ); // remove strip_tags to allow HTML tags
				
				$instance['aim'] = strip_tags( $new_instance['aim'] );
				$instance['apple'] = strip_tags( $new_instance['apple'] );
				$instance['behance'] = strip_tags( $new_instance['behance'] );
				$instance['blogger'] = strip_tags( $new_instance['blogger'] );
				$instance['cargo'] = strip_tags( $new_instance['cargo'] );
				$instance['delicious'] = strip_tags( $new_instance['delicious'] );
				$instance['deviantart'] = strip_tags( $new_instance['deviantart'] );
				$instance['digg'] = strip_tags( $new_instance['digg'] );
				$instance['dopplr'] = strip_tags( $new_instance['dopplr'] );
				$instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
				$instance['ember'] = strip_tags( $new_instance['ember'] );
				$instance['evernote'] = strip_tags( $new_instance['evernote'] );
                $instance['facebook'] = strip_tags( $new_instance['facebook'] );
				$instance['flickr'] = strip_tags( $new_instance['flickr'] );
				$instance['forrst'] = strip_tags( $new_instance['forrst'] );
				$instance['github'] = strip_tags( $new_instance['github'] );
				$instance['google'] = strip_tags( $new_instance['google'] );
				$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
				$instance['grooveshark'] = strip_tags( $new_instance['grooveshark'] );
				$instance['html5'] = strip_tags( $new_instance['html5'] );
				$instance['icloud'] = strip_tags( $new_instance['icloud'] );
				$instance['lastfm'] = strip_tags( $new_instance['lastfm'] );
				$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
				$instance['metacafe'] = strip_tags( $new_instance['metacafe'] );
				$instance['mixx'] = strip_tags( $new_instance['mixx'] );
				$instance['myspace'] = strip_tags( $new_instance['myspace'] );
				$instance['netvibes'] = strip_tags( $new_instance['netvibes'] );
				$instance['newsvine'] = strip_tags( $new_instance['newsvine'] );
				$instance['orkut'] = strip_tags( $new_instance['orkut'] );
				$instance['paypal'] = strip_tags( $new_instance['paypal'] );
				$instance['picasa'] = strip_tags( $new_instance['picasa'] );
				$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
				$instance['posterous'] = strip_tags( $new_instance['posterous'] );
				$instance['reddit'] = strip_tags( $new_instance['reddit'] );
				$instance['rss'] = strip_tags( $new_instance['rss'] );
				$instance['skype'] = strip_tags( $new_instance['skype'] );
				$instance['stumbleupon'] = strip_tags( $new_instance['stumbleupon'] );
				$instance['technorati'] = strip_tags( $new_instance['technorati'] );
				$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
                $instance['twitter'] = strip_tags( $new_instance['twitter'] );
				$instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
				$instance['wordpress'] = strip_tags( $new_instance['wordpress'] );
				$instance['yahoo'] = strip_tags( $new_instance['yahoo'] );
				$instance['yelp'] = strip_tags( $new_instance['yelp'] );
                $instance['youtube'] = strip_tags( $new_instance['youtube'] );
				$instance['zerply'] = strip_tags( $new_instance['zerply'] );
				$instance['zootool'] = strip_tags( $new_instance['zootool'] );
				
				
               
                return $instance;
        }
        /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
        public function form( $instance ) {
		//print_r($instance);
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'text_domain' );
		} 
                if ( isset( $instance[ 'name' ] ) ) {
			$name = $instance[ 'name' ];
		}
		else {
			$name = __( '', 'text_domain' );
		}	
				if ( isset( $instance[ 'logoFooter' ] ) ) {
			$logoFooter = $instance[ 'logoFooter' ];
		}
                if ( isset( $instance[ 'about_me' ] ) ) {
			$about_me = $instance[ 'about_me' ];
		}
		else {
			$about_me = __( '', 'text_domain' );
		}
                if ( isset( $instance[ 'aim' ] ) ) {
			$aim = $instance[ 'aim' ];
		}
		else {
			$aim = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'apple' ] ) ) {
			$apple = $instance[ 'apple' ];
		}
		else {
			$apple = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'behance' ] ) ) {
			$behance = $instance[ 'behance' ];
		}
		else {
			$behance = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'blogger' ] ) ) {
			$blogger = $instance[ 'blogger' ];
		}
		else {
			$blogger = __( '', 'text_domain' );
		}
		if ( isset( $instance[ 'cargo' ] ) ) {
			$cargo = $instance[ 'cargo' ];
		}
		else {
			$cargo = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'delicious' ] ) ) {
			$delicious = $instance[ 'delicious' ];
		}
		else {
			$delicious = __( '', 'text_domain' );
		}	
				if ( isset( $instance[ 'deviantart' ] ) ) {
			$deviantart = $instance[ 'deviantart' ];
		}
		else {
			$deviantart = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'digg' ] ) ) {
			$digg = $instance[ 'digg' ];
		}
		else {
			$digg = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'dopplr' ] ) ) {
			$dopplr = $instance[ 'dopplr' ];
		}
		else {
			$dopplr = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'dribbble' ] ) ) {
			$dribbble = $instance[ 'dribbble' ];
		}
		else {
			$dribbble = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'ember' ] ) ) {
			$ember = $instance[ 'ember' ];
		}
		else {
			$ember = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'evernote' ] ) ) {
			$evernote = $instance[ 'evernote' ];
		}
		else {
			$evernote = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'facebook' ] ) ) {
			$facebook = $instance[ 'facebook' ];
		}
		else {
			$facebook = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'flickr' ] ) ) {
			$flickr = $instance[ 'flickr' ];
		}
		else {
			$flickr = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'forrst' ] ) ) {
			$forrst = $instance[ 'forrst' ];
		}
		else {
			$forrst = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'github' ] ) ) {
			$github = $instance[ 'github' ];
		}
		else {
			$github = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'google' ] ) ) {
			$google = $instance[ 'google' ];
		}
		else {
			$google = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'googleplus' ] ) ) {
			$googleplus = $instance[ 'googleplus' ];
		}
		else {
			$googleplus = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'grooveshark' ] ) ) {
			$grooveshark = $instance[ 'grooveshark' ];
		}
		else {
			$grooveshark = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'html5' ] ) ) {
			$html5 = $instance[ 'html5' ];
		}
		else {
			$html5 = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'icloud' ] ) ) {
			$icloud = $instance[ 'icloud' ];
		}
		else {
			$icloud = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'lastfm' ] ) ) {
			$lastfm = $instance[ 'lastfm' ];
		}
		else {
			$lastfm = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'linkedin' ] ) ) {
			$linkedin = $instance[ 'linkedin' ];
		}
		else {
			$linkedin = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'metacafe' ] ) ) {
			$metacafe = $instance[ 'metacafe' ];
		}
		else {
			$metacafe = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'mixx' ] ) ) {
			$mixx = $instance[ 'mixx' ];
		}
		else {
			$mixx = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'myspace' ] ) ) {
			$myspace = $instance[ 'myspace' ];
		}
		else {
			$myspace = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'netvibes' ] ) ) {
			$netvibes = $instance[ 'netvibes' ];
		}
		else {
			$netvibes = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'newsvine' ] ) ) {
			$newsvine = $instance[ 'newsvine' ];
		}
		else {
			$newsvine = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'orkut' ] ) ) {
			$orkut = $instance[ 'orkut' ];
		}
		else {
			$orkut = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'paypal' ] ) ) {
			$paypal = $instance[ 'paypal' ];
		}
		else {
			$paypal = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'picasa' ] ) ) {
			$picasa = $instance[ 'picasa' ];
		}
		else {
			$picasa = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'pinterest' ] ) ) {
			$pinterest = $instance[ 'pinterest' ];
		}
		else {
			$pinterest = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'posterous' ] ) ) {
			$posterous = $instance[ 'posterous' ];
		}
		else {
			$posterous = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'reddit' ] ) ) {
			$reddit = $instance[ 'reddit' ];
		}
		else {
			$reddit = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'rss' ] ) ) {
			$rss = $instance[ 'rss' ];
		}
		else {
			$rss = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'skype' ] ) ) {
			$skype = $instance[ 'skype' ];
		}
		else {
			$skype = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'stumbleupon' ] ) ) {
			$stumbleupon = $instance[ 'stumbleupon' ];
		}
		else {
			$stumbleupon = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'technorati' ] ) ) {
			$technorati = $instance[ 'technorati' ];
		}
		else {
			$technorati = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'tumblr' ] ) ) {
			$tumblr = $instance[ 'tumblr' ];
		}
		else {
			$tumblr = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'twitter' ] ) ) {
			$twitter = $instance[ 'twitter' ];
		}
		else {
			$twitter = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'vimeo' ] ) ) {
			$vimeo = $instance[ 'vimeo' ];
		}
		else {
			$vimeo = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'wordpress' ] ) ) {
			$wordpress = $instance[ 'wordpress' ];
		}
		else {
			$wordpress = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'yahoo' ] ) ) {
			$yahoo = $instance[ 'yahoo' ];
		}
		else {
			$yahoo = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'yelp' ] ) ) {
			$yelp = $instance[ 'yelp' ];
		}
		else {
			$yelp = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'youtube' ] ) ) {
			$youtube = $instance[ 'youtube' ];
		}
		else {
			$youtube = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'zerply' ] ) ) {
			$zerply = $instance[ 'zerply' ];
		}
		else {
			$zerply = __( '', 'text_domain' );
		}
				if ( isset( $instance[ 'zootool' ] ) ) {
			$zootool = $instance[ 'zootool' ];
		}
		else {
			$zootool = __( '', 'text_domain' );
		}
                
                ?>
        		<p>
			<label for="<?php echo $this->get_field_id( 'logoFooter' ); ?>"><?php _e('Your Logo:', 'about_you'); ?></label>
			<?php
				$photo = $instance['logoFooter'];
				if ( $logoFooter ) { ?>
					<p><img src="<?php echo $instance['logoFooter']; ?>" width="50px" height="auto" /></p>
			<?php } ?>
			<input id="<?php echo $this->get_field_id( 'logoFooter' ); ?>" name="<?php echo $this->get_field_name( 'logoFooter' ); ?>" value="<?php echo $instance['logoFooter']; ?>" class="widefat" /><br />
			<span class="description small"><a href="media-new.php">Upload a logo</a> and paste the URL to it here.  Crop and size accordingly before uploading.</span>
		</p>
                
                <p>
                    <label for="<?php echo $this->get_field_id( 'about_me' ); ?>"><?php _e( 'About Me:' ); ?></label> 
                    <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_me' ); ?>" name="<?php echo $this->get_field_name( 'about_me' ); ?>"><?php echo esc_attr( $about_me ); ?></textarea>
		</p>
            
    
                
                        <h3>Social Networks</h3>
                        
                 
                 <p>
                    <label for="<?php echo $this->get_field_id( 'aim' ); ?>"><?php _e( 'Aim:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'aim' ); ?>" name="<?php echo $this->get_field_name( 'aim' ); ?>" type="text" value="<?php echo esc_attr( $aim ); ?>" />
                 </p> 
                 <p>
                    <label for="<?php echo $this->get_field_id( 'apple' ); ?>"><?php _e( 'Apple:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'apple' ); ?>" name="<?php echo $this->get_field_name( 'apple' ); ?>" type="text" value="<?php echo esc_attr( $apple ); ?>" />
                 </p> 
                 <p>
                    <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e( 'Behance:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" type="text" value="<?php echo esc_attr( $behance ); ?>" />
                 </p>  
                 <p>
                    <label for="<?php echo $this->get_field_id( 'blogger' ); ?>"><?php _e( 'Blogger:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'blogger' ); ?>" name="<?php echo $this->get_field_name( 'blogger' ); ?>" type="text" value="<?php echo esc_attr( $blogger ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'cargo' ); ?>"><?php _e( 'Cargo:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'cargo' ); ?>" name="<?php echo $this->get_field_name( 'cargo' ); ?>" type="text" value="<?php echo esc_attr( $cargo ); ?>" />
                 </p>  
                 <p>
                    <label for="<?php echo $this->get_field_id( 'delicious' ); ?>"><?php _e( 'Delicious:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'delicious' ); ?>" name="<?php echo $this->get_field_name( 'delicious' ); ?>" type="text" value="<?php echo esc_attr( $delicious ); ?>" />
                 </p>  
                 <p>
                    <label for="<?php echo $this->get_field_id( 'deviantart' ); ?>"><?php _e( 'Deviantart:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'deviantart' ); ?>" name="<?php echo $this->get_field_name( 'deviantart' ); ?>" type="text" value="<?php echo esc_attr( $deviantart ); ?>" />
                 </p> 
                 <p>
                    <label for="<?php echo $this->get_field_id( 'digg' ); ?>"><?php _e( 'digg:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'digg' ); ?>" name="<?php echo $this->get_field_name( 'digg' ); ?>" type="text" value="<?php echo esc_attr( $digg ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'dopplr' ); ?>"><?php _e( 'Dopplr:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'dopplr' ); ?>" name="<?php echo $this->get_field_name( 'dopplr' ); ?>" type="text" value="<?php echo esc_attr( $dopplr ); ?>" />
                 </p>   
                 <p>
                    <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'ember' ); ?>"><?php _e( 'Ember:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'ember' ); ?>" name="<?php echo $this->get_field_name( 'ember' ); ?>" type="text" value="<?php echo esc_attr( $ember ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'evernote' ); ?>"><?php _e( 'Evernote:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'evernote' ); ?>" name="<?php echo $this->get_field_name( 'evernote' ); ?>" type="text" value="<?php echo esc_attr( $evernote ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" type="text" value="<?php echo esc_attr( $flickr ); ?>" />
                 </p>                     
				  <p>
                    <label for="<?php echo $this->get_field_id( 'forrst' ); ?>"><?php _e( 'Forrst:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'forrst' ); ?>" name="<?php echo $this->get_field_name( 'forrst' ); ?>" type="text" value="<?php echo esc_attr( $forrst ); ?>" />
                 </p>  
                 <p>
                    <label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e( 'Github:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" type="text" value="<?php echo esc_attr( $github ); ?>" />
                 </p>   
                 <p>
                    <label for="<?php echo $this->get_field_id( 'google' ); ?>"><?php _e( 'Google:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" type="text" value="<?php echo esc_attr( $google ); ?>" />
                 </p>  
				  <p>
                    <label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e( 'Googleplus:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" type="text" value="<?php echo esc_attr( $googleplus ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'grooveshark' ); ?>"><?php _e( 'Grooveshark:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'grooveshark' ); ?>" name="<?php echo $this->get_field_name( 'grooveshark' ); ?>" type="text" value="<?php echo esc_attr( $grooveshark ); ?>" />
                 </p> 
                 <p>
                    <label for="<?php echo $this->get_field_id( 'html5' ); ?>"><?php _e( 'Html5:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'html5' ); ?>" name="<?php echo $this->get_field_name( 'html5' ); ?>" type="text" value="<?php echo esc_attr( $html5 ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'icloud' ); ?>"><?php _e( 'iCloud:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'icloud' ); ?>" name="<?php echo $this->get_field_name( 'icloud' ); ?>" type="text" value="<?php echo esc_attr( $icloud ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'lastfm' ); ?>"><?php _e( 'Lastfm:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'lastfm' ); ?>" name="<?php echo $this->get_field_name( 'lastfm' ); ?>" type="text" value="<?php echo esc_attr( $lastfm ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'metacafe' ); ?>"><?php _e( 'Metacafe:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'metacafe' ); ?>" name="<?php echo $this->get_field_name( 'metacafe' ); ?>" type="text" value="<?php echo esc_attr( $metacafe ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'mixx' ); ?>"><?php _e( 'Mixx:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'mixx' ); ?>" name="<?php echo $this->get_field_name( 'mixx' ); ?>" type="text" value="<?php echo esc_attr( $mixx ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'myspace' ); ?>"><?php _e( 'Myspace:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'myspace' ); ?>" name="<?php echo $this->get_field_name( 'myspace' ); ?>" type="text" value="<?php echo esc_attr( $myspace ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'netvibes' ); ?>"><?php _e( 'Netvibes:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'netvibes' ); ?>" name="<?php echo $this->get_field_name( 'netvibes' ); ?>" type="text" value="<?php echo esc_attr( $netvibes ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'newsvine' ); ?>"><?php _e( 'Newsvine:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'newsvine' ); ?>" name="<?php echo $this->get_field_name( 'newsvine' ); ?>" type="text" value="<?php echo esc_attr( $newsvine ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'orkut' ); ?>"><?php _e( 'Orkut:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'orkut' ); ?>" name="<?php echo $this->get_field_name( 'orkut' ); ?>" type="text" value="<?php echo esc_attr( $orkut ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'paypal' ); ?>"><?php _e( 'Paypal:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'paypal' ); ?>" name="<?php echo $this->get_field_name( 'paypal' ); ?>" type="text" value="<?php echo esc_attr( $paypal ); ?>" />
                 </p>  
                 <p>
                    <label for="<?php echo $this->get_field_id( 'picasa' ); ?>"><?php _e( 'Picasa:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'picasa' ); ?>" name="<?php echo $this->get_field_name( 'picasa' ); ?>" type="text" value="<?php echo esc_attr( $picasa ); ?>" />
                 </p>  
                 <p>
                    <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'posterous' ); ?>"><?php _e( 'Posterous:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'posterous' ); ?>" name="<?php echo $this->get_field_name( 'posterous' ); ?>" type="text" value="<?php echo esc_attr( $posterous ); ?>" />
                 </p>   
                 <p>
                    <label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'Rss:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" type="text" value="<?php echo esc_attr( $rss ); ?>" />
                 </p>  
				  <p>
                    <label for="<?php echo $this->get_field_id( 'reddit' ); ?>"><?php _e( 'Reddit:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'reddit' ); ?>" name="<?php echo $this->get_field_name( 'reddit' ); ?>" type="text" value="<?php echo esc_attr( $reddit ); ?>" />
                 </p>  
                 <p>
                    <label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e( 'Skype:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" type="text" value="<?php echo esc_attr( $skype ); ?>" />
                 </p>  
				  <p>
                    <label for="<?php echo $this->get_field_id( 'stumbleupon' ); ?>"><?php _e( 'Stumbleupon:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'stumbleupon' ); ?>" name="<?php echo $this->get_field_name( 'stumbleupon' ); ?>" type="text" value="<?php echo esc_attr( $stumbleupon ); ?>" />
                 </p>  
				  <p>
                    <label for="<?php echo $this->get_field_id( 'technorati' ); ?>"><?php _e( 'Technorati:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'technorati' ); ?>" name="<?php echo $this->get_field_name( 'technorati' ); ?>" type="text" value="<?php echo esc_attr( $technorati ); ?>" />
                 </p>   
                 <p>
                    <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" type="text" value="<?php echo esc_attr( $tumblr ); ?>" />
                 </p>  
                 <p>
                    <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" type="text" value="<?php echo esc_attr( $vimeo ); ?>" />
                 </p>
                 <p>
                    <label for="<?php echo $this->get_field_id( 'wordpress' ); ?>"><?php _e( 'Wordpress:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'wordpress' ); ?>" name="<?php echo $this->get_field_name( 'wordpress' ); ?>" type="text" value="<?php echo esc_attr( $wordpress ); ?>" />
                 </p> 
                 <p>
                    <label for="<?php echo $this->get_field_id( 'yahoo' ); ?>"><?php _e( 'Yahoo:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'yahoo' ); ?>" name="<?php echo $this->get_field_name( 'yahoo' ); ?>" type="text" value="<?php echo esc_attr( $yahoo ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'yelp' ); ?>"><?php _e( 'Yelp:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'yelp' ); ?>" name="<?php echo $this->get_field_name( 'yelp' ); ?>" type="text" value="<?php echo esc_attr( $yelp ); ?>" />
                 </p> 
                 <p>
                    <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
                 </p>
				  <p>
                    <label for="<?php echo $this->get_field_id( 'zerply' ); ?>"><?php _e( 'Zerply:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'zerply' ); ?>" name="<?php echo $this->get_field_name( 'zerply' ); ?>" type="text" value="<?php echo esc_attr( $zerply ); ?>" />
                 </p> 
				  <p>
                    <label for="<?php echo $this->get_field_id( 'zootool' ); ?>"><?php _e( 'Zootool:' ); ?></label> 
                    <input class="widefat" id="<?php echo $this->get_field_id( 'zootool' ); ?>" name="<?php echo $this->get_field_name( 'zootool' ); ?>" type="text" value="<?php echo esc_attr( $zootool ); ?>" />
                 </p>  
                 
                
<?php        }
        
} // class About_Us_Widget ends

// register About_Us_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "About_Us_Widget" );' ) );