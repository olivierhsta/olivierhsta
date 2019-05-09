<template>
    <div>
        <h3 v-text="eventName"></h3>
        <h5 v-text="eventPlace"></h5>
        <p v-text="eventDescription"></p>
    </div>
</template>

<script>
    export default {
        props: ['eventName, eventPlace, eventDescription'],
        data() {
            return  {
                // data
            };
        },
        methods: {
            /*
            method: function (event) {
                // content
            },
            */
        }
    }
</script>

<style>
 /* css styling */
</style>
