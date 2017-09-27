<template lang="pug">
section.page_service
  .container
    .row
      .col-sm-12
        h1 服務項目
    .row.row_service
      .col-sm-3.servicebox(v-for='s in services')
        img(:src='s.img')
        h3 {{s.title}}
        p {{s.description}}
    .row.row_service_stage
      .col-sm-12
        h1 服務流程
      .col-sm-12.stage
        h2 Stage 1
      .col-sm-12
        h3 需求描述
        p.text-center
          | 請透過
          router-link(to='/contact') 聯繫資訊
          | 留下您的製作需求，我們將盡快回訊給您。
      .col-sm-12.stage
        h2 Stage 2
      .col-sm-12
        h3 報價與製作合約
        p.text-center 依據委託的製作內容，協商所需製作預算、頭款、繳件日期、以及著作財產權授權相關事宜。
      .col-sm-12.stage
        h2 Stage 3
      .col-sm-12
        h3 製作及修改
        p.text-center 實際製作時，在合約範圍內我們將盡可能提供修改服務，以達到雙方皆滿意的成果。
      .col-sm-12.stage
        h2 Stage 4
      .col-sm-12
        h3 結案
        p.text-center  依合約內容完成之作品繳件經確認無誤後再支付尾款。

</template>

<script>
import {mapState} from 'vuex'
export default {
    computed:  {
        ...mapState(['services'])
    }
}
</script>
