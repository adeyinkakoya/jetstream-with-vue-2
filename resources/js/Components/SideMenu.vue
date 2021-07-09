<template>
   <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img class="w-6" src="/dist/images/logo.svg">
                    <span class="hidden xl:block text-white text-lg ml-3"> Ru<span class="font-medium">bick</span> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="#" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard 
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="side-menu__sub-open">
                            <li>
                                <a href="#" class="side-menu side-menu--active">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Edit Profile </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Update Password</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Two Factor Authentication </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Browser Sessions </div>
                                </a>
                            </li>

                            <li>
                                <inertia-link as="button" :href="route('logout')" method="post" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Logout </div>
                                </inertia-link>
                            </li>
                        </ul>
                    </li>

                    <div class="side-nav__devider my-6"></div>
                    <li v-if="canViewAnyUser">
                        <inertia-link :href="route('users.index')" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="avatar"></i> </div>
                            <div class="side-menu__title"> Users </div>
                        </inertia-link>
                    </li>
                    <li>
                      <inertia-link :href="route('posts.index')" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="avatar"></i> </div>
                            <div class="side-menu__title"> Posts </div>
                        </inertia-link>
                    </li>
                    
                  
                    
                </ul>
            </nav>
</template>

<script>
export default {
    computed: {
        canViewAnyUser:function(){
            return this.$page.props.user.permissions.user.viewany;
        }
    },

}
</script>

<style>

</style>
