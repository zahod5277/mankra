<?php
header('Content-type: text/css; charset: UTF-8; Last-modified: ' . date('l jS \of F Y h:i:s A') . '');

$iron_styles = new Dynamic_Styles('sonaar');
$iron_music_event_style = new Dynamic_Styles('_iron_music_event_options');
$iron_music_music_style = new Dynamic_Styles('_iron_music_music_player_options');

$iron_styles->setBackground('#overlay', 'body_background', true);
$content_selector = '#overlay .perspective';
$iron_styles->setBackground($content_selector, 'content_background');


// FEATURED COLOR

$featured_color = '
a,
code,
.tab-circle,
.wpb_content_element.circle a,
a.button-more,.pages a,
.pages .current,
.iron_widget_newsletter input[type="submit"]:hover,
.iron_widget_twitter .twitter-logo,
.iron_widget_twitter .twitter-logo-small,
.tab-circle,
a.sr_it-meta-author-link,
.post-categories a,
.post-tags a,
.comment-content a,
.comment-author .fn,
.comment-author .url,
.comment-reply-link,
.comment-reply-login,
.comment-meta a:hover,
.comment-reply-title small a:hover,
.comments-title,
.woocommerce-Reviews .comment-reply-title,
.woocommerce-Reviews .woocommerce-Reviews-title,
.nav-menu .current-menu-item > a,
.nav-menu .current-menu-parent > a,
.nav-menu .current-menu-ancestor > a,
.iron_widget_recent_tweets .meta .time a,
.carousel .sr_it-datetime,
.article .sr_it-datetime,
.sr_it-single-post time,
.meta .sr_it-datetime,
span.wpcf7-not-valid-tip-no-ajax,
.wpcf7-response-output,
.photos-list .hover-text span,
.contact-box .phone,
.error,
.success span,
.concerts-list .title-row .date,
.concerts-list .expanded .title-row .link,
.iron_widget_newsletter label span,
.concerts-list .title-row .link,
.icon-concert-dropdown,
li.expanded .title-row .icon-concert-dropdown,
.media-block a:hover .media-decoration.media-audio,
.media-block a:hover .media-decoration.media-audio,
.media-decoration.media-video,
.carousel .video-box .btn-play,
.terms-list small,
.terms-list [class^="icon-"],
.terms-list [class*=" icon-"],
.nm_mc_form .nm_mc_button:hover,
.footer-wrapper-backtotop:hover,
#sidebar .panel-action,
.tweet_text a,
.iron_widget_newsletter .nm_mc_button input[type="submit"]:hover,
#footer .iron_widget_newsletter input[type="submit"]:hover,
#footer .nm_mc_form input[type="submit"]:hover,
.iron_widget_newsletter input[type="submit"],
.nm_mc_form input[type="submit"],
.event-more-button,
.nav-menu li:hover > a,
ul.nav-menu li.menu-item ul.sub-menu li:hover > a,
ul.nav-menu ul a:hover,
.nav-menu ul ul a:hover,
.nav-menu .has-drop-down ul a:hover,
.nav-menu li a.backbtn:hover,
.wpb_content_element a,
#sidebar .textwidget a,
.footer__widgets ul a,
.wooprice ins,
.woocommerce ul.products li.product .price,
.woocommerce-page ul.products li.product .price,
.woocommerce div.product span.price,
.woocommerce div.product p.price,
.woocommerce #content div.product span.price,
.woocommerce #content div.product p.price,
.woocommerce-page div.product span.price,
.woocommerce-page div.product p.price,
.woocommerce-page #content div.product span.price,
.woocommerce-page #content div.product p.price,
.wooprice,
.woocommerce .star-rating,
.woocommerce-page .star-rating,
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce #content nav.woocommerce-pagination ul li a,
.woocommerce #content nav.woocommerce-pagination ul li span,
.woocommerce-page nav.woocommerce-pagination ul li a,
.woocommerce-page nav.woocommerce-pagination ul li span,
.woocommerce-page #content nav.woocommerce-pagination ul li a,
.woocommerce-page #content nav.woocommerce-pagination ul li span,
.woocommerce table.cart a.remove,
.woocommerce #content table.cart a.remove,
.woocommerce-page table.cart a.remove,
.woocommerce-page #content table.cart a.remove,
.woocommerce .woocommerce-product-rating .star-rating,
.woocommerce-page .woocommerce-product-rating .star-rating,
.woo-thanks,
.infobox-icon,
a.back-btn,
.playlist_enabled .player-box .jp-playlist ul li .button,
.button.add_to_cart_button.product_type_simple,
.post-password-form input[type="submit"],
li:hover > .has-drop-down-a .sub-arrow i,
.social-networks a i:hover,
.side-menu .social-networks a i:hover,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce #respond input#submit,
.woocommerce #content input.button,
.woocommerce-page a.button,
.woocommerce-page button.button,
.woocommerce-page input.button,
.woocommerce-page #respond input#submit,
.woocommerce-page #content input.button,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,
.woocommerce #respond input#submit.alt,
.woocommerce #content input.button.alt,
.woocommerce-page a.button.alt,
.woocommerce-page button.button.alt,
.woocommerce-page input.button.alt,
.woocommerce-page #respond input#submit.alt,
.woocommerce-page #content input.button.alt,
.shipping-calculator-button,
.articles-classic .text-box a:hover h2,
.articles-classic a.readmore-classic:hover,
article a.more-link:hover,
#commentform .form-submit #submit,
.stickypost i,
.simple-post-txt-wrap a:hover h2,
.portfolio .portfolio-prev:hover .prev-text,
.portfolio .portfolio-next:hover .next-text,
.portfolio .portfolio-prev:hover i.fa-long-arrow-left,
.portfolio .portfolio-next:hover i.fa-long-arrow-right,
.portfolio .portfolio-mid-wrap i.fa-th:hover,
.player-title-box .track-name,
.audio-holder .jp-playlist ul.tracks-list li.jp-playlist-current div a, .articles-classic .post-categories a:hover, .articles-classic .post-tags a:hover,
.sr_it-videolist-list article:hover i, .sr_it-videolist-list article:hover .sr_it-videolist-item-artist, .sr_it-videolist-list article:hover .sr_it-videolist-item-date, .sr_it-videolist-list article:hover .sr_it-videolist-item-title';

