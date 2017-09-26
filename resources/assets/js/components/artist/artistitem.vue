<template>
  <div class=workitem v-if='artist'>
    <router-link class="inner" :to="'/artist/'+artist.id" :title="'點擊查看 '+artist.name+'詳細資訊'">
      <div class='workitem_img' :style="'background-image: url('+encodeURI(artist.cover)+')'"></div>
      <div class='workitem_texts'>
        <h3>{{artist.name}}</h3>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  props: ["artist", "wkid"]
}
</script>
