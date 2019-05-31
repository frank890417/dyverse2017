<template>
  <section class='page_artist'>
    <div class='container'>
      <div class='row'>
        <div class=col-sm-12>
          <h1>旗下藝人</h1>
        </div>
      </div>
      <div class='row' v-if='artists'>
        <artistitem class='col-md-4 col-sm-6' v-for='(w,id) in artists' :artist='w' :wkid='id' />
      </div>
    </div>
  </section>  
</template>

<script>
import {mapState} from 'vuex'
import artistitem from './artist/artistitem'
export default {
  computed: {
    ...mapState(['artists'])
  },
  components: {
    artistitem
  }
}
</script>
