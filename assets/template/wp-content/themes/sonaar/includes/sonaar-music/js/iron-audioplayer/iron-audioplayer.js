var elementAudio = document.createElement( 'audio' );
elementAudio.src =  IRON.state.theme_url + '/js/assets/default.wav';

var elementAudioSingle = document.createElement( 'audio' );
elementAudioSingle.src =  IRON.state.theme_url + '/js/assets/default.wav';

IRON.audioPlayer = function($){
	"use strict";
	var seekTimeOut;
	var autoplayEnable


	function initPlayer( player ){
		var audioPlayer = player;
		this.audioPlayer = player;
		var waveContainer = this.audioPlayer.find('.player .wave').attr('id');
		var playlist = audioPlayer.find('.playlist');
		this.playlist = playlist;
		this.autoplayEnable = audioPlayer.data('autoplay')



		var wavesurfer = WaveSurfer.create({
			container: '#' + waveContainer,
			cursorWidth: 0,
			barWidth: 1,
			progressColor: iron_vars.sonaar_music.color_progress,
			waveColor: iron_vars.sonaar_music.color_base,
			height: 70,
			backend: 'MediaElement',
			mediaControls: false,
		});

		wavesurfer.on('loading', function(){
				var progressLoad = arguments[0]
				audioPlayer.find('.progressLoading').css('background', iron_vars.sonaar_music.color_base );
				audioPlayer.find('.progressLoading').css('width', 'calc( ' + progressLoad + '% - 200px )' )
				if (progressLoad == 100) {
					audioPlayer.find('.player').addClass('reveal')
					audioPlayer.find('.progressLoading').css('opacity', '0' )
				}
			})

		this.wavesurfer = wavesurfer;

		setPlaylist( playlist , wavesurfer, audioPlayer );
		setCurrentTrack( playlist.find('li').eq(0), playlist.find('li').index(), audioPlayer, wavesurfer );
		setControl( wavesurfer, audioPlayer, playlist );
		setNextSong( wavesurfer, audioPlayer, playlist );
		trackListItemResize();
		$(window).on('resize', function(){
			trackListItemResize();
		})

		if ( audioPlayer.data('autoplay') ) {
			autoplayEnable = true
		}
	}



	var setNextSong = function( wavesurfer, audioPlayer, playlist ){
		wavesurfer.on('finish', function(){
			next(audioPlayer, playlist)
		})
	}

	var triggerPlay = function(wavesurfer, audioPlayer ){
		wavesurfer.on('ready', function(){
			if( wavesurfer.isPlaying() )
				return

			wavesurfer.play();
			togglePlaying(audioPlayer, wavesurfer)
		})
	}


	function setCurrentTrack( track, index, audioPlayer, wavesurfer ){
		var albumArt = audioPlayer.find('.album .album-art');
		var trackTitle = audioPlayer.find('.track-title');
		var trackArtist = audioPlayer.find('.sr_it-artists-value');
		var albumTitle = audioPlayer.find('.album-title');
		var albumTitle = audioPlayer.find('.sr_it-playlist-title');
		var albumReleaseDate = audioPlayer.find('.sr_it-date-value');

		if ( albumArt.find('img').length ) {
			albumArt.find('img').attr('src', track.data('albumart'));
		}else{
			albumArt.css('background-image', 'url(' + track.data('albumart') + ')');
		}

		if( !audioPlayer.hasClass('show-playlist') ){
			albumArt.one('click', function(){
				setContinuousPlayer( index , audioPlayer);
			})
			albumArt.css('cursor','pointer')
		}
			audioPlayer.data('currentTrack', index);

		if ( !IRON.state.enable_ajax ) {
			trackTitle.text(track.data('tracktitle'));
			trackArtist.text(track.data('trackartists'));
			albumReleaseDate.text(track.data('releasedate'));
			albumTitle.text(track.data('albumtitle'));

			audioPlayer.find('.player').removeClass('hide')

			if ( !track.data('showloading') ) {
				audioPlayer.find('.player').addClass('hide')
			}else{
				audioPlayer.find('.progressLoading').css('opacity', '0.75' )
			}

			setAudio(track.data('audiopath'), wavesurfer);
			setTime( audioPlayer, wavesurfer );
		}
		hideEmptyAttribut(track.data('releasedate'), audioPlayer.find('.sr_it-playlist-release-date'));
		hideEmptyAttribut(track.data('trackartists'), audioPlayer.find('.sr_it-playlist-artists'));

	}

	function setPlaylist( playlist , wavesurfer, audioPlayer ){
		playlist.find('li').each(function(){
			setSingleTrack( $(this), $(this).index(), wavesurfer, audioPlayer );
		})
	}

	function setTime( audioPlayer, wavesurfer ){
		wavesurfer.on('ready', function(){
			if( wavesurfer.isPlaying() )
				return

			var totalTime = moment.duration(wavesurfer.getDuration(), 'seconds' );
			audioPlayer.find('.totalTime').html( moment( totalTime.minutes()+':'+totalTime.seconds(), 'm:s' ).format( 'mm:ss' ) );
			wavesurfer.on('audioprocess', function(){
				var time = moment.duration(wavesurfer.getCurrentTime(), 'seconds' );
				audioPlayer.find('.currentTime').html( moment( time.minutes()+':'+time.seconds(), 'm:s' ).format( 'mm:ss' ) );
			})
		})
	}

	function setControl( wavesurfer, audioPlayer, playlist ){
		var ctrl = audioPlayer.find('.control');
		if ( IRON.state.enable_ajax ){

			audioPlayer.find('.wave').remove()

		}

		ctrl.on('click', '.play', function(){
			play( audioPlayer, wavesurfer )
			triggerPlay(wavesurfer, audioPlayer )
		})
		ctrl.on('click', '.previous', function(){
			previous( audioPlayer, wavesurfer, playlist )
		})
		ctrl.on('click', '.next', function(){
			next( audioPlayer, wavesurfer, playlist )
		})

	}

	function setSingleTrack( singleTrack , eq, wavesurfer, audioPlayer ){
		var tracknumber = eq + 1;
		var trackplay = $('<span/>',{
			class: 'track-number',
			html: '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.5 21.2" style="enable-background:new 0 0 17.5 21.2;" xml:space="preserve"><path d="M0,0l17.5,10.9L0,21.2V0z"></path><rect width="6" height="21.2"></rect><rect x="11.5" width="6" height="21.2"></rect></svg><span class="number">' + tracknumber + '</span>'
		})
		$('')
		$('<a/>',{
			class: 'audio-track',
			click: function( event ){

				if( $(this).parent().attr('data-audiopath').length == 0 ){
					return;
				}

				if ( IRON.state.enable_ajax ) {
					setContinuousPlayer( eq , audioPlayer , event);
					audioPlayer.data('currentTrack', eq);
				}else{
					setCurrentTrack( singleTrack , eq, audioPlayer, wavesurfer);
					audioPlayer.find('.playlist li').removeClass('current');
					singleTrack.addClass('current');
					triggerPlay(wavesurfer, audioPlayer);
					togglePlaying( audioPlayer, wavesurfer);
				}

				
			}
		}).appendTo(singleTrack).prepend(trackplay).append('<div class="tracklist-item-title">' + singleTrack.data('tracktitle') + '</div>');
	}

	function trackListItemResize(){
		$('.playlist li').each(function(){
			var storeWidth = $(this).find('.store-list').outerWidth();
			var trackWidth = $(this).find('.track-number').outerWidth();
			$(this).find('.tracklist-item-title').css( 'max-width', $(this).outerWidth() - storeWidth - trackWidth - 10 );
		})
	};

	var setAudio = function( audio, wavesurfer ){
		seekTimeOut = setTimeout( function(){
			elementAudio.src = audio
			wavesurfer.load( elementAudio );
		}, 250 )
	}

	function getTime( wavesurfer ){
		return wavesurfer.getCurrentTime()
	}

	function togglePlaying(audioPlayer, wavesurfer  ) {

		$.each(IRON.players, function(index, value){
			IRON.players[index].audioPlayer.removeClass('audio-playing');
		})

		if ( wavesurfer.isPlaying() ) {
			audioPlayer.addClass('audio-playing');
			return;
		}
		audioPlayer.removeClass('audio-playing')
	}

	function play( audioPlayer, wavesurfer ){
		if ( IRON.state.enable_ajax ) {
			var playlist = audioPlayer.find('.playlist');
			var currentTrack = audioPlayer.data('currentTrack');

			if ( ( IRON.sonaar.player.wavesurfer.getCurrentTime() >= 0.1 || IRON.sonaar.player.wavesurfer.isPlaying() ) && IRON.sonaar.player.url == audioPlayer.data('url-playlist') ) {
				IRON.sonaar.player.play()
				return
			}
			if ( IRON.sonaar.player.wavesurfer.getDuration() == 1) {
				IRON.sonaar.player.wavesurfer.play()
			}
			playlist.find('li').eq(currentTrack).find('a').click();
			return
		}

		wavesurfer.playPause();
		togglePlaying( audioPlayer, wavesurfer);
	}

	function previous( audioPlayer, wavesurfer, playlist ){
		var currentTrack = audioPlayer.data('currentTrack');
		var nextTrack = currentTrack - 1;

		if ('2' < getTime( wavesurfer ) ) {
			wavesurfer.seekTo(0);
			return;
		}
		playlist.find('li').eq(nextTrack).find('a').click();

	}

	function next( audioPlayer, wavesurfer, playlist ){
		var currentTrack = audioPlayer.data('currentTrack');
		var nextTrack = currentTrack + 1;

		if ( !playlist.find('li').eq(nextTrack).length){
			nextTrack = 0;
		}
		wavesurfer.pause();
		playlist.find('li').eq(nextTrack).find('a').click();
	}

	function getPlayer(){
		return this;
	}
	function getplay(){
		play( this.audioPlayer, this.wavesurfer )
	}

	function setContinuousPlayer( eq , audioPlayer){
		IRON.sonaar.player.setPlaylist( audioPlayer, eq )
	}

	return {
		init : initPlayer,
		getPlayer : getPlayer,
		play : getplay,
		autoplayEnable : autoplayEnable,
		triggerPlay : triggerPlay

	};

}(jQuery);



