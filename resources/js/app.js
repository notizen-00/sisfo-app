import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import store from '@/store/store.js';
import storeModel from '@/store/storeModel.js';
import Popper from "vue3-popper";
import { formatRupiah } from '@/Service/Helper.js'; 
import '@/app.css';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {

        const VueApp = createApp({ render: () => h(App, props) });

       
    VueApp.config.warnHandler = (msg, vm, trace) => {
        if (msg.startsWith('Methods property "route" is already defined in Props')) {
            // Do nothing or log the message if you want
            return;
        }
        console.warn(msg, vm, trace);
    };

        VueApp.use(plugin)
        .use(ZiggyVue)
        .use(store,'store')
        .use(storeModel,'storeModel')
        .use(formatRupiah)
        .component("Popper",Popper)
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

