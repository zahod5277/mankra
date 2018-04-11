<!-- links-block -->

<?php

$iron_sonaar_thumb_id = get_post_thumbnail_id( get_the_ID() );
$iron_sonaar_thumb_url_array = wp_get_attachment_image_src($iron_sonaar_thumb_id, 'medium');
$iron_sonaar_thumb_url = $iron_sonaar_thumb_url_array[0];

?>
<aside class="links-block">
	<a href="#" onclick="window.history.back(); return false;" class="back-btn"><?php echo esc_html__("Back", 'sonaar'); ?></a>
	<div class="buttons">
		<div class="sharing_toolbox" data-image-social="<?php echo esc_url( $iron_sonaar_thumb_url ) ?>"></div>
	</div>
</aside>
