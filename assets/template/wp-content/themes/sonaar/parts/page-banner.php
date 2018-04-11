<?php
if( function_exists('is_shop') && is_shop() ){
	$postID = woocommerce_get_page_id('shop');
}else{
	$postID = $post->ID;
}

$iron_sonaar_banner_bg_style = '';
$iron_sonaar_banner_classes = array();
$iron_sonaar_banner_parallax = get_field('banner_parallax', $postID);
$iron_sonaar_banner_fullscreen = Iron_sonaar::getField('banner_fullscreen', $postID );
$iron_sonaar_banner_content_type = get_field('banner_content_type', $postID);
$iron_sonaar_banner_texteditor_content = get_field('banner_texteditor_content', $postID, false);
$iron_sonaar_banner_title = get_field('banner_title', $postID);
$iron_sonaar_banner_subtitle = get_field('banner_subtitle', $postID);
$iron_sonaar_banner_horizontal_content_alignment = get_field('banner_horizontal_content_alignment', $postID);
$iron_sonaar_banner_vertical_content_alignment = get_field('banner_vertical_content_alignment', $postID);
$iron_sonnar_banner_container = Iron_sonaar::getOption('container_type', null, 'container_fullwidth');

if( $iron_sonnar_banner_container == 'container_boxed' ) array_push($iron_sonaar_banner_classes, 'container');
if( $iron_sonaar_banner_fullscreen ) array_push($iron_sonaar_banner_classes, 'fullscreen-banner');
if( $iron_sonaar_banner_parallax ) array_push( $iron_sonaar_banner_classes, 'parallax-banner' );
?>


<div id="page-banner" class="<?php echo esc_attr( implode( ' ',$iron_sonaar_banner_classes ) ); ?>">
	<div class="page-banner-bg"></div>
	<div class="page-banner-content">
		<div class="inner <?php echo esc_attr( $iron_sonaar_banner_vertical_content_alignment ) ?>">
			<div class="page-banner-row">
			<?php if($iron_sonaar_banner_content_type === 'advanced-content') : ?>
				<?php
					echo wp_kses_post( apply_filters( 'the_content', $iron_sonaar_banner_texteditor_content ) );
				?>
			<?php else : ?>
				<h1 class="page-title <?php echo esc_attr( $iron_sonaar_banner_horizontal_content_alignment ) ?>">
					<?php echo wp_kses_post( $iron_sonaar_banner_title) ?>
				</h1>
				<span class="page-subtitle <?php echo esc_attr( $iron_sonaar_banner_horizontal_content_alignment ) ?>">
					<?php echo wp_kses_post( $iron_sonaar_banner_subtitle ) ?>
				</span>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>