function hideEmptyAttribut(string, selector){
		if(string== ''){
			selector.css('display', 'none');
		}else{
			selector.css('display', 'block');
		}
}

IRON.artistPlayer = function($){
	"use strict";
	var artistWavesurfer
	var artistPlayer
	var seekTimeOut
	var playlist = {
		'promise' : $.Deferred()
	}
	var playerConsent = false

	var setPlayer = function(){
		IRON.artistPlayer.continuousPlayer = false;
		playerConsent = false



		artistPlayer = $('.artist_player');
		var continuous_background = iron_vars.sonaar_music.continuous_background
		if ( iron_vars.sonaar_music.continuous_background == '' ) {
			continuous_background = 'rgb(0,0,0)'
		}
		artistPlayer.css( 'background-color', continuous_background )

		artistWavesurfer = WaveSurfer.create({
			container: '#artistPlayer',
			cursorWidth: 0,
			barWidth: 1,
			progressColor: iron_vars.sonaar_music.continuous_progress_bar,
			waveColor: iron_vars.sonaar_music.continuous_timeline_background,
			height: 36,
			backend: 'MediaElement',
			mediaControls: false,
			partialRender: true
		});

		artistWavesurfer.load(elementAudioSingle)
		IRON.artistPlayer.wavesurfer = artistWavesurfer
		setControl()
		setNextSong()
		IRON.artistPlayer.playlist.promise = $.Deferred();
		setPlaylist()
		setCurrentTrack(0)


		artistWavesurfer.on('loading', function(){
			var progressLoad = arguments[0]
			artistPlayer.find('.progressLoading').css('background', iron_vars.sonaar_music.continuous_progress_bar );
			artistPlayer.find('.progressLoading').css('width', 'calc( ' + progressLoad + '% - 275px )' )
			if (progressLoad == 100) {
				revealWave();
				artistPlayer.find('.progressLoading').css('opacity', '0' )
			}
		})


	}
	var revealWave = function(){
		artistPlayer.find('#artistPlayer').addClass('reveal')
	}

	var setPlaylist = function(){
		IRON.artistPlayer.playlist.promise = $.Deferred();

			$.when( $.getJSON(artistPlayer.data('url-playlist'))).done(function(data){
				artistPlayer.addClass('enable')

				IRON.initPusherHeight()
				$('body').addClass('artistPlayer-enable')
				playlist.url = artistPlayer.data('url-playlist')
				playlist.list = data
				IRON.artistPlayer.playlist.promise.resolve()

			})
	}

	var setCurrentTrack = function( eq , audioPlayer ){

			playlist.currentTrack = eq
			artistPlayer.find('#artistPlayer').removeClass('reveal')

			$.when( IRON.artistPlayer.playlist.promise ).done(function(){
				artistPlayer.find('.album-art img').attr('src', playlist.list.tracks[eq].poster).css('display','block');
				artistPlayer.find('.metadata .album-title').text( playlist.list.tracks[eq].album_title)
				artistPlayer.find('.sr_it-playlist-title').text( playlist.list.tracks[eq].album_title)
				artistPlayer.find('.metadata .track-name').text( playlist.list.tracks[eq].track_title)
				artistPlayer.find('.sr_it-artists-value').html( playlist.list.tracks[eq].release_date )
				artistPlayer.find('.sr_it-date-value').html( playlist.list.tracks[eq].artist )

				setAudio( playlist.list.tracks[eq].mp3 );
				if (IRON.artistPlayer.continuousPlayer) {
					transfertPlaylist()
				}

				if ( !playlist.list.tracks[eq].loading ) {
					artistPlayer.find('#artistPlayer').addClass('hide')
				}else{
					artistPlayer.find('.progressLoading').css('opacity', '0.75' )
				}

				if ( playerConsent ) {
					artistWavesurfer.on('ready', function(){
						artistWavesurfer.play();
						setStatus()
					})
				}

			})


	}

	var setNextSong = function(){
		artistWavesurfer.on('finish', function(){
			next()
		})
	}

	var setLoading = function( classes ){
		switch (classes) {
			case 'loading':
				artistPlayer.addClass('loading')
				break;

			default:
				artistPlayer.removeClass('loading')
		}
	}

	var setAudio = function( audio ){
		seekTimeOut = setTimeout( function(){

			if ( IRON.artistPlayer.continuousPlayer ) {
				elementAudio.src = audio
				artistWavesurfer.load( elementAudio );
			}else{
				elementAudioSingle.src = audio
				artistWavesurfer.load( elementAudioSingle );
			}

		}, 250 )
	}

	function setControl(){
		var ctrl = artistPlayer.find('.control');
		ctrl.find('.play').css({
			'fill': iron_vars.sonaar_music.continuous_control_color,
			'path': iron_vars.sonaar_music.continuous_control_color
		})
		ctrl.find('.next').css({
			'fill': iron_vars.sonaar_music.continuous_control_color,
			'path': iron_vars.sonaar_music.continuous_control_color
		})
		ctrl.find('.previous').css({
			'fill': iron_vars.sonaar_music.continuous_control_color,
			'path': iron_vars.sonaar_music.continuous_control_color
		})


		ctrl.on('click', '.play', function(e){
			if (!IRON.artistPlayer.continuousPlayer) {
				playerConsent = true;
				IRON.initPusherHeight()

				enableContinuousPlayer()
				transfertPlaylist()
				setPlaylist()
				setCurrentTrack( playlist.currentTrack )
			}else{
				play()
			}
		})
		ctrl.on('click', '.previous', function(){
			previous()
		})
		ctrl.on('click', '.next', function(){
			next()
		})

	}



	var enableContinuousPlayer = function(){
			IRON.sonaar.player.classes.enable = false
			$('body').removeClass('continuousPlayer-enable')
			IRON.artistPlayer.continuousPlayer = true;
	}

	var setStatus = function(){
		if ( artistWavesurfer.isPlaying() ) {
			artistPlayer.addClass('audio-playing');
			return;
		}
		artistPlayer.removeClass('audio-playing')
	}


	function play(){
		playerConsent = true;
		artistWavesurfer.playPause();
		setStatus()

	}

	var transfertPlaylist = function(){
		IRON.sonaar.player.setPlaylist( artistPlayer, playlist.currentTrack )
	}

	function previous(){
		clearTimeout(seekTimeOut)
		var currentTrack = playlist.currentTrack;
		var nextTrack = currentTrack - 1;

		if ('2' < getTime( artistWavesurfer ) ) {
			artistWavesurfer.seekTo(0);
			return;
		}

		if ( nextTrack < 0 ){
			nextTrack = playlist.list.length - 1;
		}
		setCurrentTrack(nextTrack);


	}

	function next(){
		clearTimeout(seekTimeOut)
		var currentTrack = playlist.currentTrack;
		var nextTrack = currentTrack + 1;

		if ( nextTrack + 1 > playlist.list.length ){
			nextTrack = 0;
		}
		setCurrentTrack(nextTrack);

	}

	function getTime(){
		return artistWavesurfer.getCurrentTime()
	}

	return {
		setPlayer : setPlayer,
		setPlaylist : setPlaylist,
		setCurrentTrack : setCurrentTrack,
		playlist : playlist,
		play : play
	}

}(jQuery);











if (jQuery('.artist_player').length) {
	IRON.artistPlayer.setPlayer()
}

IRON.players = [];
jQuery('.iron-audioplayer').each(function(){

	var player = Object.create(  IRON.audioPlayer );
	player.init(jQuery(this));

	IRON.players.push(player)
})