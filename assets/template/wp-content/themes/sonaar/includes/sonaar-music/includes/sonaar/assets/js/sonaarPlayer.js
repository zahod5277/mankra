$ = jQuery
var data = {
  list: {
    "playlist_name": false,
    "tracks": false
  },
  currentTrack: false,
  playlistID: '',
  showList: false,
  isPlaying: false,
  loading: 0,
  minimize: true,
  wavesurfer: false,
  userPref:{
    pause: false,
    minimize: false,
  },
  playerStatus: "",

  classes: {
    enable: false,
    waveEnable: false,
    isPlaying: false,
    playlist: iron_vars.sonaar_music.continuous_playlist_icon,
    author: iron_vars.sonaar_music.continuous_artist_name,
  }

}

IRON.sonaar = {
  player: new Vue({
    el: '#sonaar-player',
    data: data,
    methods: {
      play: function() {
        this.wavesurfer.playPause()
      },
      previous: function() {
        if ((this.currentTrack - 1) < 0)
          return this.currentTrack = this.list.tracks.length - 1

        this.currentTrack--
      },
      next: function() {
        if (this.playerStatus == 'next')
          return

        if ((this.currentTrack + 1) >= this.list.tracks.length)
          return this.currentTrack = 0

        this.currentTrack++
      },


      setPlaylist: function(audioPlayer, eq) {
        var params = audioPlayer.data('url-playlist').slice(audioPlayer.data('url-playlist').indexOf('title')).split('&')
        var title = params[0].slice(6)
        var id = params[1].slice(7)

        this.setPlayer({
          id: id,
          title: title,
          trackid: eq
        })
      },

      getPlaylistbyID: function(id, title) {
        var playlistID = id || false;
        var title = title || '';


        if (playlistID)
          return IRON.state.site_url + '?load=playlist.json&title=' + title + '&albums=' + playlistID + ''

        return false;
      },

      setPlayer: function(args) {
        var args = args || {}

        var params = {
          id: args.id || null,
          title: args.title || null,
          trackid: args.trackid || 0,
          autoplay: (typeof args.autoplay == 'boolean') ? args.autoplay : true
        }


        if (params.id && params.id === this.playlistID && params.trackid == this.currentTrack)
          return this.play()

        if (params.id && params.id === this.playlistID && params.trackid !== this.currentTrack)
          this.currentTrack = params.trackid

        if (params.id && params.id !== this.playlistID) {
          $.when($.getJSON(this.getPlaylistbyID(params.id, params.title))).done(function(data) {

            if (!$('body').hasClass('artistPlayer-enable')) {
              IRON.initPusherHeight()
              this.classes.enable = true
              this.minimize = false
              $('body').addClass('continuousPlayer-enable')
            }


            this.list = data

            this.playlistID = params.id
            this.currentTrack = params.trackid
            this.handleTrackChange()

          }.bind(this))

        }

      },


      setAudio: function() {
        elementAudio.src = this.list.tracks[this.currentTrack].mp3
        this.wavesurfer.load(elementAudio);
      },
      setshowList: function() {
        if (this.showList == false) {
          $('#pusher-wrap').addClass('sonaar-list-active')

          // Testing ios a faire
          // if( window.innerWidth <= 540)
          //   fscreen.requestFullscreen(this.$el)

          return this.showList = true
        }

        $('#pusher-wrap').removeClass('sonaar-list-active')

        // Testing ios a faire
        // if(fscreen.fullscreenElement !== null)
        //    fscreen.exitFullscreen()

        return this.showList = false
      },
      closePlayer: function() {
        if (this.showList) {
          $('#pusher-wrap').removeClass('sonaar-list-active')
          this.showList = false
        }
        this.minimize = !this.minimize
        this.classes.enable = !this.classes.enable
      },
      playlistAfterEnter: function() {
        $('#sonaar-player .playlist .scroll').perfectScrollbar({
          'suppressScrollX': true
        })
      },
      scroll: function(event) {
        var el = event.target
        var parent = el.offsetParent

        if (el.offsetWidth > parent.offsetWidth && !el.classList.contains('scrolling')) {
          el.classList.add('scrolling')
          var transformWidth = el.offsetWidth + 10
          el.insertAdjacentHTML('beforeend', '<span class="duplicate">' + el.innerText + '</span>')
          el.style.transform = 'translate( -' + transformWidth + 'px )'
          setTimeout(function() {
            el.classList.remove('scrolling')
            el.style.transform = ''
            el.removeChild(el.firstElementChild)
          }, 6000)
        }
      },
      updatePlayers: function() {
        $.each(IRON.players, function(index, value) {
          IRON.players[index].audioPlayer.removeClass('audio-playing');
        })

        if (this.isPlaying) {
          $('.iron-audioplayer[data-url-playlist*="' + this.playlistID + '"]').addClass('audio-playing')
          $('.iron-audioplayer[data-url-playlist*="' + this.playlistID + '"]').find('li').removeClass('current');
          $('.iron-audioplayer[data-url-playlist*="' + this.playlistID + '"]').find('li').eq(this.currentTrack).addClass('current');
          return;
        }

        $('.iron-audioplayer[data-url-playlist*="' + this.playlistID + '"]').removeClass('audio-playing')
        $('.iron-audioplayer[data-url-playlist*="' + this.playlistID + '"]').find('li').removeClass('current');

      },
      handleTrackChange: function() {
        this.isPlaying = false
        this.classes.waveEnable = false
        this.wavesurfer.drawer.clearWave()
        this.setAudio()
        this.updatePlayers()
      }
    },
    mounted: function() {
      this.$nextTick(function() {

        this.wavesurfer = Object.create(window.WaveSurfer)
        this.wavesurfer.init({
          container: '#sPlayer',
          cursorWidth: 0,
          barWidth: 1,
          progressColor: iron_vars.sonaar_music.continuous_progress_bar,
          waveColor: iron_vars.sonaar_music.continuous_timeline_background,
          height: 36,
          backend: 'MediaElement',
          mediaControls: false,
          partialRender: true,
          pixelRatio: 2
        })

        this.wavesurfer.on('ready', function() {
          this.classes.waveEnable = true
          this.wavesurfer.play()
        }.bind(this))

        this.wavesurfer.on('play', function() {
          this.playerStatus = 'play'
          this.isPlaying = this.wavesurfer.isPlaying()
        }.bind(this))

        this.wavesurfer.on('pause', function() {
          this.isPlaying = false
          this.userPref.pause = true
        }.bind(this))

        this.wavesurfer.on('finish', function() {
          this.next()
          this.playerStatus = 'next'
        }.bind(this))

        this.wavesurfer.on('loading', function() {
          this.loading = arguments[0]
        }.bind(this))


      })
    },
    watch: {
      currentTrack: function() {
        this.handleTrackChange()
      },
      isPlaying: function() {
        this.updatePlayers()
      },
      minimize: function() {
        this.userPref.minimize = this.minimize;
        if (this.minimize) {
          $('body').removeClass('continuousPlayer-enable')
        } else {
          $('body').addClass('continuousPlayer-enable')
        }
      }
    }
  })
}
