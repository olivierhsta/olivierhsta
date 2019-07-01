<template>
    <div :class="'resume-page column ' + contentClasses + ' p-none full-height'">
        <section class="hero is-medium is-light">
            <div class="lang-config">
                <a :class="'lang ' + isCurrent('fr')" @click="changeLang('fr')">fr</a>
                |
                <a :class="'lang ' + isCurrent('en')" @click="changeLang('en')">en</a>
            </div>
            <div class="hero-body p-t-md-i p-b-lg-i">
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
                windowWidth: window.innerWidth,
                currentLang: "fr"
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
            },
        },
        methods: {
            isCurrent: function(lang) {
                return this.currentLang == lang ? "is-current" : "";
            },
            changeLang: function(lang) {
                this.currentLang = lang;
                this.$root.$emit('lang-change', this.currentLang);
            }
        },
    }
</script>

<style lang='scss'>
@import "@/_variables.scss";
.skills-view {
    padding-left: 5%;
}

.lang-config {
    margin: 0.2rem 0 0 0.5rem;
    color: rgba(#858585, 0.6);
    font-weight: 200;
}

.lang.is-current {
    color: black !important;
    font-weight: 300;
}

.lang:hover {
    color: black !important;
}
</style>
