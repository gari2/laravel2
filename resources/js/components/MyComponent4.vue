<template>
<button type="button" v-on:click="onclick">{{ step }}</button>
</template>
<script>
export default {
 data: function () {
    return {
        current: 0,
    }
 },

    props: ['step'],
    methods: {
        onclick:function() {
            this.$emit('plus', Number(this.step));
        }
    }
};
</script>