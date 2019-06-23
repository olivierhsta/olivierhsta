<template>
    <div class="timeline-item">
        <div class="timeline-header">
            <div class="timeline-date">
                <i :class="this.item.icon + ' fa-lg'"></i>
            </div>
            <h1 class="timeline-title">{{ this.item.title }}</h1>
        </div>
        <div class="timeline-description">
            <div v-for="skill in this.item.skills">
                <skill-icon
                    :title="skill.name"
                    :name="skill.name"
                    :skillLevel="skill.level"
                    :color="skill.color"
                    :icon="skill.icon">
                    <!-- {{skill.name}} -->
                </skill-icon>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['item'],
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

<style lang="scss">
.timeline-item {
    .timeline-description {
        display: flex;
        flex-flow: wrap;
    }

    .skill-icon {
        margin-top: 1rem;
    }
}

</style>
