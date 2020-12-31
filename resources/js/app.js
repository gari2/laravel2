require('./bootstrap');
import Vue from 'vue'
//Main pages
import App from './components/ExampleComponent.vue'


const app = new Vue({
    el: '#app',
    components: { App }
});

import App2 from './components/MyComponent.vue'

const app2 = new Vue({
    el: '#app2',
    components: { App2 }
});