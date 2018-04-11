<?php
$iron_sonaar_categories = get_terms($taxonomy);

if(!empty($iron_sonaar_categories) && !isset($iron_sonaar_categories->errors)) {

	if($taxonomy == 'video-category') {
	
		$iron_sonaar_archive_page = Iron_sonaar::getOption('page_for_videos');
		$iron_sonaar_archive_page = ( empty($iron_sonaar_archive_page) ? false : get_permalink($iron_sonaar_archive_page) );
	
	} else if($taxonomy == 'category') {
	
		$iron_sonaar_archive_page = get_option('page_for_posts');
		$iron_sonaar_archive_page = ( empty($iron_sonaar_archive_page) ? false : get_permalink($iron_sonaar_archive_page) );
	
	}

?>
	<!-- widget-box -->
	<section class="widget-box">
		<!-- title-box -->
		<header class="title-box">
			<h2><?php echo esc_html__("CATEGORIES", 'sonaar'); ?></h2>
		</header>
		<nav id="cat-list">
			<ul>
	<?php if ( $iron_sonaar_archive_page ) { ?>
				<li><a href="<?php echo esc_url($iron_sonaar_archive_page); ?>"><i class="fa fa-plus"></i> <?php esc_html_e("All", 'sonaar'); ?></a></li>
	<?php } ?>
	<?php foreach($iron_sonaar_categories as $term):
	$iron_sonaar_activeClass = "";
	if ( is_category() ) {
	
		$iron_sonaar_cterm = get_category( get_query_var('cat') );
		$iron_sonaar_activeClass = ($iron_sonaar_cterm->term_id == $term->term_id) ? 'class="active"' : '';
		
	}elseif ( is_tax() ) {
	
		$taxonomy = get_query_var('taxonomy');
		$iron_sonaar_cterm = get_term_by( 'slug', get_query_var('term'), $taxonomy );
		$iron_sonaar_activeClass = ($iron_sonaar_cterm->term_id == $term->term_id) ? 'active' : '';
	}	
	?>
				<li><a class="<?php echo esc_attr($iron_sonaar_activeClass); ?>" href="<?php echo esc_url(get_term_link( $term, $taxonomy )); ?>"><i class="fa fa-plus"></i> <?php echo esc_html($term->name); ?></a></li>
	<?php endforeach; ?>
			</ul>
		</nav>
	</section>
<?php 
}
?>	