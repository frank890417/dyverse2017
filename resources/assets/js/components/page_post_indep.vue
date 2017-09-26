<template>
<section class='page_post_indep'>
  <div class='container' v-if='post.title' v-for='post in postset'>
    <ol class='breadcrumb'> 
        <li class='breadcrumb-item'><router-link to='/blog'>文章</router-link></li> 
        <li class='breadcrumb-item active' v-if='post.title'>{{post.title}}</li> 
    </ol>
    <div class='row row_post_indep'>
      <div class='col-sm-12 blog_indep_img' :style='"background-image: url("+post.cover+")"' >
      </div>
      <div class='col-sm-8' v-if='post.title'>
        <div class='post_content_header'>
          <h5 class='post_post'>{{post.post}}</h5>
          <h3>{{post.title}}</h3>
        </div>
        <p class=discription v-html='post.content'></p>
      </div>
    </div>
  </div>
</section>  
</template>

<script>
import {mapState} from 'vuex'
export default {
  props: ['wkid'],
  computed: {
    ...mapState(['posts']),
    postset(){
      // console.log(this.posts);
      console.log(this.posts.filter((p)=>(p.id==this.wkid)));
      if (this.posts.length>0)
        return this.posts.filter((p)=>(p.id==this.wkid));
      return [];
    }
  }
}
</script>

<style>

</style>
