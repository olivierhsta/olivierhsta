<template>
    <div :class="'sidebar column '+classes">
        <div class="sidebar-header m-none">
            <div class="profile-pic-container p-none m-none">
                <figure id="profile-pic" class="image">
                    <img class="is-rounded" src="img/me.jpg">
                </figure>
            </div>
            <div class="name-container">
                <h1><span id="sidebar-name" class="contrast">{{ personnal.name }}</span></h1>
            </div>
        </div>

        <div class="tags p-t-md">
            <a  id="nav-home" :class="getNavItemClass('Home') + ' tag ohs-nav-tag'" href="/" title="Home">
                <i class="fas fa-home"></i>{{ homeName }}
            </a>
            <a id="nav-til" :class="getNavItemClass('TIL') + ' tag ohs-nav-tag'" href="https://clouddev.insum.app/ords/f?p=156:1" @click="confirmQuit($event)" title="Today I Learned">
                <i class="fas fa-bookmark"></i>{{ tilName }}
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
                sidebarIsClosed:false,
                windowWidth: window.innerWidth
            };
        },
        created: function() {
            this.$root.$on('sidebar-state-change', (ss) => this.sidebarIsClosed = ss);
            this.$root.$on('window-resize', (ww) => this.windowWidth = ww);
        },
        computed: {
            homeName() {
                return this.sidebarIsClosed ? '' : 'Home';
            },
            tilName() {
                return this.sidebarIsClosed ? '' : 'TIL';
            },
            classes() {
                let classes = ((this.windowWidth < 935) ? 'is-mobile' : 'is-desktop') + ' ';
                return classes + ((this.sidebarIsClosed) ? 'is-closed' : 'is-opened');
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
            confirmQuit(event) {
                if (!confirm('This link will redirect to a new domain, are you sure you want to continue?')) {
                    event.preventDefault();
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
        padding-right: 2%;
        // background: linear-gradient(to right,$color9,80%,$color7);
        background: linear-gradient(to right,$color7,20%,$color9);

        &::after {
            content: "";
            background: url(/img/blue-mountain.jpg) center;
            opacity: 0.2;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
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

        .sidebar-header {
            display: flex;
            transition: width 0.5s ease;
        }

        .name-container {
            display: block;
            padding: 0.75rem 0 0.75rem 0.75rem;
            flex:none;
            width:66.66667%;
            transition : all 0.6s ease;
            font-size: 130%;
        }

        #profile-pic {
            padding-top: 1.5em;
        }

        &.is-desktop.is-opened {
            flex: none;
            width: 20.8333%;
        }

        &.is-desktop.is-closed {
            flex: none;
            width: 4.1667%;
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

            & .ohs-nav-tag {
                width: 100%;
                margin-right: 0 !important;
                transition: width 1s ease;

                & .fas {
                    margin-right: 0;
                }
            }

            .social-links {
                text-align: center;
                width: 100%;

                & a {
                    margin-right:0;
                }
            }
        }

        &.is-mobile {
            flex:none;
            padding: 0;
            width: 100%;
            z-index: 999;
            transition: 0.4s ease;

            & .sidebar-header {
                display: inline-block;
                width: 100%;

                & .profile-pic-container {
                    margin: auto;
                    width: 8rem;

                    #profile-pic img {
                        width: auto;
                        max-height: 50vh;
                        margin: auto;
                    }
                }

                & .name-container {
                    width: 100%;
                    text-align: center;
                }
            }

            & .tags {
                display: inline-block;
                width: 100%;
                text-align: center;

                & .tag {
                    width: 6rem;
                    height: 2rem;
                }
            }

            & .social-links {
                right: auto;
                width: 100%;
            }

            &.is-opened {
                clip-path: circle(100%);
            }

            &.is-closed {
                top: -48%;
                right: -48%;
                clip-path: circle(0px);
            }
        }
    }

    .social-links {
        position: absolute;
        bottom:0;
        right: 0;
        text-align: center;

        & a {
            margin-bottom: 1vh;
            margin-right: 0.5vw;
        }

        & i {
            color:#000000;
            background-color: $color0;
            padding-top:0.4em;
            width:100%;
            height:100%;
            text-align:center;
            border-radius: 0.3em;
        }
    }

    .tag.ohs-nav-tag {
        text-decoration: none !important;
        color: #0b7285;
        background-color: #e3fafc;
        font-weight: bold;
        margin: 0 0.4rem 0.2rem 0 !important;
        width: 4rem;
        transition: width 0.1s ease;

        &.is-active {
            color:$color0;
            background-color: transparent;
            border: 2px solid $color0;

            &:hover, &:active {
                color:$color9;
                background-color: $color0;
            }
        }
        &:hover, &:active {
            color:$color0;
            background-color: transparent;
            border: 1px solid $color0;
        }

        & .fas {
            margin-right: 0.25em;
        }
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

</style>
