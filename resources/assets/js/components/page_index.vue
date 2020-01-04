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
import _ from 'underscore'

let sort_date=(a,b)=>{
    var va = (a.date || a.established_time || "").split(' ')[0].replace(/\./g,'');
    var vb = (b.date || b.established_time || "").split(' ')[0].replace(/\./g,'');

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

export default {
  components: {
    workitem , postbox
  },
  computed: {
      ...mapState(['all_works','works','posts','artists']),
      awitem (){
        var temp= _.flatten(this.artists.map(artist=>artist.works));
        console.log(temp)
        temp = temp.sort(sort_date)
        // temp.company= this.artists[0].name;
        return temp[0];
      },
      show_item(){
        
        var item1=this.all_works.filter(o=>o.singerid!=0).sort(sort_date);
        return item1;
      }
    }
}
</script>
