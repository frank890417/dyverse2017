<template>
  <div class=workitem>
    <router-link class=inner :to="'/blog/'+postid" :title="'點擊查看 '+post.title+'詳細資訊'">
        <div class="workitem_img" :style="'background-image: url('+post.cover+')'"></div>
        <div class="workitem_texts">
          <h3>{{post.title}}</h3>
          <hr>
          <h5 class=text-muted>{{post.date}}</h5>
          <p class=text-muted v-html="post.description.substr(0,50)+'...'"></p>
        </div>
    </router-link>
  </div>
</template>

<script>
export default {
  props: ["post","postid"]
}
</script>
