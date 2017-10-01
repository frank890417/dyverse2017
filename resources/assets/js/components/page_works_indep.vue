<template lang="pug">
section.page_works_indep(v-if="work")
  video_fullplayer(
    :status="full_video_status", 
    :youtube_url="youtube_url",
    @ended = "full_video_status=false")
  .container(:key='work.title')
    ol.breadcrumb(v-if='work')
      li.breadcrumb-item
        router-link(to='/works') 作品
      li.breadcrumb-item.active {{work.title}}
    .row.row_work_indep(v-if='work')
      .col-md-4.col-xs-12
        .work_indep_img(:style='css_img(work.image)')
          h3.nametag {{work.title}}
        div.part_credit(v-if="work.credit && work.credit!=''")
          h4 Contributer
          p(v-html="getNewlineBr(work.credit)")
      .col-sm-12.col-md-8
        .row
          .col-sm-8.col-md-12
            .work_content_header
              br.visible-xs
              br.visible-xs
              h4.work_work {{work.work}}
              h1 {{work.title}}
              h4
                a.company(:href='work.company_url', target='_blank') {{work.company}}
                |    |   {{work.date}}
            p.discription(v-html='work.discription')
          .col-sm-4.col-md-12(v-if="work.mv && work.mv.length>0")
            h2 相關影音
            
            ul.listMv.row
              li.col-sm-4(v-for="mv in work_mvs" )
                mvitem(:key="mv.name", :mv_url='mv.url')
                //- .item(:style="{'background-image':`url(${mv.cover})`}"
                //-       @click="triggerMvPlay(mv)")
                //- .name {{mv.name}}
            
          .infopart.col-sm-4.col-md-12(v-if="work.work_url")
            br.visible-xs
            h2 系列曲目
            br
            div(v-if="work.work_url.indexOf('youtube')!=-1")
              iframe(:src='work.embed_url', width='100%', height='350px')
            div(v-else-if="work.work_url.indexOf('music.163')!=-1")
              // <iframe :src='neteasemp4' width='100%' height='450px'></iframe>
              a.videoPreview(:href='work.work_url', target='_blank')
                img(:src='neteasecover', alt='', style='width: 100%')
                h3 {{neteasetitle}}
            div(v-else='')
              h4(v-if='(!tracks.length)')
                img.loadingspin(src='/img/loadingicon.png')
                | 載入曲目中...
              .row(v-for='t in tracks', v-if='tracks')
                h4.col-sm-5.col-md-4.col-lg-3 {{t.title}}
                .col-sm-7.col-md-8.col-lg-9
                  audio#now_playing.work_indep_player(controls='controls', controlslist='nodownload')
                    source#nowsource(type='audio/mp3', :src='"https://api.soundcloud.com/tracks/"+t.id+"/stream?secret_token=tracks&client_id=5dc224d1ef12f77e0c85f88d1b3b579d"')

</template>

<script>
import {mapState} from 'vuex'
import video_fullplayer from './video_fullplayer'
import mvitem from './workitem/mvitem'
export default {
  props: ['wkid'],
  data: function(){
    return {
      tracks: [],
      client_id: '5dc224d1ef12f77e0c85f88d1b3b579d',
      neteasemp4: "",
      neteasecover: "",
      neteasetitle: "",
      youtube_url: "",
      full_video_status: false
    };
  },
  components: {
    video_fullplayer,mvitem
  },
  computed: {
    ...mapState(['works']),
    work: function(){
      var vobj=this;
      return this.works.find(w=>w.id==vobj.wkid);
    },
    work_mvs(){
      if (this.work){
        let original_data = JSON.parse(this.work.mv)
        let result = original_data.map(mvdata=>{

            let data = {
              name: "",
              url: "",
              cover: "",
              type: ""
            }

            if (typeof mvdata =='string'){
              data.url = mvdata
            }
            if (typeof mvdata == 'object'){
              if (mvdata.name && mvdata.name != ""){
                data.name = mvdata.name
              }
              data.url = mvdata.url
            }

            // if (data.url.indexOf("163")!=-1){
            //   data.type="netease"
             
            //   let url = data.url
            //   console.log("get ease:"+url);
            //   axios.post("/api/neteasemv/",{url: url}).then((res)=>{
            //     // data.neteasemp4=res.data.video
            //     data.cover=res.data.cover
            //     data.name=res.data.title
            //   })
              
            // }

            // if (data.url.indexOf("youtube")!=-1){
            //   data.type="youtube"
            //   let regex = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            //   let str = data.url;
            //   let m;

            //   if ((m = regex.exec(str)) !== null) {
            //     data.cover ="https://img.youtube.com/vi/"+m[2]+"/0.jpg"
              
            //     axios.get("/api/youtubemv/"+m[2]).then((res)=>{
            //       console.log(res.data.title)
            //       data.name=(data.name=="")?res.data.title:data.name
            //     })
            //   }

            // }


          return data
        })
        
        return result
        
      }
      return []
    }
  },
  watch: {
    work (){
      this.update_tracks();
    }
  },
  mounted () {
      this.update_tracks();
  },
  methods: {
    triggerMvPlay(mv){
      if (mv.type=="youtube"){
        this.youtube_url = mv.url
        this.full_video_status=true
      }
      if (mv.type=="netease"){
        window.open(mv.url)
      }
    },
      getNewlineBr(text){
        if (text){
          return (""+text).replace(/\n/g,"<br>")
        }
        return ""
      },
      audioload() {
        let player = $(".work_indep_player").get()[0]
        if (player){
          player.load();
        }

      },
      css_img(image_url){
        return {
          "background-image": "url(\""+image_url+"\")"
        }

      },
      update_tracks (){
        var vobj = this;
        if (this.work){
          if ( this.work.work_url.indexOf("soundcloud")!=-1){
            $.ajax({
              url: 'http://api.soundcloud.com/resolve.json',
              data: {
                  client_id: vobj.client_id,
                  url: vobj.work.work_url
              },
              success: function(res) {
                  if (res.tracks){
                      vobj.tracks = res.tracks;
                  }else{
                      vobj.tracks = [res];
                  }
                  // console.log(res);
                  // console.log("https://api.soundcloud.com/tracks/" + res.id + "/stream?secret_token=tracks&client_id=5dc224d1ef12f77e0c85f88d1b3b579d");
                  vobj.audioload();
              }
            });

          }
          if (this.work.work_url.indexOf('music.163')!=-1){
            let url = this.work.work_url
            console.log("get ease:"+url);
            axios.post("/api/neteasemv/",{url: url}).then((res)=>{
              this.neteasemp4=res.data.video
              this.neteasecover=res.data.cover
              this.neteasetitle=res.data.title
            })
          }
        }
        
      }
  }
}
</script>
