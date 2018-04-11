<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Mankra Demo Site</title>
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='stylesheet' id='dashicons-css' href='http://zahod5277.bget.ru/wp-includes/css/dashicons.min.css?ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='admin-bar-css' href='http://zahod5277.bget.ru/wp-includes/css/admin-bar.min.css?ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='essential-grid-plugin-settings-css' href='http://zahod5277.bget.ru/wp-content/plugins/essential-grid/public/assets/css/settings.css?ver=2.2.4' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-poppins-css' href='http://fonts.googleapis.com/css?family=Poppins%3A300%2C700&#038;ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-montserrat-css' href='http://fonts.googleapis.com/css?family=Montserrat%3A400%2C500%2C600%2C700%2C800&#038;ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-fontello-css' href='http://zahod5277.bget.ru/wp-content/plugins/essential-grid/public/assets/font/fontello/css/fontello.css?ver=2.2.4' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css' href='http://zahod5277.bget.ru/wp-content/plugins/revslider/public/assets/css/settings.css?ver=5.4.7.1' type='text/css' media='all' />
    <link rel='stylesheet' id='iron-google-font-css' href='//fonts.googleapis.com/css?family=Josefin+Sans%3A400%2C600%2C700%7COpen+Sans%3A300%2C300italic%2C400%2C600%2C600italic%2C700&#038;subset=latin%2Clatin-ext&#038;ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css' href='http://zahod5277.bget.ru/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=5.4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='iron-classic-menu-css' href='http://zahod5277.bget.ru/wp-content/themes/sonaar/classic-menu/css/classic.css?ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='iron-master-css' href='http://zahod5277.bget.ru/wp-content/themes/sonaar/dist/css/main.min.css?ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='duplicate-post-css' href='http://zahod5277.bget.ru/wp-content/plugins/duplicate-post/duplicate-post.css?ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='iron-custom-styles-css' href='http://zahod5277.bget.ru/?load=custom-style.css&#038;ver=4.9.4' type='text/css' media='all' />
    {ignore}
    <style id='iron-custom-styles-inline-css' type='text/css'>
        #overlay .perspective {
            opacity: 1;
        }
        
        .menu-toggle span,
        .menu-toggle.toggled span {
            background-color: #ffffff;
        }
        
        .menu-toggle rect {
            fill: #ffffff;
        }
        
        ul.header-top-menu li a {
            color: #ffffff;
        }
        
        .menu-toggle-off polygon {
            fill: #ffffff;
        }
        
        #page-banner {
            height: 350px;
        }
        
        span.heading-b3 {
            margin-top: 30px;
            margin-bottom: 75px;
            background-color: #000000;
        }
    </style>
    {/ignore}
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/plugins/essential-grid/public/assets/js/jquery.esgbox.min.js?ver=2.2.4'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/plugins/essential-grid/public/assets/js/jquery.themepunch.tools.min.js?ver=2.2.4'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?ver=5.4.7.1'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/themes/sonaar/includes/sonaar-music/js/ironMusic.min.js?ver=4.9.4'></script>
    <link rel='https://api.w.org/' href='http://zahod5277.bget.ru/wp-json/' />
    <link rel="canonical" href="http://zahod5277.bget.ru/" />
    <link rel='shortlink' href='http://zahod5277.bget.ru/' />
    {ignore}
    <script type="text/javascript">
        var ajaxRevslider;

        jQuery(document).ready(function() {
            // CUSTOM AJAX CONTENT LOADING FUNCTION
            ajaxRevslider = function(obj) {

                // obj.type : Post Type
                // obj.id : ID of Content to Load
                // obj.aspectratio : The Aspect Ratio of the Container / Media
                // obj.selector : The Container Selector where the Content of Ajax will be injected. It is done via the Essential Grid on Return of Content

                var content = "";

                data = {};

                data.action = 'revslider_ajax_call_front';
                data.client_action = 'get_slider_html';
                data.token = '45181831e4';
                data.type = obj.type;
                data.id = obj.id;
                data.aspectratio = obj.aspectratio;

                // SYNC AJAX REQUEST
                jQuery.ajax({
                    type: "post",
                    url: "http://zahod5277.bget.ru/wp-admin/admin-ajax.php",
                    dataType: 'json',
                    data: data,
                    async: false,
                    success: function(ret, textStatus, XMLHttpRequest) {
                        if (ret.success == true)
                            content = ret.data;
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });

                // FIRST RETURN THE CONTENT WHEN IT IS LOADED !!
                return content;
            };

            // CUSTOM AJAX FUNCTION TO REMOVE THE SLIDER
            var ajaxRemoveRevslider = function(obj) {
                return jQuery(obj.selector + " .rev_slider").revkill();
            };

            // EXTEND THE AJAX CONTENT LOADING TYPES WITH TYPE AND FUNCTION
            var extendessential = setInterval(function() {
                if (jQuery.fn.tpessential != undefined) {
                    clearInterval(extendessential);
                    if (typeof(jQuery.fn.tpessential.defaults) !== 'undefined') {
                        jQuery.fn.tpessential.defaults.ajaxTypes.push({
                            type: "revslider",
                            func: ajaxRevslider,
                            killfunc: ajaxRemoveRevslider,
                            openAnimationSpeed: 0.3
                        });
                        // type:  Name of the Post to load via Ajax into the Essential Grid Ajax Container
                        // func: the Function Name which is Called once the Item with the Post Type has been clicked
                        // killfunc: function to kill in case the Ajax Window going to be removed (before Remove function !
                        // openAnimationSpeed: how quick the Ajax Content window should be animated (default is 0.3)
                    }
                }
            }, 30);
        });
    </script>
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    
    
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="http://zahod5277.bget.ru/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]-->
    <style type="text/css" media="screen">
        html {
            margin-top: 32px !important;
        }
        
        * html body {
            margin-top: 32px !important;
        }
        
        @media screen and ( max-width: 782px) {
            html {
                margin-top: 46px !important;
            }
            * html body {
                margin-top: 46px !important;
            }
        }
    </style>
    {/ignore}
    <meta name="generator" content="Powered by Slider Revolution 5.4.7.1 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
    <link rel="icon" href="http://zahod5277.bget.ru/wp-content/uploads/2017/11/cropped-favicon-150x150.png" sizes="32x32" />
    <link rel="icon" href="http://zahod5277.bget.ru/wp-content/uploads/2017/11/cropped-favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="http://zahod5277.bget.ru/wp-content/uploads/2017/11/cropped-favicon.png" />
    <meta name="msapplication-TileImage" content="http://zahod5277.bget.ru/wp-content/uploads/2017/11/cropped-favicon.png" />
    {ignore}
    <script type="text/javascript">
        function setREVStartSize(e) {
            try {
                e.c = jQuery(e.c);
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c) jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                        }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        };
    </script>
    {/ignore}
    <link rel="icon" href="http://zahod5277.bget.ru/wp-content/uploads/2017/11/cropped-favicon-150x150.png" sizes="32x32" />
    <link rel="icon" href="http://zahod5277.bget.ru/wp-content/uploads/2017/11/cropped-favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="http://zahod5277.bget.ru/wp-content/uploads/2017/11/cropped-favicon.png" />
    <meta name="msapplication-TileImage" content="http://zahod5277.bget.ru/wp-content/uploads/2017/11/cropped-favicon.png" />
    {ignore}
    <style type="text/css" data-type="vc_shortcodes-custom-css">
        .vc_custom_1518705755561 {
            padding-top: 10px !important;
            padding-right: 20px !important;
            padding-bottom: 10px !important;
            padding-left: 20px !important;
        }
        
        .vc_custom_1518796789300 {
            margin-top: 50px !important;
            margin-bottom: 80px !important;
        }
        
        .vc_custom_1518705630726 {
            margin-top: 100px !important;
            margin-bottom: 70px !important;
        }
        
        .vc_custom_1518708498525 {
            margin-bottom: 65px !important;
        }
        
        .vc_custom_1518643097470 {
            padding-bottom: 325px !important;
        }
        
        .vc_custom_1518635929480 {
            margin-top: -125px !important;
            padding-top: 10px !important;
            padding-right: 10px !important;
            padding-bottom: 10px !important;
            padding-left: 10px !important;
        }
        
        .vc_custom_1518635946581 {
            margin-top: -125px !important;
            padding-top: 10px !important;
            padding-right: 10px !important;
            padding-bottom: 10px !important;
            padding-left: 10px !important;
        }
        
        .vc_custom_1518635962857 {
            margin-top: -125px !important;
            padding-top: 10px !important;
            padding-right: 10px !important;
            padding-bottom: 10px !important;
            padding-left: 10px !important;
        }
        
        .vc_custom_1518644054185 {
            padding-right: 0px !important;
        }
        
        .vc_custom_1518644071646 {
            padding-right: 10px !important;
            padding-left: 40px !important;
        }
        
        .vc_custom_1518640841929 {
            padding-right: 15px !important;
            padding-left: 15px !important;
        }
        
        .vc_custom_1518624270633 {
            padding-right: 22px !important;
            padding-left: 22px !important;
        }
        
        .vc_custom_1518624138519 {
            margin-bottom: 26px !important;
            border-bottom-width: 7px !important;
            padding-bottom: 15px !important;
            border-bottom-style: solid !important;
        }
        
        .vc_custom_1518624128081 {
            margin-bottom: 55px !important;
        }
        
        .vc_custom_1518624270633 {
            padding-right: 22px !important;
            padding-left: 22px !important;
        }
        
        .vc_custom_1518624949730 {
            margin-bottom: 26px !important;
            border-bottom-width: 7px !important;
            padding-bottom: 15px !important;
            border-bottom-style: solid !important;
        }
        
        .vc_custom_1518624128081 {
            margin-bottom: 55px !important;
        }
        
        .vc_custom_1518624270633 {
            padding-right: 22px !important;
            padding-left: 22px !important;
        }
        
        .vc_custom_1518624942609 {
            margin-bottom: 26px !important;
            border-bottom-width: 7px !important;
            padding-bottom: 15px !important;
            border-bottom-style: solid !important;
        }
        
        .vc_custom_1518624128081 {
            margin-bottom: 55px !important;
        }
        
        .vc_custom_1518644082424 {
            padding-right: 0px !important;
        }
        
        .vc_custom_1518644095007 {
            padding-right: 10px !important;
            padding-left: 40px !important;
        }
        
        .vc_custom_1518641609328 {
            padding-right: 15px !important;
            padding-left: 15px !important;
        }
        
        .vc_custom_1518643703020 {
            margin-top: 50px !important;
            margin-bottom: 30px !important;
        }
        
        .vc_custom_1518643936624 {
            margin-right: 200px !important;
            margin-left: 200px !important;
        }
        
        .vc_custom_1518644114975 {
            padding-right: 0px !important;
        }
        
        .vc_custom_1518644123266 {
            padding-right: 10px !important;
            padding-left: 40px !important;
        }
        
        .vc_custom_1518642693227 {
            padding-right: 15px !important;
            padding-left: 15px !important;
        }
    </style>
    <noscript>
        <style type="text/css">
            .wpb_animate_when_almost_visible {
                opacity: 1;
            }
        </style>
    </noscript>
    {ignore}
