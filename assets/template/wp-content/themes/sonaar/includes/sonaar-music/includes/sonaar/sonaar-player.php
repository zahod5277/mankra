<div id="sonaar-player" :class="{enable: !minimize , 'show-list': showList}">

  <transition name="sonaar-player-slidefade" v-on:after-enter="playlistAfterEnter">
  <div class="playlist" v-if="showList">
    <div class="scroll">
      <div class="container">
        <div class="boxed">
        <h1>{{list.playlist_name}}</h1>
        <button class="play" @click="play">{{ isPlaying ? 'pause': 'play' }}</button>
          <div class="trackscroll">
            <ul class="tracklist">
              <li v-for="(track, index) in list.tracks" :key="track.id" @click="currentTrack = index" :class="index == currentTrack ? 'active' : '' ">
                <span class="track-status">{{ index + 1 }}</span>
                <span class="track-title"><span class="content" @mouseover="scroll">{{ track.track_title }}</span></span>
                <span class="track-artist" v-if="!classes.author"><span class="content" v-if="track.album_artist" v-html="'by ' + track.album_artist"></span></span>
                <span class="track-album"><span class="content">{{ track.album_title }}</span></span>
                <span class="track-lenght" v-if="track.lenght"><span class="content">{{ track.lenght }}</span></span>
                <span class="track-store" v-if="track.song_store_list.length >= 1">
                  <a v-for="store in track.song_store_list" :href="store.store_link" target="_blank"><i class="fa" :class="store.song_store_icon"></i></a>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  </transition>

  <div class="close btn_playlist" v-if="showList" @click="setshowList"></div>
  <div class="close btn-player" :class="{enable: !minimize}" @click="closePlayer" v-if="list.tracks.length > 1">
    <svg class="audioBar" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  viewBox="0 0 17 17" enable-background="new 0 0 17 17" xml:space="preserve">
    <rect x="0" width="2" height="16" transform="translate(0)">
      <animate
          attributeName="height"
          attributeType="XML"
          dur="1s"
          values="2;16;2"
          repeatCount="indefinite"/>
    </rect>
    <rect x="5" width="2" height="16" transform="translate(0)">
      <animate
          attributeName="height"
          attributeType="XML"
          dur="1s"
          values="2;16;2"
          repeatCount="indefinite"
          begin="0.3s"/>
    </rect>
    <rect x="10" width="2" height="16" transform="translate(0)">
      <animate
          attributeName="height"
          attributeType="XML"
          dur="1s"
          values="2;16;2"
          repeatCount="indefinite"
          begin="0.5s"/>
    </rect>
    <rect x="15" width="2" height="16" transform="translate(0)">
      <animate
          attributeName="height"
          attributeType="XML"
          dur="1s"
          values="2;16;2"
          repeatCount="indefinite"
          begin="0.3s"/>
    </rect>
    </svg>
  </div>

  <div class="player">
    <div class="player-row">

      <div class="playerNowPlaying" v-if="list.tracks.length >= 1">
        <div class="album-art" :class="{'loading-enable': !classes.waveEnable, 'loading': loading < 100 }">
          <i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw loading-icon"></i>
          <img class="hover" :src="list.tracks[currentTrack].poster" />
          <img :src="list.tracks[currentTrack].poster" />
        </div>
        <div class="metadata">
          <div class="track-name" @mouseover="scroll">{{list.tracks[currentTrack].track_title}}</div>
          <div class="track-album" @mouseover="scroll">{{list.tracks[currentTrack].album_title}}</div>
          <div class="track-artist" @mouseover="scroll" v-html="'by ' + list.tracks[currentTrack].album_artist" v-if="!classes.author && list.tracks[currentTrack].album_artist"></div>
        </div>
      </div>
      <div class="playerNowPlaying" v-else></div>
      <div class="control">
        <div class="list" @click="setshowList" v-if="!classes.playlist">
          <svg width="100%" height="100%" viewBox="0 0 24 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" >
            <g>
              <rect x="0" y="0" width="24" height="2"/>
              <rect x="0" y="6" width="24" height="2"/>
              <rect x="0" y="12" width="24" height="2"/>
              <rect x="0" y="18" width="15" height="2"/>
            </g>
          </svg>
        </div>
        <div class="previous" @click="previous">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.2 11.7" style="enable-background:new 0 0 10.2 11.7;" xml:space="preserve">
  				<polygon points="10.2,0 1.4,5.3 1.4,0 0,0 0,11.7 1.4,11.7 1.4,6.2 10.2,11.7"></polygon>
  			</svg>
        </div>
        <div class="play" @click="play" :class="{'audio-playing': isPlaying }">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17.5 21.2" style="enable-background:new 0 0 17.5 21.2;" xml:space="preserve">
  				<path d="M0,0l17.5,10.9L0,21.2V0z"></path>
  				<rect width="6" height="21.2"></rect>
  				<rect x="11.5" width="6" height="21.2"></rect>
  			</svg>
        </div>
        <div class="next" @click="next">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.2 11.7" style="enable-background:new 0 0 10.2 11.7;" xml:space="preserve">
  				<polygon points="0,11.7 8.8,6.4 8.8,11.7 10.2,11.7 10.2,0 8.8,0 8.8,5.6 0,0"></polygon>
  			</svg>
        </div>
      </div>

      <div class="wavesurfer">
        <div id="sPlayer" class="wave" :class="{reveal: classes.waveEnable, hide: !classes.waveEnable}"></div>
      </div>

      <div class="store" v-if="list.tracks.length >= 1 && list.tracks[currentTrack].song_store_list.length >= 1" :style="{width: list.tracks[currentTrack].song_store_list.length * 75 + 'px' }" >
          <ul class="track-store" v-if="list.tracks[currentTrack].song_store_list.length >= 1">
            <li v-for="store in list.tracks[currentTrack].song_store_list">
              <a :href="store.store_link" target="_blank"><i class="fa" :class="store.song_store_icon"></i>{{store.song_store_name}}</a>
            </li>
          </ul>
      </div>
      <div class="store" v-else></div>
    </div>
  </div>
</div>