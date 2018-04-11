<?php



/**
 * Events Widget Class
 *
 * @since 1.6.0
 * @see   Iron_Widget_Posts
 * @todo  - Add advanced options
 *        - Merge Videos, and Posts
 */

class Iron_Music_Widget_Events extends Iron_Music_Widget
{

	/**
	 * Widget Defaults
	 */

	public static $widget_defaults;


	/**
	 * Register widget with WordPress.
	 */

	function __construct ()
	{
		$widget_ops = array(
			  'classname'   => 'Iron_Music_Widget_Events'
			, 'description' => esc_html_x('List upcoming or past events on your site.', 'Widget', IRON_MUSIC_TEXT_DOMAIN)
		);

		self::$widget_defaults = array(
			  'title'        => ''
			, 'post_type'    => 'event'
			, 'number'       => get_ironMusic_option('events_per_page', '_iron_music_discography_options')
			, 'filter'		 => 'upcoming'
			, 'artists_filter' => array()
			, 'enable_artists_filter' => false
			, 'action_title' => ''
			, 'action_obj_id'  => ''
			, 'action_ext_link'  => ''
		);

		parent::__construct('iron-features-events', IRON_MUSIC_PREFIX . esc_html__('Events', 'Widget', IRON_MUSIC_TEXT_DOMAIN), $widget_ops);

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	function widget ( $args, $instance )
	{
		global $post;

		$cache = wp_cache_get('Iron_Music_Widget_Events', 'widget');

		if ( ! is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		$args['before_title'] = "<span class='heading-t3'></span>".$args['before_title'];
		$args['before_title'] = str_replace('h2','h3',$args['before_title']);
		$args['after_title'] = str_replace('h2','h3',$args['after_title']);
		/*$args['after_title'] = $args['after_title']."<span class='heading-b3'></span>";*/
		extract($args);

		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title      = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$post_type  = apply_filters( 'widget_post_type', $instance['post_type'], $instance, $this->id_base );
		$number     = $instance['number'];
		$filter 	= $instance['filter'];

		$meta_query = array();
		$artists_filter = $instance['artists_filter'];


		$enable_artists_filter = $instance['enable_artists_filter'];
		if(!empty($artists_filter)) {
			if(!is_array($artists_filter)) {
				$artists_filter = explode(",", $artists_filter);
				$meta_query = array(
					array(
						'key'     => 'artist_at_event',
						'value'   => implode('|',$artists_filter),
						'compare' => 'rlike',
					),
				);

			}
		}

		// $show_date  = $instance['show_date'];
		// $thumbnails = $instance['thumbnails'];

		$r = new WP_Query( apply_filters( 'IronFeatures_Widget_Events_args', array(
			  'post_type'           => $post_type
			, 'filter'      		=> $filter
			, 'artists_filter'		=> $artists_filter
			, 'posts_per_page'      => $number
			, 'no_found_rows'       => true
			, 'post_status'         => 'publish'
			, 'ignore_sticky_posts' => true
			, 'meta_query' => $meta_query
		) ) );



			echo $before_widget;

			if ( ! empty( $title ) )
				echo $before_title . $title . $after_title;
				if(!empty($title)){$this->get_title_divider();}


				if( !empty($enable_artists_filter) ) {
					iron_get_events_filter($artists_filter);
				}
				?>

				<ul id="post-list" class="concerts-list">

<?php

				$permalink_enabled = (bool) get_option('permalink_structure');
				while ( $r->have_posts() ) : $r->the_post();
					$post->filter = $filter;
					get_template_part( 'items/event');

				endwhile;

				if(!$r->have_posts()):
				?>

					<li class="nothing-found">
					<?php
					if($filter == 'upcoming')
						echo esc_html__("No upcoming events scheduled yet. Stay tuned!", IRON_MUSIC_TEXT_DOMAIN);
					else
						echo esc_html__("No events scheduled yet. Stay tuned!", IRON_MUSIC_TEXT_DOMAIN);
					?>
					</li>

				<?php endif; ?>
				</ul>

<?php

			echo $after_widget;
			//echo $action;

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();


		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('IronFeatures_Widget_Events', $cache, 'widget');
	}

	function update ( $new_instance, $old_instance )
	{
		$instance = wp_parse_args( (array) $old_instance, self::$widget_defaults );

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['filter']  = $new_instance['filter'];
		$instance['artists_filter']  = $new_instance['artists_filter'];
		$instance['action_title']  = $new_instance['action_title'];
		$instance['action_obj_id']  = $new_instance['action_obj_id'];
		$instance['action_ext_link']  = $new_instance['action_ext_link'];

		$this->flush_widget_cache();

		return $instance;
	}

	function flush_widget_cache ()
	{
		wp_cache_delete('IronFeatures_Widget_Events', 'widget');
	}

	function form ( $instance )
	{
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$filter    = $instance['filter'];
		$artists_filter = $instance['artists_filter'];
		$action_title = $instance['action_title'];
		$action_obj_id = $instance['action_obj_id'];
		$action_ext_link = $instance['action_ext_link'];
?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', IRON_MUSIC_TEXT_DOMAIN); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" placeholder="<?php esc_html_e('Upcoming Events', IRON_MUSIC_TEXT_DOMAIN); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e('Number of events to show:', IRON_MUSIC_TEXT_DOMAIN); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'filter' )); ?>"><?php esc_html_e('Filter By:', IRON_MUSIC_TEXT_DOMAIN); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('filter')); ?>" name="<?php echo esc_attr($this->get_field_name('filter')); ?>">
				<option <?php echo ($filter == 'upcoming' ? 'selected' : ''); ?> value="upcoming"><?php _ex('Upcoming Events', 'Widget', IRON_MUSIC_TEXT_DOMAIN); ?></option>
				<option <?php echo ($filter == 'past' ? 'selected' : ''); ?> value="past"><?php _ex('Past Events', 'Widget', IRON_MUSIC_TEXT_DOMAIN); ?></option>
			</select>
		<p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'artists_filter' )); ?>"><?php esc_html_e('Filter By Artists:', IRON_MUSIC_TEXT_DOMAIN); ?></label>
			<select multiple class="widefat" id="<?php echo esc_attr($this->get_field_id('artists_filter')); ?>" name="<?php echo esc_attr($this->get_field_name('artists_filter')); ?>[]">
				<?php echo $this->get_object_options($artists_filter, 'artist'); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_title')); ?>"><?php _ex('Call To Action Title:', 'Widget', IRON_MUSIC_TEXT_DOMAIN); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('action_title')); ?>" name="<?php echo esc_attr($this->get_field_name('action_title')); ?>" value="<?php echo esc_attr($action_title); ?>" placeholder="<?php esc_html_e('View More', IRON_MUSIC_TEXT_DOMAIN); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_obj_id')); ?>"><?php _ex('Call To Call To Action Page:', 'Widget', IRON_MUSIC_TEXT_DOMAIN); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('action_obj_id')); ?>" name="<?php echo esc_attr($this->get_field_name('action_obj_id')); ?>">
				<?php echo $this->get_object_options($action_obj_id); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_ext_link')); ?>"><?php _ex('Call To Action External Link:', 'Widget', IRON_MUSIC_TEXT_DOMAIN); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('action_ext_link')); ?>" name="<?php echo esc_attr($this->get_field_name('action_ext_link')); ?>" value="<?php echo esc_attr($action_ext_link); ?>" />
		</p>


<?php
	}
} // class IronFeatures_Widget_Events





/**
 * Grid Widget Class
 * @since 1.6.0
 * @todo  - Add options
 */

class Iron_Music_Widget_Grid extends Iron_Music_Widget
{
	//Widget Defaults
	public static $widget_defaults;

