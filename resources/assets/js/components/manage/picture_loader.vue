<template lang="pug">
  .picture_loader
    input.from-control(
      :value="value", 
      placeholder="自動抓取（網易請自訂圖片)",
      @keyup="$emit('input',$event.target.value)"
    )
    
    .btn.upload 上傳
     
</template>

<script>
import Dropzone from 'dropzone'
export default {
  props: {
    value: {
      default: ""
    }
  },
  data(){
    return {
      // value: ""
    }
  },
  mounted(){

    //初始化Dropzone上傳圖片function
    function gen_dz(classname,callback){  
      // console.log(classname);
      var myDropzone = new Dropzone(classname, {
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



    let _this = this
    gen_dz(this.$el.querySelector(".btn.upload"),function(evt,res){
      var imgurl=res.replace("/var/www/dyverse2017/public/","http://dyverse.monoame.com/");
      _this.$emit("input",imgurl.trim())
      Vue.nextTick(()=>{
        _this.$forceUpdate()
      });
    });


  }
}
</script>

<style lang="sass?indentedSyntax">
.picture_loader
  display: flex
.btn
  width: 100px
input
  width: 100%
</style>