$iron_styles->setColor($featured_color, 'featured_color');


$featured_background = '
.panel-action:hover,
.album-overlay,
.pages .current,
.media-block a:hover,
.pages a:hover,
a.button-more:hover,
.type-album .tracks-block .player-box,
.iron_widget_newsletter,
.iron_widget_newsletter input[type="email"],
.nm_mc_form input[type="text"],
#footer .newsletter-wrap,
.concerts-list .title-row:hover .buttons .button,
.album-overlay,
.carousel .btn-prev:hover,
.carousel .btn-next:hover,
.carousel .slide a:hover,
.concert-box .hover-box,
.article a:hover,
.pages .current,
.pages a:hover,
.button-more:hover,
a.button,
.comment-form #submit,
.wpcf7-submit,
.filters-block a.active,
.form input[type="submit"],
.concerts-list .title-row .time,
.concerts-list .title-row.has_countdown:hover .buttons,
.concerts-list .expanded .title-row .button,
.concerts-list .expanded .title-row:after,
.iron_widget_newsletter input[type="submit"]:focus,
.iron_widget_newsletter input[type="submit"]:hover,
.select-options .item-selected a,
.concerts-list .expanded .title-row .opener:hover:after,
.concerts-list .title-row .button,
.media-decoration.media-audio,
.tracks-list .btn-play [class^="icon-"],
.tracks-list .btn-play [class*=" icon-"],
.tracks-list .btn-pause [class^="icon-"],
.tracks-list .btn-pause [class*=" icon-"],
.player-box a:hover [class^="icon-"],
.player-box a:hover [class*=" icon-"],
.social-networks a:hover [class^="icon-"],
.social-networks a:hover [class*=" icon-"],
.carousel .video-box .icon-play,
.search-form input[type="submit"],
.news-grid-wrap a:hover,
.iron_widget_videos .video-list article a:hover,
a.back-btn:hover,
.photo-wrap:hover .tab-text,
.videogrid:hover .text-box,
.page-template-archive-video .media-block:hover .text-box,
.playlist_enabled .player-box .jp-playlist ul li .button:hover,
.button.add_to_cart_button.product_type_simple:hover,
.post-password-form input[type="submit"]:hover,
.title-row.no-countdown:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce #respond input#submit:hover,
.woocommerce #content input.button:hover,
.woocommerce-page a.button:hover,
.woocommerce-page button.button:hover,
.woocommerce-page input.button:hover,
.woocommerce-page #respond input#submit:hover,
.woocommerce-page #content input.button:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce #content input.button.alt:hover,
.woocommerce-page a.button.alt:hover,
.woocommerce-page button.button.alt:hover,
.woocommerce-page input.button.alt:hover,
.woocommerce-page #respond input#submit.alt:hover,
.woocommerce-page #content input.button.alt:hover,
.woocommerce table.cart a.remove:hover,
.woocommerce #content table.cart a.remove:hover,
.woocommerce-page table.cart a.remove:hover,
.woocommerce-page #content table.cart a.remove:hover,
.shipping-calculator-button:hover,
.woocommerce #content nav.woocommerce-pagination ul li a:focus,
.woocommerce #content nav.woocommerce-pagination ul li a:hover,
.woocommerce #content nav.woocommerce-pagination ul li span.current,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,
.woocommerce-page #content nav.woocommerce-pagination ul li span.current,
.woocommerce-page nav.woocommerce-pagination ul li a:focus,
.woocommerce-page nav.woocommerce-pagination ul li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li span.current,
.playlist_enabled .player-box .jp-playlist ul li:hover,
.woocommerce-message .button.wc-forward:hover,
#commentform .form-submit #submit:hover,
.news-grid-wrap a.sticky,
.news-grid-wrap.isotope-item a.sticky,
ins,.mc4wp-form input[type=submit],
.woocommerce span.onsale,
.woocommerce-page span.onsale';

$iron_styles->setBackgroundColor($featured_background, 'featured_color');

$featured_border = '
.tab-circle,a.button-more,
.tab-circle,
input.error,
.event-more-button,
.woocommerce .woocommerce-info,
.woocommerce-page .woocommerce-info,
.woocommerce .woocommerce-message,
.woocommerce-page .woocommerce-message,
.chosen-container-active .chosen-single,
a.back-btn,
.playlist_enabled .player-box .jp-playlist ul li .button,
.button.add_to_cart_button.product_type_simple,
.post-password-form input[type="submit"],
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce #respond input#submit,
.woocommerce #content input.button,
.woocommerce-page a.button,
.woocommerce-page button.button,
.woocommerce-page input.button,
.woocommerce-page #respond input#submit,
.woocommerce-page #content input.button,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,
.woocommerce #respond input#submit.alt,
.woocommerce #content input.button.alt,
.woocommerce-page a.button.alt,
.woocommerce-page button.button.alt,
.woocommerce-page input.button.alt,
.woocommerce-page #respond input#submit.alt,
.woocommerce-page #content input.button.alt
.shipping-calculator-button,
.articles-classic a.readmore-classic:hover,
article a.more-link:hover,
#commentform .form-submit #submit,
.page-template-archive-posts-classic-php .media-block.sticky  .holder,
.portfolio .portfolio-rightside a.portfolio-button,
.sr_it-videolist-list article:hover i';

$iron_styles->setBorderColor($featured_border, 'featured_color');



