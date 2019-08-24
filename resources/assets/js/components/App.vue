<template>
  <div class='allcontent'>
      <navbar></navbar>
      <div :class='["pages_area"]'>
          <transition name='fade' mode='out-in'>
              <router-view></router-view>
          </transition>
          <footerpart></footerpart>
      </div>
  </div>
</template>

<script>
import navbar from './navbar'
import footerpart from './footerpart'
import {mapState} from 'vuex'
export default {
  components: {
      navbar,
      footerpart
    },
    computed: mapState(["website_name","about","projects","services","studio_info","works","pages","posts"]),
    template: ``,
    mounted: function() {
        // window['app']=this;
        // 載入所有網站資料
        var vobj = this.$store.state;
        // $.ajax({
        //     url: api_url,
        //     data: {
        //         type: "get",
        //         name: "website_data"
        //     },
        //     success: function(res) {
        //         //注意, api中有些名稱s不一樣
        //         website_data = JSON.parse(res);
        //         vobj.about = website_data.about;
        //         // vobj.projects = website_data.project;
        //         vobj.services = website_data.service;
        //         // vobj.works = website_data.track;
        //         vobj.services[0].img = 'http://dyverse.studio/img/service_1.svg'
        //         vobj.services[1].img = 'http://dyverse.studio/img/service_2.svg'
        //         vobj.services[2].img = 'http://dyverse.studio/img/service_3.svg'
        //         vobj.services[3].img = 'http://dyverse.studio/img/service_4.svg'
        //         vobj.studio_info = website_data.studio_info;

        //         // //add scroll reveal
        //         // window.sr = ScrollReveal();
        //         // window.sr = ScrollReveal().reveal('h1,h2,h3,h4,h5,h6');
        //     }
        // });



        // //如果hash改變，偵測並載入項目
        // window.onhashchange = function() {
        //     console.log(window.location.hash);
        //     if (!vobj.user_nav_sw_discard) {
        //         var target_page = window.location.hash.substr(2);
        //         console.log(target_page);
        //         vobj.sw_page(target_page);
        //     } else {
        //         vobj.user_nav_sw_discard = false;
        //     }
        // }
        // if (window.location.hash != "")
        //     window.onhashchange();

    },
    methods: {
        sw_page: function(tar) {
            // if (ga) {
            //     ga('send', 'pageview', tar);
            // }
            // $(".allcontent").scrollTop(0);
            // console.log("now on page:" + tar);
            // // ga('send', 'pageview', tar);
        },
        get_pagetitle: function(tag) {
            for (var i = 0; i < this.pages.length; i++) {
                if (this.pages[i].tag == tag) {
                    return this.pages[i].title + "-" + this.website_name;
                }
            }
            return this.website_name;
        },
    }

}
</script>
