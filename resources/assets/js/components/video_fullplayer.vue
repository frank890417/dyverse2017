<template lang='jade'>
.video_container(:class="{active: section_playing}")
  transition(name="fade")
    youtube.front(
    :video-id="youtube_id", 
    :player-width="player_width", 
    :player-height="player_height",
    :player-vars="{start: 0,autoplay: 1,rel: 0}",
    v-if="section_playing",
    @ended = "ended")
  // video_youtube
  .btn_video_close(@click="ended") ✕
</template>

<script>
import $ from "jquery"
import { getIdFromURL, getTimeFromURL } from 'vue-youtube-embed'
export default {
  props: ["youtube_url","status"],
  mounted() {
      console.log('full yt player mounted.')
    this.section_playing=this.status
  },
  data(){
    return {
      section_playing: false
    }
  },
  watch: {
    status(){
      this.section_playing=this.status
    }
  },
  computed:{
    youtube_id(){
      return getIdFromURL(this.youtube_url)
    },
    player_width(){
      let result =  $(window).outerWidth()
      return result>800?800:result
    },
    player_height(){
      let result =  $(window).outerHeight()
      return result>600?600:result
    }
  },
  methods: {
    ended(){
      this.$emit("ended")
    }
  }
}
</script>

<style scoped lang="sass?indentedSyntax">
$color_theme: #ddd

.btn_video_close
  position: absolute
  right: 30px
  top: 150px
  color: white
  font-size: 40px
  z-index: 2000
  cursor: pointer
  transition: 0.5s
  &:hover
    color: $color_theme

.front
  position: relative
  z-index: 3000

.video_container
  transition: 0.5s
  opacity: 0
  position: fixed
  width: 100%
  height: 100%
  top: 0
  left: 0
  z-index: 1000
  display: flex
  align-items: center
  justify-content: center
  pointer-events: none

  iframe
    position: relative
    z-index: 1500
    
  &:before
    content: ""
    position: absolute
    width: 100%
    height: 100%
    top: 0
    left: 0
    background-color: rgba(0,0,0,0.85)
    opacity: 0
    pointer-events: none
    transition: 0.5s
    z-index: 50

  &.active
    pointer-events: initial
    opacity: 1
    &:before
      opacity: 1

</style>