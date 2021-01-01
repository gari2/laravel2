<template>
    <div class="container">
        <p>{{msg}}</p>
        <a v-bind:href='url'>WINGSプロジェクト</a>
        <p>{{ localEmail() }}</p>
        <hr>
        <ul>
            <!-- <li v-for="person in people" :key="person.id"> -->
                 <li v-for="(person,key) in people">
                {{person.id}}: {{person.name}}
                [{{person.mail}}] ({{person.age}})
            </li>
        </ul>
    </div>
</template>

<script>
const axios = require('axios');
export default {
    mounted () {
        axios.get('/hello/json')
        .then(response =>{
            this.people = response.data;
            this.msg = 'get data!';
        });
    },
    data:function() {
        return {
            msg:'wait...',
            name:'',
            url: 'https://wings.msn.to/',
            email:'Y-Suzuki@ezample.com',
            flag: true,
            people:[],
        };
    },
    methods:{
        doAction:function(){
            this.msg = 'Hello, ' + this.name + '!!';
        },
        localEmail: function () {
            return this.email.split('@')[0].toLowerCase();
        }
    },
}
</script>