<template>
    <div class="timeline">
        <div class="timeline-group" v-for="group in events">
            <div class="timeline-group-header">
                <div class="timeline-group-icon">
                    <i :class="group.icon.fontawesome"></i>
                </div>
                <h1 class="timeline-group-title">{{ group.title }}</h1>
            </div>
            <div class="timeline-item" v-for="event in group.events">
                <div class="timeline-header">
                    <div class="timeline-date">{{ event.startdate.year }}</div>
                    <h1 class="timeline-title">{{event.title}}</h1>
                </div>
                <fieldset class="timeline-description">
                    <legend class="timeline-subtitle">{{event.subtitle}}</legend>
                    {{event.description}}
                </fieldset>
            </div>
        </div>
    </div>
</template>

<script>
    import eventsData from "../../data/events.json";
    export default {
        // props: ['props'],
        data() {
            return  {
                events:eventsData
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

<style lang="scss">
    @import "@/_variables.scss";

    .timeline {
        margin-left: 1em;
        height: 100%;

        &:before {
            position: fixed;
            left: 3.8em;
            top: 0;
            content: ' ';
            display: block;
            width: 6px;
            height: 100%;
            background: $light-gray;
            z-index: -5;
        }

        .timeline-header, .timeline-group-header {
            display:flex;
        }

        .timeline-title, .timeline-subtitle, .timeline-group-title {
            display: flex;
            align-items: center; /* Vertical center alignment */
            color:$color6;
            font-weight: bold;
            margin-left: 0.5em;
        }

        .timeline-subtitle {
            color:$color6;
            padding: 0 0.5em;
            font-weight: 200;
        }

        .timeline-date, .timeline-group-icon {
            display: inline-block;
            border: 2px solid $color9;
            margin-left: -2.6em;
            background-color: $body-bg;
            color:$color9;
            font-weight: 200;
            padding: 0.6em 0.3em 0.6em 0.3em;
            border-radius: 50%;
        }

        .timeline-date {
            height: 3em;
        }

        .timeline-group-icon {
            color: $color0;
            background-color: $color9;
            font-size: 30px;
            margin-left: -1.7em;
            padding: 0.3em 0.6em 0.3em 0.6em;
        }

        .timeline-group {
            position: relative;
            left: 4em;
            width:100%;
            margin-top:3em;
        }

        .timeline-item {
            margin-top: 2em;
        }

        .timeline-description {
            padding: 1em;
            border:3px solid $color0;
            border-radius: 1em;
            font-weight: 200;
        }
    }
</style>
