<?php

define( 'IRON_MUSIC', TRUE );
if (!defined('ACF_LITE'))
    define( 'ACF_LITE', FALSE );

define( 'IRON_MUSIC_DIR_PATH', get_template_directory() . '/includes/sonaar-music/');
define( 'IRON_MUSIC_DIR_URL', get_template_directory_uri() . '/includes/sonaar-music/');
define( 'IRON_MUSIC_PREFIX', 'IRONMUSIC: ' );
load_plugin_textdomain('sonaar', false, basename( dirname( __FILE__ ) ) . '/languages' );

if (!defined( 'IRON_MUSIC_TEXT_DOMAIN')) {
    define( 'IRON_MUSIC_TEXT_DOMAIN', 'sonaar' );
}

require IRON_MUSIC_DIR_PATH . 'includes/class/sonaar-music.class.php';
require IRON_MUSIC_DIR_PATH . 'includes/functions.php';
require IRON_MUSIC_DIR_PATH . 'includes/posttypes.php';
require IRON_MUSIC_DIR_PATH . 'includes/options.php';
require IRON_MUSIC_DIR_PATH . 'includes/class/import.php';
require IRON_MUSIC_DIR_PATH . 'includes/class/widget.class.php';
require IRON_MUSIC_DIR_PATH . 'includes/widgets.php';

require IRON_MUSIC_DIR_PATH . 'admin/options.php';
require IRON_MUSIC_DIR_PATH . 'includes/advanced-custom-fields/acf.php';
require IRON_MUSIC_DIR_PATH . 'includes/custom-fields.php';





