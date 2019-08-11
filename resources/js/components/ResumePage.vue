<template>
    <div :class="'resume-page column ' + contentClasses + ' p-none full-height'">
        <header-hero :langs="langs" :title="personnal.name" :subtitle="personnal.job"></header-hero>
        <br />
        <div class="columns">
            <timeline class="column is-10" :eventsData="events" :skillsData="skills"></timeline>
        </div>
    </div>
</template>

<script>
    import eventsData from "../../data/events.json";
    import skillsData from "../../data/skills.json";
    import personnalData from "../../data/personnal.json";
    export default {
        data() {
            return  {
                events: eventsData,
                skills: skillsData,
                personnal: personnalData,
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
            contentClasses: function() {
                if (this.windowWidth < 935) {
                    return 'is-12';
                } else if (this.sidebarIsClosed) {
                    return 'is-115';
                } else {
                    return 'is-95';
                }
            },
            langs: function() {
                let langs = [];
                for (let lang in this.events) {
                    langs.push(lang);
                }
                return langs;
            }
        },
        methods: {
            isCurrent: function(lang) {
                return this.currentLang == lang ? "is-current" : "";
            },
            changeLang: function(lang) {
                if (this.langs.includes(lang)) {
                    this.currentLang = lang;
                    this.$root.$emit('lang-change', this.currentLang);
                }
            },
            nextLangIsNotNull: function(index) {
                return this.langs[index+1] !== undefined;
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