// PRIMARY COLOR LIGHT
/*
$primary_background_light = '
.footer__widgets > .iron_widget_newsletter input[type="submit"],
.carousel .btn-prev,
.carousel .btn-next,
.panel .opener,
.blockquote-box figcaption:before,
.concerts-list .title-row .time,
.form input[type="text"],
.form input[type="email"],
.form input[type="password"],
.form textarea,
.comment-form input,
.comment-form textarea,
.select-options,
.jp-no-solution,
.type1 .nav-menu li:hover > a,.type3 .nav-menu li:hover > a,
.nm_mc_form .nm_mc_button:hover,
.comment-text,
#footer .iron_widget_newsletter .nm_mc_button:hover';

$iron_styles->setBackgroundColor($primary_background_light, 'primary_color_light');


$primary_border_light = '
#footer .iron_widget_newsletter input[type="email"],
#footer .nm_mc_form input[type="text"],
#footer .iron_widget_newsletter input[type="submit"],
#footer .nm_mc_form input[type="submit"],
.concerts-list .title-row:hover .buttons .button,
.vc_span4 .concerts-list .title-row .sr_it-datetime,
.vc_span3 .concerts-list .title-row .sr_it-datetime,
.vc_span2 .concerts-list .title-row .sr_it-datetime,
#sidebar .concerts-list .title-row .sr_it-datetime,
.footer__widgets .panel__heading,
.footer__widgets > .iron_widget_newsletter .control-append,
.concerts-list .title-row .sr_it-datetime,
.event-row .sr_it-datetime,
.pages.full li a,
.pages.full li span,
.comment-reply-title small a,
#footer .widget-area label.control-label,
.page-numbers.dots';

$iron_styles->setBorderColor($primary_border_light, 'primary_color_light');

*/

// PRIMARY COLOR DARK
$woo_backgrounds = (bool)$iron_styles->get_option('woo_backgrounds');

if($woo_backgrounds){
	$primary_background_dark = '
	.media-block a,
	.blockquote-block,
	.event-row,
	.type-album .text-box,
	.tracks-list > li,
	.panel-action,
	.iron_widget_twitter .panel__body,
	.iron_widget_twitter .panel-action,
	.iron_widget_radio .panel__body,
	.photo-wrap .photo-album-tab,
	.news-grid-wrap a,
	.container .iron_widget_newsletter,
	.container .newsletter-wrap,
	.videogrid,
	.iron_widget_videos .video-list article a,
	blockquote,
	.woocommerce nav.woocommerce-pagination ul li a,
	.woocommerce nav.woocommerce-pagination ul li span,
	.woocommerce #content nav.woocommerce-pagination ul li a,
	.woocommerce #content nav.woocommerce-pagination ul li span,
	.woocommerce-page nav.woocommerce-pagination ul li a,
	.woocommerce-page nav.woocommerce-pagination ul li span,
	.woocommerce-page #content nav.woocommerce-pagination ul li a,
	.woocommerce-page #content nav.woocommerce-pagination ul li span,
	.woocommerce .woocommerce-message,
	.woocommerce .woocommerce-error,
	.woocommerce .woocommerce-info,
	.woocommerce-page .woocommerce-message,
	.woocommerce-page .woocommerce-error,
	.woocommerce-page .woocommerce-info,
	.woocommerce ul.products li.product,
	.woocommerce-page ul.products li.product,
	.woocommerce div.product div.summary,
	.woocommerce #content div.product div.summary,
	.woocommerce-page div.product div.summary,
	.woocommerce-page #content div.product div.summary,
	.woocommerce div.product .woocommerce-tabs .panel,
	.woocommerce #content div.product .woocommerce-tabs .panel,
	.woocommerce-page div.product .woocommerce-tabs .panel,
	.woocommerce-page #content div.product .woocommerce-tabs .panel,
	.woocontent.cart,
	form.checkout,
	.woocommerce-account .woocommerce,
	.cart-empty,
	.woocommerce-checkout .woocommerce,
	.track_order,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
	.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
	.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,
	.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
	.description_tab,
	.reviews_tab,
	.articles-classic .media-block .holder,
	.pages a';
} else {
	$primary_background_dark = '
	.media-block a,
	.event-row,
	.type-album .text-box,
	.tracks-list > li,
	.panel-action,
	.iron_widget_twitter .panel__body,
	.iron_widget_twitter .panel-action,
	.iron_widget_radio .panel__body,
	.photo-wrap .photo-album-tab,
	.news-grid-wrap a,
	.container .iron_widget_newsletter,
	.container .newsletter-wrap,
	.videogrid,
	.iron_widget_videos .video-list article a,
	.articles-classic .media-block .holder,
	.pages a';
}

$iron_styles->setBackgroundColor($primary_background_dark, 'primary_color_dark');



// SECONDARY COLOR LIGHT

$secondary_background_light = '
#sidebar .panel-action:hover,
.iron_widget_newsletter .newsletter-wrap nm_mc_button,
.iron_widget_newsletter input[type="submit"]:hover,
a.button:hover,
.wpb_accordion_section a,
.ui-tabs-anchor';


$iron_styles->setBackgroundColor($secondary_background_light, 'secondary_color_light');


// SECONDARY COLOR LIGHT

$secondary_border_light = '
.comment-respond,
.container .iron_widget_newsletter input[type="email"],
.container .nm_mc_form input[type="text"],
.container .iron_widget_newsletter input[type="submit"],
.container .nm_mc_form input[type="submit"],
.post-password-form input[type="password"],
.wpb_tabs_nav';


$iron_styles->setBorderColor($secondary_border_light, 'secondary_color_light');



// SECONDARY COLOR DARK

$secondary_background_dark = '.footer-block.share';

$iron_styles->setBackgroundColor($secondary_background_dark, 'secondary_color_dark');



// TEXT COLOR LIGHT

