/*global $ jQuery IRON*/
"use strict";
$ = jQuery;
var $wrap = $('.classic-menu');
var $menu = $wrap.find('#menu-main-menu');
var menu_height = $menu.outerHeight(true);


// add class ready when classic menu is ready.
$(window).load( function() { $('.classic-menu').addClass('ready'); });
// activate responsiveness to classic menu.

if($('html').hasClass('no-touchevents')) {
	$(window).on('load', responsiveMenu);
	$(window).on('resize', responsiveMenu);
}else{
	$(window).on('resize', responsiveMenu);
	$(window).on('load', responsiveMenu);
}

// function that activate responsiveness
function responsiveMenu() {
		IRON.state.responsive = false;

		var logoSelect = ( IRON.state.logo.page_logo_select !== false ) ? IRON.state.logo.page_logo_select : IRON.state.logo.logo_select;
		var logoSelectResponsive = ( IRON.state.logo.light_responsive )? 'light' : 'dark' ;
		if(typeof IRON.state.logo[logoSelect] !== "undefined"){
			var logo_url = IRON.state.logo[logoSelect].url.slice( IRON.state.logo[logoSelect].url.indexOf('/') )
			var retina_logo_url = IRON.state.logo[logoSelect].url_retina.slice( IRON.state.logo[logoSelect].url_retina.indexOf('/') )
		}
		var Resp_logo_url = IRON.state.logo[logoSelectResponsive].url.slice( IRON.state.logo[logoSelectResponsive].url.indexOf('/') )
		var Resp_retina_logo_url = IRON.state.logo[logoSelectResponsive].url_retina.slice( IRON.state.logo[logoSelectResponsive].url_retina.indexOf('/') )


	if( $(window).width() < 1144 ) {
		IRON.state.responsive = true;
		$('.classic-menu').addClass('responsive').removeClass('mini');
		$('.classic-menu').find('.classic-menu-logo').attr('src', Resp_logo_url);
		$('.classic-menu').find('.classic-menu-logo').attr('srcset', Resp_logo_url+' 1x, '+Resp_retina_logo_url+' 2x');


		if( $('.responsive-header').length < 1  ) {
			$('<div class="responsive-header"><a class="sandwich-icon"></a></div>').prependTo('.classic-menu');
			$('.classic-menu.responsive .hotlink').first().addClass('first-hotlink');
			$('.classic-menu.responsive .hotlink').eq(-2).addClass('last-hotlink');
			var hotlinksCount = $('.classic-menu.responsive .hotlink').length;
			var hotlinkWidth = (100 - ((parseInt(hotlinksCount) - 3)*10)) /2;
			if( hotlinksCount > 2 ) $('.classic-menu.responsive .hotlink.first-hotlink, .classic-menu.responsive .hotlink.last-hotlink').attr('style', 'width: ' + hotlinkWidth + '% !important' );
			if( hotlinksCount == 1 ) $('.classic-menu.responsive .hotlink, .classic-menu.responsive .hotlink a').attr('style', 'width: 100% !important; text-align:center !important;' );
            if (jQuery('.languages-selector').children().length == 0){
                $( '.languages-selector' ).remove();
            }

            $('.classic-menu > ul').height('auto');
			$('.classic-menu > ul > li.menu-item').css('margin-top', 'auto' )

		}
		$('.responsive-header').off().on('click', '.sandwich-icon', function(e) {

			if( $('.classic-menu').is('.visible') ) {
				$('.sandwich-icon').removeClass('opened');
				$('.classic-menu').removeClass('visible');
				$('.classic-menu').scrollTop(0);
				return false;

			} else {
				$('.sandwich-icon').addClass('opened');
				$('.classic-menu').addClass('visible');
			}
		});

		$('.classic-menu ul li a').off().on('click', function(e) {

			// toggle in all case active class
			var anchor = $(this)
			var anchorParents = anchor.parents('li')

			$(this).parents('#menu-main-menu').find('li').each(function(el){
				if ( !_.contains( anchorParents, this ) ) {
					$(this).removeClass('active')
				}
			})
			$(this).closest('li').not('.logo').toggleClass('active');

			if( $(this).attr('href') == '#' ) {
				e.preventDefault();
			}else{
				// window.location.href = $(this).attr('href');
				$('.classic-menu').removeClass('visible');
				$('.classic-menu .sandwich-icon').removeClass('opened');
				$('.classic-menu').scrollTop(0);
			}

		});

	} else {
		$('.classic-menu').removeClass('responsive');
		if($('.classic-menu').hasClass('mini') ){
			if(IRON.state.logo.logo_mini_url != '') {
				$('.classic-menu').find('.classic-menu-logo').attr('src', IRON.state.logo.logo_mini_url);
			}

		}else{
			$('.classic-menu').find('.classic-menu-logo').attr('src', logo_url);
			$('.classic-menu').find('.classic-menu-logo').attr('srcset', logo_url+' 1x, '+retina_logo_url+' 2x');
		}

		$('.classic-menu .hotlink').attr('style', '');
		$('.classic-menu .responsive-header').remove();
	}
}


