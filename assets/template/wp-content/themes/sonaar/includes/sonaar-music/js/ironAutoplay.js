for (var player in IRON.players) {
	var that = IRON.players[player]

	if( that.autoplayEnable ){

		if (IRON.state.enable_ajax) {

			if( !IRON.sonaar.player.wavesurfer || ( !IRON.sonaar.player.wavesurfer.isPlaying() && !IRON.sonaar.player.userPref.pause ) ){
				IRON.sonaar.player.setPlaylist( that.audioPlayer, 0 )
			}

		}else{
			if (! that.wavesurfer.isPlaying() ){
				that.triggerPlay( that.wavesurfer, that.audioPlayer )
			}
		}
	}
}