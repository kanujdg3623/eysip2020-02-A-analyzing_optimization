window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component(
    "analytics",
    require("./components/AnalyticsComponent.vue").default
);
Vue.component("youtube", require("./components/YoutubeComponent.vue").default);
Vue.component("edit", require("./components/EditYoutubeComponent.vue").default);
Vue.component(
    "initiatives",
    require("./components/InitiativesComponent.vue").default
);
Vue.component(
    "coursevideos",
    require("./components/CourseVideoComponent.vue").default
);

/*
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