function iron_music_is_active_plugin( $plugin ){
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


if ( iron_music_is_active_plugin( 'js_composer/js_composer.php' ) ) {

    add_action( 'vc_before_init', 'iron_sonaar_vc_init' );
    function iron_sonaar_vc_init() {
        require IRON_MUSIC_DIR_PATH . 'includes/vc-extend/vc-custom-params.php';
        require IRON_MUSIC_DIR_PATH . 'includes/vc-extend/vc-map.php';
        require IRON_MUSIC_DIR_PATH . 'includes/vc-extend/vc-helpers.php';
        require IRON_MUSIC_DIR_PATH . 'includes/vc-extend/vc-templates.php';
        require IRON_MUSIC_DIR_PATH . 'includes/vc-extend/vc-templates-panel-editor.php';
        require IRON_MUSIC_DIR_PATH . 'includes/vc-extend/sonaar-responsive-param.php';
        require IRON_MUSIC_DIR_PATH . 'includes/vc-extend/sonaar-responsive-alignment-param.php';
        require IRON_MUSIC_DIR_PATH . 'includes/vc-extend/sonaar-gradient-param.php';


        vc_set_as_theme();
        vc_set_shortcodes_templates_dir( IRON_MUSIC_DIR_PATH . 'includes/vc_templates' );
        vc_sonaar_templates();

    }
}

function vc_sonaar_templates() {
		$sonaar_templates = new Sonaar_Vc_Templates_Panel_Editor();
		return $sonaar_templates->init();
}



function iron_music_get_template_part($slug, $name = null, $load = true ) {
    // global $iron_music_template_loader;
    // $iron_music_template_loader->get_template_part( $slug, $name, $load );
    get_template_part( $slug );
}

// Load Widgets
require_once IRON_MUSIC_DIR_PATH . 'includes/class/widget.class.php';
require_once IRON_MUSIC_DIR_PATH . 'includes/shortcodes.php';
require_once IRON_MUSIC_DIR_PATH . 'includes/widgets.php';

if ( ! class_exists( 'Dynamic_Styles' ) ) {
    require IRON_MUSIC_DIR_PATH . 'includes/class/styles.class.php';
}





add_action( 'admin_enqueue_scripts', 'ironMusic_load_script' );
add_action( 'wp_enqueue_scripts', 'ironMusic_load_frontend', 12);
add_action(	'updated_option', 'iron_sonaar_write_dynamic_assets', 10, 3 );
add_action( 'init', 'dynamicAssets');
add_action('wp_footer','sonaar_player', 12);




function custom_menu_page_removing() {
    remove_menu_page( 'fw-extensions' );
}
add_action( 'admin_menu', 'custom_menu_page_removing' , 999);






function ironMusic_load_script($hook){

    if ($hook == 'toplevel_page_iron_options') {
        wp_register_script('vue', '//unpkg.com/vue/dist/vue.min.js', array(), NULL, true);
        wp_enqueue_script('sonaar_validate', IRON_MUSIC_DIR_URL . '/admin/assets/js/validate_licence.js', array('jquery','vue'), NULL, true);
        wp_localize_script('sonaar_validate', 'sonaarlicence', array(
    		'licence' => get_site_option( 'sonaar_licence', '' )
    	));

    }
    wp_enqueue_style('templateblocks', IRON_MUSIC_DIR_URL . 'admin/assets/css/templateblocks.css', false, '', 'all');
    wp_enqueue_style('sonaar-admin-vc', IRON_MUSIC_DIR_URL . 'admin/assets/css/sonaar-vc.css', false, '', 'all');

    wp_register_style('iron-font-awesome', IRON_MUSIC_DIR_URL . '/css/font-awesome.min.css', false, '', 'all' );
    wp_enqueue_style( 'ironMusic_css', IRON_MUSIC_DIR_URL . 'css/ironMusicAdmin.css', array('iron-font-awesome'), NULL );


    wp_enqueue_script( 'color', IRON_MUSIC_DIR_URL . '/js/jqColorPicker.min.js', array( 'jquery' ), NULL, TRUE );
    wp_enqueue_script( 'fontSelector', IRON_MUSIC_DIR_URL . '/includes/fontselect-jquery-plugin/jquery.fontselect.min.js', array('jquery'), NULL, TRUE );
    wp_enqueue_style( 'fontSelectorCss', IRON_MUSIC_DIR_URL . '/includes/fontselect-jquery-plugin/fontselect.css', array(), NULL );

    wp_enqueue_style( 'ironMusic_css', IRON_MUSIC_DIR_URL . 'css/ironMusicAdmin.css', array('fontSelectorCss'), NULL );
    wp_enqueue_script( 'iron_feature', IRON_MUSIC_DIR_URL . '/js/ironFeatures.js', array( 'jquery', 'color', 'fontSelector' ), NULL, TRUE );

	wp_enqueue_style('iron-acf', IRON_MUSIC_DIR_URL .'admin/assets/css/acf.css', false, '', 'all' );

	wp_enqueue_style('templateblocks', IRON_MUSIC_DIR_URL . 'admin/assets/css/templateblocks.css', false, '', 'all');

    wp_enqueue_style( 'ics-gradient', IRON_MUSIC_DIR_URL. 'admin/assets/css/ics-gradient-editor.min.css' );

	wp_enqueue_script('iron-admin-custom', IRON_MUSIC_DIR_URL .'admin/assets/js/custom.js', array('jquery'), null, true);
	wp_enqueue_script('iron-admin-vc', IRON_MUSIC_DIR_URL .'admin/assets/js/vc.js', array('jquery','rome-datepicker'), null, true);
    wp_enqueue_script('ics-gradient',  IRON_MUSIC_DIR_URL . 'admin/assets/js/ics-gradient-editor.min.js' ,  array('jquery'), null, true );

	wp_localize_script('iron-admin-vc', 'iron_vars', array(
		'patterns_url' => IRON_MUSIC_DIR_URL .'admin/assets/img/vc/patterns/'
	));

}

function ironMusic_load_frontend(){

    $uploadDir = wp_upload_dir();

    wp_enqueue_script( 'jquery.plugin', IRON_MUSIC_DIR_URL . 'js/countdown/jquery.plugin.min.js', array( 'jquery' ), NULL, TRUE );
    wp_enqueue_script( 'jquery.countdown_js', IRON_MUSIC_DIR_URL . 'js/countdown/jquery.countdown.min.js', array( 'jquery', 'jquery.plugin' ), NULL, TRUE );
    wp_localize_script('jquery.countdown_js', 'plugins_vars', array(
		'labels' => array(_x('Years','Countdown label','sonaar'),_x('Months','Countdown label','sonaar'),_x('Weeks','Countdown label','sonaar'),_x('Days','Countdown label','sonaar'),_x('Hours','Countdown label','sonaar'),_x('Minutes','Countdown label','sonaar'),_x('Seconds','Countdown label','sonaar')),
		'labels1' => array(_x('Year','Countdown label','sonaar'),_x('Month','Countdown label','sonaar'),_x('Week','Countdown label','sonaar'),_x('Day','Countdown label','sonaar'),_x('Hour','Countdown label','sonaar'),_x('Minute','Countdown label','sonaar'),_x('Second','Countdown label','sonaar')),
		'compactLabels' => array(_x('y','Countdown label','sonaar'),_x('m','Countdown label','sonaar'),_x('w','Countdown label','sonaar'),_x('d','Countdown label','sonaar'))
	));


    wp_enqueue_script( 'ironMusic-js', IRON_MUSIC_DIR_URL.'js/ironMusic.min.js', NULL, false );
    wp_localize_script('ironMusic-js', 'ironmusic_vars', array(
	    'i18n' => array(
	        'no_events' => esc_html__("No events scheduled yet. Stay tuned!", IRON_MUSIC_TEXT_DOMAIN)
	    )
    ));






    $custom_styles_url = home_url('/').'?load=custom-style.css';

    if ( Iron_sonaar::getOption( 'external_css' ) ) {
		wp_enqueue_style('iron-custom-styles', $uploadDir['baseurl'] . '/css/custom-style.css' , array('iron-master'), NULL, 'all' );
	}else{
		wp_enqueue_style('iron-custom-styles', $custom_styles_url, array('iron-master'), '', 'all' );
	}
    global $wp_query;
	if ( !is_archive() || ( (int) get_option('page_for_posts') === $wp_query->queried_object->ID  || ( function_exists('is_shop') && is_shop() ) )   )
        wp_add_inline_style( 'iron-custom-styles', iron_sonaar_inline_dynamic_assets() );

}

function get_ironMusic_option($option_singular = NULL, $option_name = '_sonaar-music_options' ){

    $iron_music_options = get_option( $option_name );

    if ( !$iron_music_options )
        return FALSE;

    if ( !array_key_exists( $option_singular , $iron_music_options ) )
        return FALSE;

    if ( is_null( $option_singular ) )
        return $iron_music_options;

    return $iron_music_options[$option_singular];

}



function ironMusic_option($option_singular = NULL, $option_name = '_sonaar-music_options' ){
    $iron_music_option = get_ironMusic_option( $option_singular, $option_name );
    if ( is_array( $iron_music_option ) ) {
        print_r( $iron_music_option );
    }else{
        echo $iron_music_option;
    }
}



function dynamicAssets() {
	if( is_admin() ) return -1;

	if(!empty($_GET["load"])) {
		if($_GET["load"] == 'custom-style.css') {
		    ob_start();
			load_template( IRON_MUSIC_DIR_PATH .'css/theme/custom-style.php', true );
			$data = ob_get_clean();
            preg_match_all("|@import(.*);|", $data, $import);
            $data = preg_replace("|@import(.*);|", ' ',$data);

            foreach ($import[0] as $fontImport) {
                echo $fontImport;
            }
			echo( $data );
			exit;
		}
	}
}

function iron_sonaar_inline_dynamic_assets(){
	global $post;

	ob_start();

	load_template( IRON_MUSIC_DIR_PATH .'css/theme/custom-style-post.php' );

	$data = ob_get_clean();
	return $data;

}


function iron_sonaar_write_dynamic_assets( $option, $old_value, $value ){
	if( !is_admin() )
		return;

	if ( is_array($value) && array_key_exists('external_css', $value ) && $value['external_css'] == '1'){

		$access_type = get_filesystem_method();
			if($access_type === 'direct'){
				/* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
				$creds = request_filesystem_credentials(site_url() . '/wp-admin/', '', false, false, array());

				/* initialize the API */
				if ( ! WP_Filesystem($creds) )
					return false;

				global $wp_filesystem;

				// put content in data
				ob_start();
				load_template( IRON_MUSIC_DIR_PATH .'css/theme/custom-style.php');
				$data = ob_get_clean();
                preg_match_all("|@import(.*);|", $data, $import);


                $data = preg_replace("|@import(.*);|", ' ',$data);
                $masterImport = '';
                foreach ($import[0] as $fontImport) {
                    $masterImport = $masterImport . $fontImport;
                }
    			$data = $masterImport . $data;

				$uploadDir = wp_upload_dir();
				if (!$wp_filesystem->is_dir( $uploadDir['basedir'] . '/css' ) ) {
					$wp_filesystem->mkdir( $uploadDir['basedir'] . '/css' );
				}

				$wp_filesystem->put_contents( $uploadDir['basedir'] . '/css/custom-style.css', $data );

			}

	}

}




function ironMusic_ajax($data){
    $data = $_POST['data'];
    $data = json_decode( stripcslashes( $data ) ,true);

    $data_update = array();
    foreach ($data as $key => $options) {
        foreach ($options as $key => $value) {
            update_option( $key , $value );
        }

        $value = get_option( $key );
        if ( !empty( $value ) ) {
            array_push($data_update, array($key => $value) );
        }

    }
    echo json_encode($data_update);

    wp_die();

}

add_action('wp_ajax_ironMusic_ajax', 'ironMusic_ajax');






/**
	 * Hooked class method by wp_head WP action to output post custom css.
	 *
	 * Method gets post meta value for page by key '_wpb_post_custom_css' and if it is not empty
	 * outputs css string wrapped into style tag.
	 *
	 * @since  4.2
	 * @access public
	 *
	 * @param int $id
	 */
	function addPageCustomCss( $id = null ) {
		if ( ! $id ) {
			return;
		}
		if ( $id ) {
			$post_custom_css = get_post_meta( $id, '_wpb_post_custom_css', true );
			if ( ! empty( $post_custom_css ) ) {
				$post_custom_css = strip_tags( $post_custom_css );
				echo '<style type="text/css" data-type="vc_custom-css">';
				echo $post_custom_css;
				echo '</style>';
			}
		}
	}

	/**
	 * Hooked class method by wp_footer WP action to output shortcodes css editor settings from page meta data.
	 *
	 * Method gets post meta value for page by key '_wpb_shortcodes_custom_css' and if it is not empty
	 * outputs css string wrapped into style tag.
	 *
	 * @since  4.2
	 * @access public
	 *
	 * @param int $id
	 *
	 */
	function addShortcodesCustomCss( $id = null ) {

		if ( ! $id ) {
			return;
		}

		if ( $id ) {
			$shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
			if ( ! empty( $shortcodes_custom_css ) ) {
				$shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
				echo '<style type="text/css" data-type="vc_shortcodes-custom-css">';
				echo $shortcodes_custom_css;
				echo '</style>';
			}
		}
	}




function sonaar_player(){
    load_template( IRON_MUSIC_DIR_PATH .'includes/sonaar/sonaar-player.php' );
}