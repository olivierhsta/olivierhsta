<template>
    <section class="hero is-medium is-light">
        <div class="lang-config">
            <span v-for="(lang, index) in langs">
                <a :class="'lang ' + isCurrent(lang)" @click="changeLang(lang)">
                    {{lang}}
                </a>
                <span v-if="nextLangIsNotNull(index)">|</span>
            </span>
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
</template>

<script>
    import eventsData from "../../data/events.json";
    import skillsData from "../../data/skills.json";
    export default {
        props: ['langs', 'title', 'subtitle'],
        data() {
            return  {
                currentLang: "fr"
            };
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
