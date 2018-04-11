<?php
global $iron_sonaar_link_mode, $iron_sonaar_archive;
if ($iron_sonaar_link_mode == '') {
	$iron_sonaar_link_mode = $iron_sonaar_archive->get_linkMode();
}

$iron_sonaar_term = Iron_sonaar::getField('vid_category', $post->ID);

if ( $iron_sonaar_term && is_array($iron_sonaar_term) )
{
	$iron_sonaar_term = get_term($iron_sonaar_term[0], 'video-category');
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('videogrid link-mode-'. $iron_sonaar_link_mode ); ?> data-url="<?php echo esc_url( Iron_sonaar::getField('video_url',$post->ID) ); ?>">
	<a href="<?php the_permalink(); ?>">
		<div class="holder">
			<div class="image">
				<div class="play-button">
					<i class="fa fa-play-circle"></i>
				</div>
				<div class="video-mask">
				<?php the_post_thumbnail('medium'); ?>
				</div>
			</div>
			<div class="text-box">
				<h1 class="sr_it-videolist-item-title"><?php the_title(); ?></h1>
				<?php if ( ! empty($iron_sonaar_term->name) ) { ?>
					<span class="category"><?php echo esc_html($iron_sonaar_term->name); ?></span>
				<?php } ?>
			</div>
		</div>
	</a>
</div>