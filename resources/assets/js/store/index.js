import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex);
const store = new Vuex.Store({
  state: {
      website_name: "歧響音樂 | Dyverse Studio",
      about: {},
      services: [
        {
          "eng": "Production",
          "title":"音樂製作",
          "description":"團隊成員皆為日本留學歸國的音樂人，擅長帶有日系色彩的風格，在流行歌曲、偶像歌曲、動畫配樂、遊戲配樂等各方面，都累積了相當豐富的製作經驗。",
          "img": "/img/service_1.svg"
        },
        {
          "eng": "Sound FX",
          "title":"音效製作",
          "description":"環境音、場景音、效果音，透過縝密的設計，加上精確的配置，提升視覺畫面的臨場感，如臨其境的體驗將更加撼動人心。",
          "img": "/img/service_2.svg"
        },
        {
          "eng": "Recording & Mixing",
          "title":"混音後製",
          "description":"提供專業的錄音及配唱指導。以職人的堅持完成各項細節後製，力求完美。",
          "img": "/img/service_3.svg"
        },
        {
          "eng": "Publishing",
          "title":"數位出版",
          "description":"協助客戶將成品上架至各大音樂串流平台，並且提供相關細節的諮詢。",
          "img": "/img/service_4.svg"
        }
      ],
      studio_info: {},
      works: [],
      all_works: [],
      artists: [],
      members: [],
      posts: [],
  },
  mutations: {
    setMembers(state,d){
      state.members=d
    },

  },
  actions: {
    getMembers({commit},d){
      axios.get("/api/members").then(res=>{
        commit("setMembers",res.data)
      })
      
    },
    loadAllData({state},d){
      let sort_date=(a,b)=>{
          var va = (a.date || a.established_time || '').split(' ')[0].replace(/[\.\-]/g,'');
          var vb = (b.date || b.established_time || '').split(' ')[0].replace(/[\.\-]/g,'');

          if (!isNaN(va)){
              while (va.length<8){ va+="0"}
          }
          if (!isNaN(vb)){
              while (vb.length<8){ vb+="0"}
          }
          // console.log(va,vb)

          if (isNaN(va) || isNaN(vb) ){
              return isNaN(va)?10000:-10000;
          }else{
              return parseInt(vb) -parseInt(va);
          }
      };

      axios.get("/api/singer").then((res)=>{
          state.artists = res.data.filter(artist=>artist.show);
      });
      axios.get("/api/work/indep").then((res)=>{
          state.works = res.data.sort(sort_date).filter(work=>work.show)
      });
      axios.get("/api/work").then((res)=>{     
          state.all_works = res.data.sort(sort_date).filter(work=>work.show)
      });
      axios.get("/api/post").then((res)=>{
          state.posts = res.data.sort(sort_date);
      });

    }
  }
});

export default store