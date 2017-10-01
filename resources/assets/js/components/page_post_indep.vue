<template lang="pug">
section.page_post_indep
  .container(v-if='post')
    ol.breadcrumb
      li.breadcrumb-item
        router-link(to='/blog') 文章
      li.breadcrumb-item.active(v-if='post.title') {{post.title}}
    .row.row_post_indep
      .col-sm-12
        .col-sm-12.blog_indep_img(:style='"background-image: url("+post.cover+")"')
        .col-sm-8(v-if='post.title')
          .post_content_header
            h5.post_post {{post.post}}
            h3 {{post.title}}
          p.discription(v-html='post.content')

</template>

<script>
import {mapState} from 'vuex'
export default {
  props: ['wkid'],
  computed: {
    ...mapState(['posts']),
    post(){
      return this.posts.find((p)=>(p.id==this.wkid));
    }
  }
}
</script>

<style>

</style>
