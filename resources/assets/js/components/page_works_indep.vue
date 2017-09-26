<template>
  <section class='page_works_indep'>
    <div class='container' v-for='work in workset'>
      <ol class='breadcrumb' v-if='work'> 
          <li class='breadcrumb-item'><router-link to='/works'>作品</router-link></li> 
          <li class='breadcrumb-item active'>{{work.title}}</li>
      </ol>
      <div class='row row_work_indep' v-if='work'>
        <div class='col-md-4 col-xs-12 work_indep_img'  :style='css_img(work.image)' >
          <h3 class='nametag'>{{work.title}}</h3>
        </div>
        <div class='col-sm-12 col-md-8'>
          <div class='col-sm-8 col-md-12'>
            <div class='work_content_header'>
              <br class='visible-xs'>
              <br class='visible-xs'>
              <h5 class='work_work'>{{work.work}}</h5>
              <h3>{{work.title}}</h3>
              <h5><a class=company :href='work.company_url' target='_blank'>{{work.company}}</a> &nbsp; | &nbsp; {{work.date}}</h5>
              <hr>
            </div>
            <p class=discription v-html='work.discription'></p>
          </div>
          
          <div class='infopart col-sm-4 col-md-12'>
            <br class='visible-xs'>
            <h3>系列曲目</h3>
            <h4 v-if='!tracks && work.work_url.indexOf("youtube")==-1'><img src='img/loadingicon.png' class=loadingspin>載入曲目中...</h4>
            <div v-for='t in tracks' v-if='tracks && work.work_url.indexOf("youtube")==-1'>
              <h6>{{t.title}}</h6>
              <audio class='work_indep_player' controls='controls' id='now_playing'>
                <source id='nowsource' type='audio/mp3' :src='"https://api.soundcloud.com/tracks/"+t.id+"/stream?secret_token=tracks&client_id=5dc224d1ef12f77e0c85f88d1b3b579d"'/>
              </audio>
            </div>
            <div v-if='work.work_url.indexOf("youtube")!=-1'>
              <iframe :src='work.embed_url' width='100%' height='350px'></iframe>
            </div>
          </div></div>

        </div>
      </div>

    </div>
  </section>  
</template>

<script>
import {mapState} from 'vuex'
export default {
  props: ['wkid'],
  data: function(){
    return {
      tracks: []
    };
  },
  computed: {
    ...mapState(['works']),
    workset: function(){
      var vobj=this;
      return this.works.filter(w=>w.id==vobj.wkid);
    }
  },
  watch: {
    workset (){
      this.update_tracks();
    }
  },
  mounted () {
      this.update_tracks();
  },
  methods: {
      audioload: function() {
          $(".work_indep_player").get()[0].load();

      },
      css_img(image_url){
        return {
          "background-image": "url(\""+image_url+"\")"
        }

      },
      update_tracks (){
        var vobj = this;
        if (this.workset[0]){
          $.ajax({
              url: 'http://api.soundcloud.com/resolve.json',
              data: {
                  client_id: client_id,
                  url: this.workset[0].work_url
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
      }
  }
}
</script>
