<template>
  <div class="mobile-menu md:hidden">
                <div class="mobile-menu-bar">
                    <a href="" class="flex mr-auto">
                        <img class="w-6" src="/dist/images/logo.svg">
                    </a>
                    <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
                </div>
                <ul class="border-t border-theme-29 py-5 hidden">
                    <li>
                        <a href="javascript:;.html" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="home"></i> </div>
                            <div class="menu__title"> Dashboard <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="menu__sub-open">
                            <li>
                                <a href="index.html" class="menu menu--active">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Edit Profile</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-dashboard-overview-2.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Update Password </div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Two factor Authentication </div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Brower Sessions</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                   <li class="menu__devider my-6"></li>
                    <li>
                        <a href="side-menu-light-inbox.html" class="menu">
                            <div class="menu__icon"> <i data-feather="avatar"></i> </div>
                            <div class="menu__title"> Users </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-inbox.html" class="menu">
                            <div class="menu__icon"> <i data-feather="book"></i> </div>
                            <div class="menu__title"> Posts </div>
                        </a>
                    </li>
                </ul>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
