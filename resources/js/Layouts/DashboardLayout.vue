<template>
<div>
        <!-- Start: Mobile Menu -->
            <MobileMenu/>
        <!-- END: Mobile Menu -->


        <div class="flex">
            <!-- BEGIN: Side Menu -->
           <SideMenu/>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                   <Breadcrumbs/>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <Search/>
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    <Notifications/>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Profile Menu -->
                    <ProfileMenu/>
                    <!-- END: Profile Menu -->
                </div>
                <!-- END: Top Bar -->
                 <!-- Start: Welcome Message -->
               <div v-if="$page.props.user !== null" class="intro-y flex items-center h-10">
                                    
                                    <a href="" class="ml-auto flex items-center text-theme-1 dark:text-theme-10"> <i data-feather="user" class="w-4 h-4 mr-3"></i>{{user_name}} </a>
                </div>
                 <!-- END: Welcome Message-->
                    <slot></slot>
                
            </div>
            <!-- END: Content -->
        </div>

        <!-- BEGIN: Dark Mode Switcher-->
       
</div>
</template>

<script>
import MobileMenu from '@/Components/MobileMenu'
import SideMenu from '@/Components/SideMenu'
import Breadcrumbs from '@/Components/Breadcrumbs'
import Search from '@/Components/Search'
import Notifications from '@/Components/Notifications'
import ProfileMenu from '@/Components/ProfileMenu'


export default {
    components:{
        MobileMenu, SideMenu , Breadcrumbs , Search , Notifications , ProfileMenu
    },
    computed: {
        user_name(){
            return this.$page.props.user.gender +' '+ this.$page.props.user.first_name
        }
    },
    mounted() {
         let myLink = document.createElement('link')
                    myLink.href = "/dist/css/app.css"
                    myLink.rel = "stylesheet"
                    myLink.id = "link0"
                    document.head.appendChild(myLink)

        let linkLogo = document.createElement('link')
                    linkLogo.href = "/dist/images/logo.svg"
                    linkLogo.rel = "shortcut icon"
                    linkLogo.id = "link1"
                    document.head.appendChild(linkLogo)
   
        let myScript = document.createElement('script')
                myScript.src = "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"
                myScript.id = "script0"
                document.body.appendChild(myScript) 
      
      let myScript2 = document.createElement('script')
                myScript2.src = "https://maps.googleapis.com/maps/api/js?key=[your-google-map-api]&libraries=places"
                myScript2.id = "script1"
                document.body.appendChild(myScript2) 
                
        let myScript3 = document.createElement('script')
                myScript3.src = "/dist/js/app.js"
                myScript3.id = "script2"
                document.body.appendChild(myScript3) 

        document.body.classList.add("main")
        //document.html.classList.add("light")
    },
    destroyed() {
        document.getElementById('link0').remove()
         document.getElementById('link1').remove()
        document.getElementById('script0').remove()
        document.getElementById('script1').remove()
        document.getElementById('script2').remove()

        document.body.classList.remove("main")
        //document.html.classList.remove("light")
    },

}
</script>

<style>

</style>
