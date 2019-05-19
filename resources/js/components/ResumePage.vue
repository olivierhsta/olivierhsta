<template>
    <div class="columns full-page">
        <div id="toggle-sidebar" @click="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
        <div :class="'column ' + contentClasses + ' p-none full-height'">
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
                <timeline class="column is-5"></timeline>
            </div>
        </div>
        <sidebar :class="'column '+sidebarClasses" current="Home" :sidebarIsClosed='sidebarIsClosed'></sidebar>
    </div>
</template>

<script>
    export default {
        props: ['title', 'subtitle'],
        data() {
            return  {
                sidebarIsClosed:false,
                windowWidth: window.innerWidth,
                desktopSidebarState: false
            };
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
            sidebarClasses() {
                let classes = ((this.windowWidth < 935) ? 'is-mobile' : 'is-desktop') + ' ';
                return classes + ((this.sidebarIsClosed) ? 'is-closed' : 'is-opened');
            }
        },
        methods: {
            toggleSidebar() {
                this.sidebarIsClosed = !this.sidebarIsClosed;
            }
        },
        mounted() {
            this.$nextTick(() => {
                window.addEventListener('resize', () => {
                    let oldSize = this.windowWidth;
                    this.windowWidth = window.innerWidth
                    if (oldSize >= 935 && this.windowWidth < 935) {
                        this.desktopSidebarState = this.sidebarIsClosed;
                        this.sidebarIsClosed = true;
                    } else if (oldSize < 935 && this.windowWidth >= 935) {
                        this.sidebarIsClosed = this.desktopSidebarState;
                    }
                });
            })
        },
    }
</script>

<style lang='scss'>
@import "@/_variables.scss";
#toggle-sidebar {
    position: fixed;
    top:0;
    right: 0;
    color:$color0;
    background-color: $color9;
    padding: 0.05em 0.4em;
    margin: 0.5em;
    border-radius: 50%;
    z-index: 1000;
}
</style>