	//Register widget with WordPress
	function __construct ()
	{
		$widget_ops = array(
			'classname'   => 'iron_widget_grid',
			'description' => esc_html_x('A grid view of your selected albums.', 'Widget', IRON_MUSIC_TEXT_DOMAIN)
		);

		self::$widget_defaults = array(
			'albums'     	 => array(),
			'artists_filter' => array(),
			'column' => 3,
			'parallax' => 0,
			'parallax_speed' => '2,-2,1'
		);

		parent::__construct('iron-features-grid', IRON_MUSIC_PREFIX . esc_html_x('Grid', 'Widget', IRON_MUSIC_TEXT_DOMAIN), $widget_ops);

	}

	//Front-end display of widget
	public function widget ( $args, $instance )
	{
		global $post, $widget;

		extract($args);

		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );
		$post_type = ( isset( $instance['grip_post_type'] ) )? $instance['grip_post_type']: 'album';
		$albums = $instance['albums'];
		$column = $instance['column'];
		$parallax_speed = $instance['parallax_speed'];
		$parallax = $instance['parallax'];
		$el_id = ( ! empty( $instance['el_id'] ) )? 'id="' . $instance['el_id'] .'"': 'id="sr_it-grid-' . uniqid() . '"';
		$grid_filter_artists = (isset($instance['grid_filter_artists']))? $instance['grid_filter_artists'] : '' ;
		$artists_filter = $instance['artists_filter'];


		// var_dump($post_type);
		// die();

		if(!is_array($albums)) {
			$albums = explode(",", $albums);
		}



		$meta_query = array();
		if(!empty($grid_filter_artists)) {
			if(!is_array($artists_filter)) {
				$artists_filter = explode(",", $artists_filter);
				$meta_query =  array(
					array(
						'key'     => 'artist_of_album',
						'value'   => implode('|',$artists_filter),
						'compare' => 'rlike',
					),
				);
			}
		}

		if ( $post_type == 'album' ){
			$query_args = array(
				'post_type'           => $post_type,
				'artists_filter' 	  => $artists_filter,
				'posts_per_page'      => -1,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'post__in' => $albums,
				'meta_query' => $meta_query,
			);
		}else{

			if(!is_array($artists_filter))
				$artists_filter = explode(",", $artists_filter);

			$query_args = array(
				'post_type'           => $post_type,
				'posts_per_page'      => -1,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'post__in' => $artists_filter,
			);
		}


		$r = new WP_Query( $query_args );


		if ( $r->have_posts() ) :
			echo $before_widget;
			echo '<section ' . $el_id . 'class="sr_it-grid column-' . $column . '" data-parallax="' . $parallax . '" data-column="' . $column . '" data-parallax-speed="[' . $parallax_speed . ']">';




			// Si utilisé dans le single-artist ne pas consideré comme widget
			// pour ne pas afficher les albums ayant l'option
			// "Hide album within the Albums Posts template"

			$widget = ( !get_post_type($post) == 'artist' )? true : false ;

			while ( $r->have_posts() ) : $r->the_post();

				get_template_part( 'items/grid' );


			endwhile;

			echo ( isset( $action ) )? $action :'';
			echo '</section>';

			echo $after_widget;
			//echo $action;

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;
		wp_reset_query();
	}

	//Back-end widget form.

	public function form ( $instance ){
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$albums = $instance['albums'];
		$artists_filter = $instance['artists_filter'];


		$all_albums = get_posts(array(
			'post_type' => 'album',
			'posts_per_page' => -1,
			'no_found_rows'  => true
		));


		if ( !empty($all_albums) ){
			include IRON_MUSIC_DIR_PATH . 'includes/widget-form/grid.php';
		} else {
			echo wp_kses_post( '<p>'. sprintf( _x('No albums have been created yet. <a href="%s">Create some</a>.', 'Widget', IRON_MUSIC_TEXT_DOMAIN), admin_url('edit.php?post_type=album') ) .'</p>' );
		}
	}

	//Sanitize widget form values as they are saved.

	public function update ( $new_instance, $old_instance )
	{
		$instance = wp_parse_args( $old_instance, self::$widget_defaults );

		$instance['albums'] = $new_instance['albums'];
		$instance['artists_filter'] = $new_instance['artists_filter'];

		return $instance;
	}

} // class Iron_Widget_Grid



function ironFeatures_widgets_init(){
	register_widget( 'Iron_Music_Widget_Events' );
	register_widget( 'Iron_Music_Widget_Grid' );

	$iron_widgets = array(
		  'Iron_Widget_Radio'           => esc_html_x('sonaar: Radio Player', 'Widget', 'sonaar')
		, 'Iron_Widget_Terms'           => esc_html_x('sonaar: Terms', 'Widget', 'sonaar')
		, 'Iron_Widget_Posts'    		=> esc_html_x('sonaar: News', 'Widget', 'sonaar')
		, 'Iron_Widget_Videos'   		=> esc_html_x('sonaar: Videos', 'Widget', 'sonaar')
	);

	foreach($iron_widgets as $key => $widget) {
		register_widget($key);
	}
}

add_action('widgets_init', 'ironFeatures_widgets_init');



/**
 * Custom Widgets
 *
 * Widgets :
 * - Iron_Widget_Radio
 * - Iron_Widget_Twitter
 * - Iron_Widget_Terms
 * - Iron_Widget_Posts
 * - Iron_Widget_Videos
 * - Iron_Widget_Events
 *
 * @link http://codex.wordpress.org/Function_Reference/register_widget
 */



/**
 * Radio Widget Class
 *
 * @since 1.6.0
 * @todo  - Add options
 */

class Iron_Widget_Radio extends Iron_Music_Widget
{
	/**
	 * Widget Defaults
	 */

	public static $widget_defaults;


	/**
	 * Register widget with WordPress.
	 */

	function __construct ()
	{
		$widget_ops = array(
			  'classname'   => 'iron_widget_radio'
			, 'description' => esc_html_x('A simple radio that plays a list of songs from selected albums.', 'Widget', 'sonaar')
		);

		self::$widget_defaults = array(
			  'title'        => ''
			, 'albums'     	 => array()
			, 'autoplay'	=> 0
			, 'show_playlist' => 0
			, 'action_title' => ''
			, 'action_obj_id'  => ''
			, 'action_ext_link'  => ''
		);

		if ( isset($_GET['load']) && $_GET['load'] == 'playlist.json' ) {

			add_action('init', array($this, 'print_playlist_json'));
		}

		parent::__construct('iron-radio', esc_html_x('sonaar: Radio Player', 'Widget', 'sonaar'), $widget_ops);

	}


