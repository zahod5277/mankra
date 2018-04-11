<?php

$iron_sonaar_social_icons = Iron_sonaar::getOption('social_icons', null, array());
if(!empty($iron_sonaar_social_icons)): ?>
	<!-- social-networks -->
	<ul class="social-networks">
	<?php foreach($iron_sonaar_social_icons as $icon): ?>
		<li>
			<a target="_blank" href="<?php echo esc_url($icon["social_media_url"]); ?>">
				<?php if(!empty($icon["social_media_icon_url"])): ?>
					<img src="<?php echo esc_url($icon["social_media_icon_url"]); ?>">
				<?php else: ?>
					<i class="fa fa-<?php echo esc_attr($icon["social_media_icon_class"]); ?>" title="<?php echo esc_attr($icon["social_media_name"]); ?>"></i>
				<?php endif; ?>
			</a>
		</li>

	<?php endforeach; ?>

	</ul>
<?php endif; ?>
