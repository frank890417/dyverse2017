<template>
  <section class='page_works'>
    <div class='container'>
      <div class='row'>
        <div class="col-sm-12">
          <h1>作品案例</h1>
        </div>
      </div>
      <div class='row row_works' v-if='cworks(works).length>0' v-for="chunk in cworks(works)" >
        <workitem class='col-md-4 col-sm-6' v-for='w in chunk' :wkitem='w' />
      </div>
    </div>
  </section>
</template>

<script>
import {mapState} from 'vuex'
import _ from 'lodash'
import workitem from './workitem/workitem'

export default {
  components: {
    workitem
  },
  computed: {
    ...mapState(['works'])
  },
  methods: {
    cworks (works){
      var sort_date=(a,b)=>{
        // console.group("sort date")
        // console.log(a,b)
        var va = a.date.split(' ')[0].replace(/\./g,'');
        var vb = b.date.split(' ')[0].replace(/\./g,'');
        // console.groupEnd("sort date")

        if (!isNaN(va)){
          while (va.length<8){ va+="0"}
        }
        if (!isNaN(vb)){
          while (vb.length<8){ vb+="0"}
        }
        console.log(va,vb)

        if (isNaN(va) || isNaN(vb) ){
          return isNaN(va)?10000:-10000;
        }else{
          return parseInt(vb) -parseInt(va);
        }
      };
      return _.chunk(JSON.parse(JSON.stringify(works)).sort(sort_date),3) ;
    }
  }
}
</script>
