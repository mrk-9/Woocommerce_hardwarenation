<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="shortcut icon" type="images/x-icon" href="<?php bloginfo('template_url') ?>/img/favicon.ico">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/img/favicon.png"/>
    <?php wp_head(); ?>

	<script
			src="//code.jquery.com/jquery-2.2.4.min.js"
			integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			crossorigin="anonymous"></script>
</head>
<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div class="logo">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php bloginfo('template_url'); ?>/img/logo_new.svg" alt="<?php bloginfo('name'); ?>"/>
			</a>
		</div>
		<div class="head_menu">
			<ul class="nav">
                <?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
			</ul>
		</div>
		<a href="#" class="mob-contact-btn"></a>
		<div class="mob_navi">
			<div id="mob_open">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</div>
			<div id="accordian">
                <?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
			</div>
		</div>
</header>
<div class="header_fix"></div>

<?php if (is_home() || is_front_page()) { ?>
	<div class="alert alert-success alert-top-join">
		<div class="container">
			Join our mailing list to receive news and special offers. <a href="#" class="mc4wp_show">Sign Up</a>
		</div>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>
