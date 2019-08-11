
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('resume-page', require('./components/ResumePage.vue').default);
Vue.component('sidebar', require('./components/Sidebar.vue').default);
Vue.component('timeline', require('./components/Timeline.vue').default);
Vue.component('timeline-event', require('./components/TimelineEvent.vue').default);
Vue.component('timeline-item', require('./components/TimelineItem.vue').default);
Vue.component('minimal-card', require('./components/MinimalCard.vue').default);
Vue.component('skill-icon', require('./components/SkillIcon.vue').default);
Vue.component('sidebar-toggle', require('./components/SidebarToggle.vue').default);
Vue.component('header-hero', require('./components/HeaderHero.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