$text_color_light = '
.iron_widget_newsletter input[type="email"],
.nm_mc_form input[type="text"],
.nm_mc_form label,
#footer .iron_widget_newsletter input[type="submit"],
#footer .nm_mc_form input[type="submit"],
.countdown-section,
.countdown-amount,
.countdown-period,
.footer-block .social-networks a,
.footer__widgets,
.footer-row,
.footer__widgets > .iron_widget_newsletter .control-label,
.footer__widgets > .iron_widget_newsletter .form-control,
.footer-row ul,
.footer-row ul a,
.concerts-list .title-row .open-link,
.concerts-list .title-row .button:hover,
.panel__heading,
.panel__footer,
.title-box,
.title-box h2,
.carousel .btn-prev:hover,
.carousel .btn-next:hover,
.media-decoration.media-audio,
#header,
.iosSlider .slider .item .inner .text1 span,
.iosSlider .slider .item .inner .text2 span,
a.button:hover,
.concerts-list,
.title-row:hover .icon-concert-dropdown,
.concerts-list .title-row:hover .button:hover,
.concerts-list .expanded .title-row .button:hover,
.concerts-list .title-row .opener,
.album-listen,
.circle,
.tracks-list,
.tracks-list .button,
.tracks-list .btn-play,
.tracks-list .btn-pause,
.gallery-caption,
.pages .current,
.pages a:hover,
a.button-more:hover,
.pages .current,
.form input[type="submit"]:hover,
.comment-form #submit,
.wpcf7-submit,
.comment-form #submit:hover,
.wpcf7-submit:hover,
.concert-box .time,
.video-box .hover-box,
.video-box h2,
.video-box .icon-play,
.pages .current,
.pages a:hover,
.button-more:hover,
.concerts-list .title-row.has_countdown:hover .button:hover,
.concerts-list .title-row.has_countdown:hover .buttons .button,
.iron_widget_newsletter .form-status,
.concerts-list .title-row .button,
.footer__widgets .iron_widget_radio .info-box,
#footer .tweet_text,
#footer .nm_mc_error
#footer .textwidget,
#footer .newsletter-title-wrap h3,
#footer .newsletter-description-wrap,
#footer .newsletter-description-wrap p,
a.button,
play-button,
.darker-overlay h1,
.darker-overlay h2,
.darker-overlay h3,
.darker-overlay h4,
.darker-overlay h5,
.darker-overlay h6,
#footer .wp-calendar,
#footer p,
#footer ul,
#footer li,
#footer dl,
#footer dt,
#footer dd,
#footer ol,
#footer pre,
#footer tr,
#footer td,
#footer th,
#sidebar .button.wc-forward,
.post-password-form input[type="password"],
#footer .iron_widget_newsletter .newsletter-wrap .control-description,
#footer .iron_widget_newsletter .nm_mc_button:hover';

$iron_styles->setColor($text_color_light, 'text_color_light');

$text_color_dark = '
body,
.video-post,
.sr_it-single-post h2,
.concerts-list .title-row .sr_it-datetime,
.event-row .sr_it-datetime,
.type-album .text-box h2,
.tab-title,
.tab-title .excerpt,
.tracks-list .name,
.comment-reply-title,
h2.widgettitle,
#sidebar .panel__heading,
#sidebar .panel__heading h3,
.media-block .sr_it-datetime,
.media-block .meta-simple,
.media-block .category,
.form input[type="submit"],
.concerts-list .title-row .time,
.concerts-list .expanded .title-row .button,
.post_grid .tab-text time.sr_it-datetime,
h1,
h3.widgettitle,
.excerpt p,
.tweet_text,
.content-box,
.available-now,
.release-date,
.container .nm_mc_form input[type="text"],
.container .nm_mc_form label,
.container .nm_mc_error,
#sidebar .nm_mc_error,
.event-row .button,
.media-block h2,
.tracks-list > li:before,
.tab-date,
.videogrid .text-box h2,
.control-description,
.wpb_content_element,
.photo-wrap:hover .tab-circle,
.lighter-overlay h1,
.lighter-overlay h2,
.lighter-overlay h3,
.lighter-overlay h4,
.lighter-overlay h5,
.lighter-overlay h6,
.news-grid-wrap a:hover time,
.news-grid-wrap a:hover .sr_it-meta-author-link,
.news-grid-tab .sr_it-datetime,
.news-grid-tab .sr_it-meta-author-link,
.news-grid-tab .post-categories,
.news-grid-tab .post-tags,
.news-grid-wrap a:hover .post-categories,
.news-grid-wrap a:hover .post-tags,
#sidebar .textwidget,
ul,
li,
dl,
dt,
dd,
ol,
pre,
tr,
td,
th,
.wooprice del,
.woocommerce .woocommerce-message,
.woocommerce .woocommerce-error,
.woocommerce .woocommerce-info,
.woocommerce-page .woocommerce-message,
.woocommerce-page .woocommerce-error,
.woocommerce-page .woocommerce-info,
.description_tab,
.reviews_tab,
h3,
.news-grid-wrap a.sticky,
.news-grid-wrap.isotope-item a.sticky,
.portfolio-sidetitle,
.portfolio-sidelist,
.portfolio .portfolio-prev .prev-text,
.portfolio .portfolio-next .next-text,
.portfolio .portfolio-prev i.fa-long-arrow-left,
.portfolio .portfolio-next i.fa-long-arrow-right,
.portfolio .portfolio-mid-wrap i.fa-th,
.panel-action:hover,
.sr_it-videolist-list i, .sr_it-videolist-item-title, .sr_it-videolist-item-artist, .sr_it-videolist-item-date';

$iron_styles->setBorderColor('.photo-wrap:hover .tab-circle, .comment-list > li:after, .comment-list .children > li:before, .comment-reply-title, .woocommerce-page.single-product div.product .woocommerce-Tabs-panel--additional_information.panel, .single-product table.shop_attributes, .woocommerce-page #reviews #comments ol.commentlist li .comment-text, .sr_it-videolist-list li, .sr_it-videolist-list i', 'text_color_dark');

$iron_styles->setColor($text_color_dark, 'text_color_dark');

