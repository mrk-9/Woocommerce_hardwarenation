<?php
/*
Template Name: Page Contact
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

<div class="container page_holder contact-column-box">
    <div class="row">
        <?php
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
        <div class="col-md-12">
            <div class="wrap">
                <?php if (!empty($image_for_column_1_url)) { ?>
                    <img src="<?php echo $image_for_column_1_url; ?>" alt="">
                <?php } ?>
                <?php if (!empty($title_for_column_1)) { ?>
                    <h3><a href="<?php echo $content_for_column_1; ?>"><?php echo $title_for_column_1; ?></a></h3>
                <?php } ?>
            </div>
            <div class="wrap">
                <?php if (!empty($image_for_column_2_url)) { ?>
                    <img src="<?php echo $image_for_column_2_url; ?>" alt="">
                <?php } ?>
                <?php if (!empty($title_for_column_2)) { ?>
                    <h3><a href="<?php echo $content_for_column_2; ?>"><?php echo $title_for_column_2; ?></a></h3>
                <?php } ?>
            </div>
            <div class="wrap">
                <?php if (!empty($image_for_column_3_url)) { ?>
                    <img src="<?php echo $image_for_column_3_url; ?>" alt="">
                <?php } ?>
                <?php if (!empty($title_for_column_3)) { ?>
                    <h3><a href="<?php echo $content_for_column_3; ?>"><?php echo $title_for_column_3; ?></a></h3>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
$map_box_image = get_field('map_box_image');
if (!empty($map_box_image)) {
    $map_box_image_bg = $map_box_image['url'];
} ?>
<div class="page-contact-map-boxs">
    <div class="container page_holder contact-content-box">
        <?php
        while (have_posts()) : the_post(); ?>
            <div class="wrap">
                <?php the_content(); ?>
            </div>
            <?php
        endwhile;
        wp_reset_query();
        ?>
    </div>
    <div class="row">
        <div class="col-md-6 page-contact-map-box">
            <?php
            $location = get_field('map_box_map');
            if (!empty($location)):
                ?>
                <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                         data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6 page-contact-map-box page-contact-map-box-img"
             style="background-image: url('<?php echo $map_box_image_bg; ?>');">
        </div>
    </div>
</div>

<div id="contactbox">
    <?php echo do_shortcode('[contact-form-7 id="4" title="Contact form"]'); ?>
</div>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBvCROYVLl3deCtRpgpEtF9lIkHEVmGVA4"></script>
<script type="text/javascript">
    (function ($) {
        var style = [];

        function new_map($el) {
            var $markers = $el.find('.marker');
            var args = {
                zoom: 15,
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: style,
            };
            var map = new google.maps.Map($el[0], args);
            map.markers = [];
            $markers.each(function () {
                add_marker($(this), map);
            });

            center_map(map);
            return map;
        }

        function add_marker($marker, map) {

            var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
            var image = '<?php bloginfo('template_url'); ?>/img/icon-mappoint.png';

            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: image
            });

            map.markers.push(marker);
            if ($marker.html()) {
                var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
            }
        }

        function center_map(map) {
            var bounds = new google.maps.LatLngBounds();
            $.each(map.markers, function (i, marker) {
                var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                bounds.extend(latlng);
            });

            if (map.markers.length == 1) {
                map.setCenter(bounds.getCenter());
                map.setZoom(15);
            }
            else {
                map.fitBounds(bounds);
            }
        }

        var map = null;
        $(document).ready(function () {
            $('.acf-map').each(function () {
                map = new_map($(this));
            });
        });

    })(jQuery);
</script>

<?php get_footer(); ?>
