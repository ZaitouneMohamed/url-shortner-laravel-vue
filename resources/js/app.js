import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';

import home from './components/home.vue';

const app = createApp({});

app.component('home-vue', home);

app.mount('#app');
