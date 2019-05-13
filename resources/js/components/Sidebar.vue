<template>
    <div :class="'sidebar ' + sidebarHiddenClass">
        <div id="toggle-sidebar" @click="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
        <div class="f-box m-none">
            <div class="profile-pic-container p-none m-none">
                <figure id="profile-pic" class="image">
                    <img class="is-rounded" src="img/me.jpg">
                </figure>
            </div>
            <div class="name-container">
                <h1><span id="sidebar-name" class="contrast">{{ name }}</span></h1>
            </div>
        </div>

        <div class="tags p-t-md">
            <a  :class="getNavItemClass('Home') + ' tag ohs-nav-tag'" href="/">
                Home
            </a>
            <a :class="getNavItemClass('TIL') + ' tag ohs-nav-tag'" href="/til">
                TIL
            </a>
        </div>

        <div class="social-links">
            <a v-for="social in socials"
               class="icon is-medium"
               target="_blank" :href="social.url"
               :title="social.title"
            >
                <i :class="`${social.fontawesome} fa-lg`"></i>
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
                selectedtag:"Home",
                sidebarHiddenClass:''
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
            },
            toggleSidebar() {
                this.$root.$emit('sidebar-toggle');
                if (this.sidebarHiddenClass == '') {
                    this.sidebarHiddenClass = 'is-closed';
                } else {
                    this.sidebarHiddenClass = '';
                }
            }
        }
    }
</script>

<style lang="scss">
    @import "@/_variables.scss";
    .sidebar {
        position: fixed;
        width:100%;
        height: 100vh;
        top: 0;
        right:0;
        padding-top: 2em;
        padding-left: 3%;
        background-color: $color9;
        transition: all 0.5s ease;

        &.is-closed {
            padding-left: 0.25em;
            padding-right: 0.25em;
            text-align: center;

            #sidebar-name {
                display: none;
            }

            .profile-pic-container {
                width:100%;
            }

            .name-container {
                width: 0;
            }

            .tags .tag:not(:last-child) {
                margin-right: 0rem;
            }

            .social-links {
                text-align: center;

                & a {
                    margin-right:0;
                }
            }
        }

        & h1 {
            font-size: 1.5vw;
        }



        & span {
            color: $color9;
            background: $color0;
            line-height: 1.3em;
        }

        .profile-pic-container {
            display: block;
            flex:none;
            padding: 0;
            width:33.3333%;
            transition : all 0.6s ease;
        }

        .name-container {
            display: block;
            padding: 0.75rem;
            flex:none;
            width:66.66667%;
            transition : all 0.6s ease;
        }

        #profile-pic {
            padding-top: 1.5em;
        }

        #toggle-sidebar {
            position: absolute;
            top:0;
            right: 0;
            color:$color0;
            background-color: $color9;
            padding: 0.15em 0.5em;
            border-radius: 50%;
            font-size: large;
        }
    }

    .social-links {
        position: absolute;
        bottom:0;
        right: 0;

        & a {
            margin-bottom: 1vh;
            margin-right: 0.5vw;
        }

        & i {
            color:#000000;
            background-color: $color0;
            padding-top:25%;
            width:100%;
            height:100%;
            text-align:center;
            border-radius: 0.3em;
        }

        // & .fa-lg {
        //     font-size: 1.3333333333vw;
        //     line-height: 1.1vw;
        //     vertical-align: -0.0667em;
        // }
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
        display : inline-block;
        text-decoration:none !important;
        color:$color9 !important;
        background-color: $color0 !important;
        font-weight: bold;
        margin: 0;
        width: 4.1667vw;
        font-size: 0.8vw !important;

        &:hover {
            color:$color6 !important;
        }
        &.is-active {
            text-decoration: underline !important;
        }
    }

</style>
