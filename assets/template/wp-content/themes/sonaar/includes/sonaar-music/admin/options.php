<?php
/*
 *
 * Set the text domain for the theme or plugin.
 *
 */

define('Redux_TEXT_DOMAIN', 'sonaar');

if ( ! defined('Redux_ASSETS_URL') ) {
	define('Redux_ASSETS_URL', IRON_MUSIC_DIR_URL . 'admin/assets/');
}

if ( ! defined('Redux_OPTIONS_URL') ) {
	define('Redux_OPTIONS_URL', IRON_MUSIC_DIR_URL . 'admin/options/');
}

if ( ! defined('Redux_OPTIONS_DIR') ) {
	define('Redux_OPTIONS_DIR', IRON_MUSIC_DIR_PATH . 'admin/options/');
}

$redux_args = $redux_sections = $redux_tabs = array();


/*
 *
 * Require the framework class before doing anything else, so we can use the defined URLs and directories.
 * If you are running on Windows you may have URL problems which can be fixed by defining the framework url first.
 *
 */

if ( ! class_exists('Redux_Options') ) {
	require_once(Redux_OPTIONS_DIR . 'defaults.php');
}


/*
 * Load custom reduc assets
 *
 */

function iron_sonaar_redux_custom_assets() {

	wp_enqueue_script('redux-custom', Redux_ASSETS_URL.'js/redux.custom.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'iron_sonaar_redux_custom_assets' );



/*
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $redux_args are required, but they can be over ridden if needed.
 *
 */

function iron_sonaar_setup_framework_options() {
	global $redux_args, $redux_sections, $wp_version, $wpdb;

	$use_dashicons = floatval($wp_version) >= 3.8;

	// Setting dev mode to true allows you to view the class settings/info in the panel.
	// Default: true
	$redux_args['dev_mode'] = false;

	// Set the icon for the dev mode tab.
	// If $redux_args['icon_type'] = 'image', this should be the path to the icon.
	// If $redux_args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$redux_args['dev_mode_icon'] = 'info-sign';


	// The defaults are set so it will preserve the old behavior.
	$redux_args['std_show'] = true; // If true, it shows the std value


	// Set the class for the dev mode tab icon.
	// This is ignored unless $redux_args['icon_type'] = 'iconfont'
	// Default: null
	$redux_args['dev_mode_icon_class'] = 'fa-lg';

	// If you want to use Google Webfonts, you MUST define the api key.
	$redux_args['google_api_key'] = 'AIzaSyCQdHHTp_ttcRUygzBKIpwa6b8iiCJyjqo';

	// Define the starting tab for the option panel.
	// Default: '0';
	//$redux_args['last_tab'] = '0';

	// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
	// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
	// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
	// Default: 'standard'
	$redux_args['admin_stylesheet'] = 'custom';


	// Add content after the form.
	$redux_args['footer_text'] = wp_kses(__('<p>Brought to you by <a target="_blank" href="https://sonaar.io">Sonaar.io</a></p>', 'sonaar'),iron_get_allowed_html());


	// Setup custom links in the footer for share icons
	$redux_args['share_icons']['twitter'] = array(
		'link' => 'http://twitter.com/irontemplates',
		'title' => esc_html__('Follow us on Twitter', 'sonaar'),
		'img' => Redux_OPTIONS_URL . 'img/social/Twitter.png'
	);

	// Enable the import/export feature.
	// Default: true
	//$redux_args['show_import_export'] = false;

	// Set the icon for the import/export tab.
	// If $redux_args['icon_type'] = 'image', this should be the path to the icon.
	// If $redux_args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$redux_args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $redux_args['icon_type'] = 'iconfont'
	// Default: null
	$redux_args['import_icon_class'] = 'fa-lg';

	// Set a custom option name. Don't forget to replace spaces with underscores!
	$redux_args['opt_name'] = 'sonaar';

	// Set a custom menu icon.

	if($use_dashicons)
		$redux_args['menu_icon'] = 'dashicons-admin-generic';

	// Set a custom title for the options page.
	// Default: Options
	$redux_args['menu_title'] = esc_html__('Sonaar Settings', 'sonaar');

	// Set a custom page title for the options page.
	// Default: Options
	$redux_args['page_title'] = esc_html__('Sonaar Theme Options', 'sonaar');

	// Set a custom page slug for options page (wp-admin/themes.php?page=***).
	// Default: redux_options
	$redux_args['page_slug'] = 'iron_options';

	// Set a custom page capability.
	// Default: manage_options
	$redux_args['page_cap'] = 'manage_options';

	$currently_in_options = !empty($_GET["page"]) && ($_GET["page"] == $redux_args['page_slug']);

	// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
	// Default: menu
	//$redux_args['page_type'] = 'submenu';

	// Set the parent menu.
	// Default: themes.php
	// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	//$redux_args['page_parent'] = 'options-general.php';

	// Set a custom page location. This allows you to place your menu where you want in the menu order.
	// Must be unique or it will override other items!
	// Default: null
	//$redux_args['page_position'] = null;

	// Set a custom page icon class (used to override the page icon next to heading)
	//$redux_args['page_icon'] = 'icon-themes';

	// Set the icon type. Set to "iconfont" for Font Awesome, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	//$redux_args['icon_type'] = 'image';
	//$redux_args['dev_mode_icon_type'] = 'image';
	//$redux_args['import_icon_type'] == 'image';

	// Disable the panel sections showing as submenu items.
	// Default: true
	//$redux_args['allow_sub_menu'] = false;

	// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
/*
	$redux_args['help_tabs'][] = array(
		'id' => 'redux-opts-1',
		'title' => esc_html__('Theme Information 1', 'sonaar'),
		'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'sonaar')
	);
	$redux_args['help_tabs'][] = array(
		'id' => 'redux-opts-2',
		'title' => esc_html__('Theme Information 2', 'sonaar'),
		'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'sonaar')
	);

	// Set the help sidebar for the options page.
	$redux_args['help_sidebar'] = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'sonaar');
*/


	if(file_exists(IRON_MUSIC_DIR_PATH . 'admin/inc/docs.php')) {

		ob_start();
		include IRON_MUSIC_DIR_PATH . 'admin/inc/docs.php';
		$docs = ob_get_contents();
		ob_end_clean();

		$redux_sections[] = array(
			// Redux uses the Font Awesome iconfont to supply its default icons.
			// If $redux_args['icon_type'] = 'iconfont', this should be the icon name minus 'icon-'.
			// If $redux_args['icon_type'] = 'image', this should be the path to the icon.
			// Icons can also be overridden on a section-by-section basis by defining 'icon_type' => 'image'
			'icon' => 'book',
			'icon_class' => 'fa-key',
			'title' => esc_html__('Dashboard', 'sonaar'),
			'desc' => '',
			'fields' => array(
				array(
					'id' => 'font_awesome_info',
					'type' => 'raw_html',
					'html' => $docs
				)
			)
		);
	}

	$redux_sections[] = array(
		'icon' => 'cogs',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('General Settings', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('These are some general settings that you can edit.', 'sonaar') . '</p>',
		'fields' => array(
			array(
				'id' => 'enable_ajax',
				'type' => 'checkbox',
				'title' => esc_html__('Enable Continious Audio Player and AJAX', 'sonaar').'<sup style="color:#EA790F;font-size:10px;">&nbsp;UNDER BETA</sup>',
				'sub_desc' => '<p class="description">' . esc_html__('This option enable the continuous audio player. When a user navigate through your site, the audio player will continue to play without stoping the music. It also make your theme ajaxified which mean your pages will load faster.', 'sonaar') . '<br><br><p style=color:#00b700;><b>'. esc_html__('* VERY IMPORTANT:', 'sonaar') . '</b>' . esc_html__('Ajax loading is an advanced feature. Third party plugins that use Javascript might stop to work or make your site not works.', 'sonaar') .  '<b style=text-decoration:underline;>' . esc_html__('If you have issues with your site, please turn off this feature.', 'sonaar') . '</b></p></p>',
				'switch' => true,
				'std' => '0'
			),
			array(
				'id' => 'enable-sonaar-universe',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Enable Sonaar Vault', 'sonaar' ),
				'sub_desc' => esc_html__( 'If ON will enable Sonaar Visual Composer pre-builded templates', 'sonaar' ),
				'switch' => true,
				'std'  => '1'
			),
			array(
				'id' => 'external_css',
				'type' => 'checkbox',
				'title' => esc_html__('Move Dynamic/Custom CSS Into External Stylesheet?', 'sonaar'),
				'sub_desc' => wp_kses(__('This gives you the option move all the dynamic css that lives in the head by default into its own file for aesthetic & caching purposes. If you use this feature, you might have to clear your browser cache after any change you make in the theme options', 'sonaar'), iron_get_allowed_html() ),
				'switch' => true,
				'std' => '0'
			),
			array(
				'id' => 'theme_name_body_class',
				'class' => 'theme-name-body-class',
				'type' => 'text',
				'title' => esc_html__('Theme name body class', 'sonaar'),
				'std' => ''
			)
		)
	);

	$redux_sections[] = array(
		'icon' => 'eye',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Look and feel', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('These are some look & feel options that you can edit.', 'sonaar') . '</p>',
		'fields' => array(

			array(
				'id' => 'featured_color',
				'type' => 'color',
				'title' => esc_html__('Color 1', 'sonaar'),
				'sub_desc' => esc_html__('Hyperlinks & Buttons color (eg: Buy Tracks, Buy Tickets, Back buttons, Share icons) + Hover color of the news list' , 'sonaar'),
				'class' => 'greybg',
				'std' => 'rgba(62, 226, 189,1)'
			),
			/*
			array(
				'id' => 'primary_color_light',
				'type' => 'color',
				'title' => esc_html__('Color 2', 'sonaar'),
				'sub_desc' => esc_html__('When Push Menu is used, this is the item hover color', 'sonaar'),
				'class' => 'greybg',
				'std' => '#ffffff'
			),
			*/
			array(
				'id' => 'primary_color_dark',
				'type' => 'color',
				'title' => esc_html__('Color 2', 'sonaar'),
				'sub_desc' => esc_html__('Background color of the news list & grid + Background color of the category labels + Store buttons (eg: iTunes) in the discography page', 'sonaar'),
				'class' => 'greybg',
				'std' => '#f7f7f7'
			),
			array(
				'id' => 'secondary_color_light',
				'type' => 'color',
				'title' => esc_html__('Color 3', 'sonaar'),
				'sub_desc' => esc_html__('Hover color of the Call-to-action buttons in Audio Player (eg: iTunes) & Event page (eg: Buy Tickets)', 'sonaar'),
				'class' => 'greybg',
				'std' => '#353535'
			),
			array(
				'id' => 'text_color_light',
				'type' => 'color',
				'title' => esc_html__('Text Color 1', 'sonaar'),
				'sub_desc' => esc_html__('Text color of the Call-To-Action buttons', 'sonaar'),
				'class' => 'greybg',
				'std' => '#ffffff'
			),
			array(
				'id' => 'text_color_dark',
				'type' => 'color',
				'title' => esc_html__('Text Color 2', 'sonaar'),
				'sub_desc' => esc_html__('Text color of the categories and meta-tags of the posts + Event details (Date, Time, Venue)', 'sonaar'),
				'class' => 'greybg',
				'std' => '#353535'
			),

			array(
				'id' => 'container_width',
				'type' => 'text',
				'class' => 'greybg',
				'title' => esc_html__('Layout Width', 'sonaar'),
				'std' => '1144px'
			),


			array(
				'id' => 'container_type',
				'type' => 'select_hide_below',
				'title' => esc_html__('Layout Type', 'sonaar'),
				'options' => array(
					'container_fullwidth' => esc_html__('Fullwidth', 'sonaar'),
					'container_boxed' => esc_html__('Boxed', 'sonaar'),
				),
				'std' => 'container_fullwidth'
			),
			array(
				'id' => 'container_background',
				'type' => 'color',
				'title' => esc_html__('Boxed Background Color', 'sonaar'),
				'class' => 'container_boxed',
				'std' => '#353535'
			),






			array(
				'id' => 'content_background',
				'type' => 'background',
				'title' => esc_html__('Content Background', 'sonaar'),
				'sub_desc' => esc_html__('If you are using the "Push-menu", this is your page background. If you are using the "Classic Menu", use the "Main Background" below instead.', 'sonaar'),
				'class' => 'greybg',
				'hide' => array('attachment'),
				'std' => array(
					'color' => 'rgba(255, 255, 255, 0)'
				)
			),

			array(
				'id' => 'body_background',
				'type' => 'background',
				'title' => esc_html__('Main Background', 'sonaar'),
				'sub_desc' => esc_html__('This is your main background. *Important: If you do not see it on your site, make sure that the "Content Background" above is set to "rgba(255, 255, 255, 0). This is also the background you will see when you use the 3D Push Menu".', 'sonaar'),
				'class' => 'greybg',
				'hide' => array('attachment'),
				'std' => array(
					'color' => '#ffffff'
				)
			),


			array(
				'id'    => 'page_title_divider_image',
				'type'  => 'upload',
				'title' => esc_html__('Page Title Divider Image', 'sonaar'),
				'sub_desc' => esc_html__('Upload a .jpg or .png image', 'sonaar'),
				'std' => '',
				'class' => 'greybg'
			),
			array(
				'id'    => 'page_title_divider_color',
				'type'  => 'color',
				'title' => esc_html__('Page Title Divider Color', 'sonaar'),
				'std' => '#000000',
				'class' => 'greybg'
			),
			array(
				'id'    => 'page_title_divider_margin_top',
				'type'  => 'text',
				'title' => esc_html__('Page Title Divider Margin Top', 'sonaar'),
				'sub_desc' => esc_html__('Eg: 30. The value is in pixels. Do not add "px" after the value. Leave blank for theme default', 'sonaar'),
				'std' => '',
			),
			array(
				'id'    => 'page_title_divider_margin_bottom',
				'type'  => 'text',
				'title' => esc_html__('Page Title Divider Margin Bottom', 'sonaar'),
				'sub_desc' => esc_html__('Eg: 30. The value is in pixels. Do not add "px" after the value. Leave blank for theme default', 'sonaar'),
				'std' => '',
			),


			array(
				'id'    => 'widget_title_divider_image',
				'type'  => 'upload',
				'title' => esc_html__('Widget Title Divider Image', 'sonaar'),
				'sub_desc' => esc_html__('Upload a .jpg or .png image', 'sonaar'),
				'std' => '',
				'class' => 'greybg'
			),
			array(
				'id'    => 'widget_title_divider_color',
				'type'  => 'color',
				'title' => esc_html__('Widget Title Divider Color', 'sonaar'),
				'std' => '#000000',
				'class' => 'greybg'
			),
			array(
				'id'    => 'widget_title_divider_margin_top',
				'type'  => 'text',
				'title' => esc_html__('Widget Title Divider Margin Top', 'sonaar'),
				'sub_desc' => esc_html__('Eg: 30. The value is in pixels. Do not add "px" after the value. Leave blank for theme default', 'sonaar'),
				'std' => '',
			),
			array(
				'id'    => 'widget_title_divider_margin_bottom',
				'type'  => 'text',
				'title' => esc_html__('Widget Title Divider Margin Bottom', 'sonaar'),
				'sub_desc' => esc_html__('Eg: 30. The value is in pixels. Do not add "px" after the value. Leave blank for theme default', 'sonaar'),
				'std' => '',
			),
		)
	);

$redux_sections[] = array(
		'icon' => 'edit',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Typography', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('These are some typography options that you can edit. These options will override the selected preset.', 'sonaar') . '</p>',
		'fields' => array(

			array(
				'id' => 'body_typography',
				'type' => 'typography',
				'title' => esc_html__('Body Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => array()
			),
			array(

				'id' => 'h1_typography',
				'type' => 'typography',
				'title' => esc_html__('Heading 1 Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => array(
					'font' => "Open+Sans:600",
					'font_readable' => "Open Sans",
				)
			),
			array(
				'id' => 'h1_spacing',
				'type' => 'text',
				'title' => esc_html__('Heading 1 Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Heading 1 Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'h2_typography',
				'type' => 'typography',
				'title' => esc_html__('Heading 2 Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => array(
					'font_readable' => "Open Sans",
					'font' => "Open+Sans:300",
					'weight' => '300'
				)
			),
			array(
				'id' => 'h2_spacing',
				'type' => 'text',
				'title' => esc_html__('Heading 2 Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Heading 2 Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'h3_typography',
				'type' => 'typography',
				'title' => esc_html__('Heading 3 Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => array(
					'font_readable' => "Open Sans",
					'font' => "Open+Sans:300",
					'weight' => '300'
				)
			),
			array(
				'id' => 'h3_spacing',
				'type' => 'text',
				'title' => esc_html__('Heading 3 Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Heading 3 Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'h4_typography',
				'type' => 'typography',
				'title' => esc_html__('Heading 4 Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'h4_spacing',
				'type' => 'text',
				'title' => esc_html__('Heading 4 Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Heading 4 Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'h5_typography',
				'type' => 'typography',
				'title' => esc_html__('Heading 5 Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'h5_spacing',
				'type' => 'text',
				'title' => esc_html__('Heading 5 Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Heading 5 Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'h6_typography',
				'type' => 'typography',
				'title' => esc_html__('Heading 6 Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'h6_spacing',
				'type' => 'text',
				'title' => esc_html__('Heading 6 Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Heading 6 Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'archive_post_titles',
				'type' => 'typography',
				'title' => esc_html__('Archive Post Titles', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'archive_post_titles_spacing',
				'type' => 'text',
				'title' => esc_html__('Archive Post Titles Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'news_hover_color',
				'type' => 'color',
				'title' => esc_html__('News title color on hover', 'sonaar'),
				'class' => 'greybg',
				'sub_desc' => esc_html__('* This only apply on the page template: Blog Posts (list). Screenshot: http://d.pr/i/1gWvq ', 'sonaar'),
				'std' => '#ffffff'
			),
			array(
				'id' => 'call_to_action_typography',
				'type' => 'typography',
				'title' => esc_html__('Widget Call To Action Button Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'cta_spacing',
				'type' => 'text',
				'title' => esc_html__('Widget Call To Action Button Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'button_widget_typography',
				'type' => 'typography',
				'title' => esc_html__('Button Widget Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'button_widget_spacing',
				'type' => 'text',
				'title' => esc_html__('Button Widget Letter Spacing', 'sonaar'),
				'sub_desc' => esc_html__('Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
		)
	);

	$redux_sections[] = array(
		'icon' => 'chevron-up',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Logos', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('These are some header options that you can edit.', 'sonaar') . '</p>',
		'fields' => array(
			array(
				'id' => 'use_logo',
				'type' => 'checkbox_hide_all',
				'title' => esc_html__('Use Logo', 'sonaar'),
				'sub_desc' => esc_html__('Show logo and Site Title', 'sonaar'),
				'switch' => true,
				'std' => '1'
			),
			array(
				'id' => 'header_logo',
				'type' => 'upload',
				'title' => esc_html__('Logo Dark Version', 'sonaar'),
				'std' => get_template_directory_uri().'/images/sonaar-logo-black@1x.png',
				'class' => 'greybg'
			),
			array(
				'id' => 'retina_header_logo',
				'type' => 'upload',
				'title' => esc_html__('Retina Logo Dark Version', 'sonaar'),
				'sub_desc' => esc_html__('Upload your dark logo version for retina devices. Retina logo is basically the same logo above but should be 2X larger.', 'sonaar'),
				'std' => sonaar_music_get_option('header_logo'),
				'class' => 'greybg'
			),
			array(
				'id' => 'header_alternative_logo',
				'type' => 'upload',
				'title' => esc_html__('Logo Light Version', 'sonaar'),
				'sub_desc' => esc_html__('Light version of your logo.', 'sonaar'),
				'class' => 'greybg'
			),
			array(
				'id' => 'retina_header_alternative_logo',
				'type' => 'upload',
				'title' => esc_html__('Retina Logo Light Version', 'sonaar'),
				'sub_desc' => esc_html__('Upload your light logo version for retina devices. Retina logo is basically the same logo above but should be 2X larger.', 'sonaar'),
				'class' => 'greybg'
			),
			array(
				'id' => 'mobile_logo',
				'type' => 'upload',
				'title' => esc_html__('Mobile Logo Version', 'sonaar'),
				'sub_desc' => esc_html__('Upload your mobile logo version. If no mobile logo is selectioned the standard logo will be scalled down to fit the mobile header area.', 'sonaar'),
				'class' => 'greybg'
			),
			array(
				'id' => 'header_logo_select',
				'class' => 'greybg',
				'type' => 'select',
				'title' => esc_html__('Which logo do you want to use accross your site ?', 'sonaar'),
				'options' => array(
					'dark' => esc_html__('Dark', 'sonaar'),
					'light' => esc_html__('Light', 'sonaar')
				),
				'std' => 'dark'
			),
			array(
				'id' => 'use_alternative_logo_on_mobile',
				'type' => 'checkbox',
				'title' => esc_html__('Use Light Logo Version when Responsive ?', 'sonaar'),
				'sub_desc' => '<p class="description">' . esc_html__('The light logo version will be used on tablet and mobile.', 'sonaar') . '</p>',
				'switch' => true,
				'std' => '0'
			),
			array(
				'id' => 'menu_logo_height',
				'class' => 'push-menu',
				'type' => 'text',
				'title' => esc_html__( 'Logo Height','sonaar' ),
				'sub_desc' => esc_html__( 'Put the desire height of your logo ex: 50px.' )
			),


		)
	);
$redux_sections[] = array(
		'icon' => 'bars',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Menu Options', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('Choose between a classic or push menu.', 'sonaar') . '</p>',
		'fields' => array(
			array(
				'id' => 'menu_type',
				'type' => 'select_hide_below',
				'title' => esc_html__('Menu Type', 'sonaar'),
				'options' => array(
					'push-menu' => esc_html__('Push Menu', 'sonaar'),
					'classic-menu' => esc_html__('Classic Menu', 'sonaar'),
				),
				'std' => 'push-menu'
			),
			array(
				'id' => 'menu_transition',
				'class' => 'push-menu',
				'type' => 'radio',
				'title' => esc_html__('Menu Effect on Push', 'sonaar'),
				'options' => array(
					'type1' => esc_html__('Slide', 'sonaar'),
					'type2' => esc_html__('Overlay', 'sonaar'),
					'type3' => esc_html__('3D Perspective', 'sonaar')
				),
				'std' => 'type1'
			),

			// PUSH MENU
			array(
				'id' => 'enable_fixed_header',
				'class' => 'push-menu',
				'type' => 'checkbox',
				'title' => esc_html__('Fix menu at the top of the screen', 'sonaar'),
				'sub_desc' => '<p class="description">' . esc_html__('This will make the menu fixed on page scroll', 'sonaar') . '</p>',
				'switch' => true,
				'std' => '0'
			),
			array(
				'id' => 'menu_position',
				'type' => 'radio',
				'class' => 'push-menu',
				'title' => esc_html__('Menu Position', 'sonaar'),
				'options' => array(
					'lefttype' => esc_html__('Left', 'sonaar'),
					'righttype' => esc_html__('Right', 'sonaar')
				),
				'std' => 'righttype'
			),
			array(
				'id' => 'menu_logo',
				'class' => 'push-menu',
				'type' => 'upload',
				'title' => esc_html__('Logo', 'sonaar'),
				'sub_desc' => esc_html__('Upload your menu logo', 'sonaar'),
				'std' => get_template_directory_uri().'/images/sonaar-logo-white@1x.png',
			),
			array(
				'id' => 'retina_menu_logo',
				'class' => 'push-menu',
				'type' => 'upload',
				'title' => esc_html__('Retina Logo', 'sonaar'),
				'sub_desc' => esc_html__('Upload your retina logo (should be 2x larger than your standard logo)', 'sonaar'),
				'std' => sonaar_music_get_option('menu_logo'),
			),
			array(
				'id' => 'menu_background',
				'class' => 'push-menu',
				'type' => 'background',
				'title' => esc_html__('Background', 'sonaar'),
				'sub_desc' => esc_html__('Menu background options / Upload a custom background image', 'sonaar'),
				'hide' => array('size', 'attachment'),
				'std' => array(
					'color' => '#353535'
				)
			),

			array(
				'id' => 'menu_open_icon_color',
				'class' => 'push-menu',
				'type' => 'color',
				'title' => esc_html__('Menu Open Icon Color', 'sonaar'),
				'std' => '#000000'
			),
			array(
				'id' => 'menu_close_icon_color',
				'class' => 'push-menu',
				'type' => 'color',
				'title' => esc_html__('Menu Close Icon Color', 'sonaar'),
				'std' => '#ffffff'
			),
			array(
				'id' => 'menu_typography',
				'class' => 'push-menu',
				'type' => 'typography',
				'title' => esc_html__('Menu Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => array()
			),
			array(
				'id' => 'menu_margin',
				'class' => 'push-menu',
				'type' => 'text',
				'title' => esc_html__('Item Margin (px)', 'sonaar'),
				'sub_desc' => esc_html__('Set a menu item margin', 'sonaar'),
				'std' => '0'
			),
			array(
				'id' => 'header_menu_toggle_enabled',
				'class' => 'push-menu',
				'type' => 'radio',
				'title' => esc_html__('Display Main Menu Icon', 'sonaar'),
				'options' => array(
					'1' => esc_html__('Show', 'sonaar'),
					'2' => esc_html__('Show on mobile only', 'sonaar'),
					'0' => esc_html__('Hide', 'sonaar'),
				),
				'std' => '1'
			),

			// CLASSIC MENU

			// GENERAL
			array(
				'id' => 'classic_menu_general_settings',
				'class' => 'classic-menu',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('General Options', 'sonaar') . '</h4>'
			),

			array(
				'id' => 'classic_menu_width',
				'class' => 'classic-menu',
				'type' => 'radio',
				'title' => esc_html__('Menu Width', 'sonaar'),
				'options' => array(
					'fullwidth' => esc_html__('Full Width', 'sonaar'),
					'incontainer' => esc_html__('In Container', 'sonaar')
				),
				'std' => 'fullwidth'
			),

			array(
				'id' => 'classic_menu_align',
				'class' => 'classic-menu',
				'type' => 'radio',
				'title' => esc_html__('Items Alignment', 'sonaar'),
				'options' => array(
					'pull-left' => esc_html__('Left', 'sonaar'),
					'pull-right' => esc_html__('Right', 'sonaar'),
					'pull-center' => esc_html__('Center', 'sonaar')
				),
				'std' => 'pull-center'
			),

			array(
				'id' => 'classic_menu_position',
				'class' => 'classic-menu',
				'type' => 'select_hide_below',
				'title' => esc_html__('Menu Position', 'sonaar'),
				'options' => array(
					'absolute absolute_before' => esc_html__('Not Fixed', 'sonaar'),
					'fixed fixed_before' => esc_html__('Fixed', 'sonaar'),
				),
				'std' => 'fixed fixed_before'
			),

			array(
				'id' => 'classic_menu_effect',
				'class' => 'classic-menu',
				'type' => 'radio',
				'title' => esc_html__('Menu Effect On Scroll', 'sonaar'),
				'options' => array(
					'reset' => esc_html__('Default', 'sonaar'),
					'mini-active' => esc_html__('Mini', 'sonaar'),
					'mini-fullwidth-active' => esc_html__('Mini + Full Width', 'sonaar'),
				),
				'std' => 'mini-fullwidth-active'
			),
			array(
				'id' => 'classic_menu_header_logo_mini',
				'class' => 'classic-menu',
				'type' => 'upload',
				'title' => esc_html__('Header Logo On Mini', 'sonaar'),
				'sub_desc' => esc_html__('This will override the main logo by this logo when you will start scrolling your website. Menu Effect On Scroll above shall be set to Mini.', 'sonaar'),
				'std' => '',
			),

			// LOGO
			array(
				'id' => 'classic_menu_logo_settings',
				'class' => 'classic-menu',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('Logo Options', 'sonaar') . '</h4>'
			),

			array(
				'id' => 'classic_menu_logo_align',
				'class' => 'classic-menu',
				'type' => 'radio',
				'title' => esc_html__('Logo Alignment', 'sonaar'),
				'options' => array(
					'pull-left' => esc_html__('Left', 'sonaar'),
					'pull-right' => esc_html__('Right', 'sonaar'),
					'pull-center' => esc_html__('Center', 'sonaar'),
					'pull-top' => esc_html__('Center & Above items', 'sonaar')
				),
				'std' => 'pull-left'
			),

			array(
				'id' => 'classic_menu_logo_padding_left',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Logo Padding Left (px)', 'sonaar'),
				'std' => '0px'
			),
			array(
				'id' => 'classic_menu_logo_padding_right',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Logo Padding Right (px)', 'sonaar'),
				'std' => '0px'
			),
			array(
				'id' => 'classic_menu_logo_padding_top',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Logo Padding Top (px)', 'sonaar'),
				'std' => '0px'
			),
			array(
				'id' => 'classic_menu_logo_padding_bottom',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Logo Padding Bottom (px)', 'sonaar'),
				'std' => '0px'
			),
			// CONTAINER
			array(
				'id' => 'classic_menu_container_settings',
				'class' => 'classic-menu',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('Menu Container', 'sonaar') . '</h4>'
			),

			array(
				'id' => 'classic_menu_background',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Menu Background Color', 'sonaar'),
				'sub_desc' => esc_html__('If you would like to display the menu above or over your page content, go to your page > page settings > Show Classic Menu & Header Over Content.', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'classic_menu_background_mini',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Menu Background Color When "Menu Effect On Scroll > MINI is activated"', 'sonaar'),
				'std' => 'rgb(233, 233, 233)'
			),
			array(
				'id' => 'classic_menu_inner_background',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Menu Inner/boxed Background Color', 'sonaar'),
				'std' => ''
			),

			array(
				'id' => 'classic_menu_top_margin',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Top Margin (px)', 'sonaar'),
				'std' => '40px'
			),
			array(
				'id' => 'classic_menu_bottom_margin',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Bottom Margin (px)', 'sonaar'),
				'std' => '8px'
			),
			array(
				'id' => 'classic_menu_hmargin',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Horizontal Margin (px)', 'sonaar'),
				'std' => '40px'
			),
			array(
				'id' => 'classic_menu_hpadding',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Horizontal Padding (px)', 'sonaar'),
				'std' => '0px'
			),
			array(
				'id' => 'classic_menu_vpadding',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Vertical Padding (px)', 'sonaar'),
				'std' => '8px'
			),

			// MOBILE MENU
			array(
				'id' => 'classic_menu_mobile_settings',
				'class' => 'classic-menu',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('Mobile Settings', 'sonaar') . '</h4>'
			),

			array(
				'id' => 'classic_menu_background_mobile',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Mobile Menu Background Color', 'sonaar'),
				'std' => '#FFFFFF'
			),
			array(
				'id' => 'classic_mobile_icon_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Mobile Menu Icon Color', 'sonaar'),
				'std' => '#000000'
			),
			array(
				'id' => 'classic_mobile_icon_hover_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Mobile Menu Icon Hover Color', 'sonaar'),
				'std' => '#000000'
			),

			// ITEMS

			array(
				'id' => 'classic_menu_item_settings',
				'class' => 'classic-menu',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('Items', 'sonaar') . '</h4>'
			),

			array(
				'id' => 'classic_menu_item_hmargin',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Item Horizontal Margin (px)', 'sonaar'),
				'std' => '5px'
			),
			array(
				'id' => 'classic_menu_item_vmargin',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Item Vertical Margin (px)', 'sonaar'),
				'std' => '8px'
			),

			array(
				'id' => 'classic_menu_item_hpadding',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Item Horizontal Padding (px)', 'sonaar'),
				'std' => '25px'
			),
			array(
				'id' => 'classic_menu_item_vpadding',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Item Vertical Padding (px)', 'sonaar'),
				'std' => '15px'
			),
			array(
				'id' => 'classic_menu_typography',
				'class' => 'classic-menu',
				'type' => 'typography',
				'title' => esc_html__('Main Item Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => array(
					'color' => '#000000'
				)
			),
			array(
				'id' => 'classic_menu_letter_spacing',
				'class' => 'classic-menu',
				'type' => 'text',
				'title' => esc_html__('Item Letter Spacing (px)', 'sonaar'),
				'std' => '1px'
			),
			array(
				'id' => 'classic_menu_hover_bg_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Main Item Hover Background Color', 'sonaar'),
				'std' => 'rgba(62, 226, 189,1)'
			),
			array(
				'id' => 'classic_menu_hover_text_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Main Item Hover Text Color', 'sonaar'),
				'std' => '#ffffff'
			),
			array(
				'id' => 'classic_menu_active_bg_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Main Item Active Background Color', 'sonaar'),
				'std' => 'rgba(255, 255, 255,0)'
			),
			array(
				'id' => 'classic_menu_active_text_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Main Item Active Text Color', 'sonaar'),
				'std' => 'rgba(62, 226, 189,1)'
			),
			array(
				'id' => 'menu_item_hover_effect',
				'class' => 'classic-menu',
				'type' => 'select',
				'title' => esc_html__('Menu Item Hover Effect', 'sonaar'),
				'options' => array(
					'none' => esc_html__('None', 'sonaar'),
					'underline' => esc_html__('Underline', 'sonaar'),
					'line-through' => esc_html__('Strikethrough', 'sonaar')
				),
				'std' => 'righttype'
			),


			// SUB ITEMS

			array(
				'id' => 'classic_menu_sub_item_settings',
				'class' => 'classic-menu',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('Sub Items', 'sonaar') . '</h4>'
			),

			array(
				'id' => 'classic_sub_menu_typography',
				'class' => 'classic-menu',
				'type' => 'typography',
				'title' => esc_html__('Sub Item Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => array(
					'color' => '#ffffff',
					'bgcolor' => 'rgba(0,0,0,0.7)'
				)
			),
			array(
				'id' => 'classic_sub_menu_hover_bg_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Sub Item Hover Background Color', 'sonaar'),
				'std' => 'rgba(62, 226, 189,1)'
			),
			array(
				'id' => 'classic_sub_menu_hover_text_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Sub Item Hover Text Color', 'sonaar'),
				'std' => '#ffffff'
			),
			array(
				'id' => 'classic_sub_menu_active_bg_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Sub Item Active Background Color', 'sonaar'),
				'std' => 'rgba(0, 0, 0,0.6)'
			),
			array(
				'id' => 'classic_sub_menu_active_text_color',
				'class' => 'classic-menu',
				'type' => 'color',
				'title' => esc_html__('Sub Item Active Text Color', 'sonaar'),
				'std' => '#ffffff'
			),


			// HOT LINKS

			array(
				'id' => 'classic_menu_hotlinks_settings',
				'class' => 'classic-menu push-menu',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('Hot Links', 'sonaar') . '</h4>'
			),

			array(
				'id' => 'header_top_menu_enabled',
				'class' => 'classic-menu push-menu',
				'type' => 'checkbox',
				'title' => esc_html__('Enable Hot Links', 'sonaar'),
				'switch' => true,
				'std' => '0'
			),
			array(
				'id' => 'header_top_menu_hide_on_scroll',
				'class' => 'push-menu',
				'type' => 'checkbox',
				'title' => esc_html__('Hot Links Hide on scroll', 'sonaar'),
				'switch' => true,
				'std' => '1'
			),
			array(
				'id'       => 'header_top_menu',
				'class' => 'classic-menu push-menu',
				'type'     => 'group',
				'title'    => esc_html_x('Hot Links Items', 'Theme Options', 'sonaar'),
				'std'      => array(
					0 => array(
						'menu_page_name' => '',
						'menu_page_is_menu' => '',
						'menu_page_url' => '',
						'pages_select' => '',
						'menu_page_external_url' => '',
						'menu_page_icon' => '',
						'order_no'     => 1
					),
				),
				'options' => array(
					'group' => array(
						'name'      => esc_html_x('Hot Links', 'Theme Options', 'sonaar'),
						'title_key' => 'menu_page_name'
					),
					'fields' => array(
						array(
							'id'    => 'menu_page_name',
							'type'  => 'text',
							'title' => esc_html_x('Hot Link Label', 'Theme Options', 'sonaar')
						),
						array(
							'id'    => 'menu_hide_page_title',
							'type'  => 'checkbox',
							'title' => esc_html_x('Hide Label & Keep Icon Only', 'Theme Options', 'sonaar'),
							'sub_desc'=> '',
						),
						array(
							'id'    => 'menu_page_is_menu',
							'type'  => 'checkbox',
							'title' => esc_html_x('Is menu toggle', 'Theme Options', 'sonaar'),
							'sub_desc'=> '',
						),
						array(
							'id'    => 'menu_page_url',
							'type'  => 'pages_select',
							'title' => esc_html_x('Page URL', 'Theme Options', 'sonaar'),
							'sub_desc'=> '',
							'args' => array()
						),
						array(
							'id'    => 'menu_page_external_url',
							'type'  => 'text',
							'title' => esc_html_x('Page URL (External)', 'Theme Options', 'sonaar'),
							'sub_desc'=> '',
						),
						array(
							'id'    => 'menu_page_url_target',
							'type'  => 'select',
							'title' => esc_html_x('Page URL Target)', 'Theme Options', 'sonaar'),
							'options' => array(
								'_self' => 'Same Window',
								'_blank' => 'New Window'
							),
							'sub_desc'=> '',
							'std' => '_self'
						),
						array(
							'id'    => 'menu_page_icon',
							'type'  => 'fontawesome',
							'title' => esc_html_x('Page URL Icon Class', 'Theme Options', 'sonaar')
						)
					)
				)
			),
			array(
				'id' => 'header_top_menu_background',
				'class' => 'push-menu',
				'type' => 'color',
				'title' => esc_html__('Hot Links Background', 'sonaar'),
				'std' => '#ffffff'
			),
			array(
				'id' => 'header_top_menu_typography',
				'class' => 'push-menu',
				'type' => 'typography',
				'title' => esc_html__('Hot Links Typography', 'sonaar'),
				'sub_desc' => esc_html__('Choose a font, font size and color', 'sonaar'),
				'std' => ''
			),

			array(
				'id' => 'title_headerfootericons',
				'class' => 'push-menu',
				'type' => 'info',
				'desc' => '<h4 class="title">' . __('Social Icons', 'sonaar') . '</h4>'
			),
			array(
				'id'       => 'social_icons',
				'class' => 'push-menu',
				'type'     => 'group',
				'title'    => esc_html_x('Social Icons', 'Theme Options', 'sonaar'),
				'sub_desc' => esc_html_x('Add / update social media icons.', 'Theme Options', 'sonaar'),
				'std'      => array(
					0 => array(
						'social_media_name' => esc_html__('Facebook', 'sonaar'),
						'social_media_url' => 'https://facebook.com/envato',
						'social_media_icon_class' => 'facebook',
						'social_media_icon_url' => '',
						'order_no'     => 1
					),
					1 => array(
						'social_media_name' => esc_html__('Twitter', 'sonaar'),
						'social_media_url' => 'https://twitter.com/envato',
						'social_media_icon_class' => 'twitter',
						'social_media_icon_url' => '',
						'order_no'     => 1
					),
				),
				'options' => array(
					'group' => array(
						'name'      => esc_html_x('Social Media', 'Theme Options', 'sonaar'),
						'title_key' => 'social_media_name'
					),
					'fields' => array(
						array(
							'id'    => 'social_media_name',
							'type'  => 'text',
							'title' => esc_html_x('Social Media Name', 'Theme Options', 'sonaar')
						),
						array(
							'id'    => 'social_media_url',
							'type'  => 'text',
							'title' => esc_html_x('Social Media URL', 'Theme Options', 'sonaar'),
							'sub_desc'=> 'Ex: http://www.facebook.com/IronTemplates<br>',
						),
						array(
							'id'    => 'social_media_icon_class',
							'type'  => 'fontawesome',
							'title' => esc_html_x('Social Media Icon Class', 'Theme Options', 'sonaar')
						),
						array(
							'id'    => 'social_media_icon_url',
							'type'  => 'upload',
							'title' => esc_html_x('Social Media Icon Image', 'Theme Options', 'sonaar')
						)
					)
				)
			)



		)
	);
$redux_sections[] = array(
		'icon' => 'chevron-down',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Footer Options', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('These are some footer options that you can edit.', 'sonaar') . '</p>',
		'fields' => array(
			array(
				'id' => 1,
				'type' => 'info',
				'desc' => '<h4 class="title">' . esc_html__('Site Footer', 'sonaar') . '</h4>'
			),
			array(
				'id'    => 'block_footer',
				'class' => 'classic-menu',
				'type'  => 'posts_select',
				'title' => esc_html__('Choose which block you want to use as a footer?', 'sonaar'),
				'sub_desc' => '<p class="description">' . sprintf( esc_html__('Add or modify your block %s', 'sonaar'), '<a href="' . esc_url(get_admin_url( null, 'edit.php?post_type=block' )) . '">here</a>') . '</p>',
				'args'  => array(
					'post_type'   => 'block',
					'post_status' => 'publish'
					)
			),
			array(
				'id' => 'footer_back_to_top_enabled',
				'type' => 'checkbox',
				'title' => esc_html__('Back To Top Button', 'sonaar'),
				'switch' => true,
				'std' => '1'
			)
		)
	);
	$redux_sections[] = array(
		'icon' => 'music',
		'icon_class' => 'fa-music',
		'title' => esc_html__('Music Player Settings', 'sonaar'),
		'desc' => '<p class="description">' . sprintf( esc_html__('The music player settings can be %s', 'sonaar'), '<a href="' . esc_url(get_admin_url( null, 'admin.php?page=iron_music_music_player' )) . '">edited here</a>') . '</p>',
	);


	$redux_sections[] = array(
		'icon' => 'calendar',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Events Settings', 'sonaar'),
		'desc' => '<p class="description">' . sprintf( esc_html__('The events settings can be %s', 'sonaar'), '<a href="' . esc_url(get_admin_url( null, 'admin.php?page=iron_music_event' )) . '">edited here</a>') . '</p>',
	);


	$redux_sections[] = array(
		'icon' => 'file-o',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Posts Settings', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('These are some post options that you can edit.', 'sonaar') . '</p>',
		'fields'     => array(
			array(
				'id' => 'post_archive_default_template',
				'type' => 'radio',
				'title' => esc_html__('Posts Archive Default Template', 'sonaar-music'),
				'options' => array(
					'archive-posts-classic' => esc_html__('Classic', 'sonaar-music'),
					'archive-posts-list' => esc_html__('List', 'sonaar-music'),
				),
				'std' => 'archive-posts-classic'

			),
			array(
				'id' => 'single_post_featured_image',
				'type' => 'radio',
				'title' => esc_html__('Single Post Featured Image', 'sonaar'),
				'options' => array(
					'fullwidth' => esc_html__('Full Width', 'sonaar'),
					'original' => esc_html__('Original', 'sonaar'),
					'none' => esc_html__('None', 'sonaar')
				),
				'std' => 'fullwidth'
			),
			array(
				'id' => 'show_post_date',
				'type' => 'checkbox',
				'title' => esc_html__('Show post date in post archive and single posts', 'sonaar'),
				'switch' => true,
				'std' => '1'
			),
			array(
				'id' => 'show_post_author',
				'type' => 'checkbox',
				'title' => esc_html__('Show post author in post archive and single posts', 'sonaar'),
				'switch' => true,
				'std' => '1'
			),
			array(
				'id' => 'show_post_categories',
				'type' => 'checkbox',
				'title' => esc_html__('Show post categories in post archive and single posts', 'sonaar'),
				'switch' => true,
				'std' => '1'
			),
			array(
				'id' => 'show_post_tags',
				'type' => 'checkbox',
				'title' => esc_html__('Show post tags in post archive and single posts', 'sonaar'),
				'switch' => true,
				'std' => '1'
			),
			array(
				'id' => 'single_post_settings_sidebar',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('Single Posts SideBar', 'sonaar') . '</h4>'
			),
			array(
				'id'    => 'single_post_default_sidebar',
				'type'  => 'widget_area_select',
				'title' => esc_html__('Single Post Default Sidebar', 'sonaar'),
				'std'   => 'sonaar_sidebar_0'
			),
			array(
				'id' => 'single_post_default_sidebar_position',
				'type' => 'radio',
				'title' => esc_html__('Single Post Sidebar Position', 'sonaar'),
				'options' => array(
					'left' => esc_html__('Left', 'sonaar') ,
					'right' => esc_html__('Right', 'sonaar') ,
				),
				'std' => 'right'
			),
			array(
				'id'    => 'single_video_default_sidebar',
				'type'  => 'widget_area_select',
				'title' => esc_html__('Single Video Default Sidebar', 'sonaar'),
				'std'   => 'sonaar_sidebar_1'
			),
			array(
				'id' => 'single_video_default_sidebar_position',
				'type' => 'radio',
				'title' => esc_html__('Single VIdeo Sidebar Position', 'sonaar'),
				'options' => array(
					'left' => esc_html__('Left', 'sonaar') ,
					'right' => esc_html__('Right', 'sonaar') ,
				),
				'std' => 'right'
			),
			array(
				'id'    => 'single_event_default_sidebar',
				'type'  => 'widget_area_select',
				'title' => esc_html__('Single Event Default Sidebar', 'sonaar'),
				'std'   => ''
			),
			array(
				'id' => 'single_event_default_sidebar_position',
				'type' => 'radio',
				'title' => esc_html__('Single Event Sidebar Position', 'sonaar'),
				'options' => array(
					'left' => esc_html__('Left', 'sonaar') ,
					'right' => esc_html__('Right', 'sonaar') ,
				),
				'std' => 'right'
			),
			array(
				'id'    => 'single_discography_default_sidebar',
				'type'  => 'widget_area_select',
				'title' => esc_html__('Single Discography Default Sidebar', 'sonaar'),
				'std'   => ''
			),
			array(
				'id' => 'single_discography_default_sidebar_position',
				'type' => 'radio',
				'title' => esc_html__('Single Discography Sidebar Position', 'sonaar'),
				'options' => array(
					'left' => esc_html__('Left', 'sonaar') ,
					'right' => esc_html__('Right', 'sonaar') ,
				),
				'std' => 'right'
			),
			array(
				'id' => 'single_post_settings',
				'type' => 'info',
				'desc' => '<br><h4 class="title">' . esc_html__('Single Posts Page Titles', 'sonaar') . '</h4>'
			),
			array(
				'id' => 'single_post_page_title',
				'type' => 'text',
				'title' => esc_html__('Single Post Page Title', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'single_event_page_title',
				'type' => 'text',
				'title' => esc_html__('Single Event Page Title', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'single_video_page_title',
				'type' => 'text',
				'title' => esc_html__('Single Video Page Title', 'sonaar'),
				'std' => ''
			),
			array(
				'id' => 'single_shop_page_title',
				'type' => 'text',
				'title' => esc_html__('Single Shop Page Title', 'sonaar'),
				'std' => ''
			),
		)
	);
$redux_sections[] = array(
		'icon' => 'forward',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Pagination Settings', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('You can control settings related to the reading and navigation of posts.', 'sonaar') . '</p><p>' . esc_html__('Enter the number of posts per page for each content type to be displayed within archive page templates.', 'sonaar') . '<br>' . esc_html__('You can control the number of posts for the Posts content type on the <a href="options-reading.php">Reading Settings</a> page.', 'sonaar') . '</p>',
		'fields' => array(

			array(
				'id' => 'videos_per_page',
				'type' => 'text',
				'title' => esc_html__('Videos listings show at most', 'sonaar'),
				'std' => 10
			),
			array(
				'id' => 'paginate_method',
				'type' => 'radio',
				'title' => esc_html__('Pagination Style', 'sonaar'),
				'sub_desc' => esc_html__('Choose how to provide "paged" navigation of posts, categories, and archive pages.', 'sonaar') . '<br>' . wp_kses(__('You can set how many posts to list on each page on the <a href="options-reading.php">Reading Settings</a> page.', 'sonaar'),iron_get_allowed_html()),
				'options' => array(
					'posts_nav_link' => esc_html__('Displays links for next and previous pages', 'sonaar') . ' (' . sprintf( esc_html_x('e.g. : %s', 'Abbreviation of Latin exemplī grātiā (“for example”).', 'sonaar'), esc_html__('« Previous Page — Next Page »', 'sonaar') ) . ')',
					'paginate_links' => esc_html__('Displays a row of paginated links', 'sonaar') . ' (' . sprintf( esc_html_x('e.g. : %s', 'Abbreviation of Latin exemplī grātiā (“for example”).', 'sonaar'), esc_html__('« Prev 1 … 3 4 5 6 7 … 9 Next »', 'sonaar') ) . ')',
					// TODO: sonaar-71 sonaar-72
					// 'paginate_more' => esc_html__('Displays a single link to dynamically load more items', 'sonaar') . ' (' . sprintf( esc_html_x('e.g. : %s', 'Abbreviation of Latin exemplī grātiā (“for example”).', 'sonaar'), esc_html__('« More Posts »', 'sonaar') ) . ')',
					// 'paginate_scroll' => esc_html__('Dynamically load more items as you scroll down (infinite scrolling)', 'sonaar')
				),
				'std' => 'posts_nav_link'
			)
		)
	);


	/**
	 * Default sidebars also set in /includes/setup.php:iron_import_default_data()
	 */

	$redux_sections[] = array(
		'icon'       => 'th-large',
		'icon_class' => 'fa-lg',
		'title'      => esc_html_x('Widgets Areas', 'Theme Options', 'sonaar'),
		'desc'       => '<p class="description">' . esc_html_x('Manage your WordPress Widget Areas and additional settings related to page templates and widgets.', 'Theme Options', 'sonaar') . '</p>',
		'fields'     => array(
			array(
				'id'       => 'widget_areas',
				'type'     => 'group',
				'title'    => esc_html_x('Widget Areas', 'Theme Options', 'sonaar'),
				'sub_desc' => esc_html_x('Manage dynamic sidebars for your widgets.', 'Theme Options', 'sonaar'),
				'std'      => array(
					'sonaar_sidebar_0' => array(
						'sidebar_name' => 'Default Blog Sidebar',
						'sidebar_desc' => esc_html_x('Sidebar widget area found on Blog post-related page templates.', 'Theme Options', 'sonaar'),
						'sidebar_grid' => 1,
						'order_no'     => 1
					),
					'sonaar_sidebar_2' => array(
						'sidebar_name' => 'Default Footer',
						'sidebar_desc' => esc_html_x('Site footer widget area.', 'Theme Options', 'sonaar'),
						'sidebar_grid' => 1,
						'order_no'     => 3
					),
					'sonaar_sidebar_3' => array(
						'sidebar_name' => 'Default Single Post Sidebar',
						'sidebar_desc' => esc_html_x('Single Post widget area.', 'Theme Options', 'sonaar'),
						'sidebar_grid' => 1,
						'order_no'     => 3
					)
				),
				'options' => array(
					'group' => array(
						'name'      => esc_html_x('Widget Area', 'Theme Options', 'sonaar'),
						'title_key' => 'sidebar_name'
					),
					'fields' => array(
						array(
							'id'    => 'sidebar_name',
							'type'  => 'text',
							'title' => esc_html_x('Sidebar name', 'Theme Options', 'sonaar')
						),
						array(
							'id'    => 'sidebar_desc',
							'type'  => 'textarea',
							'title' => esc_html_x('Sidebar description (optional)', 'Theme Options', 'sonaar')
						)
					)
				)
			)
		)
	);



	$redux_sections[] = array(
		'icon' => 'facebook',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Social Media', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('Here are some social settings that you can edit.', 'sonaar') . '</p>',
		'fields'     => array(
			array(
				'id' => 'title_sharebuttons',
				'type' => 'info',
				'desc' => '<h4 class="title">' . __('Share buttons', 'sonaar') . '</h4>',
			),
			array(
				'id' => 'enable_share_icons',
				'type' => 'checkbox_hide_below',
				'title' => esc_html__('Enable share icons', 'sonaar'),
				'sub_desc' => esc_html__('Share buttons will be shown on the single-post, single-event, single-album and single-video page only.', 'sonaar'),
				'switch' => true,
				'options' => array(
					0 => esc_html__('Off', 'sonaar'),
					1 => esc_html__('On', 'sonaar'),
				),
				'std' => 1
			),
			array(
				'id' => 'custom_social_actions_checkbox',
				'type' => 'multi_checkbox',
				'class' => 'custom_social',
				'title' => esc_html__('Custom Social Buttons', 'sonaar'),
				'sub_desc' => wp_kses(__('Add your favorite drop-in bookmarking and social link-sharing', 'sonaar'),iron_get_allowed_html()),
				'options' => array(
					'facebook' => esc_html__('Facebook', 'sonaar'),
					'twitter' => esc_html__('Twitter', 'sonaar'),
					'google+' => esc_html__('Google+', 'sonaar'),
					'linkedin' => esc_html__('LinkedIn', 'sonaar'),
					'pinterest' => esc_html__('Pinterest', 'sonaar'),
				),
				'std' => array(
					'facebook'  => 1,
					'twitter'   => 1,
					'google+'   => 1,
					'linkedin'  => 1,
					'pinterest' => 1,
					)
			)
		)
	);



	$redux_sections[] = array(
		'icon' => 'file',
		'icon_class' => 'fa-lg',
		'title' => esc_html__('Custom CSS / JS', 'sonaar'),
		'desc' => '<p class="description">' . esc_html__('All the custom CSS goes here', 'sonaar') . '</p>',
		'fields' => array(
			array(
				'id' => 'custom_css',
				'type' => 'textarea',
				'title' => esc_html__('Custom CSS', 'sonaar'),
				'rows' => '40',
				'std' => ''
			),
			array(
				'id' => 'custom_js',
				'type' => 'textarea',
				'title' => esc_html__('Custom Javascript', 'sonaar'),
				'sub_desc' => wp_kses(__('This is for advanced users.<br>The code will be executed within jQuery(document).ready($);', 'sonaar'),iron_get_allowed_html()),
				'rows' => '20',
				'std' => '',
			)
		)
	);



	if (function_exists('is_plugin_active') && is_plugin_active('woocommerce/woocommerce.php')) {

		$redux_sections[] = array(
			'icon' => 'shopping-cart ',
			'icon_class' => 'fa-lg',
			'title' => esc_html__('WooCommerce', 'sonaar'),
			'desc' => '<p class="description">' . esc_html__('Here are some WooCommerce settings that you can edit.', 'sonaar') . '</p>',
			'fields' => array(
				array(
					'id' => 'woo_backgrounds',
					'type' => 'checkbox',
					'title' => esc_html__('Enable WooCommerce Backgrounds', 'sonaar'),
					'sub_desc' => wp_kses(__('This will add a background to product items and descriptions.<br><b>Primary Color 2</b> will be used for the background.', 'sonaar'),iron_get_allowed_html()),
					'switch' => true,
					'std' => '0'
				),
			)
		);

	}








	global $Redux_Options;
	$Redux_Options = new Redux_Options($redux_sections, $redux_args);

}


add_action('init', 'iron_sonaar_setup_framework_options');

/*
 *
 * Get Theme Option by ID
 *
 * Optinal Params:
 * $key, if value is an array get by array key
 */

function sonaar_music_get_option($id, $key = null, $default = null) {
	global $Redux_Options;

	if ( method_exists($Redux_Options, 'get') )
		$value = $Redux_Options->get($id, $default);

	else {
		global $redux_args, $redux_sections, $iron_option;

		if ( empty($iron_option) )
			$options = get_option('sonaar');
		else
			$options = $iron_option;

		$options_defaults = null;

		if ( isset($options[$id]) )
			$value = $options[$id];

		else {
			if ( !empty($redux_args['std_show']) )
			{
				if ( is_null($options_defaults) ) // fill the cache
				{
					if( ! is_null($redux_sections) && is_null($options_defaults) )
					{
						foreach ( $redux_sections as $section )
						{
							if ( isset($section['fields']) ) {
								foreach ( $section['fields'] as $field ) {
									if ( isset($field['std']) )
										$options_defaults[ $field['id'] ] = $field['std'];
								}
							}
						}
					}
				}

				$default = array_key_exists($id, $options_defaults) ? $options_defaults[$id] : $default;
			}

			$value = $default;
		}
	}

	if ( $key && is_array($value) && isset($value[$key]) )
		$value = $value[$key];

	return $value;
}

/*
 *
 * Set Theme Option by ID
 *
 * Optinal Params:
 * $key, if value is an array get by array key
 */

function iron_sonaar_set_option($id, $value = null) {
	global $Redux_Options;

	if ( null === $value )
		$value = $Redux_Options->_get_std($id);

	$Redux_Options->set($id, $value);
}

/*
 *
 * Reset Theme Option by ID
 *
 * Optinal Params:
 * $key, if value is an array get by array key
 */

function iron_sonaar_reset_option($id) {
	global $Redux_Options;
	$value = $Redux_Options->_get_std($id);

	$Redux_Options->set($id, $value);
}



function iron_sonaar_page_for_content_update ( $option ) {

	set_transient('sonaar' . '_flush_rules', true);

}

add_action('update_option_' . 'sonaar', 'iron_sonaar_page_for_content_update', 10, 1);
