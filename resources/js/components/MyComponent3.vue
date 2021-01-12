<template>
  <div>
    <div>
      <p>現在値：{{ current }}</p>
    </div>
    <mycomponent4 step="1" v-on:click.native="onclick"></mycomponent4>
    <mycomponent4 step="2" v-on:click.native="onclick"></mycomponent4>
    <mycomponent4 step="-1" v-on:click.native="onclick"></mycomponent4>
  </div>
</template>

<script>
import mycomponent4 from './MyComponent4.vue';
export default {
components: {mycomponent4},
 data: function () {
    return {
        current: 0,
    }
 },
  methods: {
    onclick: function (e) {
      this.current += Number(e.target.childNodes[0].nodeValue);
      console.log(e);
       //console.log(a);
      console.log(Number(e.target.childNodes[0].nodeValue));
    },
  },
};
</script>