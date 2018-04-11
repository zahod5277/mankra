<?php global $iron_sonaar_archive; ?>

<div class="news-grid-wrap <?php echo esc_attr( $iron_sonaar_archive->getIsoCol() ) ?> isotope-item">
	<a href="<?php echo esc_url( get_permalink() )?>" class="<?php echo esc_attr( ( is_sticky() ) ? 'sticky' : '' )?>">
		<?php if(has_post_thumbnail()): ?>
			<?php the_post_thumbnail('medium'); ?>
		<?php endif; ?>
		<div class="news-grid-tab">
			<div class="tab-text">
				<?php if((bool)Iron_sonaar::getOption('show_post_date', null, true)): ?>
				<time class="sr_it-datetime" datetime="<?php the_time('c'); ?>"><?php the_time( get_option('date_format') ); ?></time>
				<?php endif; ?>
				<div class="tab-title"><?php the_title(); ?></div>

				<div class="meta-simple">
				<?php if ((bool)Iron_sonaar::getOption('show_post_author', null, true) &&  get_the_author() != '' ): ?>
					<div class="sr_it-meta-author-link" href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php echo esc_html__('by', 'sonaar'); ?> <?php the_author(); ?></div>
				<?php endif ?>
				<?php
					$iron_sonaar_categories_list = get_the_category( get_the_ID() );
					if(!empty($iron_sonaar_categories_list) && (bool)Iron_sonaar::getOption('show_post_categories', null, true)){
						echo '<div class="post-categories"><i class="fa fa-folder-open-o"></i> ';
						foreach ($iron_sonaar_categories_list as $key => $value) {
							echo wp_kses_post( (  $key + 1 == count( $iron_sonaar_categories_list ) )? $value->name  : $value->name . ', ' );
						}
						echo '</div> ';
					}

					$iron_sonaar_tag_list = get_the_tags( get_the_ID() );
					if( $iron_sonaar_tag_list && (bool)Iron_sonaar::getOption('show_post_tags', null, true) ){
						echo '<div class="post-tags"><i class="fa fa-tag"></i> ';
						foreach ($iron_sonaar_tag_list as $key => $value) {
							echo wp_kses_post( (  $key + 1 == count( $iron_sonaar_tag_list ) )? $value->name  : $value->name . ', ' );
						}
						echo '</div> ';
					}
				?>
				</div>

				<?php if($iron_sonaar_archive->enableExcerpts()): ?>
				<div class="excerpt">
					<?php the_excerpt(); ?>
				</div>
				<?php endif; ?>
				<div class="stickypost">
					<i class="fa fa-star"></i>
				</div>
			</div>
		</div>
	</a>
	<div class="clear"></div>
</div>