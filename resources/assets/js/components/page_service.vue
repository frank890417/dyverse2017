<template lang="pug">
.page_service
  section.section_intro
    .container
      .row
        .col-sm-6
          h1 Dyverse Studio
            span.small 歧響音樂
          h4 綺想、歧響，延展聽覺世界的無限可能
          p 歧響音樂擁有台灣的在地熱情，堅持日系的精雕細琢作品橫跨古典到流行，主流到非主流熱衷跨領域進行各種嘗試，以創造多樣風格的絢爛詩篇。
        .col-sm-6
          img.cd(src="/img/cd.svg")
  section.section_service
    .container
      .row.row_service
        .col-sm-3.servicebox(v-for='s in services')
          img(:src='s.img')
          h5 {{s.eng}}
          h3 {{s.title}}
          p {{s.description}}
  section.section_member
    .container
      .row
        .col-sm-2
          h2 團隊成員
        .col-sm-10
          .row
            .col-sm-6.col-member(v-for="member in members")
              .photo(:style="{'background-image': `url(${member.img})`}")
              h4 {{ member.job }}
              h2 {{ member.name }}
              p(v-html="member.description")
  section.section_decor
</template>

<script>
import {mapState} from 'vuex'
export default {
  data(){
    return {
      members: [
        {
          name: "DeathscytheX",
          job: "Founder、Producer",
          description: `東京音樂專門學校畢業。
2016年創立歧響音樂，2019年擴編為團隊經營。
擅長音樂風格：Band sound，民族音樂，交響編制，實驗音樂。
興趣：咖啡、酒、天文、遊戲。`,
          img: "/img/members/Eric.jpg"
        },{
          name: "Hsin 欣",
          job: "Songwriter、Guitarist",
          description: ``,
          img: "/img/members/Hsin.jpg"
        },{
          name: "Hiroshi",
          job: "Producer",
          description: ``,
          img: "/img/members/Hiroshi.jpg"
        },{
          name: "Waiting@H&&D",
          job: "Songwriter、Producer",
          description: `東京音樂專門學校畢業。
目標是成為對抗不公不義的創作型歌手。
專長：作詞、作曲、編曲、遊戲配樂。喜好日系風格，但寫作上並不設限。
興趣：動漫畫、遊戲、鋼普拉、電影。`,
          img: "/img/members/Waiting.jpg"
        },{
          name: "陳雨農",
          job: "A&R",
          description: ``,
          img: ""
        },{
          name: "tetsuyanao",
          job: "Songwriter, Bassist",
          description: `東京音樂專門學校涉谷校畢業
2014年回國後從事作編曲,貝斯教學, 錄音及現場演奏
擅長音樂風格: 動漫風格
興趣：音樂、酒、動畫、遊戲。`,
          img: ""
        }
      ]
    }
  },
  mounted(){
    this.members.forEach(member=>member.description.replace(/\n/g,'<br>'))
  },
    computed:  {
        ...mapState(['services'])
    }
}
</script>
<style lang="sass?indentedSyntax">


</style>
