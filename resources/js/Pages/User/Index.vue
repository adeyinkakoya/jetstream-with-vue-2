<template>
  <div>
      <div>
          <Flash/>
      </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid libero quidem vitae praesentium debitis quaerat ea quasi quis omnis, itaque, dolor minima sed hic eum aliquam eligendi laboriosam fuga eius.</p>
     
      
      <!-- <div v-for="(user , index) in users" :key="index">
          <div v-if="user.can.viewany">
              {{user.fname}}

          </div>
      </div> -->
    
      
   
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
        users:Array,
      
    },
   
    data() {
        return {
            
            columns: [
        {
          label: 'Name',
          field: 'name',
        },
        {
          label: 'Age',
          field: 'age',
          type: 'number',
        },
        {
          label: 'Created On',
          field: 'createdAt',
          type: 'date',
          dateInputFormat: 'yyyy-MM-dd',
          dateOutputFormat: 'MMM do yy',
        },
        {
          label: 'Percent',
          field: 'score',
          type: 'percentage',
        },
      ],
      rows: [
        { id:1, name:"John", age: 20, createdAt: '',score: 0.03343 },
        { id:2, name:"Jane", age: 24, createdAt: '2011-10-31', score: 0.03343 },
        { id:3, name:"Susan", age: 16, createdAt: '2011-10-30', score: 0.03343 },
        { id:4, name:"Chris", age: 55, createdAt: '2011-10-11', score: 0.03343 },
        { id:5, name:"Dan", age: 40, createdAt: '2011-10-21', score: 0.03343 },
        { id:6, name:"John", age: 20, createdAt: '2011-10-31', score: 0.03343 },
      ],
        }
    },
  

}
</script>

<style>

</style>
