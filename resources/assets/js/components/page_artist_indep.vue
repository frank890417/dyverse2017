<template>
  <section class='page_artist_indep' v-if='artist'>
    <div class='container'>
      <ol class='breadcrumb'> 
          <li class='breadcrumb-item'><router-link to='/artist'>合作演出者</router-link></li> 
          <li class='breadcrumb-item active'>{{artist.name}}</li> 
      </ol>
      
      <div class='row row_work_indep row_artist'>
        <div class='col-sm-3 col_artist_info'>
          <img class='artist_img' :src='artist.cover' width='100%'/>
          <h2>{{artist.name}}
            <a :href='artist.link' target='_blank'> 
              <img src='img/fbicon_black.png' style='width:20px'/></a>
          </h2><hr>
          <p v-html='artist.description'></p>
            <br>
            <h4>Works</h4>
            <ul class='artist_worklist'>
              <li v-for='(work,id) in artist.works' :class='work_index==id?"active":""' @click='work_index=id'>{{work.title}}</li>
            </ul>
          </div>
        
        <div class='col-md-9'  v-if='artist.works[work_index]' >
          <div class='col-sm-8 col-md-12'>
            <div class='work_content_header'>
              <br class='visible-xs'>
              <br class='visible-xs'>
              <h1>{{artist.works[work_index].title}}</h1>
              <br>
            </div>
          </div>
          
          <div class='col-sm-12'  v-if='artist.works[work_index]'>
              <br class='visible-xs'>
              <iframe width='100%' height='400' :src='artist.works[work_index].embed_url' frameborder='0' allowfullscreen></iframe><br><br><p v-html='artist.works[work_index].discription'></p></div>
          </div></div>
          
        </div>
        
      </div>
    </div>
  </section>
</template>


<script>
import {mapState} from 'vuex'
export default {
  data: function() {
      return {
          tracks: null,
          work_index: 0
      }
  },
  props: ["wkid"],
  computed: {
    ...mapState(['artists']),
    artist(){
      return this.artists.filter(w=>w.id==this.wkid)[0];
    }
  }
}
</script>