$iron_styles->setBackground('
.side-menu,
.nav-menu .sub-menu,
.nav-menu .children', 'menu_background', true);


$iron_styles->setBackgroundColor('ul.header-top-menu', 'header_top_menu_background');
$iron_styles->set('.fill-menuicon','fill','menu_open_icon_color');
$iron_styles->setBackgroundColor('.menu-toggle.toggled span.svgfill','menu_close_icon_color');
$iron_styles->setFont('ul.header-top-menu li a', 'header_top_menu_typography');


$iron_styles->setColor('.responsive-header a.sandwich-icon', 'classic_mobile_icon_color');
$iron_styles->setColor('.responsive-header a.sandwich-icon:hover', 'classic_mobile_icon_hover_color');
$menutypography = $iron_styles->get_option('menu_typography');
if(!empty($menutypography["color"])) {
	$iron_styles->useOptions(false);
	$iron_styles->setColor('.sub-arrow i, .side-menu .social-networks a i', $menutypography["color"]);
	$iron_styles->useOptions(true);
}


$iron_styles->setFont('body, .entry p, .single-product th, .single-product td, .single-product tr, .comment-text', 'body_typography', true);
$iron_styles->setFont('.nav-menu li a', 'menu_typography', true);
$iron_styles->setFont('h1', 'h1_typography', true);
$iron_styles->setFont('h2, .sr_it-single-post h2, .text-box h2, .video-box h2, .title-box h2, .type-album .text-box h2', 'h2_typography', true);
$iron_styles->setFont('h3, h3.widgettitle, .sr_it-playlist-title', 'h3_typography', true);
$iron_styles->setFont('h4', 'h4_typography', true);
$iron_styles->setFont('h5', 'h5_typography', true);
$iron_styles->setFont('h6', 'h6_typography', true);
$iron_styles->setFont('.news .media-block h2, .iron_widget_recent_posts .news .media-block h2, .videogrid .text-box h2, .news-grid-tab, .news-grid-tab h2, .news-grid-tab .tab-title, .articles-classic .text-box h2', 'archive_post_titles', true);
$iron_styles->setFont('a.panel-action.panel-action__label', 'call_to_action_typography', true);
$iron_styles->setFont('a.button-widget', 'button_widget_typography', true);

/* Headers */
$iron_styles->set('h1', 'letter-spacing', 'h1_spacing');
$iron_styles->set('h2', 'letter-spacing', 'h2_spacing');
$iron_styles->set('h3', 'letter-spacing', 'h3_spacing');
$iron_styles->set('h4', 'letter-spacing', 'h4_spacing');
$iron_styles->set('h5', 'letter-spacing', 'h5_spacing');
$iron_styles->set('h6', 'letter-spacing', 'h6_spacing');
$iron_styles->set('a.panel-action.panel-action__label', 'letter-spacing', 'cta_spacing');
$iron_styles->set('a.button-widget', 'letter-spacing', 'button_widget_spacing');

$iron_styles->useOptions(false);

$h1_options = $iron_styles->get_option('h1_typography');
$iron_styles->setBackgroundColor('span.heading-t, span.heading-b', $h1_options["color"]);

$h3_options = $iron_styles->get_option('h3_typography');
$iron_styles->setBackgroundColor('span.heading-t3, span.heading-b3', $h3_options["color"]);

$dark_text = $iron_styles->get_option('text_color_dark');
$iron_styles->setBackgroundColor('.lighter-overlay span.heading-t, .lighter-overlay span.heading-b', $dark_text);
$iron_styles->setBackgroundColor('.lighter-overlay span.heading-t3, .lighter-overlay span.heading-b3', $dark_text);

$light_text = $iron_styles->get_option('text_color_light');
$iron_styles->setBackgroundColor('.darker-overlay span.heading-t, .darker-overlay span.heading-b', $light_text);
$iron_styles->setBackgroundColor('.darker-overlay span.heading-t3, .darker-overlay span.heading-b3', $light_text);


$h4_options = $iron_styles->get_option('h4_typography');
if(!empty($h4_options["color"])) {
	$iron_styles->setBorderColor('h4', $h4_options["color"]);
}


$menu_margin = $iron_styles->get_option('menu_margin');

if(!empty($menu_margin)) {
	$menu_margin = str_replace('px', '', $menu_margin).'px';
	$iron_styles->set('.nav-menu li a', 'margin-top', $menu_margin);
	$iron_styles->set('.nav-menu li a', 'margin-bottom', $menu_margin);
}

if(!empty($h1_options["align"])) {

	$align = $h1_options["align"];
	if($align == 'left') {
		$iron_styles->set('span.heading-t, span.heading-b', 'margin-left', '0px');
	}else if($align == 'right') {
		$iron_styles->set('span.heading-t, span.heading-b', 'margin-right', '0px');
		$iron_styles->set('span.heading-t, span.heading-b', 'margin-left', 'auto');
    }
}

if(!empty($h3_options["align"])) {

	$align = $h3_options["align"];
	if($align == 'left') {
		$iron_styles->set('span.heading-t3, span.heading-b3', 'margin-left', '0px');
	}else if($align == 'right') {
		$iron_styles->set('span.heading-t3, span.heading-b3', 'margin-right', '0px');
		$iron_styles->set('span.heading-t3, span.heading-b3', 'margin-left', 'auto');
    }
}

$iron_styles->useOptions(true);

//Single-album
$iron_styles->useOptions(false);
$body_background = $iron_styles->get_option('body_background');
$iron_styles->setBackgroundColor('.single-album .sr_it-single-post.featured, .single-album #sidebar', $body_background["color"]);
//$iron_styles->setBackgroundColor('.single-album .sr_it-single-post.featured, .single-album .content-box, .single-album #sidebar, .sr_it-singlealbum-content-wrapper', $body_background["color"]);
$iron_styles->useOptions(true);


// Logo
$iron_styles->set('.logo-desktop, .classic-menu .logo img','height', 'menu_logo_height');

// Classic Menu

$iron_styles->useOptions(false);
$classic_menu_hmargin = $iron_styles->get_option('classic_menu_hmargin');
$iron_styles->set('.classic-menu', 'width', 'calc( 100% - '.$classic_menu_hmargin.' - '.$classic_menu_hmargin.' )');
$iron_styles->useOptions(true);

$classic_menu_width = $iron_styles->get_option('classic_menu_width');

$iron_styles->set('.classic-menu', 'margin-left', 'classic_menu_hmargin');
$iron_styles->set('.classic-menu', 'margin-right', 'classic_menu_hmargin');
$iron_styles->set('.classic-menu', 'margin-top', 'classic_menu_top_margin');
$iron_styles->set('.classic-menu', 'margin-bottom', 'classic_menu_bottom_margin');


if($classic_menu_width == 'fullwidth' ) {
	$selector = '.classic-menu';
}else{
	$selector = '.classic-menu > ul';
}

$iron_styles->set($selector, 'padding-left', 'classic_menu_hpadding');
$iron_styles->set($selector, 'padding-right', 'classic_menu_hpadding');
$iron_styles->set($selector, 'padding-top', 'classic_menu_vpadding');
$iron_styles->set($selector, 'padding-bottom', 'classic_menu_vpadding');


$iron_styles->set('.classic-menu > ul > li', 'margin-left', 'classic_menu_item_hmargin');
$iron_styles->set('.classic-menu > ul > li', 'margin-right', 'classic_menu_item_hmargin');
$iron_styles->set('.classic-menu > ul > li', 'margin-top', 'classic_menu_item_vmargin');
$iron_styles->set('.classic-menu > ul > li', 'margin-bottom', 'classic_menu_item_vmargin');

$iron_styles->set('.classic-menu > ul > li a', 'padding-left', 'classic_menu_item_hpadding');
$iron_styles->set('.classic-menu > ul > li a', 'padding-right', 'classic_menu_item_hpadding');
$iron_styles->set('.classic-menu > ul > li a', 'padding-top', 'classic_menu_item_vpadding');
$iron_styles->set('.classic-menu > ul > li a', 'padding-bottom', 'classic_menu_item_vpadding');


$iron_styles->set('.classic-menu .logo', 'padding-left', 'classic_menu_logo_padding_left');
$iron_styles->set('.classic-menu .logo', 'padding-top', 'classic_menu_logo_padding_top');
$iron_styles->set('.classic-menu .logo', 'padding-right', 'classic_menu_logo_padding_right');
$iron_styles->set('.classic-menu .logo', 'padding-bottom', 'classic_menu_logo_padding_bottom');

$iron_styles->setBackgroundColor('.responsive-header', 'classic_menu_background_mobile');


// News title font color on hover

$iron_styles->setColor('.listing-section .holder:hover h2, .listing-section .media-block .holder:hover .meta-simple, .listing-section .media-block .holder:hover .sr_it-datetime', 'news_hover_color');
$iron_styles->setColor('.news-grid-wrap a:hover .tab-title', 'news_hover_color');
//.news-grid-wrap a:hover
// change text color on hover for the news 1 column
//$iron_styles->setColor('.listing-section .holder:hover h2', 'featured_color');

$iron_styles->setBackgroundColor('.classic-menu', 'classic_menu_background');
$iron_styles->setBackgroundColor('.classic-menu > ul', 'classic_menu_inner_background');

// Menu Bg Mini
$iron_styles->setBackgroundColor('.classic-menu.mini', 'classic_menu_background_mini');

// Item Typo
$iron_styles->setFont('.classic-menu > ul > li a, .classic-menu > ul > li.languages-selector > ul > li a', 'classic_menu_typography');

// Sub Item Typo
$iron_styles->setFont('.classic-menu > ul > li > ul > li a', 'classic_sub_menu_typography');

// Item Hover
$iron_styles->setBackgroundColor('.classic-menu > ul > li a:hover, .classic-menu > ul > li.languages-selector > ul > li a:hover', 'classic_menu_hover_bg_color');
$iron_styles->setColor('.classic-menu > ul > li a:hover, .classic-menu > ul > li.languages-selector > ul > li a:hover', 'classic_menu_hover_text_color');

// Fix Anchor on same page - Item Active
$iron_styles->setFont('.classic-menu > ul > li.current-menu-item > a[href*="#"]', 'classic_menu_typography');

// Fix Anchor on same page - Item Hover
$iron_styles->setBackgroundColor('.classic-menu > ul > li.current-menu-item > a[href*="#"]:hover', 'classic_menu_hover_bg_color');
$iron_styles->setColor('.classic-menu > ul > li.current-menu-item > a[href*="#"]:hover', 'classic_menu_hover_text_color');

// Item Active
$iron_styles->setBackgroundColor('.classic-menu > ul > li.current-menu-item > a', 'classic_menu_active_bg_color');
$iron_styles->setColor('.classic-menu > ul > li.current-menu-item > a', 'classic_menu_active_text_color');

// Item Active
$iron_styles->setBackgroundColor('.classic-menu > ul > li.current-menu-ancestor > a', 'classic_menu_active_bg_color');
$iron_styles->setColor('.classic-menu > ul > li.current-menu-ancestor > a', 'classic_menu_active_text_color');

// Sub Item Hover
$iron_styles->setBackgroundColor('.classic-menu > ul > li > ul > li a:hover', 'classic_sub_menu_hover_bg_color');
$iron_styles->setColor('.classic-menu > ul > li > ul > li a:hover', 'classic_sub_menu_hover_text_color');

// Sub Item Active
$iron_styles->setBackgroundColor('.classic-menu > ul > li > ul > li.current-menu-item > a', 'classic_sub_menu_active_bg_color');
$iron_styles->setColor('.classic-menu > ul > li > ul > li.current-menu-item > a', 'classic_sub_menu_active_text_color');

$iron_styles->set('.classic-menu > ul > li > a, .classic-menu > ul > li.languages-selector a', 'letter-spacing', 'classic_menu_letter_spacing');
$iron_styles->set('.classic-menu ul.sub-menu li a', 'letter-spacing', 'classic_menu_letter_spacing');
$iron_styles->set('.menu-item a:hover', 'text-decoration', 'menu_item_hover_effect');


$container_type = $iron_styles->get_option('container_type');

if ( $container_type == 'container_boxed') {

	$iron_styles->setBackgroundColor('.container', 'container_background');
	$iron_styles->set('.sr_it-nav', 'max-width', 'container_width');
	echo "@media screen and (min-width: 1480px){
		.sr_it-grid.column-3{ width:" . Iron_sonaar::getOption('container_width', null)  . ";}

	}";
}



