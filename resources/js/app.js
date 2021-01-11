require('./bootstrap');
import Vue from 'vue'
//Main pages
import App from './components/ExampleComponent.vue'


const app = new Vue({
    el: '#app',
    components: { App }
});

import App2 from './components/MyComponent.vue'
// Vue.config.delimiters = ['(%', '%)'];
const app2 = new Vue({
    el: '#app2',
    components: { App2 },
});
// setTimeout(function(){
//     app2.$destroy();
//     }, 3000);
import App3 from './components/MyComponent3.vue'
const app3 = new Vue({
    el: '#app3',
    components: {
         App3
    },
});