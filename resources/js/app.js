import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import { defineStore } from 'pinia'


import home from './components/home.vue';

const app = createApp({});
const pinia = createPinia({});

app.component('home-vue', home);

app.use(pinia);
app.mount('#app');
