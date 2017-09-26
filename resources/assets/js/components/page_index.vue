<template>
  <section class='page_index'>
    <div class='container-fluid index_mainimg'>
      <img class='cover index_cover' src='http://dyverse.studio/img/index_temp.png'>
    </div>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-12'>
          <h2>最新資訊 </h2>
          <hr>
        </div>
      </div>
      <div class='row'>   
        <workitem v-if='works.length>0' class='col-md-4 col-sm-6' :wkitem='works[0]'></workitem>
        <postbox v-if='posts.length>0' class='col-md-4 col-sm-6' :post='posts[0]' :postid='posts[0].id' ></postbox>           
        <workitem v-if='show_item.length>0' class='col-md-4 col-sm-6' :wkitem='show_item[0]'></workitem>
      </div>
    </div>

</section> 
</template>

<script>
import {mapState} from 'vuex'
import workitem from './workitem/workitem'
import postbox from './blog/postbox'
export default {
  components: {
    workitem , postbox
  },
  computed: {
      ...mapState(['all_works','works','posts','artists']),
      awitem (){
        var temp=this.artists[0].works[0];
        temp.company= this.artists[0].name;
        return temp;
      },
      show_item(){
        var sort_date=(a,b)=>{
          console.group("sort date")
          console.log(a,b)
          var va = a.date.split(' ')[0].replace('.','');
          var vb = b.date.split(' ')[0].replace('.','');
          console.groupEnd("sort date")

          if (!isNaN(va)){
            while (va.length<7){ va+="0"}
          }
          if (!isNaN(vb)){
            while (vb.length<7){ vb+="0"}
          }

          if (isNaN(va) || isNaN(vb) ){
            return isNaN(va)?10000:-10000;
          }else{
            return parseInt(vb) -parseInt(va);
          }
        };
        var item1=this.all_works.filter(o=>o.singerid!=0).sort(sort_date);
        return item1;
      }
    }
}
</script>
