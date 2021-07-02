<template>
   <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                            <div>
                                <Flash/>
                             </div>
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign Up
                        </h2>
                        <JetValidationErrors/>

                        <div class="intro-x mt-2 text-gray-500 dark:text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                                <select class=" intro-x form-select form-select-lg sm:mt-2 sm:mr-2 py-3 px-4 mb-2" aria-label=".form-select-lg example" v-model="form.gender"> <option>Mr</option> <option>Miss</option> <option>Mrs</option> </select>

                             <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="First Name" name="fname" v-model="form.fname">

                            <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Last Name" name="lname" v-model="form.lname">
                          
                            <input type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Email" name="email" v-model="form.email">

                            <input type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password" name="password" v-model="form.password">

                            <input type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password Confirmation" name="password_confirmation" v-model="form.password_confirmation">
                        </div>
                        <div class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2" v-model="form.terms">
                            <label class="cursor-pointer select-none" for="remember-me">I agree to the</label>
                            <a class="text-theme-1 dark:text-theme-10 ml-1" href="">Terms and Privacy Policy</a>. 
                        </div>
                         <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" @click.prevent="submit" > 
                                <div v-if="form.processing">Loading</div>
                                <div v-else>Register</div>
                            </button>
                            <button class="btn btn-danger py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" @click="reset">Reset</button>
                            <button class="btn btn-secondary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" @click.prevent="goto">Sign In</button>
                        </div>
                    </div>
                </div>
</template>

<script>
import Flash from '@/Components/Flash'
import JetValidationErrors from '@/Jetstream/ValidationErrors'

export default {
    components:{
        Flash,JetValidationErrors
    },
    metaInfo:{
        title:"Register"
    },
    layout:"auth-layout",
    data() {
        return {
            form:this.$inertia.form({
                fname:"",
                lname:"",
                gender:"Mr",
                email:"",
                password:"",
                password_confirmation:"",
                terms:false
            })
            
        }
    },

methods: {
        submit(){
            this.form.post(this.route('register'),{
                onFinish:()=>{
                    this.form.reset('password','password_confirmation')
                }
            })
           
           
        },
        reset(){
            this.form.reset()
            this.form.clearErrors()
        },
         goto(){
           this.$inertia.visit(this.route('login'))
        }
    }
}
</script>

<style>

</style>