</head>

<body class="home page-template-default page page-id-10 logged-in admin-bar no-customize-support lang-ru-RU layout-wide fixed_header _studio wpb-js-composer js-comp-ver-5.4.7 vc_responsive">
    <div id="overlay">
        <div class="perspective"></div>
    </div>

    <div class="classic-menu mini-fullwidth-active fixed classic_menu_width fullwidth classic_menu_align-pull-center classic_menu_logo_align-pull-left">

        <ul id="menu-main-menu" class="menu-level-0">
            <li id="menu-item-2979" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2979"><a href="/studio/#studios">Studios</a></li>
            <li id="menu-item-2960" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2960"><a href="http://zahod5277.bget.ru/services/">Services</a></li>
            <li id="menu-item-2983" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2983"><a href="http://zahod5277.bget.ru/work/">Work</a></li>
            <li id="menu-item-2980" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2980"><a href="http://zahod5277.bget.ru/team/">Team</a></li>
            <li id="menu-item-2961" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2961"><a href="http://zahod5277.bget.ru/booking/">Booking</a></li>
            <li id="menu-item-1732" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1732"><a href="http://zahod5277.bget.ru/news-2-columns/">News</a>
                <ul class="sub-menu">
                    <li id="menu-item-64" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-64"><a href="http://zahod5277.bget.ru/news-2-columns/">News – 2 Columns</a></li>
                    <li id="menu-item-1707" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1707"><a href="http://zahod5277.bget.ru/news-3-columns/">News – 3 Columns</a></li>
                    <li id="menu-item-68" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-68"><a href="http://zahod5277.bget.ru/news-list/">News – List</a></li>
                    <li id="menu-item-1731" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1731"><a href="http://zahod5277.bget.ru/news-2-columns-split/">News – 2 Columns split</a></li>
                    <li id="menu-item-67" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-67"><a href="http://zahod5277.bget.ru/news-classic/">News – Classic</a></li>
                </ul>
            </li>
            <li id="menu-item-72" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-72"><a href="#">Elements</a>
                <ul class="sub-menu">
                    <li id="menu-item-1241" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1241"><a href="#">Photos</a>
                        <ul class="sub-menu">
                            <li id="menu-item-1678" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1678"><a href="http://zahod5277.bget.ru/gallery-instagram/">Gallery – Instagram</a></li>
                            <li id="menu-item-62" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62"><a href="http://zahod5277.bget.ru/gallery-boxed/">Gallery – Boxed</a></li>
                            <li id="menu-item-63" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-63"><a href="http://zahod5277.bget.ru/gallery-fullwidth/">Gallery – Fullwidth</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-1240" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1240"><a href="#">Videos</a>
                        <ul class="sub-menu">
                            <li id="menu-item-1667" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1667"><a href="http://zahod5277.bget.ru/video-youtube-channel/">Videos – Youtube</a></li>
                            <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="http://zahod5277.bget.ru/videos-list/">Videos – List</a></li>
                            <li id="menu-item-70" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-70"><a href="http://zahod5277.bget.ru/videos-grid/">Videos – Grid</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-1239" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1239"><a href="http://zahod5277.bget.ru/artists-grid/">Artists</a>
                        <ul class="sub-menu">
                            <li id="menu-item-1242" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1242"><a href="http://zahod5277.bget.ru/artists-grid/">Artists – Grid</a></li>
                            <li id="menu-item-1744" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1744"><a href="http://zahod5277.bget.ru/artists-filters/">Artists – Filters</a></li>
                            <li id="menu-item-1741" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1741"><a href="http://zahod5277.bget.ru/artists-parallax/">Artists – Parallax</a></li>
                            <li id="menu-item-1735" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1735"><a href="http://zahod5277.bget.ru/artists-fullwidth/">Artists – Fullwidth</a></li>
                            <li id="menu-item-2144" class="menu-item menu-item-type-post_type menu-item-object-artist menu-item-2144"><a href="http://zahod5277.bget.ru/artist/indiana/">Artist Page &#8212; Exemple 1</a></li>
                            <li id="menu-item-3053" class="menu-item menu-item-type-post_type menu-item-object-artist menu-item-3053"><a href="http://zahod5277.bget.ru/artist/raymayor/">Artist Page &#8212; Exemple 2</a></li>
                            <li id="menu-item-2175" class="menu-item menu-item-type-post_type menu-item-object-artist menu-item-2175"><a href="http://zahod5277.bget.ru/artist/ultrasonic/">Artist Page &#8212; Exemple 3</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-1342" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1342"><a href="http://zahod5277.bget.ru/music-grid/">Music</a>
                        <ul class="sub-menu">
                            <li id="menu-item-1727" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1727"><a href="http://zahod5277.bget.ru/music-2-columns/">Music – 2 Columns</a></li>
                            <li id="menu-item-1728" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1728"><a href="http://zahod5277.bget.ru/music-parallax/">Music – Parallax</a></li>
                            <li id="menu-item-2665" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2665"><a href="http://zahod5277.bget.ru/music-click-play/">Music – Click &#038; Play</a></li>
                            <li id="menu-item-1238" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1238"><a href="http://zahod5277.bget.ru/music-grid/">Music – Grid</a></li>
                            <li id="menu-item-1236" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1236"><a href="http://zahod5277.bget.ru/music-fullwidth/">Music – Fullwidth</a></li>
                            <li id="menu-item-1237" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1237"><a href="http://zahod5277.bget.ru/music-filters/">Music – Filters</a></li>
                            <li id="menu-item-833" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-833"><a href="http://zahod5277.bget.ru/music-list/">Music – List</a></li>
                            <li id="menu-item-835" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-835"><a href="http://zahod5277.bget.ru/music-slider/">Music – Slider</a></li>
                            <li id="menu-item-1762" class="menu-item menu-item-type-post_type menu-item-object-album menu-item-1762"><a href="http://zahod5277.bget.ru/playlist/horizon/">Single &#8212; With top banner</a></li>
                            <li id="menu-item-2121" class="menu-item menu-item-type-post_type menu-item-object-album menu-item-2121"><a href="http://zahod5277.bget.ru/playlist/dust-to-play/">Single &#8212; With sidecover</a></li>
                            <li id="menu-item-1761" class="menu-item menu-item-type-post_type menu-item-object-album menu-item-1761"><a href="http://zahod5277.bget.ru/playlist/spotify-album/">Single &#8212; Spotify Album</a></li>
                            <li id="menu-item-1760" class="menu-item menu-item-type-post_type menu-item-object-album menu-item-1760"><a href="http://zahod5277.bget.ru/playlist/soundcloud-album/">Single &#8212; SoundCloud Album</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-822" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-822"><a href="http://zahod5277.bget.ru/events-list/">Events</a>
                        <ul class="sub-menu">
                            <li id="menu-item-847" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-847"><a href="http://zahod5277.bget.ru/tour-grid/">Events – Grid</a></li>
                            <li id="menu-item-58" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-58"><a href="http://zahod5277.bget.ru/events-list/">Events – List</a></li>
                            <li id="menu-item-1542" class="no-ajax menu-item menu-item-type-post_type menu-item-object-page menu-item-1542"><a href="http://zahod5277.bget.ru/events-bandsintown/">Events – Bandsintown</a></li>
                            <li id="menu-item-1530" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1530"><a href="http://zahod5277.bget.ru/all-events/">Events &#038; Past Events</a></li>
                            <li id="menu-item-852" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-852"><a href="http://zahod5277.bget.ru/past-events/">Past Events</a></li>
                            <li id="menu-item-1403" class="menu-item menu-item-type-post_type menu-item-object-event menu-item-1403"><a href="http://zahod5277.bget.ru/event/shockelm-music-show/">Single Event</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-1801" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1801"><a href="#">About</a>
                        <ul class="sub-menu">
                            <li id="menu-item-1800" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1800"><a href="http://zahod5277.bget.ru/about-exemple-1/">About – Exemple 1</a></li>
                            <li id="menu-item-1830" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1830"><a href="http://zahod5277.bget.ru/about-exemple-2/">About – Exemple 2</a></li>
                            <li id="menu-item-1853" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1853"><a href="http://zahod5277.bget.ru/about-exemple-3/">About – Exemple 3</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-1860" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1860"><a href="http://zahod5277.bget.ru/contact/">Contact</a>
                        <ul class="sub-menu">
                            <li id="menu-item-1859" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1859"><a href="http://zahod5277.bget.ru/contact/">Contact – Exemple 1</a></li>
                            <li id="menu-item-1891" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1891"><a href="http://zahod5277.bget.ru/contact-exemple-2/">Contact – Exemple 2</a></li>
                            <li id="menu-item-1911" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1911"><a href="http://zahod5277.bget.ru/contact-exemple-3/">Contact – Exemple 3</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-2130" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2130"><a href="#">Speciality Pages</a>
                        <ul class="sub-menu">
                            <li id="menu-item-61" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-61"><a href="http://zahod5277.bget.ru/donate/">Donate</a></li>
                            <li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69"><a href="http://zahod5277.bget.ru/presskit/">Presskit</a></li>
                            <li id="menu-item-1972" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1972"><a href="http://zahod5277.bget.ru/under-construction-coming-soon-page/">Coming Soon Page</a></li>
                            <li id="menu-item-2654" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2654"><a href="http://zahod5277.bget.ru/video-landing-page/">Video Landing Page</a></li>
                            <li id="menu-item-2659" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2659"><a href="http://zahod5277.bget.ru/home-with-video-background/">Home with Video Background</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-808" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-808"><a href="http://zahod5277.bget.ru/shop/">Shop</a></li>
                </ul>
            </li>
        </ul>
        <!-- social-networks -->

        <ul class="classic-menu-hot-links righttype">

            <li class="languages-selector hotlink pull-right">
            </li>
        </ul>
    </div>
    <div id="pusher-wrap">

        <div id="pusher" class="menu-type-classic-menu">
            <div class="pjax-container">
                <div id="wrapper" class="wrapper">
                    <!-- container -->

                    <div class="container">
                        <article id="post-10" class="sr_it-single-post post-10 page type-page status-publish hentry">

                            <div class="entry">
                                <div style="" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner " style="">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_revslider_element wpb_content_element">
                                                    <link href="http://fonts.googleapis.com/css?family=Oswald:600%7CMontserrat:600%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
                                                    <div id="rev_slider_11_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="banner01" data-source="gallery" style="background:transparent;padding:0px;">
                                                        <!-- START REVOLUTION SLIDER 5.4.7.1 fullscreen mode -->
                                                        <div id="rev_slider_11_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.7.1">
                                                            <ul>
                                                                <!-- SLIDE  -->
                                                                <li data-index="rs-12" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="http://zahod5277.bget.ru/wp-content/uploads/2018/02/hero_01-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                    <!-- MAIN IMAGE -->
                                                                    <img src="http://zahod5277.bget.ru/wp-content/uploads/2018/02/hero_01.jpg" alt="" title="hero_01" width="1920" height="1330" data-bgposition="right top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                                    <!-- LAYERS -->
                                                                </li>
                                                                <!-- SLIDE  -->
                                                                <li data-index="rs-13" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="http://zahod5277.bget.ru/wp-content/uploads/2018/02/hero-services-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                    <!-- MAIN IMAGE -->
                                                                    <img src="http://zahod5277.bget.ru/wp-content/uploads/2018/02/hero-services.jpg" alt="" title="hero-services" width="1920" height="976" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                                    <!-- LAYERS -->
                                                                </li>
                                                                <!-- SLIDE  -->
                                                                <li data-index="rs-14" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="http://zahod5277.bget.ru/wp-content/uploads/2018/02/hero-booking-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                                                    <!-- MAIN IMAGE -->
                                                                    <img src="http://zahod5277.bget.ru/wp-content/uploads/2018/02/hero-booking.jpg" alt="" title="hero-booking" width="1920" height="975" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                                                    <!-- LAYERS -->
                                                                </li>
                                                            </ul>
                                                            <div style="" class="tp-static-layers">

                                                                <!-- LAYER NR. 1 -->
                                                                <div class="tp-caption   tp-resizeme tp-static-layer" id="slider-11-layer-7" data-x="['center','center','center','center']" data-hoffset="['447','447','272','220']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','-45','-44']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-startslide="0" data-endslide="2" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"><img src="http://zahod5277.bget.ru/wp-content/uploads/2018/02/hero-dot.png" alt="" data-ww="['342px','342px','195px','152px']" data-hh="['362px','362px','206px','160px']" width="342" height="362" data-no-retina> </div>

                                                                <!-- LAYER NR. 2 -->
                                                                <div class="tp-caption   tp-resizeme tp-static-layer" id="slider-11-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-54','-54','-69','-69']" data-fontsize="['64','64','33','26']" data-lineheight="['70','70','35','29']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-startslide="0" data-endslide="2" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 64px; line-height: 70px; font-weight: 600; color: #ffffff; letter-spacing: 0px;font-family:Oswald;text-transform:uppercase;">True Artists, Senior Music Producers
                                                                    <br> and Top-Tier Engineers </div>

                                                                <!-- LAYER NR. 3 -->
                                                                <div class="tp-caption   tp-resizeme tp-static-layer" id="slider-11-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-154','-154','-154','-154']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-startslide="0" data-endslide="2" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 14px; line-height: 22px; font-weight: 600; color: #00ad8e; letter-spacing: 2px;font-family:Montserrat;text-transform:uppercase;">Dubai - Montreal - New York </div>

                                                                <!-- LAYER NR. 4 -->
                                                                <div class="tp-caption   tp-resizeme tp-static-layer" id="slider-11-layer-5" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['65','65','13','-1']" data-fontsize="['24','24','18','18']" data-lineheight="['28','28','22','22']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-startslide="0" data-endslide="2" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; white-space: nowrap; font-size: 24px; line-height: 28px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Montserrat;">Everyone has string samples. This is different. </div>

                                                                <!-- LAYER NR. 5 -->
                                                                <div class="tp-caption rev-btn  tp-static-layer" id="slider-11-layer-6" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['188','188','108','88']" data-fontsize="['21','21','14','14']" data-lineheight="['21','21','14','14']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"simplelink","target":"_self","url":"booking","delay":""}]' data-responsive_offset="on" data-responsive="off" data-startslide="0" data-endslide="2" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);bg:rgb(23,154,125);bs:solid;bw:0 0 0 0;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[25,25,14,14]" data-paddingright="[70,70,20,20]" data-paddingbottom="[25,25,14,14]" data-paddingleft="[70,70,20,20]" style="z-index: 9; white-space: nowrap; font-size: 21px; line-height: 21px; font-weight: 600; color: rgba(255,255,255,1); letter-spacing: px;font-family:Montserrat;text-transform:uppercase;background-color:rgb(0,173,142);border-color:rgba(0,0,0,1);border-radius:34px 34px 34px 34px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">book your session now </div>
                                                            </div>
                                                            {ignore}
                                                            <script>
                                                                var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
                                                                var htmlDivCss = "";
                                                                if (htmlDiv) {
                                                                    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                                                } else {
                                                                    var htmlDiv = document.createElement("div");
                                                                    htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                                                                    document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
                                                                }
                                                            </script>
                                                            <div class="tp-bannertimer" style="height: 3px; background: rgba(0,173,142,1);"></div>
                                                        </div>
                                                        <script>
                                                            var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
                                                            var htmlDivCss = "";
                                                            if (htmlDiv) {
                                                                htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                                            } else {
                                                                var htmlDiv = document.createElement("div");
                                                                htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                                                                document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
                                                            }
                                                        </script>
                                                        <script type="text/javascript">
                                                            if (setREVStartSize !== undefined) setREVStartSize({
                                                                c: '#rev_slider_11_1',
                                                                responsiveLevels: [1240, 1240, 778, 480],
                                                                gridwidth: [1240, 1240, 778, 480],
                                                                gridheight: [868, 868, 960, 720],
                                                                sliderLayout: 'fullscreen',
                                                                fullScreenAutoWidth: 'off',
                                                                fullScreenAlignForce: 'off',
                                                                fullScreenOffsetContainer: '',
                                                                fullScreenOffset: '15%'
                                                            });
                                                            var revapi11,
                                                                tpj;
                                                            (function() {
                                                                if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad)
                                                                else
                                                                    onLoad();

                                                                function onLoad() {
                                                                    if (tpj === undefined) {
                                                                        tpj = jQuery;
                                                                        if ("off" == "on") tpj.noConflict();
                                                                    }
                                                                    if (tpj("#rev_slider_11_1").revolution == undefined) {
                                                                        revslider_showDoubleJqueryError("#rev_slider_11_1");
                                                                    } else {
                                                                        revapi11 = tpj("#rev_slider_11_1").show().revolution({
                                                                            sliderType: "standard",
                                                                            jsFileLocation: "//zahod5277.bget.ru/wp-content/plugins/revslider/public/assets/js/",
                                                                            sliderLayout: "fullscreen",
                                                                            dottedOverlay: "none",
                                                                            delay: 3000,
                                                                            navigation: {
                                                                                keyboardNavigation: "off",
                                                                                keyboard_direction: "horizontal",
                                                                                mouseScrollNavigation: "off",
                                                                                mouseScrollReverse: "default",
                                                                                onHoverStop: "off",
                                                                                bullets: {
                                                                                    enable: true,
                                                                                    hide_onmobile: false,
                                                                                    style: "uranus",
                                                                                    hide_onleave: false,
                                                                                    direction: "vertical",
                                                                                    h_align: "right",
                                                                                    v_align: "center",
                                                                                    h_offset: 40,
                                                                                    v_offset: 0,
                                                                                    space: 5,
                                                                                    tmp: '<span class="tp-bullet-inner"></span>'
                                                                                }
                                                                            },
                                                                            responsiveLevels: [1240, 1240, 778, 480],
                                                                            visibilityLevels: [1240, 1240, 778, 480],
                                                                            gridwidth: [1240, 1240, 778, 480],
                                                                            gridheight: [868, 868, 960, 720],
                                                                            lazyType: "none",
                                                                            shadow: 0,
                                                                            spinner: "spinner0",
                                                                            stopLoop: "off",
                                                                            stopAfterLoops: -1,
                                                                            stopAtSlide: -1,
                                                                            shuffle: "off",
                                                                            autoHeight: "off",
                                                                            fullScreenAutoWidth: "off",
                                                                            fullScreenAlignForce: "off",
                                                                            fullScreenOffsetContainer: "",
                                                                            fullScreenOffset: "15%",
                                                                            hideThumbsOnMobile: "off",
                                                                            hideSliderAtLimit: 0,
                                                                            hideCaptionAtLimit: 0,
                                                                            hideAllCaptionAtLilmit: 0,
                                                                            debugMode: false,
                                                                            fallbacks: {
                                                                                simplifyAll: "off",
                                                                                nextSlideOnWindowFocus: "off",
                                                                                disableFocusListener: false,
                                                                            }
                                                                        });
                                                                    }; /* END OF revapi call */

                                                                }; /* END OF ON LOAD FUNCTION */
                                                            }()); /* END OF WRAPPING FUNCTION */
                                                        </script>
                                                        <script>
                                                            var htmlDivCss = unescape("%23rev_slider_11_1%20.uranus%20.tp-bullet%7B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C%200%29%3B%0A%20%20-webkit-transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20transition%3A%20box-shadow%200.3s%20ease%3B%0A%20%20background%3Atransparent%3B%0A%20%20width%3A15px%3B%0A%20%20height%3A15px%3B%0A%7D%0A%23rev_slider_11_1%20.uranus%20.tp-bullet.selected%2C%0A%23rev_slider_11_1%20.uranus%20.tp-bullet%3Ahover%20%7B%0A%20%20box-shadow%3A%200%200%200%202px%20rgba%28255%2C%20255%2C%20255%2C1%29%3B%0A%20%20border%3Anone%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background%3Atransparent%3B%0A%7D%0A%0A%23rev_slider_11_1%20.uranus%20.tp-bullet-inner%20%7B%0A%20%20-webkit-transition%3A%20background-color%200.3s%20ease%2C%20-webkit-transform%200.3s%20ease%3B%0A%20%20transition%3A%20background-color%200.3s%20ease%2C%20transform%200.3s%20ease%3B%0A%20%20top%3A%200%3B%0A%20%20left%3A%200%3B%0A%20%20width%3A%20100%25%3B%0A%20%20height%3A%20100%25%3B%0A%20%20outline%3A%20none%3B%0A%20%20border-radius%3A%2050%25%3B%0A%20%20background-color%3A%20rgb%28255%2C%20255%2C%20255%29%3B%0A%20%20background-color%3A%20rgba%28255%2C%20255%2C%20255%2C%200.3%29%3B%0A%20%20text-indent%3A%20-999em%3B%0A%20%20cursor%3A%20pointer%3B%0A%20%20position%3A%20absolute%3B%0A%7D%0A%0A%23rev_slider_11_1%20.uranus%20.tp-bullet.selected%20.tp-bullet-inner%2C%0A%23rev_slider_11_1%20.uranus%20.tp-bullet%3Ahover%20.tp-bullet-inner%7B%0A%20transform%3A%20scale%280.4%29%3B%0A%20-webkit-transform%3A%20scale%280.4%29%3B%0A%20background-color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%7D%0A");
                                                            var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
                                                            if (htmlDiv) {
                                                                htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                                            } else {
                                                                var htmlDiv = document.createElement('div');
                                                                htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
                                                                document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
                                                            }
                                                        </script>
                                                        {/ignore}
                                                    </div>
                                                    <!-- END REVOLUTION SLIDER -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div style="" class="vc_row wpb_row vc_row-fluid vc_custom_1518705755561">
                                    <div class="wpb_column vc_column_container vc_col-sm-4 sonaar-column-responsive-5abcf8b5a79fa">
                                        <div class="vc_column-inner vc_custom_1518635929480" style="">
                                            <div class="wpb_wrapper">
                                                <a href="http://zahod5277.bget.ru/services/" class="promobox animation-zoom ">
                                                    <div class="promo-overlay" style="background:rgba(0,0,0,0.45)"></div>
                                                    <img src="http://zahod5277.bget.ru/wp-content/uploads/2018/02/promo_01.jpg" class="promopic" alt="h5">
                                                    <div class="promocontent center">
                                                        <div class="promotext">
                                                            <h5 style="color:#b9b9b9;">SOUND<br />
                                                                    DESIGN</h5></div>
                                                        <div class="promosubtext">
                                                            <h3></h3></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {ignore}
                                    <script type="text/javascript">
                                        (function($) {
                                            $("head").append("<style>@media (max-width: 991px) and (min-width: 768px) { .sonaar-column-responsive-5abcf8b5a79fa > .vc_column-inner {margin-top:0px !important;  }  } @media (max-width: 767px) { .sonaar-column-responsive-5abcf8b5a79fa > .vc_column-inner {margin-top:0px !important;  }  } </style>");
                                        })(jQuery);
                                    </script>
                                    {/ignore}
                                    <div class="wpb_column vc_column_container vc_col-sm-4 sonaar-column-responsive-5abcf8b5a7faf">
                                        <div class="vc_column-inner vc_custom_1518635946581" style="">
                                            <div class="wpb_wrapper">
                                                <a href="http://zahod5277.bget.ru/services/" class="promobox animation-zoom ">
                                                    <div class="promo-overlay" style="background:rgba(0,0,0,0.45)"></div>
                                                    <img src="http://zahod5277.bget.ru/wp-content/uploads/2018/02/promo_02.jpg" class="promopic" alt="h5">
                                                    <div class="promocontent center">
                                                        <div class="promotext">
                                                            <h5 style="color:#b9b9b9;">SOUND<br />
                                                                    RECORDING</h5></div>
                                                        <div class="promosubtext">
                                                            <h3></h3></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {ignore}
                                    <script type="text/javascript">
                                        (function($) {
                                            $("head").append("<style>@media (max-width: 991px) and (min-width: 768px) { .sonaar-column-responsive-5abcf8b5a7faf > .vc_column-inner {margin-top:0px !important;  }  } @media (max-width: 767px) { .sonaar-column-responsive-5abcf8b5a7faf > .vc_column-inner {margin-top:0px !important;  }  } </style>");
                                        })(jQuery);
                                    </script>
                                    {/ignore}
                                    <div class="wpb_column vc_column_container vc_col-sm-4 sonaar-column-responsive-5abcf8b5a8430">
                                        <div class="vc_column-inner vc_custom_1518635962857" style="">
                                            <div class="wpb_wrapper">
                                                <a href="http://zahod5277.bget.ru/services/" class="promobox animation-zoom ">
                                                    <div class="promo-overlay" style="background:rgba(0,0,0,0.45)"></div>
                                                    <img src="http://zahod5277.bget.ru/wp-content/uploads/2018/02/promo_03.jpg" class="promopic" alt="h5">
                                                    <div class="promocontent center">
                                                        <div class="promotext">
                                                            <h5 style="color:#b9b9b9;">TALENT<br />
                                                                    MANAGEMENT</h5></div>
                                                        <div class="promosubtext">
                                                            <h3></h3></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {ignore}
                                    <script type="text/javascript">
                                        (function($) {
                                            $("head").append("<style>@media (max-width: 991px) and (min-width: 768px) { .sonaar-column-responsive-5abcf8b5a8430 > .vc_column-inner {margin-top:0px !important;  }  } @media (max-width: 767px) { .sonaar-column-responsive-5abcf8b5a8430 > .vc_column-inner {margin-top:0px !important;  }  } </style>");
                                        })(jQuery);
                                    </script>
                                    {/ignore}
                                </div>
                                <div style="" id="studios" class="vc_row wpb_row vc_row-fluid special-big-text vc_custom_1518796789300 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                                    <div class="wpb_column vc_column_container vc_col-sm-4 text-lg-right text-md-right text-sm-center text-xs-center">
                                        <div class="vc_column-inner vc_custom_1518644054185" style="">
                                            <div class="wpb_wrapper">
                                                <h2 style="font-size: 72px;color: #00ad8e;line-height: 68px;text-align: right;font-family:Oswald;font-weight:700;font-style:normal" class="vc_custom_heading">welcome<br />
                                                        to OUR<br />
                                                        STUDIO</h2></div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-8 text-sm-center text-xs-center sonaar-column-responsive-5abcf8b5a8fcb">
                                        <div class="vc_column-inner vc_custom_1518644071646" style="">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1518640841929">
                                                    <div class="wpb_wrapper">
                                                        <p><span style="color: #d7d7d7;">We are a recording studio located in New York City. We cover everything from epic original tracks to talent management, licensing, sound recording and design.</span></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {ignore}
                                    <script type="text/javascript">
                                        (function($) {
                                            $("head").append("<style>@media (max-width: 991px) and (min-width: 768px) { .sonaar-column-responsive-5abcf8b5a8fcb > .vc_column-inner {padding-right:20px !important; padding-left:20px !important;  }  } @media (max-width: 767px) { .sonaar-column-responsive-5abcf8b5a8fcb > .vc_column-inner {padding-right:15px !important; padding-left:15px !important;  }  } </style>");
                                        })(jQuery);
                                    </script>
                                    {/ignore}
                                </div>
                                <div style="" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="2" data-vc-parallax-o-fade="on" data-vc-parallax-image="http://zahod5277.bget.ru/wp-content/uploads/2018/02/studio-bg_01.jpg" class="vc_row wpb_row vc_row-fluid vc_row-has-fill vc_row-o-full-height vc_row-o-columns-middle vc_row-flex vc_general vc_parallax vc_parallax-content-moving-fade js-vc_parallax-o-fade">
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner " style="">
                                            <div class="wpb_wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-6 text-lg-center text-md-center text-sm-center text-xs-center">
                                        <div class="vc_column-inner vc_custom_1518624270633" style="">
                                            <div class="wpb_wrapper">
                                                <h2 style="text-align: center" class="vc_custom_heading vc_custom_1518624138519 sr_it-inline-block">Studio A</h2>
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1518624128081">
                                                    <div class="wpb_wrapper">
                                                        <p>The adjoining acoustic room is set up to accommodate up to 30 musicians and boasts a neutral acoustic. This means that equipment like our full drum kit and Yamaha C7 grand piano can be set up to provide the best possible sound. A complete microphone selection and a wide range of vintage outboard audio equipment ensures that our flagship Studio A has everything you need for an outstanding recording experience.</p>

                                                    </div>
                                                </div>
                                                <div class="vc_btn3-container vc_btn3-inline ">
                                                    <a style="background-color:#00ad8e; color:#ffffff;" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-custom" href="https://demo.sonaar.io/studio/booking/" title="">BOOK YOUR SESSION</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div style="" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="2" data-vc-parallax-o-fade="on" data-vc-parallax-image="http://zahod5277.bget.ru/wp-content/uploads/2018/02/studio-bg_02.jpg" class="vc_row wpb_row vc_row-fluid vc_row-has-fill vc_row-o-full-height vc_row-o-columns-middle vc_row-flex vc_general vc_parallax vc_parallax-content-moving-fade js-vc_parallax-o-fade">
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner " style="">
                                            <div class="wpb_wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-6 text-lg-center text-md-center text-sm-center text-xs-center">
                                        <div class="vc_column-inner vc_custom_1518624270633" style="">
                                            <div class="wpb_wrapper">
                                                <h2 style="text-align: center" class="vc_custom_heading vc_custom_1518624949730 sr_it-inline-block">Studio B</h2>
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1518624128081">
                                                    <div class="wpb_wrapper">
                                                        <p>The adjoining acoustic room is set up to accommodate up to 30 musicians and boasts a neutral acoustic. This means that equipment like our full drum kit and Yamaha C7 grand piano can be set up to provide the best possible sound. A complete microphone selection and a wide range of vintage outboard audio equipment ensures that our flagship Studio A has everything you need for an outstanding recording experience.</p>

                                                    </div>
                                                </div>
                                                <div class="vc_btn3-container vc_btn3-inline ">
                                                    <a style="background-color:#00ad8e; color:#ffffff;" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-custom" href="https://demo.sonaar.io/studio/booking/" title="">BOOK YOUR SESSION</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div style="" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="2" data-vc-parallax-o-fade="on" data-vc-parallax-image="http://zahod5277.bget.ru/wp-content/uploads/2018/02/studio-bg_03.jpg" class="vc_row wpb_row vc_row-fluid vc_row-has-fill vc_row-o-full-height vc_row-o-columns-middle vc_row-flex vc_general vc_parallax vc_parallax-content-moving-fade js-vc_parallax-o-fade">
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner " style="">
                                            <div class="wpb_wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-6 text-lg-center text-md-center text-sm-center text-xs-center">
                                        <div class="vc_column-inner vc_custom_1518624270633" style="">
                                            <div class="wpb_wrapper">
                                                <h2 style="text-align: center" class="vc_custom_heading vc_custom_1518624942609 sr_it-inline-block">Studio C</h2>
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1518624128081">
                                                    <div class="wpb_wrapper">
                                                        <p>The adjoining acoustic room is set up to accommodate up to 30 musicians and boasts a neutral acoustic. This means that equipment like our full drum kit and Yamaha C7 grand piano can be set up to provide the best possible sound. A complete microphone selection and a wide range of vintage outboard audio equipment ensures that our flagship Studio A has everything you need for an outstanding recording experience.</p>

                                                    </div>
                                                </div>
                                                <div class="vc_btn3-container vc_btn3-inline ">
                                                    <a style="background-color:#00ad8e; color:#ffffff;" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-custom" href="https://demo.sonaar.io/studio/booking/" title="">BOOK YOUR SESSION</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div style="" class="vc_row wpb_row vc_row-fluid special-big-text vc_custom_1518705630726 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                                    <div class="wpb_column vc_column_container vc_col-sm-4 text-lg-right text-md-right text-sm-center text-xs-center">
                                        <div class="vc_column-inner vc_custom_1518644082424" style="">
                                            <div class="wpb_wrapper">
                                                <h2 style="font-size: 72px;color: #00ad8e;line-height: 68px;text-align: right;font-family:Oswald;font-weight:700;font-style:normal" class="vc_custom_heading">Featured<br />
                                                        Works</h2></div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-8 text-sm-center text-xs-center sonaar-column-responsive-5abcf8b5ab251">
                                        <div class="vc_column-inner vc_custom_1518644095007" style="">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element  vc_custom_1518641609328">
                                                    <div class="wpb_wrapper">
                                                        <p><span style="color: #d7d7d7;">Here are our latest recordings we’ve been worked on. </span><span style="color: #d7d7d7;">Feel free to contact us if you have any questions.</span></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {ignore}
                                    <script type="text/javascript">
                                        (function($) {
                                            $("head").append("<style>@media (max-width: 991px) and (min-width: 768px) { .sonaar-column-responsive-5abcf8b5ab251 > .vc_column-inner {padding-right:20px !important; padding-left:20px !important;  }  } @media (max-width: 767px) { .sonaar-column-responsive-5abcf8b5ab251 > .vc_column-inner {padding-right:15px !important; padding-left:15px !important;  }  } </style>");
                                        })(jQuery);
                                    </script>
                                    {/ignore}
                                </div>
                                <div style="" class="vc_row wpb_row vc_row-fluid vc_custom_1518708498525">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner " style="">
                                            <div class="wpb_wrapper">
                                                {ignore}
                                                <style type="text/css">
                                                    a.eg-henryharrison-element-1,
                                                    a.eg-henryharrison-element-2 {
                                                        -webkit-transition: all .4s linear;
                                                        -moz-transition: all .4s linear;
                                                        -o-transition: all .4s linear;
                                                        -ms-transition: all .4s linear;
                                                        transition: all .4s linear
                                                    }
                                                    
                                                    .eg-jimmy-carter-element-11 i:before {
                                                        margin-left: 0px;
                                                        margin-right: 0px
                                                    }
                                                    
                                                    .eg-harding-element-17 {
                                                        letter-spacing: 1px
                                                    }
                                                    
                                                    .eg-harding-wrapper .esg-entry-media {
                                                        overflow: hidden;
                                                        box-sizing: border-box;
                                                        -webkit-box-sizing: border-box;
                                                        -moz-box-sizing: border-box;
                                                        padding: 30px 30px 0px 30px
                                                    }
                                                    
                                                    .eg-harding-wrapper .esg-media-poster {
                                                        overflow: hidden;
                                                        border-radius: 50%;
                                                        -webkit-border-radius: 50%;
                                                        -moz-border-radius: 50%
                                                    }
                                                    
                                                    .eg-ulysses-s-grant-wrapper .esg-entry-media {
                                                        overflow: hidden;
                                                        box-sizing: border-box;
                                                        -webkit-box-sizing: border-box;
                                                        -moz-box-sizing: border-box;
                                                        padding: 30px 30px 0px 30px
                                                    }
                                                    
                                                    .eg-ulysses-s-grant-wrapper .esg-media-poster {
                                                        overflow: hidden;
                                                        border-radius: 50%;
                                                        -webkit-border-radius: 50%;
                                                        -moz-border-radius: 50%
                                                    }
                                                    
                                                    .eg-richard-nixon-wrapper .esg-entry-media {
                                                        overflow: hidden;
                                                        box-sizing: border-box;
                                                        -webkit-box-sizing: border-box;
                                                        -moz-box-sizing: border-box;
                                                        padding: 30px 30px 0px 30px
                                                    }
                                                    
                                                    .eg-richard-nixon-wrapper .esg-media-poster {
                                                        overflow: hidden;
                                                        border-radius: 50%;
                                                        -webkit-border-radius: 50%;
                                                        -moz-border-radius: 50%
                                                    }
                                                    
                                                    .eg-herbert-hoover-wrapper .esg-media-poster {
                                                        filter: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0'/></filter></svg>#grayscale");
                                                        filter: gray;
                                                        -webkit-filter: grayscale(100%)
                                                    }
                                                    
                                                    .eg-herbert-hoover-wrapper:hover .esg-media-poster {
                                                        filter: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='1 0 0 0 0,0 1 0 0 0,0 0 1 0 0,0 0 0 1 0'/></filter></svg>#grayscale");
                                                        -webkit-filter: grayscale(0%)
                                                    }
                                                    
                                                    .eg-lyndon-johnson-wrapper .esg-media-poster {
                                                        filter: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0'/></filter></svg>#grayscale");
                                                        filter: gray;
                                                        -webkit-filter: grayscale(100%)
                                                    }
                                                    
                                                    .eg-lyndon-johnson-wrapper:hover .esg-media-poster {
                                                        filter: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='1 0 0 0 0,0 1 0 0 0,0 0 1 0 0,0 0 0 1 0'/></filter></svg>#grayscale");
                                                        -webkit-filter: grayscale(0%)
                                                    }
                                                    
                                                    .esg-overlay.eg-ronald-reagan-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.85)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .eg-georgebush-wrapper .esg-entry-cover {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.85)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .eg-jefferson-wrapper {
                                                        -webkit-border-radius: 5px !important;
                                                        -moz-border-radius: 5px !important;
                                                        border-radius: 5px !important;
                                                        -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC) !important
                                                    }
                                                    
                                                    .eg-monroe-element-1 {
                                                        text-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1)
                                                    }
                                                    
                                                    .eg-lyndon-johnson-wrapper .esg-entry-cover {
                                                        background: -moz-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(0, 0, 0, 0.35)), color-stop(96%, rgba(18, 18, 18, 0)), color-stop(100%, rgba(19, 19, 19, 0)));
                                                        background: -webkit-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        background: -o-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        background: -ms-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#59000000', endColorstr='#00131313', GradientType=1)
                                                    }
                                                    
                                                    .eg-wilbert-wrapper .esg-entry-cover {
                                                        background: -moz-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(0, 0, 0, 0.35)), color-stop(96%, rgba(18, 18, 18, 0)), color-stop(100%, rgba(19, 19, 19, 0)));
                                                        background: -webkit-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        background: -o-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        background: -ms-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, rgba(18, 18, 18, 0) 96%, rgba(19, 19, 19, 0) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#59000000', endColorstr='#00131313', GradientType=1)
                                                    }
                                                    
                                                    .eg-wilbert-wrapper .esg-media-poster {
                                                        -webkit-transition: 0.4s ease-in-out;
                                                        -moz-transition: 0.4s ease-in-out;
                                                        -o-transition: 0.4s ease-in-out;
                                                        transition: 0.4s ease-in-out;
                                                        filter: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0'/></filter></svg>#grayscale");
                                                        filter: gray;
                                                        -webkit-filter: grayscale(100%)
                                                    }
                                                    
                                                    .eg-wilbert-wrapper:hover .esg-media-poster {
                                                        filter: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='1 0 0 0 0,0 1 0 0 0,0 0 1 0 0,0 0 0 1 0'/></filter></svg>#grayscale");
                                                        -webkit-filter: grayscale(0%)
                                                    }
                                                    
                                                    .eg-phillie-element-3:after {
                                                        content: " ";
                                                        width: 0px;
                                                        height: 0px;
                                                        border-style: solid;
                                                        border-width: 5px 5px 0 5px;
                                                        border-color: #000 transparent transparent transparent;
                                                        left: 50%;
                                                        margin-left: -5px;
                                                        bottom: -5px;
                                                        position: absolute
                                                    }
                                                    
                                                    .eg-howardtaft-wrapper .esg-media-poster,
                                                    .eg-howardtaft-wrapper .esg-media-poster {
                                                        filter: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='1 0 0 0 0,0 1 0 0 0,0 0 1 0 0,0 0 0 1 0'/></filter></svg>#grayscale");
                                                        -webkit-filter: grayscale(0%)
                                                    }
                                                    
                                                    .eg-howardtaft-wrapper:hover .esg-media-poster,
                                                    .eg-howardtaft-wrapper:hover .esg-media-poster {
                                                        filter: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg'><filter id='grayscale'><feColorMatrix type='matrix' values='0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0'/></filter></svg>#grayscale");
                                                        filter: gray;
                                                        -webkit-filter: grayscale(100%)
                                                    }
                                                    
                                                    .myportfolio-container .added_to_cart.wc-forward {
                                                        font-family: "Open Sans";
                                                        font-size: 13px;
                                                        color: #fff;
                                                        margin-top: 10px
                                                    }
                                                    
                                                    .esgbox-title.esgbox-title-outside-wrap {
                                                        font-size: 15px;
                                                        font-weight: 700;
                                                        text-align: center
                                                    }
                                                    
                                                    .esgbox-title.esgbox-title-inside-wrap {
                                                        padding-bottom: 10px;
                                                        font-size: 15px;
                                                        font-weight: 700;
                                                        text-align: center
                                                    }
                                                    
                                                    .esg-content.eg-twitterstream-element-33-a {
                                                        display: inline-block
                                                    }
                                                    
                                                    .eg-twitterstream-element-35 {
                                                        word-break: break-all
                                                    }
                                                    
                                                    .esg-overlay.eg-twitterstream-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.85)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .esg-content.eg-facebookstream-element-33-a {
                                                        display: inline-block
                                                    }
                                                    
                                                    .eg-facebookstream-element-0 {
                                                        word-break: break-all
                                                    }
                                                    
                                                    .esg-overlay.eg-flickrstream-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.85)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .esg-content.eg-twitterstream-element-33-a {
                                                        display: inline-block
                                                    }
                                                    
                                                    .eg-twitterstream-element-35 {
                                                        word-break: break-all
                                                    }
                                                    
                                                    .esg-overlay.eg-twitterstream-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.85)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .esg-content.eg-facebookstream-element-33-a {
                                                        display: inline-block
                                                    }
                                                    
                                                    .eg-facebookstream-element-0 {
                                                        word-break: break-all
                                                    }
                                                    
                                                    .esg-overlay.eg-flickrstream-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(40%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.85)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .eg-sonaar-events-grid01-element-14-a {
                                                        min-height: 37px
                                                    }
                                                    
                                                    .esg-overlay.eg-news-skin-1-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0.9)), color-stop(99%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, 0.9)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .esg-overlay.eg-sonaar-artists-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0.9)), color-stop(99%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, 0.9)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.9) 99%, rgba(0, 0, 0, 1) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .esg-content.eg-twitterstream-element-33-a {
                                                        display: inline-block
                                                    }
                                                    
                                                    .eg-twitterstream-element-35 {
                                                        word-break: break-all
                                                    }
                                                    
                                                    .esg-overlay.eg-twitterstream-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.85)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                    
                                                    .esg-content.eg-facebookstream-element-33-a {
                                                        display: inline-block
                                                    }
                                                    
                                                    .eg-facebookstream-element-0 {
                                                        word-break: break-all
                                                    }
                                                    
                                                    .esg-overlay.eg-flickrstream-container {
                                                        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(99%, rgba(0, 0, 0, 0.83)), color-stop(100%, rgba(0, 0, 0, 0.85)));
                                                        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.83) 99%, rgba(0, 0, 0, 0.85) 100%);
                                                        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#d9000000', GradientType=0)
                                                    }
                                                </style>
                                                <!-- CACHE CREATED FOR: 54 -->
                                                <style type="text/css">
                                                    .studio-skin .navigationbuttons,
                                                    .studio-skin .esg-pagination,
                                                    .studio-skin .esg-filters {
                                                        text-transform: uppercase;
                                                        text-align: center
                                                    }
                                                    
                                                    .studio-skin .esg-filterbutton,
                                                    .studio-skin .esg-navigationbutton,
                                                    .studio-skin .esg-sortbutton,
                                                    .studio-skin .esg-cartbutton {
                                                        color: inherit;
                                                        margin: 30px 5px;
                                                        cursor: pointer;
                                                        position: relative;
                                                        z-index: 2;
                                                        border-bottom: 5px solid;
                                                        padding: 8px 0;
                                                        line-height: 18px;
                                                        font-size: 18px;
                                                        letter-spacing: 2px;
                                                        font-weight: 700;
                                                        text-transform: uppercase;
                                                        font-family: "monserrat", sans-serif;
                                                        display: inline-block;
                                                        transition: 0.1s ease
                                                    }
                                                    
                                                    .studio-skin .esg-navigationbutton {
                                                        padding: 8px 0
                                                    }
                                                    
                                                    .studio-skin .esg-navigationbutton * {
                                                        color: #000
                                                    }
                                                    
                                                    .studio-skin .esg-pagination-button:last-child {
                                                        margin-right: 0
                                                    }
                                                    
                                                    .studio-skin .esg-sortbutton-wrapper,
                                                    .studio-skin .esg-cartbutton-wrapper {
                                                        display: inline-block
                                                    }
                                                    
                                                    .studio-skin .esg-sortbutton-order,
                                                    .studio-skin .esg-cartbutton-order {
                                                        display: inline-block;
                                                        vertical-align: top;
                                                        border: none;
                                                        width: 40px;
                                                        line-height: 40px;
                                                        border-radius: 5px;
                                                        -moz-border-radius: 5px;
                                                        -webkit-border-radius: 5px;
                                                        font-size: 12px;
                                                        font-weight: 700;
                                                        color: #999;
                                                        cursor: pointer;
                                                        background: #eee;
                                                        background: #fff;
                                                        margin-left: 5px
                                                    }
                                                    
                                                    .studio-skin .esg-cartbutton {
                                                        color: #fff;
                                                        cursor: default !important
                                                    }
                                                    
                                                    .studio-skin .esg-cartbutton .esgicon-basket {
                                                        color: #fff;
                                                        font-size: 15px;
                                                        line-height: 15px;
                                                        margin-right: 10px
                                                    }
                                                    
                                                    .studio-skin .esg-cartbutton-wrapper {
                                                        cursor: default !important
                                                    }
                                                    
                                                    .studio-skin .esg-sortbutton,
                                                    .studio-skin .esg-cartbutton {
                                                        display: inline-block;
                                                        position: relative;
                                                        cursor: pointer;
                                                        margin-right: 0px;
                                                        border-radius: 5px;
                                                        -moz-border-radius: 5px;
                                                        -webkit-border-radius: 5px
                                                    }
                                                    
                                                    .studio-skin .esg-navigationbutton:hover,
                                                    .studio-skin .esg-filterbutton:hover,
                                                    .studio-skin .esg-sortbutton:hover,
                                                    .studio-skin .esg-sortbutton-order:hover,
                                                    .studio-skin .esg-cartbutton-order:hover,
                                                    .studio-skin .esg-filterbutton.selected {
                                                        padding-bottom: 5px;
                                                        margin-bottom: 33px
                                                    }
                                                    
                                                    .studio-skin .esg-navigationbutton:hover * {
                                                        color: #333
                                                    }
                                                    
                                                    .studio-skin .esg-sortbutton-order.tp-desc:hover {
                                                        color: #333
                                                    }
                                                    
                                                    .studio-skin .esg-filter-checked {
                                                        padding: 1px 3px;
                                                        color: #cbcbcb;
                                                        background: #cbcbcb;
                                                        margin-left: 7px;
                                                        font-size: 9px;
                                                        font-weight: 300;
                                                        line-height: 9px;
                                                        vertical-align: middle
                                                    }
                                                    
                                                    .studio-skin .esg-filterbutton.selected .esg-filter-checked,
                                                    .studio-skin .esg-filterbutton:hover .esg-filter-checked {
                                                        padding: 1px 3px 1px 3px;
                                                        color: #fff;
                                                        background: #000;
                                                        margin-left: 7px;
                                                        font-size: 9px;
                                                        font-weight: 300;
                                                        line-height: 9px;
                                                        vertical-align: middle
                                                    }
                                                </style>
                                                <style type="text/css">
                                                    .eg-sonaar-home-work-element-14 {
                                                        font-size: 25px;
                                                        line-height: 25px;
                                                        color: #ffffff;
                                                        font-weight: 600;
                                                        padding: 0px 0px 0px 0px;
                                                        border-radius: 0px 0px 0px 0px;
                                                        background: transparent;
                                                        z-index: 2 !important;
                                                        display: block;
                                                        font-family: "Montserrat"
                                                    }
                                                    
                                                    .eg-sonaar-home-work-element-17 {
                                                        font-size: 16px;
                                                        line-height: 16px;
                                                        color: #ffffff;
                                                        font-weight: 400;
                                                        display: block;
                                                        text-align: left;
                                                        clear: none;
                                                        margin: 10px 0px 8px 20px;
                                                        padding: 0px 0px 0px 0px;
                                                        border-radius: 0px 0px 0px 0px;
                                                        background: transparent;
                                                        position: relative;
                                                        z-index: 2 !important;
                                                        font-family: "Montserrat"
                                                    }
                                                    
                                                    .eg-sonaar-home-work-element-15 {
                                                        font-size: 12px;
                                                        line-height: 12px;
                                                        color: #ffffff;
                                                        font-weight: 400;
                                                        display: block;
                                                        text-align: left;
                                                        clear: none;
                                                        margin: 8px 0px 25px 20px;
                                                        padding: 0px 0px 0px 0px;
                                                        border-radius: 0px 0px 0px 0px;
                                                        background: transparent;
                                                        position: relative;
                                                        z-index: 2 !important;
                                                        font-family: "Montserrat"
                                                    }
                                                </style>
                                                <style type="text/css"></style>
                                                <style type="text/css">
                                                    .eg-sonaar-home-work-element-14-a {
                                                        display: block;
                                                        text-align: left;
                                                        clear: none;
                                                        margin: 25px 0px 10px 20px;
                                                        position: relative
                                                    }
                                                </style>
                                                <style type="text/css">
                                                    .eg-sonaar-home-work-container {
                                                        background: transparent
                                                    }
                                                </style>
                                                <style type="text/css">
                                                    .eg-sonaar-home-work-content {
                                                        background: rgba(255, 255, 255, 0);
                                                        padding: 0px 10px 10px 10px;
                                                        border-width: 0px 0px 0px 0px;
                                                        border-radius: 0px 0px 0px 0px;
                                                        border-color: transparent;
                                                        border-style: none;
                                                        text-align: left
                                                    }
                                                </style>
                                                <style type="text/css">
                                                    .esg-grid .mainul li.eg-sonaar-home-work-wrapper {
                                                        background: transparent;
                                                        padding: 0px 0px 10px 0px;
                                                        border-width: 0px 0px 0px 0px;
                                                        border-radius: 0px 0px 0px 0px;
                                                        border-color: transparent;
                                                        border-style: none;
                                                        overflow: hidden;
                                                        -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC) !important
                                                    }
                                                </style>
                                                <style type="text/css">
                                                    .esg-grid .mainul li.eg-sonaar-home-work-wrapper .esg-media-poster {
                                                        background-size: cover;
                                                        background-position: center center;
                                                        background-repeat: no-repeat
                                                    }
                                                </style>
                                                {/ignore}
                                                <!-- THE ESSENTIAL GRID 2.2.4 POST -->

                                                <article class="myportfolio-container studio-skin source_type_post" id="esg-grid-54-1-wrap">

                                                    <div id="esg-grid-54-1" class="esg-grid" style="background: transparent;padding: 25px 25px 25px 25px ; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box;">
                                                        <ul>
                                                            <li id="eg-54-post-id-646" class="filterall filter-indie eg-sonaar-home-work-wrapper eg-post-id-646" data-egl-album-release-date="2018" data-cobblesw="1" data-cobblesh="1">
                                                                <div class="esg-media-cover-wrapper">
                                                                    <div class="esg-entry-media"><img src="http://zahod5277.bget.ru/wp-content/uploads/2016/11/a-spotify-album.jpg" alt="" width="500" height="500"></div>

                                                                    <div class="esg-entry-cover" data-clickable="on">

                                                                        <a class="eg-invisiblebutton" href="http://zahod5277.bget.ru/playlist/spotify-album/" target="_self"></a>
                                                                        <div class="esg-overlay esg-fadeout eg-sonaar-home-work-container" data-delay="0"></div>

                                                                        <div class="esg-top eg-post-646 eg-sonaar-home-work-element-14-a esg-falldown" data-delay="0.4"><a class="eg-sonaar-home-work-element-14 eg-post-646" href="http://zahod5277.bget.ru/playlist/spotify-album/" target="_self">A Spotify Album</a></div>
                                                                        <div class="esg-top eg-post-646 eg-sonaar-home-work-element-17 esg-falldown" data-delay="0.4">by Diamond</div>
                                                                        <div class="esg-top eg-post-646 eg-sonaar-home-work-element-15 esg-falldown" data-delay="0.4">2018</div>
                                                                    </div>
                                                                </div>

                                                            </li>
                                                            <li id="eg-54-post-id-1756" class="filterall filter-indie eg-sonaar-home-work-wrapper eg-post-id-1756" data-egl-album-release-date="2018" data-cobblesw="1" data-cobblesh="1">
                                                                <div class="esg-media-cover-wrapper">
                                                                    <div class="esg-entry-media"><img src="http://zahod5277.bget.ru/wp-content/uploads/2016/11/a-soundcloud-album.jpg" alt="" width="500" height="500"></div>

                                                                    <div class="esg-entry-cover" data-clickable="on">

                                                                        <a class="eg-invisiblebutton" href="http://zahod5277.bget.ru/playlist/soundcloud-album/" target="_self"></a>
                                                                        <div class="esg-overlay esg-fadeout eg-sonaar-home-work-container" data-delay="0"></div>

                                                                        <div class="esg-top eg-post-1756 eg-sonaar-home-work-element-14-a esg-falldown" data-delay="0.4"><a class="eg-sonaar-home-work-element-14 eg-post-1756" href="http://zahod5277.bget.ru/playlist/soundcloud-album/" target="_self">A SoundCloud Album</a></div>
                                                                        <div class="esg-top eg-post-1756 eg-sonaar-home-work-element-17 esg-falldown" data-delay="0.4">by Diamond</div>
                                                                        <div class="esg-top eg-post-1756 eg-sonaar-home-work-element-15 esg-falldown" data-delay="0.4">2018</div>
                                                                    </div>
                                                                </div>

                                                            </li>
                                                            <li id="eg-54-post-id-2080" class="filterall filter-electro eg-sonaar-home-work-wrapper eg-post-id-2080" data-egl-album-release-date="2017" data-cobblesw="1" data-cobblesh="1">
                                                                <div class="esg-media-cover-wrapper">
                                                                    <div class="esg-entry-media"><img src="http://zahod5277.bget.ru/wp-content/uploads/2017/09/Play-2.jpg" alt="" width="464" height="464"></div>

                                                                    <div class="esg-entry-cover" data-clickable="on">

                                                                        <a class="eg-invisiblebutton" href="http://zahod5277.bget.ru/playlist/dust-to-play/" target="_self"></a>
                                                                        <div class="esg-overlay esg-fadeout eg-sonaar-home-work-container" data-delay="0"></div>

                                                                        <div class="esg-top eg-post-2080 eg-sonaar-home-work-element-14-a esg-falldown" data-delay="0.4"><a class="eg-sonaar-home-work-element-14 eg-post-2080" href="http://zahod5277.bget.ru/playlist/dust-to-play/" target="_self">Dust to Play</a></div>
                                                                        <div class="esg-top eg-post-2080 eg-sonaar-home-work-element-17 esg-falldown" data-delay="0.4">by Herbalizer</div>
                                                                        <div class="esg-top eg-post-2080 eg-sonaar-home-work-element-15 esg-falldown" data-delay="0.4">2017</div>
                                                                    </div>
                                                                </div>

                                                            </li>
                                                        </ul>
                                                    </div>

                                                </article>
                                                <div class="clear"></div>
                                                {ignore}
                                                <script type="text/javascript">
                                                    function eggbfc(winw, resultoption) {
                                                        var lasttop = winw,
                                                            lastbottom = 0,
                                                            smallest = 9999,
                                                            largest = 0,
                                                            samount = 0,
                                                            lamount = 0,
                                                            lastamount = 0,
                                                            resultid = 0,
                                                            resultidb = 0,
                                                            responsiveEntries = [{
                                                                width: 1400,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 1170,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 1024,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 960,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 778,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 640,
                                                                amount: 1,
                                                                mmheight: 0
                                                            }, {
                                                                width: 480,
                                                                amount: 1,
                                                                mmheight: 0
                                                            }];
                                                        if (responsiveEntries != undefined && responsiveEntries.length > 0)
                                                            jQuery.each(responsiveEntries, function(index, obj) {
                                                                var curw = obj.width != undefined ? obj.width : 0,
                                                                    cura = obj.amount != undefined ? obj.amount : 0;
                                                                if (smallest > curw) {
                                                                    smallest = curw;
                                                                    samount = cura;
                                                                    resultidb = index;
                                                                }
                                                                if (largest < curw) {
                                                                    largest = curw;
                                                                    lamount = cura;
                                                                }
                                                                if (curw > lastbottom && curw <= lasttop) {
                                                                    lastbottom = curw;
                                                                    lastamount = cura;
                                                                    resultid = index;
                                                                }
                                                            });
                                                        if (smallest > winw) {
                                                            lastamount = samount;
                                                            resultid = resultidb;
                                                        }
                                                        var obj = new Object;
                                                        obj.index = resultid;
                                                        obj.column = lastamount;
                                                        if (resultoption == "id")
                                                            return obj;
                                                        else
                                                            return lastamount;
                                                    }
                                                    if ("cobbles" == "even") {
                                                        var coh = 0,
                                                            container = jQuery("#esg-grid-54-1");
                                                        var cwidth = container.width(),
                                                            ar = "3:3",
                                                            gbfc = eggbfc(jQuery(window).width(), "id"),
                                                            row = 2;
                                                        ar = ar.split(":");
                                                        var aratio = parseInt(ar[0], 0) / parseInt(ar[1], 0);
                                                        coh = cwidth / aratio;
                                                        coh = coh / gbfc.column * row;
                                                        var ul = container.find("ul").first();
                                                        ul.css({
                                                            display: "block",
                                                            height: coh + "px"
                                                        });
                                                    }
                                                    var essapi_54;
                                                    jQuery(document).ready(function() {
                                                        essapi_54 = jQuery("#esg-grid-54-1").tpessential({
                                                            gridID: 54,
                                                            layout: "cobbles",
                                                            forceFullWidth: "off",
                                                            lazyLoad: "off",
                                                            gridID: "54",
                                                            loadMoreType: "button",
                                                            loadMoreAmount: 12,
                                                            loadMoreTxt: "More Works",
                                                            loadMoreNr: "off",
                                                            loadMoreEndTxt: "No More Items for the Selected Filter",
                                                            loadMoreItems: [
                                                                [2083, [-1, 32]],
                                                                [2086, [-1, 30]],
                                                                [2090, [-1, 30]],
                                                                [2093, [-1, 32]],
                                                                [2098, [-1, 31]],
                                                                [2192, [-1, 31]],
                                                                [1218, [-1, 31]]
                                                            ],
                                                            row: 9999,
                                                            apiName: "essapi_54",
                                                            loadMoreAjaxToken: "76482decaf",
                                                            loadMoreAjaxUrl: "http://zahod5277.bget.ru/wp-admin/admin-ajax.php",
                                                            loadMoreAjaxAction: "Essential_Grid_Front_request_ajax",
                                                            ajaxContentTarget: "ess-grid-ajax-container-",
                                                            ajaxScrollToOffset: "0",
                                                            ajaxCloseButton: "off",
                                                            ajaxContentSliding: "on",
                                                            ajaxScrollToOnLoad: "on",
                                                            ajaxCallbackArgument: "off",
                                                            ajaxNavButton: "off",
                                                            ajaxCloseType: "type1",
                                                            ajaxCloseInner: "false",
                                                            ajaxCloseStyle: "light",
                                                            ajaxClosePosition: "tr",
                                                            space: 20,
                                                            pageAnimation: "fade",
                                                            paginationScrollToTop: "off",
                                                            paginationAutoplay: "off",
                                                            spinner: "spinner-1",
                                                            spinnerColor: "#FFFFFF",
                                                            lightBoxMode: "single",
                                                            lightboxHash: "group",
                                                            lightboxPostMinWid: "75%",
                                                            lightboxPostMaxWid: "75%",
                                                            lightboxSpinner: "off",
                                                            lightBoxFeaturedImg: "off",
                                                            lightBoxPostTitle: "off",
                                                            lightBoxPostTitleTag: "h2",
                                                            lightboxMargin: "0|0|0|0",
                                                            lbContentPadding: "0|0|0|0",
                                                            lbContentOverflow: "auto",
                                                            animSpeed: 400,
                                                            delayBasic: 1,
                                                            mainhoverdelay: 1,
                                                            filterType: "single",
                                                            showDropFilter: "hover",
                                                            filterGroupClass: "esg-fgc-54",
                                                            filterNoMatch: "No Items for the Selected Filter",
                                                            filterDeepLink: "off",
                                                            googleFonts: ['Poppins:300,700', 'Montserrat:400,500,600,700,800'],
                                                            cookies: {
                                                                filter: "on",
                                                                timetosave: "30"
                                                            },
                                                            aspectratio: "3:3",
                                                            responsiveEntries: [{
                                                                width: 1400,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 1170,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 1024,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 960,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 778,
                                                                amount: 3,
                                                                mmheight: 0
                                                            }, {
                                                                width: 640,
                                                                amount: 1,
                                                                mmheight: 0
                                                            }, {
                                                                width: 480,
                                                                amount: 1,
                                                                mmheight: 0
                                                            }]
                                                        });
                                                        var arrows = true,
                                                            lightboxOptions = {
                                                                margin: [0, 0, 0, 0],
                                                                buttons: ["share", "thumbs", "close"],
                                                                infobar: true,
                                                                loop: true,
                                                                slideShow: {
                                                                    "autoStart": false,
                                                                    "speed": 3000
                                                                },
                                                                animationEffect: "fade",
                                                                animationDuration: 500,
                                                                beforeShow: function(a, c) {
                                                                    if (!arrows) {
                                                                        jQuery("body").addClass("esgbox-hidearrows");
                                                                    }
                                                                    var i = 0,
                                                                        multiple = false;
                                                                    a = a.slides;
                                                                    for (var b in a) {
                                                                        i++;
                                                                        if (i > 1) {
                                                                            multiple = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                    if (!multiple) jQuery("body").addClass("esgbox-single");
                                                                    if (c.type === "image") jQuery(".esgbox-button--zoom").show();
                                                                },
                                                                beforeLoad: function(a, b) {
                                                                    jQuery("body").removeClass("esg-four-by-three");
                                                                    if (b.opts.$orig.data("ratio") === "4:3") jQuery("body").addClass("esg-four-by-three");
                                                                },
                                                                afterLoad: function() {
                                                                    jQuery(window).trigger("resize.esglb");
                                                                },
                                                                afterClose: function() {
                                                                    jQuery("body").removeClass("esgbox-hidearrows esgbox-single");
                                                                },
                                                                transitionEffect: "fade",
                                                                transitionDuration: 366,
                                                                hash: "group",
                                                                arrows: true,
                                                                wheel: false,
                                                            };
                                                        jQuery("#esg-grid-54-1").data("lightboxsettings", lightboxOptions);
                                                    });
                                                </script>
                                                {ignore}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <section data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="2" data-vc-parallax-image="http://zahod5277.bget.ru/wp-content/uploads/2018/02/studio-bg_04.jpg" class="vc_section vc_custom_1518643097470 vc_section-has-fill vc_general vc_parallax vc_parallax-content-moving">
                                    <div style="" class="vc_row wpb_row vc_row-fluid special-big-text vc_custom_1518643703020 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                                        <div class="wpb_column vc_column_container vc_col-sm-4 text-lg-right text-md-right text-sm-center text-xs-center">
                                            <div class="vc_column-inner vc_custom_1518644114975" style="">
                                                <div class="wpb_wrapper">
                                                    <h2 style="font-size: 72px;color: #00ad8e;line-height: 68px;text-align: right;font-family:Oswald;font-weight:700;font-style:normal" class="vc_custom_heading">CLIENTS<br />
                                                            LIST</h2></div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-8 text-sm-center text-xs-center sonaar-column-responsive-5abcf8b5b6fe0">
                                            <div class="vc_column-inner vc_custom_1518644123266" style="">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element  vc_custom_1518642693227">
                                                        <div class="wpb_wrapper">
                                                            <p><span style="color: #d7d7d7;">During the last few years, we’ve met several great people. Here’s a list to name a few.</span></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {ignore}
                                        <script type="text/javascript">
                                            (function($) {
                                                $("head").append("<style>@media (max-width: 991px) and (min-width: 768px) { .sonaar-column-responsive-5abcf8b5b6fe0 > .vc_column-inner {padding-right:20px !important; padding-left:20px !important;  }  } @media (max-width: 767px) { .sonaar-column-responsive-5abcf8b5b6fe0 > .vc_column-inner {padding-right:15px !important; padding-left:15px !important;  }  } </style>");
                                            })(jQuery);
                                        </script>
                                        {/ignore}
                                    </div>
                                    <div style="" class="vc_row wpb_row vc_row-fluid special-medium-text vc_custom_1518643936624 sonaar-row-responsive-5abcf8b5b7217">
                                        <div class="wpb_column vc_column_container vc_col-sm-4 text-sm-center text-xs-center">
                                            <div class="vc_column-inner " style="">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p><span style="color: #d7d7d7;">Jay Boy </span><span style="color: #d7d7d7;">Adams </span></p>
                                                            <p><span style="color: #d7d7d7;">Clay </span><span style="color: #d7d7d7;">Aiken </span></p>
                                                            <p><span style="color: #d7d7d7;">Chris </span><span style="color: #d7d7d7;">Akinyemi </span></p>
                                                            <p><span style="color: #d7d7d7;">Akon</span></p>
                                                            <p><span style="color: #d7d7d7;">Michael Alig</span></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-4 text-sm-center text-xs-center">
                                            <div class="vc_column-inner " style="">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p><span style="color: #d7d7d7;">Paul Anka</span></p>
                                                            <p><span style="color: #d7d7d7;">Marc Anthony</span></p>
                                                            <p><span style="color: #d7d7d7;">Susan Anton</span></p>
                                                            <p><span style="color: #d7d7d7;">Eric Anzalone</span></p>
                                                            <p><span style="color: #d7d7d7;">Alfred Apaka</span></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-4 text-sm-center text-xs-center">
                                            <div class="vc_column-inner " style="">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p><span style="color: #d7d7d7;">John Brannen </span></p>
                                                            <p><span style="color: #d7d7d7;">Bob Braun </span></p>
                                                            <p><span style="color: #d7d7d7;">Bray </span></p>
                                                            <p><span style="color: #d7d7d7;">Teresa Brewer </span></p>
                                                            <p><span style="color: #d7d7d7;">Alicia Bridges</span></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {ignore}
                                    <script type="text/javascript">
                                        (function($) {
                                            $("head").append("<style>@media (max-width: 991px) and (min-width: 768px) { .sonaar-row-responsive-5abcf8b5b7217 {margin-right:100px !important; margin-left:100px !important;  }  } @media (max-width: 767px) { .sonaar-row-responsive-5abcf8b5b7217 {margin-right:15px !important; margin-left:15px !important;  }  } </style>");
                                        })(jQuery);
                                    </script>
                                    {/ignore}
                                </section>
                                <div class="vc_row-full-width vc_clearfix"></div>
                            </div>

                            <div id="comments" class="comments-area">

                            </div>
                        </article>
                    </div>

                </div>

                <!-- footer -->
                <footer id="footer">
                    <div class="container">
                        
                        <div style="" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1518709822252 vc_row-has-fill vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner " style="">
                                    <div class="wpb_wrapper">
                                        <div class="vc_btn3-container vc_btn3-inline vc_custom_1518710011793 ">
                                            <a style="background-color:#000000; color:#dfd9df;" class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-round vc_btn3-style-custom vc_btn3-o-empty vc_btn3-icon-left" href="//twitter.com" title="" target="_blank"><i class="vc_btn3-icon fa fa-twitter"></i> <span class="vc_btn3-placeholder">&nbsp;</span></a></div>
                                        <div class="vc_btn3-container vc_btn3-inline vc_custom_1518710023558 ">
                                            <a style="background-color:#000000; color:#dfd9df;" class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-round vc_btn3-style-custom vc_btn3-o-empty vc_btn3-icon-left" href="//facebook.com" title="" target="_blank"><i class="vc_btn3-icon fa fa-facebook"></i> <span class="vc_btn3-placeholder">&nbsp;</span></a></div>
                                        <div class="vc_btn3-container vc_btn3-inline vc_custom_1518710034043 ">
                                            <a style="background-color:#000000; color:#ffffff;" class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-round vc_btn3-style-custom vc_btn3-o-empty vc_btn3-icon-left" href="//instagram.com" title="" target="_blank"><i class="vc_btn3-icon fa fa-instagram"></i> <span class="vc_btn3-placeholder">&nbsp;</span></a></div>
                                        <div class="vc_btn3-container vc_btn3-inline vc_custom_1518710043746 ">
                                            <a style="background-color:#000000; color:#dfd9df;" class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-round vc_btn3-style-custom vc_btn3-o-empty vc_btn3-icon-left" href="//soundcloud.com" title="" target="_blank"><i class="vc_btn3-icon fa fa-soundcloud"></i> <span class="vc_btn3-placeholder">&nbsp;</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row-full-width vc_clearfix"></div>
                        <div style="" class="vc_row wpb_row vc_row-fluid vc_custom_1518748899964">
                            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-4 vc_col-xs-12 text-lg-left text-md-center text-sm-center text-xs-center sonaar-column-responsive-5abcf8b5b9732">
                                <div class="vc_column-inner vc_custom_1518732597758" style="">
                                    <div class="wpb_wrapper">
                                        <h2 style="font-size: 36px;color: #dfd9df;line-height: 36px;text-align: left;letter-spacing:2px" class="vc_custom_heading vc_custom_1518729902060" data-fitText="true" data-max-fontSize="36px">NEWSLETTER</h2>
                                        <div style="font-size: 16px;color: #dfd9df;line-height: 18px;text-align: left;font-family:Montserrat;font-weight:500;font-style:normal;letter-spacing:1px" class="vc_custom_heading">STAY TUNED WITH OUR MAILING LIST</div>
                                    </div>
                                </div>
                            </div>
                            {ignore}
                            <script type="text/javascript">
                                (function($) {
                                    $("head").append("<style>@media (max-width: 767px) { .sonaar-column-responsive-5abcf8b5b9732 > .vc_column-inner {margin-bottom:30px !important;  }  } </style>");
                                })(jQuery);
                            </script>
                            {/ignore}
                            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-8 vc_col-md-8 vc_col-xs-12 text-lg-left text-md-center text-sm-center text-xs-center sonaar-column-responsive-5abcf8b5b9ba1">
                                <div class="vc_column-inner vc_custom_1518732345002" style="">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <p>[mc4wp_form id=&#187;1306&#8243;]</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {ignore}
                            <script type="text/javascript">
                                (function($) {
                                    $("head").append("<style>@media (max-width: 1199px) and (min-width: 992px) { .sonaar-column-responsive-5abcf8b5b9ba1 > .vc_column-inner {padding-right:15px !important; padding-left:15px !important;  }  } @media (max-width: 991px) and (min-width: 768px) { .sonaar-column-responsive-5abcf8b5b9ba1 > .vc_column-inner {padding-right:15px !important; padding-left:15px !important;  }  } </style>");
                                })(jQuery);
                            </script>
                            {/ignore}
                        </div>
                        <div style="" class="vc_row wpb_row vc_row-fluid vc_custom_1518748910174 vc_row-has-fill">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner " style="">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element  footercredit">
                                            <div class="wpb_wrapper">
                                                <p style="text-align: center;">2018 © SONAAR MUSIC &#8212; music wordpress theme by <a href="//sonaar.io" target="_blank" rel="noopener">sonaar.io</a></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </footer>
            </div>
        </div>
    </div>
    </div>

    </div>
    <link rel='stylesheet' id='vc_google_fonts_oswald200300regular500600700-css' href='//fonts.googleapis.com/css?family=Oswald%3A200%2C300%2Cregular%2C500%2C600%2C700&#038;ver=4.9.4' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css' href='http://zahod5277.bget.ru/wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css?ver=5.4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='vc_google_fonts_montserrat100100italic200200italic300300italicregularitalic500500italic600600italic700700italic800800italic900900italic-css' href='//fonts.googleapis.com/css?family=Montserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;ver=4.9.4' type='text/css' media='all' />

    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.0.1'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/themes/sonaar/js/countdown-l10n/jquery.countdown-ru.js'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-includes/js/underscore.min.js?ver=1.8.3'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=5.4.7'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/themes/sonaar/dist/js/sonaar.scripts.min.js?ver=1.5.1'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/themes/sonaar/classic-menu/js/classic.min.js?ver=4.9.4'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/themes/sonaar/includes/sonaar-music/js/countdown/jquery.plugin.min.js'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/themes/sonaar/includes/sonaar-music/js/countdown/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-includes/js/wp-embed.min.js?ver=4.9.4'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/plugins/js_composer/assets/lib/bower/skrollr/dist/skrollr.min.js?ver=5.4.7'></script>
    <script type='text/javascript' src='http://zahod5277.bget.ru/wp-content/plugins/essential-grid/public/assets/js/jquery.themepunch.essential.min.js?ver=2.2.4'></script>
    <a href="#" id="back-to-top-mobile" class="footer-wrapper-backtotop-mobile">
        <i class="fa fa-chevron-up"></i>
    </a>
    <a href="#" id="back-to-top" class="footer-wrapper-backtotop">
        <i class="fa fa-chevron-up"></i>
    </a>

    <!--[if lte IE 8]>
<script type="text/javascript">
    document.body.className = document.body.className.replace( /(^|\s)(no-)?customize-support(?=\s|$)/, '' ) + ' no-customize-support';
</script>
<![endif]-->

</body>

</html>