	private function get_market($album_id = 0){
		if( $album_id == 0 )
			return;

		$firstAlbum = explode(',', $album_id);
		$firstAlbum = $firstAlbum[0];


		if ( Iron_sonaar::getField('alb_store_list', $firstAlbum) ){
			$output = '<div class="buttons-block"><div class="ctnButton-block">
					   <div class="available-now">' . esc_html__("Available now on", 'sonaar') . ':</div>
					   <ul class="store-list">';
			while( has_sub_field( 'alb_store_list', $firstAlbum ) ){
				$icon = ( get_sub_field('album_store_icon') )? '<i class="fa ' . get_sub_field('album_store_icon') . '"></i>': '';
				$output .= '<li><a class="button" href="' . esc_url( get_sub_field("store_link") ) . '" target="_blank">'. $icon . get_sub_field('store_name') . '</a></li>';
			}
			$output .= '</ul></div></div>';
		}

		return $output;
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget ( $args, $instance )
	{

		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );
		$args['before_title'] = "<span class='heading-t3'></span>".$args['before_title'];
		$args['before_title'] = str_replace('h2','h3',$args['before_title']);
		$args['after_title'] = str_replace('h2','h3',$args['after_title']);
		/*$args['after_title'] = $args['after_title']."<span class='heading-b3'></span>";*/

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$albums = $instance['albums'];
		$show_album_market = (bool) ( isset( $instance['show_album_market'] ) )? $instance['show_album_market']: 0;
		$show_playlist = (bool)$instance['show_playlist'];
		$autoplay = (bool)$instance['autoplay'];
		$action_title = apply_filters( 'iron_widget_action_title', $instance['action_title'], $instance, $this->id_base );
		$action_obj_id = apply_filters( 'iron_widget_action_obj_id', $instance['action_obj_id'], $instance, $this->id_base );
		$action_ext_link = apply_filters( 'iron_widget_action_ext_link', $instance['action_ext_link'], $instance, $this->id_base );
		$store_buttons = array();
		/***/

		$action = $this->action_link( $action_obj_id, $action_ext_link, $action_title);

		$playlist = $this->get_playlist($albums, $title);
		if ( isset($playlist['tracks']) && ! empty($playlist['tracks']) )
			$player_message = esc_html_x('Loading tracks...', 'Widget', 'sonaar');
		else
			$player_message = esc_html_x('No tracks founds...', 'Widget', 'sonaar');

		/***/

		if ( ! $playlist )
			return;

		if($show_playlist) {
			$args['before_widget'] = str_replace("iron_widget_radio", "iron_widget_radio playlist_enabled", $args['before_widget']);
		}

		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
			if(!empty($title)){$this->get_title_divider();}

		if(is_array($albums)) {
			$albums = implode(',', $albums);
		}

		$firstAlbum = explode(',', $albums);
		$firstAlbum = $firstAlbum[0];

		$classShowPlaylist = '';
		$colShowPlaylist = '';
		$colShowPlaylist2 = '';
		if($show_playlist) {
			$classShowPlaylist = 'show-playlist';
			$colShowPlaylist = 'vc_col-md-6';
			$colShowPlaylist2 = 'vc_col-md-6';


		}

		$show_market = ( $show_album_market )? $albums : 0 ;


		$format_playlist ='';
		foreach( $playlist['tracks'] as $track){
			$trackUrl = $track['mp3'] ;
			$showLoading = $track['loading'] ;

			$song_store_list = '<span class="store-list">';
			foreach( array_reverse($track['song_store_list']) as $store ){
				$song_store_list .= '<a href="' . $store['store_link'] . '" class="song-store" target="_blank" title="' . $store['song_store_name'] . '"><i class="fa ' . $store['song_store_icon'] . '"></i></a>';
			}
			$song_store_list .= '</span>';

			$store_buttons = ( !empty($track["track_store"]) )? '<a class="button" target="_blank" href="'. esc_url( $track['track_store'] ) .'">'. esc_textarea( $track['track_buy_label'] ).'</a>' : '' ;
			$format_playlist .= '<li data-audiopath="' . esc_url( $trackUrl ) . '" data-showloading="' . $showLoading .'"  data-albumTitle="' . esc_attr( $track['album_title'] ) . '" data-albumArt="' . esc_url( $track['poster'] ) . '"data-trackartists="' . esc_attr( $track['album_artist'] ) . '"data-releasedate="' . esc_attr( $track['release_date'] ) . '" data-trackTitle="' . $track['track_title'] . '">' . $song_store_list . '</li>';
		}
		$class_single = ( isset( $post ) && 'album' != get_post_type( $post->ID ) )? 'vc_col-sm-8 vc_col-sm-offset-2' : '';
		if( isset( $post ) && 'album' == get_post_type( $post->ID ) && 'single_album' == $args["widget_id"] ){
			$colShowPlaylist = 'vc_col-md-5';
			$colShowPlaylist2 = 'vc_col-md-7';
		}
			if ('album' == get_post_type( get_the_id() ) && 'single_album' == $args["widget_id"] ) {
				$title = get_the_title(get_the_id());
				echo '<div class="vc_col-sm-10 vc_col-sm-offset-1">
				<div class="iron-audioplayer wpb_column vc_column_container row ' . $classShowPlaylist . '" id="'. esc_attr( $args["widget_id"] ) .'" data-autoplay="'.esc_attr($autoplay).'" data-url-playlist="' . esc_url(home_url('?load=playlist.json&amp;title='.$title.'&amp;albums='.$albums.'')) . '" >

				<div class="wpb_column vc_col-sm-8 vc_col-sm-offset-2">
					<div class="playlist">
						<ul>' . $format_playlist . '</ul>
					</div>
				</div>
				<div class="vc_column_container wpb_column vc_col-sm-12">
					<div class="track-title"></div>
					<div class="album-title"></div>

					<div class="player">
						<div class="currentTime"></div>
						<div class="progressLoading"></div>
						<div id="'.esc_attr($args["widget_id"]).'-wave" class="wave"></div>
						<div class="totalTime"></div>
						<div class="control">
							<a class="previous" style="opacity:0;">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.2 11.7" style="enable-background:new 0 0 10.2 11.7;" xml:space="preserve">
									<polygon points="10.2,0 1.4,5.3 1.4,0 0,0 0,11.7 1.4,11.7 1.4,6.2 10.2,11.7"/>
								</svg>
							</a>
							<a class="play" style="opacity:0;">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.5 21.2" style="enable-background:new 0 0 17.5 21.2;" xml:space="preserve">
									<path d="M0,0l17.5,10.9L0,21.2V0z"/>

									<rect width="6" height="21.2"/>
									<rect x="11.5" width="6" height="21.2"/>
								</svg>
							</a>
							<a class="next" style="opacity:0;">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.2 11.7" style="enable-background:new 0 0 10.2 11.7;" xml:space="preserve">
									<polygon points="0,11.7 8.8,6.4 8.8,11.7 10.2,11.7 10.2,0 8.8,0 8.8,5.6 0,0"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
				</div>
				</div>';
			}else{
				echo '<div class="iron-audioplayer wpb_column vc_column_container ' . $class_single . ' ' . $classShowPlaylist . '" id="'. esc_attr( $args["widget_id"] ) .'" data-autoplay="'.esc_attr($autoplay).'" data-url-playlist="' . esc_url(home_url('?load=playlist.json&amp;title='.$title.'&amp;albums='.$albums.'')) . '" >
				<div class="wpb_column vc_col-sm-12 ' . $colShowPlaylist . '">
					<div class="album">
						<div class="album-art"><img src="'. get_template_directory_uri () . '/images/defaultpx.png" alt="album-art"></div>
					</div>
				</div>
				<div class="wpb_column vc_col-sm-12 ' . $colShowPlaylist2 . '">
					<div class="playlist">
						<h1 class="sr_it-playlist-title">'. get_the_title($firstAlbum) .'</h1><div class="sr_it-playlist-artists">'. esc_html__('By', 'sonaar'). ' <span class="sr_it-artists-value">'.
						( (get_artists($firstAlbum))? get_artists($firstAlbum): '') .'</span></div>
						<div class="sr_it-playlist-release-date">'. esc_html__('Release date', 'sonaar') .': <span class="sr_it-date-value">'.
						( (get_field('alb_release_date', $firstAlbum))? get_field('alb_release_date', $firstAlbum): ''). '</span></div>
						<ul>' . $format_playlist . '</ul>
					</div>


				</div>

				<div class="vc_column_container wpb_column vc_col-sm-12">' . $this->get_market( $show_market ). '</div>
				<div class="vc_column_container wpb_column vc_col-sm-12">
					<div class="track-title"></div>
					<div class="album-title"></div>

					<div class="player">
						<div class="currentTime"></div>
						<div id="'.esc_attr($args["widget_id"]).'-wave" class="wave"></div>
						<div class="totalTime"></div>
						<div class="control">
							<a class="previous" style="opacity:0;">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.2 11.7" style="enable-background:new 0 0 10.2 11.7;" xml:space="preserve">
									<polygon points="10.2,0 1.4,5.3 1.4,0 0,0 0,11.7 1.4,11.7 1.4,6.2 10.2,11.7"/>
								</svg>
							</a>
							<a class="play" style="opacity:0;">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.5 21.2" style="enable-background:new 0 0 17.5 21.2;" xml:space="preserve">
									<path d="M0,0l17.5,10.9L0,21.2V0z"/>

									<rect width="6" height="21.2"/>
									<rect x="11.5" width="6" height="21.2"/>
								</svg>
							</a>
							<a class="next" style="opacity:0;">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.2 11.7" style="enable-background:new 0 0 10.2 11.7;" xml:space="preserve">
									<polygon points="0,11.7 8.8,6.4 8.8,11.7 10.2,11.7 10.2,0 8.8,0 8.8,5.6 0,0"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
				</div>';
			}



		echo $action;
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 */

	public function form ( $instance )
	{
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title = esc_attr( $instance['title'] );
		$albums = $instance['albums'];
		$show_playlist = (bool)$instance['show_playlist'];
		$autoplay = (bool)$instance['autoplay'];
		$action_title = $instance['action_title'];
		$action_obj_id = $instance['action_obj_id'];
		$action_ext_link = $instance['action_ext_link'];

		$all_albums = get_posts(array(
			  'post_type' => 'album'
			, 'posts_per_page' => -1
			, 'no_found_rows'  => true
		));

		if ( !empty( $all_albums ) ) :?>

			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _ex('Title:', 'Widget', 'sonaar'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" placeholder="<?php _e('Popular Songs', 'sonaar'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('albums'); ?>"><?php _ex('Album:', 'Widget', 'sonaar'); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('albums'); ?>" name="<?php echo $this->get_field_name('albums'); ?>[]" multiple="multiple">
				<?php foreach($all_albums as $a): ?>

					<option value="<?php echo $a->ID; ?>"<?php echo (in_array($a->ID, $albums) ? ' selected="selected"' : ''); ?>><?php echo esc_attr($a->post_title); ?></option>

				<?php endforeach; ?>
				</select>
			</p>

			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>"<?php checked( $autoplay ); ?> />
				<label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php _e( 'Auto Play' ); ?></label><br />
			</p>

			<p>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_playlist'); ?>" name="<?php echo $this->get_field_name('show_playlist'); ?>"<?php checked( $show_playlist ); ?> />
				<label for="<?php echo $this->get_field_id('show_playlist'); ?>"><?php _e( 'Show Playlist' ); ?></label><br />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('action_title'); ?>"><?php _ex('Call To Action Title:', 'Widget', 'sonaar'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('action_title'); ?>" name="<?php echo $this->get_field_name('action_title'); ?>" value="<?php echo $action_title; ?>" placeholder="<?php _e('View More', 'sonaar'); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('action_obj_id'); ?>"><?php _ex('Call To Call To Action Page:', 'Widget', 'sonaar'); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('action_obj_id'); ?>" name="<?php echo $this->get_field_name('action_obj_id'); ?>">
					<?php echo $this->get_object_options($action_obj_id); ?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('action_ext_link'); ?>"><?php _ex('Call To Action External Link:', 'Widget', 'sonaar'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('action_ext_link'); ?>" name="<?php echo $this->get_field_name('action_ext_link'); ?>" value="<?php echo $action_ext_link; ?>" />
			</p>

		<?php
		else:

			echo wp_kses_post( '<p>'. sprintf( _x('No albums have been created yet. <a href="%s">Create some</a>.', 'Widget', 'sonaar'), esc_url(admin_url('edit.php?post_type=album')) ) .'</p>' );

		endif;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 */

	public function update ( $new_instance, $old_instance )
	{
		$instance = wp_parse_args( $old_instance, self::$widget_defaults );

		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['albums'] = $new_instance['albums'];
		$instance['show_playlist']  = (bool)$new_instance['show_playlist'];
		$instance['autoplay']  = (bool)$new_instance['autoplay'];
		$instance['action_title']  = $new_instance['action_title'];
		$instance['action_obj_id']  = $new_instance['action_obj_id'];
		$instance['action_ext_link']  = $new_instance['action_ext_link'];

		return $instance;
	}


	function print_playlist_json() {
		// header('Content-Type: application/json');
		$jsonData = array();

		$title = !empty($_GET["title"]) ? $_GET["title"] : null;
		$albums = !empty($_GET["albums"]) ? $_GET["albums"] : array();

		$playlist = $this->get_playlist($albums, $title);

		if(!is_array($playlist) || empty($playlist['tracks']))
			return;

		wp_send_json($playlist);

	}

	function get_playlist($album_ids = array(), $title = null) {

		global $post;

		$playlist = array();
		if(!is_array($album_ids)) {
			$album_ids = explode(",", $album_ids);
		}


		$albums = get_posts(array(
			  'post_type' => 'album'
			, 'post__in' => $album_ids
		));

		$tracks = array();
		foreach($albums as $a) {

			$album_tracks =  get_field('alb_tracklist', $a->ID );

			for($i = 0 ; $i < count($album_tracks) ; $i++) {

				$fileOrStream =  $album_tracks[$i]['FileOrStream'];
				$thumb_id = get_post_thumbnail_id($a->ID);
				$thumb_url = wp_get_attachment_image_src($thumb_id, 'medium', true);

				$track_title = false;
				$album_title = false;
				$album_artist = false;
				$mp3_id = false;
				$audioSrc = '';
				$song_store_list = $album_tracks[$i]["song_store_list"];
				$showLoading = false;
				$album_tracks_lenght = false;

				switch ($fileOrStream) {
					case 'mp3':

						if ( isset( $album_tracks[$i]["track_mp3"] ) ) {
							$mp3_id = $album_tracks[$i]["track_mp3"]["id"];
							$mp3_metadata = wp_get_attachment_metadata( $mp3_id );
							$track_title = ( isset( $album_tracks[$i]["track_mp3"]["title"] ) && $album_tracks[$i]["track_mp3"]["title"] !== '' )? $album_tracks[$i]["track_mp3"]["title"] : false ;
							$album_title = ( isset( $mp3_metadata['album'] ) && $mp3_metadata['album'] !== '' )? $mp3_metadata['album'] : false;
							$album_artist = ( isset( $mp3_metadata['artist'] ) && $mp3_metadata['artist'] !== '' )? $mp3_metadata['artist'] : false;
							$album_tracks_lenght = ( isset( $mp3_metadata['length_formatted'] ) && $mp3_metadata['length_formatted'] !== '' )? $mp3_metadata['length_formatted'] : false;
							$audioSrc = wp_get_attachment_url($mp3_id);
							$showLoading = true;
						}

						break;
					case 'stream':

						$audioSrc = ( $album_tracks[$i]["stream_link"] !== '' )? $album_tracks[$i]["stream_link"] : false;
						$track_title = ( $album_tracks[$i]["stream_title"] !== '' )? $album_tracks[$i]["stream_title"] : false;
						$album_artist = ( $album_tracks[$i]["stream_artist"] !== '' )? $album_tracks[$i]["stream_artist"] : false;
						$album_title = ( $album_tracks[$i]["stream_album"] !== '' )? $album_tracks[$i]["stream_album"] : false;
						break;

					default:
						$album_tracks[$i] = array();
						break;
				}

				// if ( $mp3_metadata ) {
				// 	$album_tracks[$i]["mp3_metadata"] = $mp3_metadata;

				// }
				$album_tracks[$i] = array();
				$album_tracks[$i]["id"] = ( $mp3_id )? $mp3_id : $i ;
				$album_tracks[$i]["mp3"] = $audioSrc;
				$album_tracks[$i]["loading"] = $showLoading;
				$album_tracks[$i]["track_title"] = ( $track_title )? $track_title : "Track title ". $i;
				$album_tracks[$i]["lenght"] = $album_tracks_lenght;
				$album_tracks[$i]["album_title"] = ( $album_title )? $album_title : $a->post_title;
				$album_tracks[$i]["album_artist"] = ( $album_artist )? $album_artist : get_artists($a->ID);
				$album_tracks[$i]["poster"] = $thumb_url[0];
				$album_tracks[$i]["release_date"] = get_field('alb_release_date', $a->ID);
				$album_tracks[$i]["song_store_list"] = $song_store_list;
			}
			$tracks = array_merge($tracks, $album_tracks);

		}

		$playlist['playlist_name'] = $title;
		if ( empty($playlist['playlist_name']) ) $playlist['playlist_name'] = "";

		$playlist['tracks'] = $tracks;
		if ( empty($playlist['tracks']) ) $playlist['tracks'] = array();

		return $playlist;
	}



} // class Iron_Widget_Radio




/**
 * Terms Widget Class
 *
 * @since 1.6.0
 */
class Iron_Widget_Terms extends Iron_Music_Widget
{
	/**
	 * Widget Defaults
	 */

	public static $widget_defaults;


	/**
	 * Register widget with WordPress.
	 */

	function __construct ()
	{
		$widget_ops = array(
			  'classname'   => 'iron_widget_terms'
			, 'description' => esc_html_x('A list or dropdown of terms', 'Widget', 'sonaar')
		);

		self::$widget_defaults = array(
			  'title'        => ''
			, 'taxonomy'     => 'category'
			, 'count'        => 0
			, 'hierarchical' => 0
			, 'dropdown'     => 0
		);

		parent::__construct('iron-terms', esc_html__('sonaar: Terms', 'sonaar'), $widget_ops);
	}

	function widget ( $args, $instance )
	{
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );
		$args['before_title'] = "<span class='heading-t3'></span>".$args['before_title'];
		$args['before_title'] = str_replace('h2','h3',$args['before_title']);
		$args['after_title'] = str_replace('h2','h3',$args['after_title']);
		/*$args['after_title'] = $args['after_title']."<span class='heading-b3'></span>";*/
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$taxonomy = $instance['taxonomy'];
		$c = $instance['count'];
		$h = $instance['hierarchical'];
		$d = $instance['dropdown'];

		echo $before_widget;
		if ( $title )
			echo sprintf( $before_title, '' ) . $title . $after_title;
			if(!empty($title)){$this->get_title_divider();}

		$term_args = array(
			  'taxonomy'           => $taxonomy
			, 'orderby'            => 'name'
			, 'order'              => 'ASC'
			, 'hide_empty'         => 1
			, 'show_count'         => $c
			, 'hierarchical'       => $h
			, 'title_li'           => false
			, 'depth'              => 0
			, 'style'              => 'list'
			, 'orderby'            => 'name'
			, 'use_desc_for_title' => 1
			, 'child_of'           => 0
			, 'exclude'            => ''
			, 'exclude_tree'       => ''
			, 'current_category'   => 0
		);

		$terms = get_terms( $taxonomy, array( 'orderby' => 'name', 'hierarchical' => $h ) );

		if ( $d ) :
			$term_args['show_option_none'] = esc_html__('Select Term', 'sonaar');

?>
<select id="tax-<?php echo esc_attr($taxonomy); ?>" class="terms-dropdown" name="<?php echo esc_attr($this->get_field_name('taxonomy')); ?>">
	<option><?php echo esc_attr($term_args['show_option_none']); ?></option>
<?php
			foreach ( $terms as $term ) {
				echo '<option value="' . esc_attr($term->term_id) . '">'. esc_attr($term->name) . ( $c ? ' (' . $term->count . ')' : '' ) . '</option>';
			}
?>
</select>

<script>
/* <![CDATA[ */
	var dropdown = document.getElementById('tax-<?php echo esc_attr($taxonomy); ?>');
	function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo home_url('/'); ?>/?taxonomy=<?php echo esc_url($taxonomy); ?>&term="+dropdown.options[dropdown.selectedIndex].value;
		}
	}
	dropdown.onchange = onCatChange;
/* ]]> */
</script>

<?php
		else :
			$taxonomy_object = get_taxonomy( $taxonomy );

			$term_args['show_option_all'] = $taxonomy_object->labels->all_items;

			$posts_page = ( 'page' == get_option('show_on_front') && get_option('page_for_posts') ) ? get_permalink( get_option('page_for_posts') ) : sonaar_music_get_option('page_for_' . $taxonomy_object->object_type[0] . 's');
			$posts_page = esc_url( $posts_page );
?>
		<ul class="terms-list">
			<li><a href="<?php echo esc_url($posts_page); ?>"><i class="fa fa-plus"></i> <?php echo esc_html($term_args['show_option_all']); ?></a></li>
<?php

			foreach ( $terms as $term ) {
				echo '<li><a href="' . esc_url(get_term_link( $term, $taxonomy )) . '"><i class="fa fa-plus"></i> ' . $term->name . ( $c ? ' <small>(' . $term->count . ')</small>' : '' ) . '</a></li>';
			}
?>
		</ul>
<?php
		endif;

		echo $after_widget;
		echo ( isset( $action ) )? esc_attr( $action ) : '';
	}

	function update ( $new_instance, $old_instance )
	{
		$instance = wp_parse_args( $old_instance, self::$widget_defaults );

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
		$instance['count'] = !empty($new_instance['count']) ? 1 : 0;
		// $instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
		$instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

		return $instance;
	}

	function form ( $instance )
	{
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title = esc_attr( $instance['title'] );
		$count = (bool) $instance['count'];
		$dropdown = (bool) $instance['dropdown'];
		$taxonomy = esc_attr( $instance['taxonomy'] );

		# Get taxonomiues
		$taxonomies = get_taxonomies( array( 'public' => true ) );

		# If no taxonomies exists
		if ( ! $taxonomies ) {
			echo '<p>'. esc_html__('No taxonomies have been created yet.', 'sonaar') .'</p>';
			return;
		}

?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'sonaar'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" placeholder="<?php esc_html_e('Categories', 'sonaar'); ?>" /></p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('taxonomy')); ?>"><?php esc_html_e('Select Taxonomy:', 'sonaar'); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id('taxonomy')); ?>" name="<?php echo esc_attr($this->get_field_name('taxonomy')); ?>">
		<?php
			foreach ( $taxonomies as $tax ) {
				$tax = get_taxonomy($tax);
				echo '<option value="' . $tax->name . '"' . selected( $taxonomy, $tax->name, false ) . '>'. $tax->label . '</option>';
			}
		?>
			</select>
		</p>

		<p><input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('dropdown')); ?>" name="<?php echo esc_attr($this->get_field_name('dropdown')); ?>"<?php checked( $dropdown ); ?> />
		<label for="<?php echo esc_attr($this->get_field_id('dropdown')); ?>"><?php esc_html_e('Display as dropdown', 'sonaar'); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>"<?php checked( $count ); ?> />
		<label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Show post counts', 'sonaar'); ?></label><br />
<?php

	}

} // class Iron_Widget_Terms



