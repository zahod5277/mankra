<?php


class Iron_sonaar{

	public static function setup(){
		load_template( get_template_directory().'/includes/classes/tgmpa.class.php', true );
		load_template( get_template_directory().'/includes/classes/iron_sonaar_archive.class.php', true );
		load_template( get_template_directory().'/includes/classes/iron_sonaar_setup.class.php', true );
		load_template( get_template_directory().'/includes/classes/iron_sonaar_message.class.php', true );
		load_template( get_template_directory().'/framework-customizations/theme/hooks.php', true );
        load_template( get_template_directory().'/includes/classes/nav.class.php', true );
        load_template( get_template_directory().'/includes/sonaar-music/sonaar-music.php', true );

		if( !class_exists('Mobile_Detect') ){
			load_template( get_template_directory().'/includes/classes/Mobile_Detect.php', true );
		}
		Iron_sonaar_Setup::execute();
	}

	public static function childDir(){
		return get_stylesheet_directory();
	}

	public static function childUrl(){
		return get_stylesheet_directory_uri();
	}

	public static function displayPageTitle( $pageId, $default = null ){
		if( $pageId ){
			echo wp_kses_post( get_the_title( $pageId ) );
		}
		echo wp_kses_post( $default );
	}

	/**
	 * IsLoginPage
	 * @return boolean
	 */
	public static function isLoginPage() {
		return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	}


	public function getPageTitle( $pageId, $default = null ){
		if( $pageId ){
			return get_the_title( $pageId );
		}
		return $default;
	}

	/**
	 * getField
	 *
	 * @param string $metaKey The metaKey you whant the value
	 * @param int $postID The post ID you want to retreive the metaKey
	 * @param bool $single (Optional) Whether to return a single value.
	 * @return mixed Will be an array if $single is false. Will be value of meta data field if $single is true.
	*/
	public static function getField( $metaKey, $postId, $single = true ){
		// if ( function_exists('get_field') && $single ){
			// return get_field( $metaKey, $postId );
		// }
		// if ( function_exists( 'get_field_object' ) && !$single ) {
			// return get_field_object( $metaKey, $postId, true, true);
		// }

		return get_post_meta( $postId, $metaKey, $single );
	}



	public static function displayFullPagination () {
		global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		$pagination = array(
			'base' => add_query_arg('paged','%#%'),
			'format' => '',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
			'show_all' => false,
			'type' => 'list',
			'next_text' => '&raquo;',
			'prev_text' => '&laquo;'

			);



		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

		if(isset( $_GET['artist-id'] ) && !empty( $_GET['artist-id']) ) {
			$pagination['add_args'] = array('artist-id' =>  sanitize_key( $_GET['artist-id'] )  );
		}

		echo wp_kses_post( paginate_links( $pagination ) );
	}

	/**
	 * getOption
	 *
	 * @return mixedF
	 */
	public static function getOption( $id, $key = null, $default = null ){
		if( function_exists( 'sonaar_music_get_option' ) ){
			return sonaar_music_get_option( $id, $key, $default );
		}
		return $default;
	}

	/**
	 * Setup Dynamic Sidebar
	 */

	public static function setupDynamicSidebar ( $page_id ){
		$sidebar_postType = array(
			'post' => array('single_post_default_sidebar', 'single_post_default_sidebar_position'),
			'video' => array('single_video_default_sidebar', 'single_video_default_sidebar_position'),
			'event' => array('single_event_default_sidebar', 'single_event_default_sidebar_position'),
			'album' => array('single_discography_default_sidebar', 'single_discography_default_sidebar_position')

		);
		$postType = get_post_type( $page_id );


		if ( $postType == 'page' ||  $postType == 'product') {
			$sidebar_area = 'sonaar_sidebar_0';
			$has_sidebar = is_active_sidebar($sidebar_area);
			$sidebar_position = Iron_sonaar::getField('sidebar-position', $page_id);


			if ( 'disabled' === $sidebar_position ){
				$sidebar_position = false;
				$has_sidebar = false;
			}

			if ( $sidebar_position ){
				$sidebar_area = Iron_sonaar::getField('sidebar-area_id', $page_id );
				$has_sidebar = is_active_sidebar( $sidebar_area );
			}

			return array( $has_sidebar, $sidebar_position, $sidebar_area );
		}


		$sidebar_area = Iron_sonaar::getOption( $sidebar_postType[$postType][0] , null, false );
		$has_sidebar = is_active_sidebar( $sidebar_area );
		$sidebar_position = Iron_sonaar::getOption( $sidebar_postType[$postType][1] , null, false );


		if ( ! $sidebar_area )
			return array( false, false, false );

		return array( $has_sidebar, $sidebar_position, $sidebar_area );
	}


	public static function displayPageTitleDivider() {
		$divider_image = Iron_sonaar::getOption('page_title_divider_image');
		if(empty($divider_image)){
			echo '<span class="heading-b3"></span>';
		} else {
			echo '<img class="custom-header-img" src="'.esc_url($divider_image).'" alt="divider" />';
		}
	}

	public static function isPageTitleUppercase() {
		$page_title_uppercase = (bool)Iron_sonaar::getOption('page_title_uppercase');
		if(!empty($page_title_uppercase)){
			return true;
		}
		return false;
	}

	public static function getTemplatePart($type) {
			get_template_part( 'items/' . $type);
	}

	public static function allowedHtml() {
		return array(
		    'a' => array(
		        'href' => array(),
		        'title' => array()
		    ),
		    'br' => array(),
		    'em' => array(),
		    'strong' => array(),
		    'p' => array(
		    	'style' => array()
		    ),
		    'font' => array(),
		    'b' => array(),
		    'span' => array(),

		);
	}




	public static function is_active_plugin( $plugin ){
	    $active_plugins = get_option( 'active_plugins' );
	    if( is_array($active_plugins) && in_array( $plugin, $active_plugins ) ){
	        return true;
	    }

	    $active_sitewide_plugins = get_site_option( 'active_sitewide_plugins' );
	    if( is_array($active_sitewide_plugins) && in_array( $plugin, $active_sitewide_plugins ) ){
	        return true;
	    }

	    return false;
	}

}