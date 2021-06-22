<template>
  <div>
      <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                        <span class="text-white text-lg ml-3"> Ar<span class="font-medium">Tisana</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                      
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Manage all your e-commerce accounts in one place</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <slot></slot>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
      
  </div>
</template>

<script>
export default {
     mounted() {
       
        let myLink = document.createElement('link')
                    myLink.href = "dist/css/app.css"
                    myLink.rel = "stylesheet"
                    myLink.id = "link0"
                    document.head.appendChild(myLink)
   
        let myScript = document.createElement('script')
                myScript.src = "dist/js/app.js"
                myScript.id = "script0"
                document.body.appendChild(myScript) 
      

        document.body.classList.add("login")
      
   },

   destroyed() {

       
      document.getElementById('link0').remove()
      document.getElementById('script0').remove()

        // document.head.children[9].remove()
        // document.body.lastChild.remove()

        //document.getElementsByTagName("body").removeChild(myScript);
        document.body.classList.remove("login")
   },


}
</script>

<style>

</style>
