
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import store from "./store"
import router from "./router"
import {mapState} from 'vuex'
import "./sdk-3.1.2.js"



var website_data = {};
var api_url = "http://dyverse.studio/api/command.php";
var client_id = '5dc224d1ef12f77e0c85f88d1b3b579d';
SC.initialize({
    client_id: '5dc224d1ef12f77e0c85f88d1b3b579d'
});
var sending_reg_mail = false;
window.ga = null;
//bootstrap collapse nav
$(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') ) {
        $(this).collapse('hide');
    }
});

//Google analysis
// if (window.document.domain == "dyverse.studio") {
//     (function(i, s, o, g, r, a, m) {
//         i['GoogleAnalyticsObject'] = r;
//         i[r] = i[r] || function() {
//             (i[r].q = i[r].q || []).push(arguments)
//         }, i[r].l = 1 * new Date();
//         a = s.createElement(o),
//             m = s.getElementsByTagName(o)[0];
//         a.async = 1;
//         a.src = g;
//         m.parentNode.insertBefore(a, m)
//     })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

//     window.ga('create', 'UA-52977512-7', 'auto');
//     // ga('send', 'pageview');
    

// } else {
//     window.ga = null;
// }
// 

import VueAnalytics from 'vue-analytics'
if (document.domain.indexOf('dev')==-1) {
    Vue.use(VueAnalytics, {
      id: 'UA-52977512-7',
      router
    })
  }

import App from './components/App';
import VueYouTubeEmbed from 'vue-youtube-embed'
import picture_loader from './components/manage/picture_loader'
Vue.use(VueYouTubeEmbed)

const vm = new Vue({
    el: "#app",
    router,
    store,
    data:{
      mvdata: window.mvdata || []
    },
    components: {
      App,picture_loader
    },
    mounted(){
        if (this.mvdata){
            this.mvdata=this.mvdata.map((d)=>{
                console.log(d)
                if (typeof d=="string"){
                    return {
                        name: "",
                        url: d,
                        cover: ""
                    }
                }else{
                    return d 
                }
            })
            
        }
    },
    methods: {
        updateAll(){
            this.$forceUpdate()
        }
    }
    
});



function init_musics() {

    var tracks = track_datas.tracks;
    var playid;
    SC.initialize({
        client_id: client_id
    });
    tracks.forEach(function(value, index) {
        console.log("init_musics: " + value.song);
        if (value.song.indexOf("set") > -1) {
            $.get('http://api.soundcloud.com/resolve.json?url=' +
                value.song + '/tracks&client_id=' + client_id,
                function(result) {
                    track_datas.tracks[index].soundcloud_data = result.tracks;
                });

        } else if (value.song.indexOf("soundcloud") > -1) {
            $.get('http://api.soundcloud.com/resolve.json?url=' +
                value.song + '/tracks&client_id=' + client_id,
                function(result) {
                    track_datas.tracks[index].soundcloud_data = [{
                        id: result.id
                    }];
                    console.log(result);
                });
        } else {
            // console.log("http://www.youtubeinmp3.com/fetch/?video="+value.song);
            track_datas.tracks[index].soundcloud_data = [{
                id: "http://www.youtubeinmp3.com/fetch/?video=" + value.song
            }];

        }




    });

}

window.onload=function(){
  if ($('#posttable').length>0){
    $('#posttable').DataTable();
  }
}

if (!window.require_js) window.require_js={};

if (window.require_js.tinymce){
  tinymce.init({
  	selector: '#content',
  	api_key: 'ngpn9ha5mk1a69lvgt66jzupekxmd86rn8e1iwjtyw3i3m6c',
    images_upload_url: 'postAcceptor.php',
    images_upload_base_path: '/some/basepath',
    images_upload_credentials: true,
    setup: function (editor) {
      editor.addButton('uploadpic', {
        text: '上傳圖片',
        icon: false,
        onclick: function () {
          $(".btn-dropzone").click();
        }
      });
      editor.addButton('uploadpic_url', {
        text: '插入圖片(連結網址)',
        icon: false,
        onclick: function () {
          var imgurl = prompt("輸入圖片網址", "插入圖片");
          if(imgurl!="" && imgurl ){
            tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+imgurl+'\" style=\"width: 100%;height: auto\"></img>');

          }
        }
      });
    },
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | uploadpic | uploadpic_url',
    plugins : "paste,link",
    theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
    paste_auto_cleanup_on_paste : true,
    paste_preprocess : function(pl, o) {
        // Content string containing the HTML from the clipboard
        // alert(o.content);
        console.log(o.content);
        
        // o.content = $("<p></p>").html(o.content).text();
    },
    paste_postprocess : function(pl, o) {
        // Content DOM node containing the DOM structure of the clipboard
        // alert(o.node.innerHTML);
        o.node.innerHTML = o.node.innerHTML;
    }
  });
}
if (window.require_js.dropzone){
  //初始化Dropzone上傳圖片function
  function gen_dz(classname,callback){  
  	// console.log(classname);
    var myDropzone = new window.Dropzone(classname, {
      url: "/dropzone/upload.php",maxFiles: 1
      ,sending: function(){
        // vm.page_status="圖片上傳中<img src='../img/loadingicon_gold.png' class=loadingspin>";
      }
      ,success: function(evt,res){
        callback(evt,res);
      }
    });
    // myDropzone.createThumbnailFromUrl(file, this.ndata.img, callback, crossOrigin);
    // $("#dropfrontimg").dropzone({ url: "http://citi2016.unitedway.org.tw/dropzone/" });
    myDropzone.on("complete", function(file) {
      myDropzone.removeFile(file);
      setTimeout(function(){
        // vm.page_status="圖片上傳完畢";
      },300);
      
    });
  }

  $(".btn_yt_thumb").click(function(){
  	var yurl=$("[name=work_url]").val();
    const regex = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;

    var m = regex.exec(yurl);
    console.log(m);
    var imgurl="https://img.youtube.com/vi/"+m[2]+"/0.jpg";
  	$("#cover").val(imgurl);
    $(".cover_preview").attr('src',imgurl);
  });

  gen_dz(".btn-dropzone-cover",function(evt,res){
     console.log(res);
     var imgurl=res.replace("/var/www/dyverse2017/public/","http://dyverse.monoame.com/");
     console.log(imgurl);
     $("#cover").val(imgurl);
     $(".cover_preview").attr('src',imgurl);
  });

  // gen_dz(".btn-dropzone",function(evt,res){
  //    console.log(res);
  //    var imgurl=res.replace("/var/www/dyverse2017/public/","/");
  //    console.log(imgurl);
  //    tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+imgurl+'\" style=\"width: 100%;height: auto\"></img>');
  // });

  

}
