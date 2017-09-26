<template>
  <section class='page_blog'>
    <div class='container'>
      <div class='row'>
        <div class=col-sm-12>
          <h1>專欄文章</h1>
        </div>
      </div>
      <div class="row">
        <postbox v-for="p in posts" class="col-md-4 col-sm-6" :post="p" :postid="p.id"></postbox>
      </div>
    </div>
  </section>
</template>


<script>
import postbox from './blog/postbox'

import {mapState} from 'vuex'
export default {
  components: {
    postbox
  },
  computed: mapState(['posts'])
}
</script>

