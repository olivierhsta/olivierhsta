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
        margin-top: 1rem;

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

        .timeline-group-title {
            font-size: 160%;
        }

        .timeline-subtitle {
            color:$color6;
            padding: 0 0.5em;
            font-weight: 200;
        }

        .timeline-date, .timeline-group-icon {
            display: inline-block;
            font-weight: 200;
            border-radius: 50%;
            text-align: center;
        }

        .timeline-date {
            height: 3rem;
            width: 3rem;
            padding: 0.6em 0;
            margin-left: -1.4em;
            color:$color9;
            background-color: $body-bg;

            border: 2px solid $color9;
        }

        .timeline-group-icon {
            height: 4.5rem;
            width: 4.5rem;
            padding: 0.4em 0;
            margin-left: -1.15em;
            color: $color0;
            background-color: $color9;
            font-size: 30px;
        }

        .timeline-group {
            width:100%;
            padding-top:3em;
            margin-left: 3rem;

            background-image: linear-gradient($light-gray, 100%, white); // white is a dummy value
            background-size:6px 100%;
            background-position:0 0, 100% 0;
            background-repeat:no-repeat;

            &:first-child {
                padding-top: 0;
            }
            &:last-child {
                background-image: linear-gradient($light-gray, 90%, $body-bg);
            }
        }

        .timeline-item {
            margin-top: 2em;
        }

        .timeline-description {
            padding: 1em;
            margin-left: 1em;
            border:3px solid $color0;
            border-radius: 1em;
            font-weight: 200;
        }
    }
</style>
