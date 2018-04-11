<?php

//var_dump(delete_option('_iron_music_music_player_options'));


if ( is_admin()) {
	include 'rational-option-page/class.rational-option-page.php';
	$ironFeatures_pages = new RationalOptionPages();
	$ironFeatures_pages_options = array(
	    array(
	        'page_title'    => esc_html__('Events & Music Settings','sonaar'),
	        'menu_title'    => esc_html__('Events & Music Settings','sonaar'),
	        'capability'    => 'manage_options',
	        'menu_slug'     => 'sonaar',
	        'icon_url'      => IRON_MUSIC_DIR_URL . '/images/ironlogo.svg',
	        'position'      => '9999999999999999999999999999',
			'subpages'		=> array(
				array(
					'page_title'	=> esc_html__('Events','sonaar'),
					'menu_title' 	=> esc_html__('Events','sonaar'),
					'capability'    => 'manage_options',
					'menu_slug'     => 'iron_music_event',
					'sections'      => array(
						array(
							'id'    => 'iron_events',
							'title' => esc_html__('General Settings','sonaar'),
							'fields'=> array(
								// text input
								array(
									'id'    => 'events_slug_name',
									'title' => esc_html__('Events slug name','sonaar'),
									'type'  => 'text',
									'description' => esc_html__('eg: http://www.domain.com/SLUG/event-title','sonaar'),
									'value' => 'event'
								),
								array(
									'id' => 'events_per_page',
									'type' => 'text',
									'title' => esc_html__('How many events per page ?', 'sonaar'),
									'description' => esc_html__('This setting apply on your event page template.', 'sonaar'),
									'value' => '10'
								),
							)
						),
						array(
							'id'    => 'iron_events_items',
							'title' => esc_html__('Look and Feel','sonaar'),
							'fields'=> array(
								array(
									'id' => 'events_item_typography',
									'type' => 'typography',
									'title' => esc_html__('Typography', 'sonaar'),
									'description' => esc_html__('Choose a font, font size and color', 'sonaar'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '400',
										'size' => '18px',
										'color' => 'rgb(43, 43, 43)',
									)
								),
								array(
									'id'    => 'events_items_letterspacing',
									'type'  => 'text',
									'title' => esc_html__('Letter Spacing', 'sonaar'),
									'description' => esc_html__('enter value with px (eg: 2px)','sonaar'),
									'value' => '0px'
								),
								array(
									'id' => 'events_item_bg_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Item Background Color', 'sonaar'),
									'value' => 'rgb(255, 255, 255)'
								),
								array(
									'id' => 'events_item_hover_bg_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Item Hover Background Color', 'sonaar'),
									'value' => 'rgb(43, 43, 43)'
								),
								array(
									'id' => 'events_item_hover_text_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Item Hover Text Color', 'sonaar'),
									'value' => 'rgb(255, 255, 255)'
								),
							),
						),
						array(
							'id'    => 'iron_events_countdown',
							'title' => esc_html__('Countdown','sonaar'),
							'fields'=> array(
								array(
									'id' => 'events_show_countdown_rollover',
									'type' => 'checkbox',
									'title' => esc_html__('Show countdown on rollover', 'sonaar'),
									'description' => esc_html__('When option is checked, an animated countdown will be shown when user rollover your event. This global setting may be overridden in each of your individual events.', 'sonaar'),
								),
								array(
									'id' => 'events_countdown_typography',
									'type' => 'typography',
									'title' => esc_html__('Typography', 'sonaar'),
									'description' => esc_html__('Choose a font, font size and color', 'sonaar'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '600',
										'size' => '21px',
										'color' => 'rgb(255, 255, 255)',
									)
								),
								array(
									'id'    => 'events_countdown_letterspacing',
									'type'  => 'text',
									'title' => esc_html__('Letter Spacing', 'sonaar'),
									'description' => esc_html__('enter value with px','sonaar'),
									'value' => '0px'
								),
								array(
									'id' => 'events_countdown_bg_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Background Color', 'sonaar'),
									'value' => 'rgb(143, 34, 75)'
								),
								array(
									'id' => 'events_outline_colors',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Outline Color', 'sonaar'),
									'description' => esc_html__('For separators', 'sonaar'),
									'value' => 'rgb(43, 43, 43)'
								),
								array(
									'id'    => 'events_items_padding',
									'type'  => 'text',
									'title' => esc_html__('Padding between items', 'sonaar'),
									'description' => esc_html__('enter value with px. eg: 5px','sonaar'),
									'value' => '20px'
								),
							),
						),
						array(
							'id'    => 'iron_events_filter',
							'title' => esc_html__('Artist Dropdown','sonaar'),
							'fields'=> array(
								array(
									'id' => 'events_filter',
									'type' => 'checkbox',
									'title' => esc_html__('Show Artist Dropdown', 'sonaar'),
									'description' => esc_html__('Show an artist dropdown selector above your list of events. If you have multiple artists, this can be usefull to filter your events by artists. This option only apply in pages that use the "Event Posts" template.','sonaar'),
									'switch' => true,
								),
								array(
									'id'    => 'events_filter_label',
									'type'  => 'text',
									'title' => esc_html__('Text Label', 'sonaar'),
									'description' => esc_html__('eg: Select an artist','sonaar'),
									'value' => ''
								),
								array(
									'id' => 'events_filter_typography',
									'type' => 'typography',
									'title' => esc_html__('Label Typography', 'sonaar'),
									'description' => esc_html__('Choose a font, font size and color', 'sonaar'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '400',
										'size' => '15px',
										'color' => 'rgb(43, 43, 43)',
									)
								),
								array(
									'id'    => 'events_filter_letterspacing',
									'type'  => 'text',
									'title' => esc_html__('Label Letter Spacing', 'sonaar'),
									'description' => esc_html__('enter value with px (eg: 2px)','sonaar'),
									'value' => '0px'
								),
								array(
									'id' => 'events_filter_bg_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Background Color', 'sonaar'),
									'value' => 'rgb(240, 240, 240)'
								),
								array(
									'id' => 'events_filter_outline_color',
									'type' => 'text',
									'class' => 'color',
									'title' => esc_html__('Event filter Outline Color', 'sonaar'),
									'description' => esc_html__('For dropdown outlines and arrow color', 'sonaar'),
									'value' => 'rgb(0, 0, 0)'
								),
							)
						),

					),
				),
				array(
					'page_title'	=> esc_html__('Music Player','sonaar'),
					'menu_title' 	=> esc_html__('Music Player','sonaar'),
					'capability'    => 'manage_options',
					'menu_slug'     => 'iron_music_music_player',
					'sections'		=> array(
						array(
							'id' 	=> 'iron_music_player',
							'title'	=> esc_html__('Music Player Color Setting', 'sonaar'),
							'fields'=> array(
								array(
									'id' => 'music_player_playlist',
									'type' => 'typography',
									'title' => esc_html__('Playlist', 'sonaar'),
									'description' => esc_html__('Choose a font, font size and color', 'sonaar'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '400',
										'size' => '16px',
										'color' => 'rgb(43, 43, 43)',
									)
								),
								array(
									'id' => 'music_player_featured_color',
									'type' => 'text',
									'title' => esc_html__('Button Colors', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(0, 0, 0)'
								),
								array(
									'id' => 'music_player_icon_color',
									'type' => 'text',
									'title' => esc_html__('Player Control', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(127, 127, 127)'
								),
								array(
									'id' => 'music_player_timeline_color',
									'type' => 'text',
									'title' => esc_html__('SoundWave Background', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(31, 31, 31)'
								),
								array(
									'id' => 'music_player_progress_color',
									'type' => 'text',
									'title' => esc_html__('SoundWave Progress Bar', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(13, 237, 180)'
								),
							)
						),
						array(
							'id' 	=> 'iron_music_continuous_player',
							'title'	=> esc_html__('Continuous Music Player Setting', 'sonaar'),
							'fields'=> array(
								array(
									'id' => 'continuous_music_player_featured_color',
									'type' => 'text',
									'title' => esc_html__('Featured Color', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(255, 255, 255)'
								),
								array(
									'id' => 'continuous_music_player_label',
									'type' => 'typography',
									'title' => esc_html__('Typography', 'sonaar'),
									'description' => esc_html__('Choose a font and font size', 'sonaar'),
									'value' => array(
										'font' => 'Karla',
										'font-readable' => 'Karla',
										'weight' => '400',
										'size' => '16px',
										'color' => 'rgb(0, 0, 0)',
									)
								),

								array(
									'id' => 'continuous_music_player_label_color',
									'type' => 'text',
									'title' => esc_html__('Label and Button', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(0, 0, 0)'
								),

								array(
									'id' => 'continuous_music_player_label_artist',
									'type' => 'checkbox',
									'title' => esc_html__('Hide Artist Name in the player/playlist', 'sonaar'),
									'checked' => true
								),

								array(
									'id' => 'continuous_music_player_playlist_icon',
									'type' => 'checkbox',
									'title' => esc_html__('Hide Playlist Icon in the Footer Player ', 'sonaar'),
									'checked' => true
								),

								array(
									'id' => 'continuous_music_player_timeline_bar',
									'type' => 'text',
									'title' => esc_html__('SoundWave Background', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(150, 150, 150)'
								),
								array(
									'id' => 'continuous_music_player_progress_bar',
									'type' => 'text',
									'title' => esc_html__('SoundWave Progress', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(150, 150, 150)'
								),
								array(
									'id' => 'continuous_music_player_background',
									'type' => 'text',
									'title' => esc_html__('Background', 'sonaar'),
									'class' => 'color',
									'value' => 'rgb(0, 0, 0)'
								),

							)
						)
					)
				),
				array(
					'page_title'	=> esc_html__('Discography','sonaar'),
					'menu_title' 	=> esc_html__('Discography','sonaar'),
					'capability'    => 'manage_options',
					'menu_slug'     => 'iron_music_discography',
					'sections'      => array(
						array(
							'id'    => 'iron_discography',
							'title' => esc_html__('Discography Features','sonaar'),
							'fields'=> array(
								// text input
								array(
									'id'    => 'discography_slug_name',
									'title' => esc_html__('Discography Slug Name','sonaar'),
									'type'  => 'text',
									'description' => esc_html__('eg: http://www.domain.com/SLUG-NAME/album-title','sonaar'),
									'value' => 'albums'
								),
							)
						),
					),
				),

				array(
					'page_title'	=> 'Import / Export',
					'menu_title' 	=> 'Import / Export',
					'capability'    => 'manage_options',
					'menu_slug'     => 'iron_music_import_export',
					'sections'      => array(
						array(
							'id'    => 'iron_import_export',
							'title' => esc_html__('Import / Export','sonaar'),
							'fields' => array(
								array(
									'id' => 'import_html',
									'title' => esc_html__('Data to import', 'sonaar'),
									'type' => 'html',
									'data' => '<textarea class="import"></textarea><br><button class="btn import">Import data</button>'
								),
								array(
									'id' => 'export_html',
									'title' => esc_html__('Data to export', 'sonaar'),
									'type' => 'htmlExport',
									'export_options' => array(
										'_iron_music_event_options',
								        '_iron_music_music_player_options',
								        '_iron_music_discography_options'
									)
								),
							)
						),
					),
				),
			),
	    ),
	);


	$ironFeatures_pages->pages( $ironFeatures_pages_options );

}
