<template lang="pug">
.page_service
  section.section_intro
    .container
      .row
        .col-sm-6
          h1 Dyverse Studio
            span.small 歧響音樂
          h4(v-html="slogan") 綺想、歧響，延展聽覺世界的無限可能
          p(v-html="description")
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
              .photo(:style="{'background-image': `url(${member.cover})`}")
              h4 {{ member.job }}
              h2 {{ member.name }}
              p(v-html="convertPara(member.description)")
  section.section_decor
</template>

<script>
import {mapState} from 'vuex'
export default {
  data(){
    return {
      slogan: "綺想、歧響，延展聽覺世界的無限可能",
      description: "歧響音樂擁有台灣的在地熱情，堅持日系的精雕細琢<br>作品橫跨古典到流行，主流到非主流<br>熱衷跨領域進行各種嘗試，以創造多樣風格的絢爛詩篇。",
//       members: [
//         {
//           name: "DeathscytheX",
//           job: "Founder、Producer",
//           description: `東京音樂專門學校畢業。
// 2016年創立歧響音樂，2019年擴編為團隊經營。
// 擅長音樂風格：Band Sound，民族音樂，管弦樂，實驗音樂。
// 興趣：咖啡、酒、天文、遊戲。`,
//           cover: "/img/members/Eric.jpg"
//         },{
//           name: "Waiting@H&&D",
//           job: "Songwriter、Producer",
//           description: `東京音樂專門學校畢業。
// 目標是成為對抗不公不義的創作型歌手。
// 擅長音樂風格：Pop、Rock、遊戲配樂
// 興趣：動漫畫、遊戲、鋼普拉、電影。`,
//           cover: "/img/members/Waiting.jpg"
//         },{
//           name: "Hsin 欣",
//           job: "Songwriter、Guitarist",
//           description: `大阪音樂專門學校畢業。
// 2015年回國後從事樂團演出、詞曲創作。
// 擅長音樂風格：Pop、Rock。
// 興趣：PS4、漫畫、旅遊。
// `,
//           cover: "/img/members/Hsin.jpg"
//         },{
//           name: "Hiroshi",
//           job: "Mixing Engineer",
//           description: `大阪音樂專門學校畢業，英國University of Kent, Music of Technology畢業。
// 從英國畢業後回到東京於石田塾潛心鑽研混音後製，近年致力於研究聲音後製與音樂呈現的關聯性。
// 擅長音樂風格：Pop、R&B、Rock。
// 興趣: 攝影、旅遊、心理學
// `,
//           cover: "/img/members/Hiroshi.jpg"
//         },{
//           name: "陳雨農",
//           job: "A&R",
//           description: `文化大學音樂系畢業。
// 後投入錄音室工作擔任錄音、剪輯、後製及企劃工作多年。目前以歌手培訓為主。
// 喜好音樂風格：動漫音樂、日系偶像、抒情樂。
// 興趣：女僕、偶像、拉麵。
// `,
//           cover: "/img/members/RFC.jpg"
//         },{
//           name: "tetsuyanao",
//           job: "Songwriter, Bassist",
//           description: `東京音樂專門學校涉谷校畢業。
// 2014年回國後從事作編曲、貝斯教學、錄音及現場演奏。
// 擅長音樂風格：動漫音樂。
// 興趣：音樂、酒、動畫、遊戲。`,
//           cover: "/img/members/tetsuyanao.jpg"
//         }
//       ]
    }
  },
  mounted(){
  },
    computed:  {
        ...mapState(['services','members'])
    },
    methods: {
      convertPara(content){
        return content.replace(/\n/g,'<br>\n').replace(/\:/g,'：')
                          .replace(/\,/g,'，')
                          .replace(/\./g,'。')
                          .replace(/\n(.*?：)/g,"\n<b>$1</b>")
      }
    }
}
</script>
<style lang="sass?indentedSyntax">


</style>
