<?php




/**
 * Insert an array into another array before/after a certain key
 *
 * @param array $array The initial array
 * @param array $pairs The array to insert
 * @param string $key The certain key
 * @param string $position Wether to insert the array before or after the key
 * @return array
 */

if ( ! function_exists('ironMusic_array_insert') )
{
	function ironMusic_array_insert ( $array, $pairs, $key, $position = 'after' )
	{
		$key_pos = array_search( $key, array_keys($array) );

		if ( 'after' == $position )
			$key_pos++;

		if ( false !== $key_pos ) {
			$result = array_slice( $array, 0, $key_pos );
			$result = array_merge( $result, $pairs );
			$result = array_merge( $result, array_slice( $array, $key_pos ) );
		}
		else {
			$result = array_merge( $array, $pairs );
		}

		return $result;
	}
}



function iron_get_events_filter($artists) {

	if ( empty( $artists ) || $artists[0] == 'null' ) {

		$artists = array();

		$artistsPosts = get_posts(array(
				'orderby' => 'title',
				'order'   => 'ASC',
				'post_type' => 'artist',
				'posts_per_page' => -1,
				'post_status' => 'publish',
		));

		foreach ($artistsPosts as $artP) {
			array_push($artists, $artP->ID);
		}

	}

	if(!empty($artists)) {

		$events = array();
		foreach($artists as $artist) {

			$posts = get_field('artist_events', $artist);
			$events[$artist] = $posts;
		}
	}


	$show_eventbar = (bool)( function_exists( 'get_ironMusic_option' ) ? get_ironMusic_option('events_filter', '_iron_music_event_options') : false );
	$eventbar_label = ( function_exists( 'get_ironMusic_option' ) ? get_ironMusic_option('events_filter_label', '_iron_music_event_options') : false );


		global $post;
		echo '<script type="text/javascript">var event_url="'.get_permalink($post->ID).'";</script>';

	?>

		<div class="events-bar<?php if(is_archive()) : ?> archive-event<?php endif; ?>">
			<span class="events-bar-title">
				<?php esc_html_e($eventbar_label, 'sonaar'); ?>
			</span>
			<span class="events-bar-artists">
				<select class="widefat" id="artists_filter" name="artists_filter">
					<option value="all"><?php esc_html_e('All artists', 'sonaar'); ?></option>
					<?php foreach($artists as $artist): ?>
						<option value="<?php echo esc_attr($artist); ?>" <?php if(isset($_GET['artist-id']) && $_GET['artist-id'] == esc_attr($artist) ) : ?> selected="selected" <?php endif; ?>>
							<?php echo get_the_title($artist); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</span>
			<div class="clear"></div>
		</div>

	<?php

}



function ironMusic_pre_get_posts( $query ) {

	// if ( is_post_type_archive('event') ) {
		if(isset($_GET['artist-id']) && !empty($_GET['artist-id'])) {
        	set_query_var( 'meta_key', 'artist_at_event' );
        	set_query_var( 'meta_value', serialize(array($_GET['artist-id'])) );
    	}
    // }
}
add_action( "pre_get_posts", "ironMusic_pre_get_posts" );


if ( ! function_exists('get_allowed_html') ){
	function iron_get_allowed_html() {
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
}
if ( ! function_exists('get_allowed_html') )
{

	function get_allowed_html() {
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

}

function get_artists($id){
	if(!isset($id))
		return false;

	$postType = get_post_type($id);
	$fieldName = '';
	switch ($postType ) {
		case 'album':
			$fieldName = 'artist_of_album';
			break;
		case 'event':
			$fieldName = 'artist_at_event';
			break;
	}

	if( $fieldName == '')
		return false;

	$artists = get_field($fieldName, $id);
	if ( !((bool) $artists) )
		return false;

	$result='';
	foreach($artists as $key => $artist){
		if (count($artists) == 1 || count($artists) == $key + 1 ){
			$result .= get_the_title($artist);
		}else{
			$result .= get_the_title($artist). ', ';
		}
	}
	return $result;
}

add_action( 'wp_ajax_sonaar_registerLicence', 'sonaar_registerLicence' );

function sonaar_registerLicence($localdata) {
	$data = ( $localdata )? $localdata : $_POST['data'];
	$response = update_site_option('sonaar_licence', $data['licenceKey']);
	delete_site_transient('sonaar_licence');
	$response = set_site_transient( 'sonaar_licence', $data, 7 * DAY_IN_SECONDS );

	if ($localdata) {
		return $response;
	}
	wp_send_json( $response );
}

add_action( 'wp_ajax_sonaar_activateRemoteLicence', 'sonaar_activateRemoteLicence' );

function sonaar_activateRemoteLicence($localdata) {
	$data = ($localdata)? $localdata : $_POST['data'];

	$data = wp_remote_post('http://sonaar.io/api/', array(
		'body' => array( 'remotelicence'=> $data )
	));
	if ($localdata) {
		return $data;
	}
	wp_send_json( $data );
}


function sonaar_validateCurrentLicence( $licence ){
	if ( $licence ) {
		return $licence['licenceKey'];
	}
	$response =  sonaar_activateRemoteLicence( array(
    	'licenceKey' => get_site_option('sonaar_licence'),
    	'siteUrl' => $_SERVER['SERVER_NAME']
		)
	);

	if ( is_wp_error( $response ) ){
		new Iron_Sonaar_message("Oops. We’ve found a minor issue.", "There is a problem with the validation of the licence", "notice-error", "If you don't know how to fix this issue, please contact your web hosting with the error message above, or contact us at <a href='mailto:support@sonaar.io'>support@sonaar.io</a>", $response);
		return false;
	}

	$response =  json_decode($response['body']);

	if( !$response || !$response->success ){
		return false;
	}

	$register = sonaar_registerLicence( array(
		'licenceKey'=> get_site_option('sonaar_licence'),
		'response'=> $response
		)
	);

	if (!$register) {
		return false;
	}

	$licence = get_site_transient('sonaar_licence');
	return $licence['licenceKey'];

}
if (!sonaar_validateCurrentLicence( get_site_transient('sonaar_licence') ) ) {
	new Iron_Sonaar_message("Thanks for using Sonaar.", "Make sure to enter your license key in Sonaar Settings > Dashboard. The license key used is currently empty, expired or invalid.", "notice-error", "Login to your account at <a href='https://sonaar.io/login' target='_blank'>https://sonaar.io/login</a> and make sure you have a valid subscription.");
}




add_action( 'wp_ajax_sonaar_clearCache', 'sonaar_clearCache' );

function sonaar_clearCache($type){
	$data = $_POST['data'];

	switch ($data['type']) {
		case 'transient':
			delete_site_transient('sonaar_licence');
			break;
		case 'option':
			delete_site_transient('sonaar_licence');
			delete_site_option('sonaar_licence');
			break;
		default:

			break;
	}

}