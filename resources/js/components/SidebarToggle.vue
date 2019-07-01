<template>
    <div id="toggle-sidebar" @click="toggle()">
        <i class="fas fa-bars"></i>
    </div>
</template>

<script>
    export default {
        data() {
            return  {
                sidebarIsClosed:false,
                windowWidth: window.innerWidth,
                desktopSidebarState: false // to remember the state on resize
            };
        },
        created: function() {
            if (this.windowWidth < 935) {
                this.sidebarIsClosed = true;
            }
            this.emitState();
        },
        computed: {

        },
        methods: {
            emitState() {
                this.$root.$emit('sidebar-state-change', this.sidebarIsClosed);
            },
            emitResize() {
                this.$root.$emit('window-resize', this.windowWidth);
            },
            toggle() {
                this.sidebarIsClosed = !this.sidebarIsClosed;
                this.emitState();
            },
        },

        mounted() {
            this.$nextTick(() => {
                window.addEventListener('resize', () => {
                    let oldSize = this.windowWidth;
                    this.windowWidth = window.innerWidth
                    if (oldSize >= 935 && this.windowWidth < 935) {
                        this.desktopSidebarState = this.sidebarIsClosed;
                        this.sidebarIsClosed = true;
                        this.emitState();
                        this.emitResize();
                    } else if (oldSize < 935 && this.windowWidth >= 935) {
                        this.sidebarIsClosed = this.desktopSidebarState;
                        this.emitState();
                        this.emitResize();
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
