<template lang="pug">
section.page_artist_indep(v-if='artist')
  .container
    ol.breadcrumb
      li.breadcrumb-item
        router-link(to='/artist') 合作演出者
      li.breadcrumb-item.active {{artist.name}}
    .row.row_work_indep.row_artist
      .col-sm-3.col_artist_info
        img.artist_img(:src='artist.cover', width='100%')
        h2
          | {{artist.name}}
          a(:href='artist.link', target='_blank')
            img(src='img/fbicon_black.png', style='width:20px')
        hr
        p(v-html='artist.description')
        br
        h4 Works
        ul.artist_worklist
          li(v-for='(work,id) in artist.works', :class='work_index==id?"active":""', @click='work_index=id') {{work.title}}
      .col-md-9(v-if='artist.works[work_index]')
        .row
          .col-sm-8.col-md-12
          .col-sm-12(v-if='artist.works[work_index]')
            .work_content_header
              br.visible-xs
              br.visible-xs
              h1 {{artist.works[work_index].title}}
            br.visible-xs
            iframe(width='100%', height='400', :src='artist.works[work_index].embed_url', frameborder='0', allowfullscreen='')
            br
            br
            p(v-html='artist.works[work_index].discription')
            hr
        .col-sm-12
          h3 相關作品
          .row.slick
            .col-sm-3(v-for='(work,id) in artist.works', @click='work_index=id')
              mvitem(:disable_play='true',:key="work.name", :mv_url='work.work_url', :mv_cover='work.cover', :mv_name='work.name')

</template>


<script>
import {mapState} from 'vuex'
import mvitem from './workitem/mvitem'
import $ from 'jquery'
import Slick from 'slick-carousel'
export default {
  data: function() {
      return {
          tracks: null,
          work_index: 0,
          paging: 0
      }
  },
  mounted(){
    // $(".slick").slick()
  },
  props: ["wkid"],
  computed: {
    ...mapState(['artists']),
    artist(){
      return this.artists.find(w=>w.id==this.wkid);
    }
  },
  components: {
    mvitem
  }
}
</script>
