<template>
  <div>
      <div>
          <Flash/>
      </div>
    
      <vue-good-table
      :columns="columns"
      :rows="rows"
      :line-numbers="true"
      :row-style-class="rowStyleClassFn"
      :search-options="{
         enabled: true
            }"
      :pagination-options="{
            enabled: true,
            mode: 'records',
            perPage: 5,
            perPageDropdown: [3, 7, 9],
            dropdownAllowAll: false,
            nextLabel: 'next',
            prevLabel: 'prev',
            rowsPerPageLabel: 'Rows per page',
            ofLabel: 'of',
            pageLabel: 'page', // for 'pages' mode
            allLabel: 'All',
           
        }"
      >
         <div slot="table-actions">
                <button class="btn btn-danger py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" @click.prevent="goto">Create user</button>
        </div>
      </vue-good-table>
      
      
      <!-- <div v-for="(user , index) in users" :key="index">
          <div v-if="user.can.viewany">
              {{user.fname}}

          </div>
      </div>
     -->
      
   
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
          label: 'First Name',
          field: 'fname',
        },
        {
          label: 'Last Name',
          field: 'lname',
         
        },
        {
          label: 'Email',
          field: 'email',
         
        }
      ],
      rows: this.users,
        }
    },
  methods: {
      rowStyleClassFn(row) {
    return row.email =="adeyinkakoya@gmail.com" ? 'tyv' : 'red';
  },
  },

}
</script>

<style >

.tyv {
    font-weight: bold;
    color: blue;
    font-style: italic;
}

</style>