/**
 * Posts Widget Class
 *
 * @since 1.6.0
 * @see   Iron_Widget_Posts
 * @todo  - Add advanced options
 */

class Iron_Widget_Posts extends Iron_Music_Widget
{
	/**
	 * Widget Defaults
	 */

	public static $widget_defaults;



	/**
	 * Register widget with WordPress.
	 */

	function __construct ()
	{
		$widget_ops = array(
			  'classname'   => 'iron_widget_posts'
			, 'description' => esc_html_x('The most recent posts on your site.', 'Widget', 'sonaar')
		);

		self::$widget_defaults = array(
			  'title'        => ''
			, 'post_type'    => 'post'
			, 'view'		 => 'post'
			, 'category'	 => array()
			, 'number'       => get_option('posts_per_page')
			, 'show_date'    => true
			, 'enable_excerpts' => false
			, 'action_title' => ''
			, 'action_obj_id'  => ''
			, 'action_ext_link'  => ''
		);

		parent::__construct('iron-recent-posts', esc_html_x('sonaar: News', 'Widget', 'sonaar'), $widget_ops);

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	function widget ( $args, $instance )
	{
		global $iron_sonaar_show_date, $iron_sonaar_enable_excerpts;

		$cache = wp_cache_get('iron_widget_posts', 'widget');

		if ( ! is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		$args['before_title'] = "<span class='heading-t3'></span>".$args['before_title'];
		$args['before_title'] = str_replace('h2','h3',$args['before_title']);
		$args['after_title'] = str_replace('h2','h3',$args['after_title']);
		extract($args);

		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title      = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$post_type  = apply_filters( 'widget_post_type', $instance['post_type'], $instance, $this->id_base );
		$number     = $instance['number'];
		$category   = $instance['category'];
		$view     	= $instance['view'];
		$iron_sonaar_show_date  = (bool)$instance['show_date'];
		$iron_sonaar_enable_excerpts  = (bool)$instance['enable_excerpts'];


		$query_args = array(
			  'post_type'           => $post_type
			, 'posts_per_page'      => $number
			, 'no_found_rows'       => true
			, 'post_status'         => 'publish'
			, 'ignore_sticky_posts' => true
		);

		if(!empty($category)) {

			if(is_array($category)) {
				$category = implode(",", $category);
			}
			$query_args["cat"] = $category;
		}


		$r = new WP_Query( apply_filters( 'iron_widget_posts_args', $query_args ) );

		if ( $r->have_posts() ) :

			$action_title = apply_filters( 'iron_widget_action_title', $instance['action_title'], $instance, $this->id_base );
			$action_obj_id = apply_filters( 'iron_widget_action_obj_id', $instance['action_obj_id'], $instance, $this->id_base );
			$action_ext_link = apply_filters( 'iron_widget_action_ext_link', $instance['action_ext_link'], $instance, $this->id_base );

			/***/

			$action = $this->action_link( $action_obj_id, $action_ext_link, $action_title);

			echo $before_widget;

			if ( ! empty( $title ) )
				echo sprintf( $before_title, $action ) . $title . $after_title;
				if(!empty($title)){$this->get_title_divider();}

?>
				<div class="recent-posts <?php echo esc_attr($view); ?>">
<?php
				$permalink_enabled = (bool) get_option('permalink_structure');
				while ( $r->have_posts() ) : $r->the_post();
						get_template_part('items/' . $view);
				endwhile;
?>
				<?php echo $action; ?>
				</div>

<?php

			echo $after_widget;

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('iron_widget_posts', $cache, 'widget');
	}

	function update ( $new_instance, $old_instance )
	{
		$instance = wp_parse_args( (array) $old_instance, self::$widget_defaults );

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['view'] = $new_instance['view'];
		$instance['category'] = $new_instance['category'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : true;
		$instance['enable_excerpts'] = isset( $new_instance['enable_excerpts'] ) ? (bool) $new_instance['enable_excerpts'] : true;

		$instance['action_title']  = $new_instance['action_title'];
		$instance['action_obj_id']  = $new_instance['action_obj_id'];
		$instance['action_ext_link']  = $new_instance['action_ext_link'];

		$this->flush_widget_cache();

		return $instance;
	}

	function flush_widget_cache ()
	{
		wp_cache_delete('iron_widget_posts', 'widget');
	}

	function form ( $instance )
	{
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		$enable_excerpts = isset( $instance['enable_excerpts'] ) ? (bool) $instance['enable_excerpts'] : true;
		$view = $instance['view'];
		$category = $instance['category'];
		$action_title = $instance['action_title'];
		$action_obj_id = $instance['action_obj_id'];
		$action_ext_link = $instance['action_ext_link'];
?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'sonaar'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" placeholder="<?php esc_html_e('Latest News', 'sonaar'); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e('Number of posts to show:', 'sonaar'); ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>


		<p><input class="checkbox" type="checkbox" <?php checked( $enable_excerpts ); ?> id="<?php echo esc_attr($this->get_field_id( 'enable_excerpts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'enable_excerpts' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'enable_excerpts' )); ?>"><?php esc_html_e('Display excerpts?', 'sonaar'); ?></label></p>


		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e('Display post date?', 'sonaar'); ?></label></p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php echo esc_html_x('Select one or multiple categories:', 'Widget', 'sonaar'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('category')); ?>" name="<?php echo esc_attr($this->get_field_name('category')); ?>[]" multiple="mutiple">
				<?php echo $this->get_taxonomy_options($category); ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'view' )); ?>"><?php esc_html_e('View As:', 'sonaar'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('view')); ?>" name="<?php echo esc_attr($this->get_field_name('view')); ?>">
				<option <?php echo ($view == 'post' ? 'selected' : ''); ?> value="post"><?php echo esc_html_x('List', 'Widget', 'sonaar'); ?></option>
				<option <?php echo ($view == 'post_grid' ? 'selected' : ''); ?> value="post_grid"><?php echo esc_html_x('Grid', 'Widget', 'sonaar'); ?></option>
				<option <?php echo ($view == 'post_simple' ? 'selected' : ''); ?> value="post_simple"><?php echo esc_html_x('Simple', 'Widget', 'sonaar'); ?></option>
			</select>
		<p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_title')); ?>"><?php echo esc_html_x('Call To Action Title:', 'Widget', 'sonaar'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('action_title')); ?>" name="<?php echo esc_attr($this->get_field_name('action_title')); ?>" value="<?php echo esc_attr($action_title); ?>" placeholder="<?php esc_html_e('View More', 'sonaar'); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_obj_id')); ?>"><?php echo esc_html_x('Call To Call To Action Page:', 'Widget', 'sonaar'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('action_obj_id')); ?>" name="<?php echo esc_attr($this->get_field_name('action_obj_id')); ?>">
				<?php echo $this->get_object_options($action_obj_id); ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_ext_link')); ?>"><?php echo esc_html_x('Call To Action External Link:', 'Widget', 'sonaar'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('action_ext_link')); ?>" name="<?php echo esc_attr($this->get_field_name('action_ext_link')); ?>" value="<?php echo esc_attr($action_ext_link); ?>" />
		</p>

<?php
	}
} // class Iron_Widget_Posts