$iron_styles->set('.container', 'max-width', 'container_width');



/* Demo Color Overrides */
$featuredcolor_txtcolor_override = '.color1_txt, .color1_txt p';
$featuredcolor_bgcolor_override = '.color1_bg';
$iron_styles->setColor($featuredcolor_txtcolor_override, 'featured_color');
$iron_styles->setBackgroundColor($featuredcolor_bgcolor_override, 'featured_color');

$primarycolor1_txtcolor_override = '.color2_txt, .color2_txt p';
$primarycolor1_bgcolor_override = '.color2_bg';
/*
$iron_styles->setColor($primarycolor1_txtcolor_override, 'primary_color_light');
$iron_styles->setBackgroundColor($primarycolor1_bgcolor_override, 'primary_color_light');
*/
$primarycolor2_txtcolor_override = '.color3_txt, .color3_txt p';
$primarycolor2_bgcolor_override = '.color3_bg';
$iron_styles->setColor($primarycolor2_txtcolor_override, 'primary_color_dark');
$iron_styles->setBackgroundColor($primarycolor2_bgcolor_override, 'primary_color_dark');

$secondarycolor1_txtcolor_override = '.color4_txt, .color4_txt p';
$secondarycolor1_bgcolor_override = '.color4_bg';
$iron_styles->setColor($secondarycolor1_txtcolor_override, 'secondary_color_light');
$iron_styles->setBackgroundColor($secondarycolor1_bgcolor_override, 'secondary_color_light');

