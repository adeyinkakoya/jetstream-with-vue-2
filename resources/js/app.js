require('./bootstrap');

// Import modules...
import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import Meta from 'vue-meta';
import Fragment from 'vue-fragment'
import NProgress from 'nprogress'
import { Inertia } from '@inertiajs/inertia'

let timeout = null

Inertia.on('start', () => {
    timeout = setTimeout(() => NProgress.start(), 250)
})

Inertia.on('progress', (event) => {
    if (NProgress.isStarted() && event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage / 100) * 0.9)
    }
})

Inertia.on('finish', (event) => {
    clearTimeout(timeout)
    if (!NProgress.isStarted()) {
        return
    } else if (event.detail.visit.completed) {
        NProgress.done()
    } else if (event.detail.visit.interrupted) {
        NProgress.set(0)
    } else if (event.detail.visit.cancelled) {
        NProgress.done()
        NProgress.remove()
    }
})


// Layout files
import AuthLayout from '@/Layouts/AuthLayout.vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'


// Make it Global
Vue.component('auth-layout', AuthLayout);
Vue.component('dashboard-layout', DashboardLayout);




Vue.mixin({ methods: { route } });
Vue.use(Fragment.Plugin)
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(Meta, {
    refreshOnceOnNavigation: true
});


const app = document.getElementById('app');

new Vue({
    metaInfo: {
        titleTemplate: '%s Jetstream Vue 2'
            // titleTemplate: title => title ? `${title} - Jetstream Vue 2` : "Jetstream Vue 2"

    },
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);