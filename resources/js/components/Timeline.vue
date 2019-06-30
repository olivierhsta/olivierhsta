<template>
    <div class="timeline">
        <div class="timeline-group" :style="'--number-rows:'+countEvents(group)+';'" v-for="group in events">
            <div class="timeline-group-header">
                <div class="timeline-group-icon">
                    <i :class="group.icon.fontawesome"></i>
                </div>
                <h1 class="timeline-group-title">{{ group.title }}</h1>
            </div>
            <div class="timeline-element" :style="'--row-num:'+getRowNum(index)+';'" v-for="(event,index) in group.events">
                <timeline-event :event="event"></timeline-event>
            </div>
        </div>
        <div class="timeline-group">
            <div class="timeline-group-header">
                <div class="timeline-group-header">
                    <div class="timeline-group-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h1 class="timeline-group-title">My skills</h1>
                </div>
            </div>
            <div class="timeline-element" :style="'--row-num:'+getRowNum(index)+';'" v-for="(skillGroup, index) in skills">
                <timeline-item :item="skillGroup"></timeline-item>
            </div>
        </div>
    </div>
</template>

<script>
    import eventsData from "../../data/events.json";
    import skillsData from "../../data/skills.json";
    export default {
        data() {
            return  {
                events:eventsData,
                skills:skillsData,
                showElementAt: window.innerHeight - window.innerHeight/7
            };
        },
        methods: {
            showTimelineElements : function() {
                Array.from(document.getElementsByClassName("timeline-element")).forEach( (el) => {
                    console.log(el);
                    if (el.getBoundingClientRect().top < this.showElementAt) {
                        el.classList.add('fade-in-from-down');
                    }
                });
            },
            countEvents : (group) => {
                let i = 0;
                for (let event in group.events) {
                    i++;
                }
                return i;
            },
            getRowNum : (index) => {
                return index + 2;
            },
            isEven : (num) => {
                return num % 2 === 0;
            }
        },
        created: function() {
            window.addEventListener('load', this.showTimelineElements);
            window.addEventListener('scroll', this.showTimelineElements);
        },
        beforeDestroy: function () {
            window.removeEventListener('scroll', this.showTimelineElements);
        }
    }
</script>

<style lang="scss">
    @import "@/_variables.scss";

    .timeline {
        margin-left: 1em;
        margin-top: 1rem;

        .timeline-group-header {
            display:flex;
        }

        .timeline-group {
            padding-top:3em;
            margin-left: 3rem;

            background-image: linear-gradient($light-gray, 100%, white); // white is a dummy value
            background-size:6px 100%;
            background-repeat:no-repeat;

            &:first-child {
                padding-top: 0;
            }
            &:last-child {
                background-image: linear-gradient($light-gray, 90%, $body-bg);
                padding-bottom: 5rem;
            }

            .timeline-group-icon {
                height: 4.5rem;
                width: 4.5rem;
                padding: 0.45em 0.7em;
                color: $color0;
                background-color: $color9;
                font-size: 30px;
            }
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
            text-align: center;
        }

        .timeline-group-icon {
            border-radius: 50%;
        }

        .timeline-date {
            height: 3rem;
            width: 3rem;
            padding: 0.7em 0;
            color:$color9;
            background-color: $body-bg;
            border-radius: 50% 50% 0 50%;
            border: 2px solid $color9;
        }

        .timeline-element {
            margin-top: 1rem;
            opacity: 0;
            padding-top: 10%;
        }

        .timeline-description {
            padding: 1em;
            margin-left: 2rem;
            border:3px solid $color0;
            border-radius: 0 1em 1em 1em;
            font-weight: 200;
            width: max-content;
            max-width: 90%;
        }
    }

    .timeline-group {
        display: grid;
        grid-template-columns: 50% 50%;
        grid-template-rows: 5.5rem repeat(var(--number-rows), max-content);
    }

    .timeline-header {
        display: grid;
        grid-template-columns: 3rem auto 3rem;
        grid-template-rows: 100%;
    }

    .fas.fa-code {
        margin-left: -0.2rem;
    }

    @media (min-width:$tablet) {

        .timeline-date {
            margin-left: -1.52em;
        }

        .timeline-group-icon {
            margin-left: -1.22em;
        }

        .timeline-group {
            background-position: 50%;

            .timeline-group-header {
                grid-column-start: 2;
                grid-column-end: 2;
                grid-row-start: 1;
                grid-row-end: span 1;
                margin: 0 0 1rem 0;
            }

            .timeline-element:nth-child(even) {
                grid-column-start: 2;
                grid-column-end: 2;
                grid-row-start: var(--row-num);
                grid-row-end: span 1;

                .timeline-header {
                    .timeline-date {
                        grid-column-start: 1;
                        grid-column-end: span 1;
                        grid-row-start: 1;
                        grid-row-end: span 1;
                        transition: margin 0.5s ease;
                    }

                    .timeline-title {
                        grid-column-start: 2;
                        grid-column-end: span 1;
                        grid-row-start: 1;
                        grid-row-end: span 1;
                    }
                }
            }

            .timeline-element:nth-child(odd) {
                grid-column-start: 1;
                grid-column-end: 2;
                grid-row-start: var(--row-num);
                grid-row-end: span 1;

                .timeline-header {

                    .timeline-date {
                        grid-column-start: 3;
                        grid-column-end: span 1;
                        grid-row-start: 1;
                        grid-row-end: span 1;
                        margin-left: 1.38rem;
                        transition: margin 0.5s ease;
                        border-radius: 50% 50% 50% 0;
                    }

                    .timeline-title {
                        grid-column-start: 2;
                        grid-column-end: span 1;
                        grid-row-start: 1;
                        grid-row-end: span 1;
                        justify-self: end;
                        text-align: right;
                    }
                }

                .timeline-description {
                    margin-left: 0;
                    margin-right: 2rem;
                    margin-left: auto;
                    text-align: right;
                    border-radius: 1em 0 1em 1em;

                    .timeline-subtitle {
                        margin: 0 0 0 auto;
                    }
                }

                .timeline-item .timeline-description {
                    justify-content: flex-end;
                }
            }
        }
    }

    @media (max-width:$tablet) {

        .timeline-date {
            margin-left: -1.3em;
        }

        .timeline-group-icon {
            margin-left:-1.12em;
        }

        .timeline-group {
            background-position: 0;
            margin-right: 10%;

            .timeline-group-header {
                grid-column-start: 1;
                grid-column-end: span 1;
                grid-row-start: 1;
                grid-row-end: span 1;
                margin: 0 0 1rem 0;
            }

            .timeline-element {
                grid-column-start: 1;
                grid-column-end: span 2;
                grid-row-start: var(--row-num);
                grid-row-end: span 1;

                .timeline-header {
                    .timeline-date {
                        grid-column-start: 1;
                        grid-column-end: span 1;
                        grid-row-start: 1;
                        grid-row-end: span 1;
                        transition: margin 0.5s ease;
                    }

                    .timeline-title {
                        grid-column-start: 2;
                        grid-column-end: span 1;
                        grid-row-start: 1;
                        grid-row-end: span 1;
                    }
                }
            }
        }
    }
</style>
