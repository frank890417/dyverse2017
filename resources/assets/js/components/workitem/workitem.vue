<template>
  <div class="workitem" v-if="wkitem">
    <router-link class=inner :to='(wkitem.singerid>0)?("artist/"+wkitem.singerid):("/works/"+wkitem.id)' :title='"點擊查看 "+wkitem.title+"詳細資訊"'>
      <div class='workitem_img' :style='css_img(wkitem.image)'></div>
      <div class='workitem_texts'>
        <h3>{{wkitem.title}}</h3>
        <hr>
        <h4 v-html='wkitem.company?wkitem.company:wkitem.discription'></h4>
        <h5>{{wkitem.date}}</h5>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  props: ["wkitem"],
  methods: {
    css_img(image_url){
      return {
        "background-image": "url(\""+image_url+"\")"
      }

    }
  }
}
</script>
