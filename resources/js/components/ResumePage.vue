<template>
    <div :class="'resume-page column ' + contentClasses + ' p-none full-height'">
        <section class="hero is-medium is-light">
            <div class="hero-body p-t-lg-i p-b-lg-i">
                <h1 class="title ohs-title p-b-md">
                    <span class="contrast">{{ title }}</span>
                </h1>
                <h2 class="subtitle">
                    <i><span>{{ subtitle }}</span></i>
                </h2>
            </div>
        </section>
        <br />
        <div class="columns">
            <timeline class="column is-10"></timeline>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'subtitle'],
        data() {
            return  {
                sidebarIsClosed:false,
                windowWidth: window.innerWidth
            };
        },
        created: function() {
            this.$root.$on('window-resize', (ww) => this.windowWidth = ww);
            this.$root.$on('sidebar-state-change', (ss) => this.sidebarIsClosed = ss);
        },
        computed: {
            contentClasses() {
                if (this.windowWidth < 935) {
                    return 'is-12';
                } else if (this.sidebarIsClosed) {
                    return 'is-115';
                } else {
                    return 'is-95';
                }
            }
        },
        methods: {
        },
    }
</script>

<style lang='scss'>
@import "@/_variables.scss";
.skills-view {
    padding-left: 5%;
}
</style>