/**
 * Videos Widget Class
 *
 * @since 1.6.0
 * @see   Iron_Widget_Posts
 * @todo  - Add advanced options
 */

class Iron_Widget_Videos extends Iron_Music_Widget
{
	/**
	 * Widget Defaults
	 */

	public static $widget_defaults;


	/**
	 * Register widget with WordPress.
	 */

	function __construct ()
	{

		$widget_ops = array(
			  'classname'   => 'iron_widget_videos'
			, 'description' => esc_html_x('The most recent videos on your site.', 'Widget', 'sonaar')
		);

		self::$widget_defaults = array(
			  'title'        => ''
			, 'post_type'    => 'video'
			, 'view'		 => 'video_list'
			, 'category'	 => array()
			, 'include'	 => array()
			, 'artists_filter'	 => array()
			, 'video_link_type'	 => ''
			, 'number'       => sonaar_music_get_option('videos_per_page')
			, 'action_title' => ''
			, 'action_obj_id'  => ''
			, 'action_ext_link'  => ''
		);

		parent::__construct('iron-recent-videos', esc_html_x('sonaar: Videos', 'Widget', 'sonaar'), $widget_ops);

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	function widget ( $args, $instance )
	{

		$cache = wp_cache_get('iron_widget_videos', 'widget');

		if ( ! is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		$args['before_title'] = "<span class='heading-t3'></span>".$args['before_title'];
		$args['before_title'] = str_replace('h2','h3',$args['before_title']);
		$args['after_title'] = str_replace('h2','h3',$args['after_title']);
		extract($args);
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );


		$title      = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$post_type  = apply_filters( 'widget_post_type', $instance['post_type'], $instance, $this->id_base );
		$number     = $instance['number'];
		$category   = $instance['category'];
		$include   = $instance['include'];
		$video_link_type = $instance['video_link_type'];
		$view     	= $instance['view'];


		$artists_filter = $instance['artists_filter'];
		$meta_query = array();

		if(!is_array($artists_filter)) {
			$artists_filter = explode(",", $artists_filter);
			$meta_query =  array(
				array(
					'key'     => 'artist_of_video',
					'value'   => implode('|',$artists_filter),
					'compare' => 'rlike',
				),
			);
		}





		global $iron_sonaar_link_mode;


		$query_args = array(
			'post_type'         	=> $post_type,
			'artists_filter'		=> $artists_filter,
			'posts_per_page'    	=> $number,
			'no_found_rows'     	=> true,
			'post_status'       	=> 'publish',
			'ignore_sticky_posts'	=> true,
			'meta_query'			=> $meta_query,
		);

		if(!empty($include)) {

			if(!is_array($include)) {
				$include = explode(",", $include);
			}
			$query_args["post__in"] = $include;

			$category = false;
			$number = false;
		}


		$tax_query = array();

		if(!empty($category)) {

			if(!is_array($category)) {
				$category = explode(",", $category);
			}
	        $tax_query[] = array(
		        'taxonomy' => 'video-category',
		        'field' => 'id',
		        'terms' => $category,
		        'operator'=> 'IN'
		    );

		}

		if(!empty($tax_query))
			$query_args["tax_query"] = $tax_query;

		$r = new WP_Query( apply_filters( 'iron_widget_posts_args', $query_args ) );

		if ( $r->have_posts() ) :
		echo $before_widget;
?>

				<div class="sr_it-videolist-container <?php echo esc_attr($view); ?>">

					<?php if ( ! empty( $title ) ):?>
					<div class="page-title vc_col-md-4 <?php echo (Iron_sonaar::isPageTitleUppercase() == true) ? 'uppercase' : ''; ?>">
                    	<h1><?php echo $title ?></h1>
                    </div>
                    <?php endif ?>
					<?php if( $view == 'video_list' ):?>
					<div class="wpb_column vc_col-sm-12 vc_col-md-8">
	                    <div class="sr_it-videolist-screen">
	                        <?php echo wp_oembed_get( Iron_sonaar::getField('video_url',$r->posts[0]->ID) ); ?>
	                    </div>
	                </div>
                    <?php endif ?>

	                <div class=" <?php echo ( $view == 'video_list' )? 'sr_it-videolist-list wpb_column vc_col-sm-12 vc_col-md-4' : 'listing-section' ;?> <?php echo ( empty( $iron_sonaar_hide_page_title ) )? 'sr_it-videolist-spacer' : ''; ?>">

	                    <?php if( $view == 'video_list' ):?>
	                    	<div id="sr_it-perfectscrollbar">
                    	<?php endif ?>
	                    <?php while($r->have_posts()): $r->the_post(); ?>
	                    	<?php $iron_sonaar_link_mode = $video_link_type;?>
	                        <?php get_template_part('items/' . $view ) ?>
	                    <?php endwhile ?>
	                    <?php wp_reset_query() ?>
	                    <?php if( $view == 'video_list' ):?>
	                    	</div>
                    	<?php endif ?>
	                </div>


				</div>

<?php

			echo $after_widget;

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('iron_widget_videos', $cache, 'widget');
	}

	function update ( $new_instance, $old_instance )
	{
		$instance = wp_parse_args( (array) $old_instance, self::$widget_defaults );

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['view'] = $new_instance['view'];
		$instance['category'] = $new_instance['category'];
		$instance['include'] = $new_instance['include'];
		$instance['artists_filter'] = $new_instance['artists_filter'];
		$instance['video_link_type'] = $new_instance['video_link_type'];
		$instance['action_title']  = $new_instance['action_title'];
		$instance['action_obj_id']  = $new_instance['action_obj_id'];
		$instance['action_ext_link']  = $new_instance['action_ext_link'];

		$this->flush_widget_cache();

		return $instance;
	}

	function flush_widget_cache ()
	{
		wp_cache_delete('iron_widget_videos', 'widget');
	}

	function form ( $instance )
	{
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$view      = $instance['view'];
		$category   = $instance['category'];
		$include   = $instance['include'];
		$artists_filter = $instance['artists_filter'];
		$video_link_type  = $instance['video_link_type'];
		$action_title = $instance['action_title'];
		$action_obj_id = $instance['action_obj_id'];
		$action_ext_link = $instance['action_ext_link'];
?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'sonaar'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" placeholder="<?php esc_html_e('Videos', 'sonaar'); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e('Number of videos to show (*apply only for categories):', 'sonaar'); ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php echo esc_html_x('Select one or multiple categories:', 'Widget', 'sonaar'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('category')); ?>" name="<?php echo esc_attr($this->get_field_name('category')); ?>[]" multiple="mutiple">
				<?php echo $this->get_taxonomy_options($category, 'video-category'); ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('include')); ?>"><?php echo esc_html_x('Or Manually Select Videos:', 'Widget', 'sonaar'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('include')); ?>" name="<?php echo esc_attr($this->get_field_name('include')); ?>[]" multiple="mutiple">
				<?php echo $this->get_object_options($include, 'video'); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'artists_filter' )); ?>"><?php esc_html_e('Filter By Artists:', 'sonaar'); ?></label>
			<select multiple class="widefat" id="<?php echo esc_attr($this->get_field_id('artists_filter')); ?>" name="<?php echo esc_attr($this->get_field_name('artists_filter')); ?>[]">
				<?php echo $this->get_object_options($artists_filter, 'artist'); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'video_link_type' )); ?>"><?php esc_html_e("What happens when you click the video's thumbnails ?", 'sonaar'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('video_link_type')); ?>" name="<?php echo esc_attr($this->get_field_name('video_link_type')); ?>">
				<option <?php echo ($video_link_type == 'single' ? 'selected' : ''); ?> value="single"><?php echo esc_html_x('Go to detailed video page', 'Widget', 'sonaar'); ?></option>
				<option <?php echo ($video_link_type == 'lightbox' ? 'selected' : ''); ?> value="lightbox"><?php echo esc_html_x('Open video in a LightBox', 'Widget', 'sonaar'); ?></option>
				<option <?php echo ($video_link_type == 'inline' ? 'selected' : ''); ?> value="inline"><?php echo esc_html_x('Replace image by video', 'Widget', 'sonaar'); ?></option>
			</select>
		<p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'view' )); ?>"><?php esc_html_e('View As:', 'sonaar'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('view')); ?>" name="<?php echo esc_attr($this->get_field_name('view')); ?>">
				<option <?php echo ($view == 'video_list' ? 'selected' : ''); ?> value="video_list"><?php echo esc_html_x('List', 'Widget', 'sonaar'); ?></option>
				<option <?php echo ($view == 'video_grid' ? 'selected' : ''); ?> value="video_grid"><?php echo esc_html_x('Grid', 'Widget', 'sonaar'); ?></option>
			</select>
		<p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_title')); ?>"><?php echo esc_html_x('Call To Action Title:', 'Widget', 'sonaar'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('action_title')); ?>" name="<?php echo esc_attr($this->get_field_name('action_title')); ?>" value="<?php echo esc_attr($action_title); ?>" placeholder="<?php esc_html_e('View More', 'sonaar'); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_obj_id')); ?>"><?php echo esc_html_x('Call To Call To Action Page:', 'Widget', 'sonaar'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('action_obj_id')); ?>" name="<?php echo esc_attr($this->get_field_name('action_obj_id')); ?>">
				<?php echo $this->get_object_options($action_obj_id); ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('action_ext_link')); ?>"><?php echo esc_html_x('Call To Action External Link:', 'Widget', 'sonaar'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('action_ext_link')); ?>" name="<?php echo esc_attr($this->get_field_name('action_ext_link')); ?>" value="<?php echo esc_attr($action_ext_link); ?>" />
		</p>
