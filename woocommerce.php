<?php get_header();
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

<?php if (!empty($page_image)) { ?>
    <div class="top_banner"
         style="background-image: url('<?php echo $page_image['url']; ?>'); background-position: 50% <?php echo $top_background_position; ?>">
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
<?php } ?>

<div class="container page_holder">

	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
            bcn_display();
        } ?>
	</div>

    <?php
    while (have_posts()) : the_post(); ?>
        <div class="row">
	        <div class="col-md-12">
                <article>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </article>
            </div>
            <!-- Page Content -->
        </div><!-- .entry-content-page -->

        <?php woocommerce_content(); ?>

        <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
</div>
<?php get_footer(); ?>
