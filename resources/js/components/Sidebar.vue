<template>
    <div id="sidebar" class="full-height p-t-lg p-l-xl p-r-xl bg-dark">
        <div class="columns m-none">
            <div class="column is-4 p-none m-none">
                <figure id="profile-pic" class="image">
                    <img class="is-rounded" src="img/me.jpg">
                </figure>
            </div>
            <div class="column is-8 m-l-md">
                <h1 class="is-vcentered"><span id="sidebar-name">{{ name }}</span></h1>
            </div>
        </div>

        <div class="social-links">
            <a v-for="social in socials"
               class="icon is-medium m-r-sm"
               target="_blank" :href="social.url"
               :title="social.title"
            >
                <i :class="`${social.fontawesome} fa-lg`"></i>
            </a>
        </div>

        <div class="tags p-t-md">
            <a  :class="getNavItemClass('Home')" class="tag ohs-nav-tag" href="/">
                Home
            </a>
            <a class="tag ohs-nav-tag" href="/til">
                TIL
            </a>
        </div>
    </div>
</template>

<script>
    import personnalData from "../../data/personnal.json";
    import socialData from "../../data/social.json";

    export default {
        props: ['current'],
        data() {
            return  {
                socials: socialData,
                personnal: personnalData,
                selectedtag:"Home"
            };
        },
        computed: {
            name() {
                return this.personnal.name.toLowerCase();
            }
        },
        methods:{
            getNavItemClass(navItem){
                if (navItem.toLowerCase() == this.current.toLowerCase()) {
                    return 'is-active';
                } else {
                    return '';
                }
            }
        }
    }
</script>

<style lang="scss">
    @import "@/_variables.scss";

    h1 {
        font-size:1.3em;
    }

    .social-links i {
        color:#000000;
        background-color: $color0;
        padding: 0.35em 0.2em 0.35em 0.2em;
        width:100%;
        text-align:center;
        border-radius: 0.3em;
    }

    .fa-github:hover {
        color:#9600bd;
    }

    .fa-twitter:hover {
        color: #1da1f2;
    }

    .fa-linkedin-in:hover {
        color:#0077B5;
    }

    .fa-at:hover {
        color:#8a90c7;
    }

    .fa-stack-overflow:hover {
        color:#f48024;
    }

    .ohs-nav-tag {
        text-decoration:none !important;
        color:$color9 !important;
        background-color: $color0 !important;
        font-weight: bold;
    }

    .ohs-nav-tag:hover {
        color:$color6 !important;
    }

    .is-active {
        text-decoration: underline !important;
    }

    #sidebar {
        position: fixed;
        right:0;
    }

    #sidebar span {
        color: $color9;
        background: $color0;
        line-height: 1.3em;
    }

    #profile-pic {
        padding-top: 1.5em;
    }
</style>
