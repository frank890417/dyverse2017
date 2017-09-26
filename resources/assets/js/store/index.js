import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
const store = new Vuex.Store({
  state: {
      website_name: "歧響音樂 | Dyverse Studio",
      about: {},
      services: [],
      studio_info: {},
      works: [],
      all_works: [],
      artists: [],
      posts: [],
  }
});

export default store