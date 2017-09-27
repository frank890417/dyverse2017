import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
const store = new Vuex.Store({
  state: {
      website_name: "歧響音樂 | Dyverse Studio",
      about: {},
      services: [
        {
          "title":"音樂製作",
          "description":"原創音樂，Demo 製作，廣告、影視與遊戲配樂，編曲與樂曲重製",
          "img": "/img/service_1.svg"
        },
        {
          "title":"音效製作",
          "description":"LOGO 與企業形象音效，廣告、影視與遊戲音效，網站特效音，手機鈴聲",
          "img": "/img/service_2.svg"
        },
        {
          "title":"混音後製",
          "description":"歌手與樂手錄音，旁白錄製，音樂會現場錄音，後製編輯，混音與母帶處理",
          "img": "/img/service_3.svg"
        },
        {
          "title":"數位製譜",
          "description":"樂譜電子檔製作，流行音樂、樂團譜製作，現代音樂、室內樂、交響樂總譜與分譜打印",
          "img": "/img/service_4.svg"
        }
      ],
      studio_info: {},
      works: [],
      all_works: [],
      artists: [],
      posts: [],
  }
});

export default store