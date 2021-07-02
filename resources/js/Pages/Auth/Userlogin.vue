<template>
<div>
<br><br>
<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
    <div>
        <Flash/>
    </div>
    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign In
                        </h2>
                        <br>
                        <!-- <ValidationErrors/> -->
                        <!-- <div v-if="form.hasErrors" class="font-medium text-red-600">
                            <p>There are errors on the form</p>
                        </div> -->
                        <JetValidationErrors/>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Email" name="email" v-model="form.email">
                            <input type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password" name="password" v-model="form.password">
                        </div>
                        <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2" v-model="form.remember">
                                <label class="cursor-pointer select-none" for="remember-me" >Remember me</label>
                            </div>
                            <div v-if="canResetPassword"><a href="">Forgot Password?</a> </div>
                            
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" @click.prevent="submit" > 
                                <div v-if="form.processing">Loading</div>
                                <div v-else>login</div>
                            </button>
                            <button class="btn btn-danger py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" @click="reset">Reset</button>
                            <button class="btn btn-secondary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" @click.prevent="goto">Sign up</button>
                        </div>
                        
                    </div>
                </div>
   

</div>
</template>

<script>
// import ValidationErrors from '@/Jetstream/ValidationErrors'
import Flash from '@/Components/Flash'
import JetValidationErrors from '@/Jetstream/ValidationErrors'

export default {
    components:{
      
        Flash, JetValidationErrors
    },
    props:{
        canResetPassword:Boolean,
        status:String
    },
    data() {
        return {
            form:this.$inertia.form({
                email:'',
                password:'',
                remember: false
            })
        }
    },
    methods: {
        submit(){
           
            this.form.transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            // this.loginForm.remember==true ? this.loginForm.remember="on" : this.loginForm.remember=""
            // this.$inertia.post(this.route('login'), this.loginForm)
        },
        reset(){
            this.form.reset()
            this.form.clearErrors()
            this.$page.props.errors={}
        },
         goto(){
           this.$inertia.visit(this.route('register'))
        }
    },
    metaInfo:{
    title: "Login"
},
    layout:"auth-layout"

}
</script>

<style>

</style>
