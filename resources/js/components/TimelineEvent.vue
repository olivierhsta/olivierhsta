<template>
    <div class="timeline-event">
        <div class="timeline-header">
            <div class="timeline-date">{{ this.event.startdate.year }}</div>
            <h1 class="timeline-title">{{ this.event.title}}</h1>
        </div>
        <fieldset class="timeline-description">
            <legend class="timeline-subtitle">{{ this.event.subtitle}}</legend>
            {{this.event.description}}
        </fieldset>
    </div>
</template>

<script>
    export default {
        props: ['event'],
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
