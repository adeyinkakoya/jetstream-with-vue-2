<template>
  <div>
      <div>
          <Flash/>
      </div>
     <input type="text" name="name" id="" v-model="form.name">
     <button type="submit" @click="submit"> Create Song</button>
  </div>
</template>

<script>
import Flash from '@/Components/Flash'
export default {
    components:{
        Flash
    },
    data() {
        return {
            form:this.$inertia.form({
                name:''
            })
        }
    },
    methods: {
        submit(){
            this.form.post(this.route('song.store'))
        }
    },

}
</script>

<style>

</style>
