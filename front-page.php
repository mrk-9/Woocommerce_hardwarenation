<?php
/*
  Template Name: New Front Page
 */
get_header();
$page_image = get_field('page_image');
$page_title = get_field('page_title');
$top_background_position = get_field('top_background_position') . '%';
if (empty($top_background_position)) {
    $top_background_position = '50%';
}
if (empty($page_title)) {
    $page_title = get_the_title();
}
$page_sub_title = get_field('page_sub_title');

?>
<div class="top_banner"
    <?php if (!empty($page_image)) { ?>
        style="background-image: url('<?php echo $page_image['url']; ?>'); background-position: 50% <?php echo $top_background_position; ?>"
    <?php } ?> >
    <div class="banner_overlay"></div>
    <div class="container">
        <div class="banner_text">
            <h2><?php echo $page_title; ?></h2>
            <?php if (!empty($page_sub_title)) {
                echo "<p>" . $page_sub_title . "</p>";
            } ?>
        </div>
    </div>
    <?php //echo '<img src="' . $page_image['url'] . '" alt="' . $page_title . '">'; ?>
</div>
<div class="container" id="homeContent">
    <?php
    while (have_posts()) : the_post(); ?>
        <div class="row">
	        <div class="col-sm-10 col-sm-offset-1"><?php the_content(); ?></div>
            <!-- Page Content -->
        </div><!-- .entry-content-page -->
        <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
</div>


<div class="container" id="homePortfolio">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<h2><?php the_field('portfolio_title'); ?></h2>
			<div class="row">
				<div class="row" style="display: flex; flex-wrap: wrap">
                    <?php
                    if (get_field('portfolio')) {
                        while (has_sub_field('portfolio')) {
                            ?>
							<div class="col-sm-3">
								<div class="box">
									<h4><?php the_sub_field('box_title'); ?></h4>
									<p><?php the_sub_field('box_content'); ?></p>
								</div>
							</div>
                            <?php
                        }
                    }
                    ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="homeBanner" style="background-image: url(<?php the_field('home_banner_image'); ?>)">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="box">
				<h3>
					<p><?php the_field('home_banner_text'); ?></p>
				</h3>
			</div>
		</div>
	</div>
</div>

<div class="container" id="homeDifferentiators">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<h2><?php the_field('differentiators_title'); ?></h2>
			<div class="row" style="display: flex; flex-wrap: wrap">
                <?php
                if (get_field('differentiators')) {
                    while (has_sub_field('differentiators')) {
                        ?>
						<div class="col-sm-4">
							<div class="box">
								<h4><?php the_sub_field('text_box'); ?></h4>
								<p><?php the_sub_field('box_content'); ?></p>
							</div>
						</div>
                        <?php
                    }
                }
                ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
