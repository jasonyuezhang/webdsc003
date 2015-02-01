<?php global $NHP_Options; ?>
<?php $options_theme = $NHP_Options->options; ?>
<?php $template_dir = get_template_directory_uri(); ?>

<?php $choose_global_color = $options_theme['choose_global_color']; ?>
<?php $select_title_position = $options_theme['select_title_position']; ?>

/* Custom Color */

input.submit, input.submit:focus, input.submit:active {
	background: <?php echo $choose_global_color; ?>;
}
a { 
	color: <?php echo $choose_global_color; ?>;
}
#footer-bottom a:hover {
	color: <?php echo $choose_global_color; ?>;
}
::selection {
	background-color: <?php echo $choose_global_color; ?> !important;
}
#primary-menu .current {
	background-color: <?php echo $choose_global_color; ?>;
}
.fixed #primary-menu .current {	background-color: <?php echo $choose_global_color; ?>; }

.tweets a:hover , #footer .tweets a:hover, .tweets .tweet_time a:hover, #footer .tweets .tweet_time a:hover {
	color: <?php echo $choose_global_color; ?>;
}	
.team-member-info .social-personal li a:hover {
	background-color: <?php echo $choose_global_color; ?>;
}
.skills-graph li span {
	background-color: <?php echo $choose_global_color; ?>;
}
.archive-list a {
	color:<?php echo $choose_global_color; ?> !important; 
}
.section-title, .page-title {
	background-color: <?php echo $choose_global_color; ?>;
}
.services div:hover, .services div:hover a {
	background-color:<?php echo $choose_global_color; ?>; 
}
.grey:hover { background-color:<?php echo $choose_global_color; ?>; }
.highlight1 {
	background-color: <?php echo $choose_global_color; ?>;
}
.item-info-overlay {
	background-color: <?php echo $choose_global_color; ?>;
}
ul.item-nav li:hover {
	background-color: <?php echo $choose_global_color; ?>;
}
.contact-success {
	background-color: <?php echo $choose_global_color; ?>;
}
.form .contact-error {
    color: <?php echo $choose_global_color; ?>;
}
.widget ul#recentcomments a.url:hover {
    color: <?php echo $choose_global_color; ?>;
}
.flex-direction-nav li a:hover, .tp-leftarrow.large:hover, .tp-rightarrow.large:hover { background-color: <?php echo $choose_global_color; ?>; }

.widget a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.widget ul#recentcomments a.author:hover {
	color: <?php echo $choose_global_color; ?>;
}
.post-title h2.title a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.post-meta a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.post-info div.date {
	background-color: <?php echo $choose_global_color; ?>;
}
.comment .author a:hover {
	color: <?php echo $choose_global_color; ?>;
}
.comment .comment-meta .reply:hover {
	background-color:<?php echo $choose_global_color; ?>; 
}
.wp-pagenavi span.current {
	background-color: <?php echo $choose_global_color; ?>;
}
.tagcloud a:hover {
	background-color: <?php echo $choose_global_color; ?>;
}

.flickr_badge_image:hover {border-color:<?php echo $choose_global_color; ?>;}
.tagcloud a:hover, .footer-widget-column .tagcloud a:hover {background-color:<?php echo $choose_global_color; ?>;}

.filterable li.current a {
	color:<?php echo $choose_global_color; ?> !important;
	border-top: 1px solid <?php echo $choose_global_color; ?> !important;
}

.filterable li a:hover {
	color: <?php echo $choose_global_color; ?> !important;
}


input[type="radio"]:checked {
  background: <?php echo $choose_global_color; ?>;
}

a.button,
a.comment-reply-link,
#commentform #submit,
.submit,
input[type=submit],
input.button,
button.button {
  background-color: <?php echo $choose_global_color; ?>;
}

a.button.alt,
a.comment-reply-link.alt,
#commentform #submit.alt,
.submit.alt,
input[type=submit].alt,
input.button.alt,
button.button.alt,
a.button.checkout,
a.comment-reply-link.checkout,
#commentform #submit.checkout,
.submit.checkout,
input[type=submit].checkout,
input.button.checkout,
button.button.checkout {
  background-color: <?php echo $choose_global_color; ?>; 
}

a.button.alt:active,
a.comment-reply-link.alt:active,
#commentform #submit.alt:active,
.submit.alt:active,
input[type=submit].alt:active,
input.button.alt:active,
button.button.alt:active,
a.button.checkout:active,
a.comment-reply-link.checkout:active,
#commentform #submit.checkout:active,
.submit.checkout:active,
input[type=submit].checkout:active,
input.button.checkout:active,
button.button.checkout:active {
  background-color: <?php echo $choose_global_color; ?>; 
}

a.button:active,
a.comment-reply-link:active,
#commentform #submit:active,
.submit:active,
input[type=submit]:active,
input.button:active,
button.button:active {
  background-color: <?php echo $choose_global_color; ?>; 
}