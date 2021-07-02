<template>
  <div>
      <div>
          <Flash/>
      </div>
      <div v-if="isAdmin"><h3>Only for admin</h3></div>
      <div v-for="(user , index) in users" :key="index">
          <div v-if="user.can.viewany">
              {{user.fname}}

          </div>

      </div>
    
      
   
  </div>
</template>

<script>
import Flash from '@/Components/Flash'
export default {
    layout:"dashboard-layout",
    components:{
        Flash
    },
    props:{
        users:Array,
        isAdmin:Boolean
    },
   
    data() {
        return {
            form:this.$inertia.form({
                name:''
            })
        }
    },
  

}
</script>

<style>

</style>