<?php
	}
} // class Iron_Widget_Videos




/**
 * Iron_Widget_Ios_Slider Class
 *
 * @since 1.6.0
 * @see   Iron_Widget_Ios_Slider
 */

class Iron_Widget_Ios_Slider extends Iron_Music_Widget
{
	/**
	 * Widget Defaults
	 */

	public static $widget_defaults;


	/**
	 * Register widget with WordPress.
	 */

	function __construct ()
	{
		$widget_ops = array(
			  'classname'   => 'iron_widget_iosslider'
			, 'description' => esc_html_x('Touch Enabled, Responsive jQuery Horizontal Image Slider/Carousel.', 'Widget', 'sonaar')
		);

		self::$widget_defaults = array(
			  'title'        => ''
			, 'id'     	 => ''
		);


		add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));

		parent::__construct('iron-ios-slider', esc_html_x('sonaar: IOS Slider', 'Widget', 'sonaar'), $widget_ops);

	}

	/**
	 * Front-end display of widget.
	 */

	public function widget ( $args, $instance )
	{
		$args['before_title'] = "<span class='heading-t3'></span>".$args['before_title'];
		$args['before_title'] = str_replace('h2','h3',$args['before_title']);
		$args['after_title'] = str_replace('h2','h3',$args['after_title']);
		extract($args);

		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$id = $instance['id'];
		$uniqid = uniqid();

		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . esc_html($title) . $args['after_title'];;
			if(!empty($title)){$this->get_title_divider();}

		if(empty($id))
			return;


		$height = get_field('slider_height', $id);
		$photos = get_field('slider_photos', $id);

		if(empty($photos))
			return;
		?>

		<section class="iosSliderWrap" style="height:<?php echo esc_attr($height); ?>px">
				<div class="sliderContainer" style="max-height:<?php echo esc_attr($height); ?>px">

					<!-- slider container -->
					<div class="iosSlider" id="<?php echo esc_attr($uniqid); ?>">

						<!-- slider -->
						<div class="slider">

							<!-- slides -->
							<?php foreach($photos as $photo): ?>
							<div class="item">
								<?php
								$link = null;
								$target = "_self";
								$link_type = $photo["slide_link_type"];

								if($link_type == 'internal' && !empty($photo["slide_link"])) {

									$link = $photo["slide_link"];
									$target = "_self";

								}else if($link_type == 'external' && !empty($photo["slide_link_external"])) {

									$link = $photo["slide_link_external"];
									$target = "_blank";

								}

								?>

								<div class="inner" style="background-image: url(<?php echo esc_url($photo["photo_file"]); ?>)">

									<div class="selectorShadow"></div>

									<?php if($link): ?>
									<a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($link); ?>">
									<?php endif; ?>


										<?php if(!empty($photo["photo_text_1"])) : ?>
										<div class="text1"><span><?php echo esc_html($photo["photo_text_1"]); ?></span></div>
										<?php endif; ?>
										<?php if(!empty($photo["photo_text_2"])) : ?>
										<div class="text2"><span><?php echo esc_html($photo["photo_text_2"]); ?></span></div>
										<?php endif; ?>


									<?php if($link): ?>
									</a>
									<?php endif; ?>

								</div>

							</div>
							<?php endforeach; ?>

						</div>

					</div>
				</div>
		</section>

		<script>

		jQuery(document).ready(function($) {
			/* some custom settings */
			$('.iosSlider#<?php echo esc_js($uniqid); ?>').iosSlider({
					desktopClickDrag: true,
					snapToChildren: true,
					infiniteSlider: true,
					snapSlideCenter: true,
					navSlideSelector: '.sliderContainer .slideSelectors .item',
					navPrevSelector: '.sliderContainer .slideSelectors .prev',
					navNextSelector: '.sliderContainer .slideSelectors .next',
					onSlideComplete: slideComplete,
					onSliderLoaded: sliderLoaded,
					onSlideChange: slideChange,
					autoSlide: true,
					scrollbar: true,
					scrollbarContainer: '.sliderContainer .scrollbarContainer',
					scrollbarMargin: '0',
					scrollbarBorderRadius: '0',
					keyboardControls: true
				});

			function slideChange(args) {

				$('.sliderContainer .slideSelectors .item').removeClass('selected');
				$('.sliderContainer .slideSelectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');

			}

			function slideComplete(args) {

				if(!args.slideChanged) return false;

				$(args.sliderObject).find('.text1, .text2').attr('style', '');

				$(args.currentSlideObject).find('.text1').animate({
					right: '100px',
					opacity: '0.8'
				}, 400, 'easeOutQuint');

				$(args.currentSlideObject).find('.text2').delay(200).animate({
					right: '50px',
					opacity: '0.8'
				}, 400, 'easeOutQuint');

			}

			function sliderLoaded(args) {

				$(args.sliderObject).find('.text1, .text2').attr('style', '');

				$(args.currentSlideObject).find('.text1').animate({
					right: '100px',
					opacity: '0.8'
				}, 400, 'easeOutQuint');

				$(args.currentSlideObject).find('.text2').delay(200).animate({
					right: '50px',
					opacity: '0.8'
				}, 400, 'easeOutQuint');

				slideChange(args);

			}

		});
		</script>
		<?php

		echo $args['after_widget'];

	}

	/**
	 * Back-end widget form.
	 */

	public function form ( $instance )
	{
		$instance = wp_parse_args( (array) $instance, self::$widget_defaults );

		$title = esc_attr( $instance['title'] );
		$id = $instance['id'];

		$all_sliders = get_posts(array(
			  'post_type' => 'iosslider'
			, 'posts_per_page' => -1
			, 'no_found_rows'  => true
		));


		if ( !empty($all_sliders) ) :
?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html_x('Title:', 'Widget', 'sonaar'); ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>" placeholder="<?php esc_html_e('Popular Songs', 'sonaar'); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php echo esc_html_x('IOS Sliders:', 'Widget', 'sonaar'); ?></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>">
				<?php foreach($all_sliders as $s): ?>

					<option value="<?php echo esc_attr($s->ID); ?>"<?php echo (($s->ID == $id) ? ' selected="selected"' : ''); ?>><?php echo esc_attr($s->post_title); ?></option>

				<?php endforeach; ?>
				</select>
			</p>


<?php

		else :

				echo wp_kses_post( '<p>'. sprintf( esc_html_x('No photo albums have been created yet. <a href="%s">Create some</a>.', 'Widget', 'sonaar'), esc_url(admin_url('edit.php?post_type=photo-album')) ) .'</p>' );

		endif;


	}

	/**
	 * Sanitize widget form values as they are saved.
	 */

	public function update ( $new_instance, $old_instance )
	{
		$instance = wp_parse_args( $old_instance, self::$widget_defaults );

		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['id'] = $new_instance['id'];

		return $instance;
	}

	function enqueue_scripts() {

		if ( is_admin() || in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php')) ) return;

		wp_enqueue_script('iosslider', IRON_PARENT_URL.'/js/jquery.iosslider.min.js', array('jquery'), null, true);

	}


} // class Iron_Widget_Ios_Slider