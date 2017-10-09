<template lang="pug">
.youtube_item(v-if="videodata.url")
  video_fullplayer(
    :status="full_video_status", 
    :youtube_url="videodata.url",
    @ended = "full_video_status=false")

  .listMvItem(:style="{'background-image':`url('${mv_cover?mv_cover:videodata.cover}')`}"
        @click="triggerMvPlay(videodata)")
  .name {{videodata.name}}
</template>

<script>
import {mapState} from 'vuex'
import video_fullplayer from '../video_fullplayer'
export default {
  props: ['mv_url','disable_play','mv_cover'],
  data: function(){
    return {
      tracks: [],
      videodata: {
        name: "",
        url: "",
        cover: ""
      },
      full_video_status: false
    };
  },
  components: {
    video_fullplayer
  },
  watch: {
    mv_url (){
      this.update_mv();
    },
  },
  mounted () {
      this.update_mv();
  },
  methods: {
    triggerMvPlay(mv){
      if (this.disable_play!==true){
        if (mv.type=="youtube"){
          this.full_video_status=true
        }
        if (mv.type=="netease"){
          window.open(mv.url)
        }
      }
    },
    update_mv (){
      let mvdata = this.mv_url

      if (typeof mvdata =='string'){
        this.videodata.url = mvdata
      }
      if (typeof mvdata == 'object'){
        if (mvdata.name && mvdata.name != ""){
          this.videodata.name = mvdata.name
        }
        this.videodata.url = mvdata.url
      }

      if (this.videodata.url.indexOf("163")!=-1){
        this.videodata.type="netease"
        
        let url = this.videodata.url
        console.log("get ease:"+url);
        axios.post("/api/neteasemv/",{url: url}).then((res)=>{
          // data.neteasemp4=res.data.video
          if (!this.videodata.cover){
            this.videodata.cover=res.data.cover
          }
          if (!this.videodata.name){
            this.videodata.name=res.data.title
          }
        })
        
      }

      if (this.videodata.url.indexOf("youtube")!=-1){
        this.videodata.type="youtube"
        let regex = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        let str = this.videodata.url;
        let m;

        if ((m = regex.exec(str)) !== null) {
          if (!this.videodata.cover){
            this.videodata.cover ="https://img.youtube.com/vi/"+m[2]+"/0.jpg"
          }
        
          axios.get("/api/youtubemv/"+m[2]).then((res)=>{
            console.log(res.data.title)
            if (!this.videodata.name){
              this.videodata.name=(this.videodata.name=="")? res.data.title :this.videodata.name
            }
          })
        }

      }

      
    }
  }
}
</script>