$text_color_light_txtcolor_override = '.color5_txt';
$text_color_light_bgcolor_override = '.color5_bg';
$iron_styles->setColor($text_color_light_txtcolor_override, 'text_color_light');
$iron_styles->setBackgroundColor($text_color_light_bgcolor_override, 'text_color_light');

$text_color_dark_txtcolor_override = '.color6_txt';
$text_color_dark_bgcolor_override = '.color6_bg';
$iron_styles->setColor($text_color_dark_txtcolor_override, 'text_color_dark');
$iron_styles->setBackgroundColor($text_color_dark_bgcolor_override, 'text_color_dark');

/* Footer Options */
$iron_styles->setBackgroundColor('#footer, .footer-row', 'footer_bg_color');
$iron_styles->set('.footer-row', 'padding-top', 'footer_padding');
$iron_styles->set('.footer-row', 'padding-bottom', 'footer_padding');

$global_custom_css = $iron_styles->get_option('custom_css');
$iron_styles->setCustomCss($global_custom_css);

$iron_hamburger_color = Iron_sonaar::getOption('menu_open_icon_color', null, '#000000');
$iron_styles->useOptions(false);
$iron_styles->setBackgroundColor('.menu-toggle span', $iron_hamburger_color);
$iron_styles->useOptions(true);


$iron_styles->render();

echo 'ul.header-top-menu li a{color:' . $iron_hamburger_color . ';}';
echo '.menu-toggle-off polygon{
	fill:' . Iron_sonaar::getOption('menu_close_icon_color', null, '#ffffff') . ';
}';








/* New Event Styles */
$iron_music_event_style->setFont('.event-line-node', 'events_item_typography', true);
$iron_music_event_style->setBackgroundColor('.event-line-wrap', 'events_item_bg_color');
$iron_music_event_style->setColor('.event-line-wrap .artists', 'events_item_bg_color');
$iron_music_event_style->setBackgroundColor('.event-line-wrap .artists', $iron_music_event_style->get_option('events_item_typography', 'color') );
$iron_music_event_style->setFont('.countdown-block', 'events_countdown_typography', true);
$iron_music_event_style->set('.countdown-block', 'letter-spacing', 'events_countdown_letterspacing');
$iron_music_event_style->setBackgroundColor('.event-line-wrap .event-line-countdown-wrap', 'events_countdown_bg_color');
$iron_music_event_style->set('.event-line-wrap', 'padding-top', 'events_items_padding');
$iron_music_event_style->set('.event-line-wrap', 'padding-bottom', 'events_items_padding');
$iron_music_event_style->set('ul.concerts-list', 'border-top-color', 'events_outline_colors');
$iron_music_event_style->set('ul.concerts-list li', 'border-bottom-color', 'events_outline_colors');
$iron_music_event_style->set('.events-bar', 'border-top-color', 'events_outline_colors');
$iron_music_event_style->set('span.events-bar-artists select', 'border-color', 'events_filter_outline_color');
$iron_music_event_style->setBackgroundColor('.events-bar, .events-bar select', 'events_filter_bg_color');
$iron_music_event_style->setFont('span.events-bar-title, span.events-bar-artists select', 'events_filter_typography', true);
$iron_music_event_style->set('span.events-bar-title, span.events-bar-artists select', 'letter-spacing', 'events_filter_letterspacing');
$iron_music_event_style->set('span.events-bar-artists:after', 'border-top-color', 'events_filter_outline_color');
$iron_music_event_style->set('span.events-bar-artists:after', 'border-bottom-color', 'events_filter_outline_color');


$global_custom_css = $iron_music_event_style->get_option('custom_css');



$iron_music_event_style->setCustomCss($global_custom_css);



// Music Player Style
$iron_music_music_style->useOptions(true);
$sonaarOption = get_option('sonaar');
$iron_music_music_style->set('.iron-audioplayer  .playlist .audio-track path,.iron-audioplayer  .playlist .audio-track rect','fill', 'music_player_featured_color');
$iron_music_music_style->setColor('.iron-audioplayer  .playlist a', 'music_player_featured_color');
$iron_music_music_style->setColor('.iron-audioplayer .playlist .current .audio-track', 'music_player_featured_color', true);
$iron_music_music_style->useOptions(true);

