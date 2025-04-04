import "./bootstrap";
import "../css/app.css";
import "quill/dist/quill.snow.css";
import "@splidejs/vue-splide/css";
import VueSplide from "@splidejs/vue-splide";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

import "sweetalert2/dist/sweetalert2.min.css";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueSplide)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
