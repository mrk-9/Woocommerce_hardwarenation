<?php if (!is_front_page()) { ?>
	<div id="footer-banner" style="background-image: url(<?php the_field('image', 'option'); ?>)">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<div class="banner-box">
						<h3><?php the_field('title', 'option'); ?></h3>
						<div class="banner-content">
                            <?php the_field('content', 'option'); ?>
						</div>
						<a href="<?php the_field('link', 'option'); ?>"
						   class="btn"><?php the_field('link_text', 'option'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<footer id="footer">
	<div class="container">
		<div class="row main-footer">
            <?php if (is_active_sidebar('sidebar_footer')) { ?><?php dynamic_sidebar('sidebar_footer'); ?><?php } ?>
		</div>
		<div class="row sub-footer">
			<div class="col-md-12">
				<p class="social">
					<a href="https://www.linkedin.com/company/hardwarenation"
					   target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					<a href="https://www.facebook.com/hardwarenation"
					   target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="https://twitter.com/hardwarenation"
					   target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				</p>
			</div>
			<div class="col-md-6 sub-footer-menu-box">
				<div class="wrap">
                    <?php wp_nav_menu(array('theme_location' => 'sub_footer_menu')); ?>
				</div>
			</div>
			<div class="col-md-6 copyright-box">
				<div class="wrap">
					Copyright © <?php echo date("Y"); ?> Hardware Nation LLC. All Rights Reserved.
				</div>
			</div>
			<!-- a href="#" class="linkToTop"><i class="fa fa-angle-up" aria-hidden="true"></i></a -->
		</div>
	</div>
</footer>

<div class="mob-contact-menu">
	<div class="wrap">
		<div class="logo">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php bloginfo('template_url'); ?>/img/logo_new.svg" alt="<?php bloginfo('name'); ?>"/>
			</a>
		</div>
		<a class="close"></a>
        <?php wp_reset_query(); ?>
        <?php
        query_posts('page_id=28');
        while (have_posts()):
            the_post();
            $title_for_column_1 = get_field('title_for_column_1');
            $title_for_column_2 = get_field('title_for_column_2');
            $title_for_column_3 = get_field('title_for_column_3');
            $content_for_column_1 = get_field('content_for_column_1');
            $content_for_column_2 = get_field('content_for_column_2');
            $content_for_column_3 = get_field('content_for_column_3');
            $image_for_column_1 = get_field('image_for_column_1');
            if (!empty($image_for_column_1)) {
                $image_for_column_1_url = $image_for_column_1['url'];
            }
            $image_for_column_2 = get_field('image_for_column_2');
            if (!empty($image_for_column_2)) {
                $image_for_column_2_url = $image_for_column_2['url'];
            }
            $image_for_column_3 = get_field('image_for_column_3');
            if (!empty($image_for_column_3)) {
                $image_for_column_3_url = $image_for_column_3['url'];
            }
            ?>
			<ul>
				<li>
					<a href="<?php echo $content_for_column_1; ?>">
                        <?php if (!empty($image_for_column_1_url)) { ?>
							<img src="<?php echo $image_for_column_1_url; ?>" alt="">
                        <?php } ?>
                        <?php if (!empty($title_for_column_1)) { ?>
                            <?php echo $title_for_column_1; ?>
                        <?php } ?>
					</a>
				</li>
				<li>
					<a href="<?php echo $content_for_column_2; ?>">
                        <?php if (!empty($image_for_column_2_url)) { ?>
							<img src="<?php echo $image_for_column_2_url; ?>" alt="">
                        <?php } ?>
                        <?php if (!empty($title_for_column_2)) { ?>
                            <?php echo $title_for_column_2; ?>
                        <?php } ?>
					</a>
				</li>
				<li>
					<a href="<?php echo $content_for_column_3; ?>">
                        <?php if (!empty($image_for_column_3_url)) { ?>
							<img src="<?php echo $image_for_column_3_url; ?>" alt="">
                        <?php } ?>
                        <?php if (!empty($title_for_column_3)) { ?>
                            <?php echo $title_for_column_3; ?>
                        <?php } ?>
					</a>
				</li>
			</ul>
			<div class="contact-box">
                <?php the_content(); ?>
			</div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
	</div>
</div>

<link rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'"
      href="<?php bloginfo('template_url') ?>/css/fonts.css">
<noscript>
	<link rel="stylesheet" type="text/css"
	      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="none"
	      href="<?php bloginfo('template_url') ?>/css/fonts.css">
</noscript>

<?php wp_footer(); ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="<?php bloginfo('template_url') ?>/js/app.js"></script>
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
	window.__lc = window.__lc || {};
	window.__lc.license = 8493023;
	(function () {
		var lc = document.createElement('script');
		lc.type = 'text/javascript';
		lc.async = true;
		lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(lc, s);
	})();
	var LC_API = LC_API || {};
	LC_API.on_after_load = function () {
		LC_API.disable_sounds();
	};
</script>
<!-- End of LiveChat code -->
</body>
</html>
