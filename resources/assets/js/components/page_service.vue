<template>
 <section class='page_service'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12'>
            <h1>服務項目</h1>
            </div>
        </div>
        <div class='row row_service'>
            <div class="col-sm-3 servicebox" v-for="s in services">
                <img :src='s.img'>
                <h3>{{s.title}}</h3>
                <p>{{s.description}}</p>
            </div>
        </div>
        <div class='row row_service_stage'>
            <div class='col-sm-12'>
                <h1>服務流程</h1>
            </div>
            <div class='col-sm-12 stage'><h2>Stage 1</h2></div>
            <div class='col-sm-12'><h3>需求描述</h3>
            <p>請透過
            <router-link to='/contact'>聯繫資訊</router-link>
                留下您的製作需求，我們將盡快回訊給您。</p></div>
            
            <div class='col-sm-12 stage'><h2>Stage 2</h2></div>
            <div class='col-sm-12'><h3>報價與製作合約</h3>
            <p>依據委託的製作內容，協商所需製作預算、頭款、繳件日期、以及著作財產權授權相關事宜。</p></div>
            
            <div class='col-sm-12 stage'><h2>Stage 3</h2></div>
            <div class='col-sm-12'><h3>製作及修改</h3>
            <p>實際製作時，在合約範圍內我們將盡可能提供修改服務，以達到雙方皆滿意的成果。</p></div>
            
            <div class='col-sm-12 stage'><h2>Stage 4</h2></div>
            <div class='col-sm-12'><h3>結案</h3>
            <p> 依合約內容完成之作品繳件經確認無誤後再支付尾款。</p></div>
            
        </div>
    </div>
</section> 
</template>

<script>
import {mapState} from 'vuex'
export default {
    computed:  {
        ...mapState(['services'])
    }
}
</script>
