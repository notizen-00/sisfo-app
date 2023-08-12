import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import InertiaMixin from '@/Service/InertiaMixin';
import store from '@/store/store.js';
import '@/app.css';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {

        const VueApp = createApp({ render: () => h(App, props) });

       
        VueApp.use(plugin)
        .use(ZiggyVue)
        .use(store)
        .mixin(InertiaMixin)
        .mount(el);


        // return createApp({ render: () => h(App, props) })
        //     .use(plugin)
        //     .use(ZiggyVue)
        //     .use(store)
        //     .mount(el)
            
    },
    progress: {
        color: '#4B5563',
    },
});

