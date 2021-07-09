<template>
  <div>
      <div>
          <Flash/>
      </div>
    
    <div v-for="(post , index) in posts" :key="index">
          <div v-if="post.permissions.view">
              {{post.title}}

          </div>
      </div>
      

   
  </div>
</template>

<script>
import 'vue-good-table/dist/vue-good-table.css'
import { VueGoodTable } from 'vue-good-table'
import Flash from '@/Components/Flash'
export default {
    layout:"dashboard-layout",
    components:{
        Flash,VueGoodTable
    },
    props:{
        posts:Array,
      
    },
   
    data() {
        return {
            
            columns: [
        {
          label: 'Title',
          field: 'title',
        },
        {
          label: 'Body',
          field: 'body',
         
        }
      ],
      rows: this.posts,
        }
    },


}
</script>

<style >

table.vgt-table {
	font-size: 14px;
	border-collapse: collapse;
}



</style>
