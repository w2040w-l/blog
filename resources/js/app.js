/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import axios from 'axios';
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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('appvote-button', require('./components/AppvoteButton.vue').default);
Vue.component('watch-button', require('./components/WatchButton.vue').default);
Vue.component('watch-show', require('./components/WatchShow.vue').default);
Vue.component('follow-button', require('./components/FollowButton.vue').default);
Vue.component('popup', require('./components/Popup.vue').default);
Vue.component('follow-show', require('./components/FollowShow.vue').default);
Vue.component('following-show', require('./components/FollowingShow.vue').default);
Vue.component('add-question', require('./components/AddQuestion.vue').default);
Vue.component('edit-question', require('./components/EditQuestion.vue').default);
Vue.component('add-tag', require('./components/AddTag.vue').default);
Vue.component('edit-tag', require('./components/EditTag.vue').default);
Vue.component('add-answer', require('./components/AddAnswer.vue').default);
Vue.component('comments', require('./components/Comments.vue').default);
Vue.component('comments-button', require('./components/CommentsButton.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