$iron_music_music_style->setFont('.iron-audioplayer  .playlist .audio-track, .iron-audioplayer  .playlist .track-number, .iron-audioplayer .sr_it-playlist-title', 'music_player_playlist');
$iron_music_music_style->useOptions(false);
$iron_music_music_style->setColor('.iron-audioplayer  .playlist .audio-track, .iron-audioplayer  .playlist .track-number', '');
$iron_music_music_style->useOptions(true);

$iron_music_music_style->set('.artist_player .player .control .previous, .artist_player .player .control .next, .artist_player .player .control .play','fill', 'continuous_music_player_label_color');
$iron_music_music_style->setFont('.artist_player .playerNowPlaying .metadata', 'continuous_music_player_label');
//$iron_music_music_style->setColor('.artist_player .track-name', 'continuous_music_player_label_color', true);
$iron_music_music_style->setColor('.artist_player .album-title', 'continuous_music_player_label_color', true);
$iron_music_music_style->set('.iron-audioplayer .control rect, .iron-audioplayer .control path, .iron-audioplayer .control polygon','fill','music_player_icon_color');


$music_player_hover_playlist = '.iron-audioplayer .playlist :not([data-audiopath = ""])>.audio-track:hover';
$iron_music_music_style->setColor($music_player_hover_playlist, 'music_player_playlist_hover_color');


$music_player_playlist_active_text_color = '.iron-audioplayer .playlist li.current .audio-track';
$iron_music_music_style->setColor($music_player_playlist_active_text_color, 'music_player_playlist_active_text_color');


$global_custom_css = $iron_music_music_style->get_option('custom_css');
$iron_music_music_style->setCustomCss($global_custom_css);

$iron_music_music_style->setFont('#sonaar-player .playerNowPlaying .metadata, #sonaar-player .playlist .tracklist li', 'continuous_music_player_label');
//$iron_music_music_style->setColor('#sonaar-player .playerNowPlaying .track-name, #sonaar-player .playerNowPlaying .track-artist, #sonaar-player .playerNowPlaying .track-album', 'continuous_music_player_label_color', true);
$iron_music_music_style->setColor('#sonaar-player .album-title', 'continuous_music_player_label_color', true);
$iron_music_music_style->setBackgroundColor('#sonaar-player .player, #sonaar-player .store', 'continuous_music_player_background');
$iron_music_music_style->set('#sonaar-player .player', 'border-color', 'continuous_music_player_featured_color');
$iron_music_music_style->setBackgroundColor('#sonaar-player .close.btn-player', 'continuous_music_player_featured_color');
$iron_music_music_style->set('#sonaar-player .playlist h1', 'color', 'continuous_music_player_featured_color');
$iron_music_music_style->set('#sonaar-player .playlist button.play', 'background-color', 'continuous_music_player_featured_color');
$iron_music_music_style->setColor('#sonaar-player .playlist button.play', 'continuous_music_player_background');
$iron_music_music_style->setColor('#sonaar-player .playlist .tracklist li, #sonaar-player .playlist .tracklist li a, #sonaar-player .player .store .track-store li a', 'continuous_music_player_label_color');
$iron_music_music_style->setColor('#sonaar-player .playlist .tracklist li.active, #sonaar-player .playlist .tracklist li.active a', 'continuous_music_player_featured_color');

$iron_music_music_style->useOptions(false);
$backplayer =  get_ironMusic_option('continuous_music_player_background', '_iron_music_music_player_options' );

if ( strpos($backplayer, 'rgba') === 0 ) {
    $iron_music_music_style->set('#sonaar-player', 'background-color', $backplayer );
}else{
    $backplayer = substr($backplayer, ( strpos($backplayer, '(') + 1 ) , -1 );
    $iron_music_music_style->set('#sonaar-player', 'background-color', 'rgba(' . $backplayer . ', 0.90)');
}
$iron_music_music_style->useOptions(true);

$musicPlayerPlaylist = $iron_music_music_style->get_option('music_player_playlist');
if(!empty($musicPlayerPlaylist["color"])) {
	$iron_music_music_style->useOptions(false);
	$iron_music_music_style->setColor('.playlist .sr_it-playlist-title, .sr_it-playlist-artists, .sr_it-playlist-release-date', $musicPlayerPlaylist["color"]);
	$iron_music_music_style->useOptions(true);
}

$iron_music_music_style->set('#sonaar-player .control polygon, #sonaar-player .control path, #sonaar-player .control rect, #sonaar-player .control rect, #sonaar-player .control path, #sonaar-player .control polygon','fill','music_player_icon_color');
$iron_music_music_style->set('#sonaar-player .playlist .track-number svg path, #sonaar-player .playlist .track-number svg rect','fill','continuous_music_player_label_color');
$iron_music_music_style->set('#sonaar-player .control rect, #sonaar-player .control path, #sonaar-player .control polygon','fill','continuous_music_player_label_color');
$iron_music_music_style->set('#sonaar-player .close.btn-player rect','fill', 'continuous_music_player_background' );
$iron_music_music_style->set('#sonaar-player .close.btn-player.enable:after, #sonaar-player .close.btn-player.enable:before','border-color', 'continuous_music_player_background', true );


$iron_music_event_style->render();
echo "@media only screen and (min-width: 1024px){
.event-line-wrap:hover{ background:" . $iron_music_event_style->get_option('events_item_hover_bg_color')  . ";}
.event-line-wrap:hover .event-line-node{ color:" . $iron_music_event_style->get_option('events_item_hover_text_color') . ";}

}";
echo ".event-line-wrap .artists{ background-color:" . $iron_music_event_style->get_option('events_item_typography', 'color') . "}";

$iron_music_music_style->render();
echo "@media only screen and (max-width: 860px){
#sonaar-player{
    background-color: rgba(" . $backplayer . ", 1);
}
#sonaar-player .playlist h1{
    background:" . $iron_music_music_style->get_option('continuous_music_player_background') . "
}
}";

