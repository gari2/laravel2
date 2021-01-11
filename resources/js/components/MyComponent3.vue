<template>
  <div>
    <div>
      <p>現在値：{{ current }}</p>
    </div>
    <mycomponent4 step="1" v-on:plus="onplus"></mycomponent4>
    <mycomponent4 step="2" v-on:plus="onplus"></mycomponent4>
    <mycomponent4 step="-1" v-on:plus="onplus"></mycomponent4>
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
    onplus: function (e) {
      this.current += e;
    },
  },
};
</script>