IRON.setupMenu = function() {

	var total_items = $menu.find('>li:not(".hotlink")').length;
	var position = 0;
	var logoSelect = ( IRON.state.logo.page_logo_select !== false ) ? IRON.state.logo.page_logo_select : IRON.state.logo.logo_select;
	var logoSelectScroll = IRON.state.logo.logo_select;
	var logoSelectResponsive = ( IRON.state.logo.light_responsive )? 'light' : 'dark' ;



	if(typeof IRON.state.logo[logoSelect] !== "undefined"){
		var logo_url = IRON.state.logo[logoSelect].url.slice( IRON.state.logo[logoSelect].url.indexOf('/') )
		var retina_logo_url = IRON.state.logo[logoSelect].url_retina.slice( IRON.state.logo[logoSelect].url_retina.indexOf('/') )
	}
	var logo_mini_url = IRON.state.logo.logo_mini_url.slice( IRON.state.logo.logo_mini_url.indexOf('/') )

	var logo_scroll_url = IRON.state.logo[logoSelectScroll].url.slice( IRON.state.logo[logoSelectScroll].url.indexOf('/') )
	var retina_logo_scroll_url = IRON.state.logo[logoSelectScroll].url_retina.slice( IRON.state.logo[logoSelectScroll].url_retina.indexOf('/') )

	// Activate Mini menu.
	var lastScrollTop = 0;


		$(document).on('scroll touchmove', function (e) {
		   	var offset = $(this).scrollTop();
		   	var st = $(this).scrollTop();

	       	if( ( $('.classic-menu').hasClass('mini-active') || $('.classic-menu').hasClass('mini-fullwidth-active') ) && !$('.classic-menu').hasClass('responsive')) {
		   		if (offset > 150) {
					if( !$('.classic-menu').hasClass('mini') ){
						$('.classic-menu').css( 'width', '100%' ).addClass('mini');
					}
			    	if( logo_mini_url != '') {
				    	$('.classic-menu').find('.classic-menu-logo').attr('src', logo_mini_url);
				    	$('.classic-menu').find('.classic-menu-logo').attr('srcset', logo_mini_url + ' 1x, ' + logo_mini_url + ' 2x');
			    	}
			    	if( logo_url !== logo_scroll_url ){
			    		$('.classic-menu').find('.classic-menu-logo').attr('src', logo_scroll_url);
				    	$('.classic-menu').find('.classic-menu-logo').attr('srcset', logo_scroll_url + ' 1x, ' + logo_mini_url + ' 2x');
			    	}
			    }
			    if (offset <= 150) {
					if( $('.classic-menu').hasClass('mini') ){
						$('.classic-menu').css( 'width', $('body').width() - 2*parseInt(iron_vars.menu.classic_menu_hmargin) ).removeClass('mini') ;	
					}
					$('.classic-menu').find('.classic-menu-logo').attr('src', logo_url);
					$('.classic-menu').find('.classic-menu-logo').attr('srcset', logo_url+' 1x, '+retina_logo_url+' 2x');
			    }



			}
			lastScrollTop = st;

			$('.classic-menu').css('height', '');

		});



	if( IRON.state.logo.enable ){


		if(IRON.state.logo.dark.url || IRON.state.logo.light.url) {

			var $logo = $('<div class="logo '+IRON.state.logo.logo_align+'"><a href="'+IRON.state.site_url+'"><img class="classic-menu-logo" src="'+logo_url+'" srcset="'+logo_url+' 1x, '+retina_logo_url+' 2x" alt="'+IRON.state.site_name+'"></a></div>');
		}else{
			var $logo = $('<div class="logo '+IRON.state.logo.logo_align+'"><a href="'+IRON.state.site_url+'">'+IRON.state.site_name+'</a></div>');
		}

		if (!$wrap.find('.logo').length) {
			$wrap.prepend($logo);
		}else{
			$wrap.find('.logo img').attr({
				src : logo_url,
				srcset : logo_url+' 1x, '+retina_logo_url+' 2x'
			})
		}

	}

	if ($wrap.hasClass('classic_menu_logo_align-pull-top')  ) {

		var spacer = $wrap.find('.spacer')

		if( $wrap.find('.classic-menu-hot-links').length ){
			var menu_hot_link = $wrap.find('.classic-menu-hot-links')

			spacer.width( menu_hot_link.width() )
		}

	}

	if ($wrap.hasClass('classic_menu_logo_align-pull-center')  ) {

		var spacer = $wrap.find('.spacer')

		if( $wrap.find('.classic-menu-hot-links').length ){
			var menu_hot_link = $wrap.find('.classic-menu-hot-links')

			spacer.width( menu_hot_link.width() )
		}

		if ($wrap.find('.logo').length && !$menu.find('.logo').length ) {
			var logoCenter = $wrap.find('.logo a').clone()
			var logoCenter = $('<li class="logo"/>').append(logoCenter)
			var liAfter = $menu.find('>li').eq( Math.floor( $menu.find('>li').length / 2 ) )
			logoCenter.insertBefore(liAfter)
		}
	}

	// Collision: avoid submenu to be out of viewport.
	$menu.find('>li a').on('mouseover', function(e) {
		// check if has submenu
		if( $(this).find(' + ul').length > 0 ) {
			// var zI = 1;
			var $_this = $(this).find(' + ul');
			if( $_this.outerWidth(true) + $_this.offset().left > $(window).width() ) {
				// $_this.css('zIndex', zI++);
				$(this).parent().addClass('collision');
			}
		}

	});

};

$(window).on('load', IRON.setupMenu );