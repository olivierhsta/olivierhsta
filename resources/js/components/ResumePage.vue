<template>
    <div class="columns full-page">
        <div :class="'column is-' + contentNbCols + ' p-none full-height'">
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
        <sidebar :class="'column is-'+sidebarNbCols+' p-none m-none'" current="Home"></sidebar>
    </div>
</template>

<script>
    export default {
        props: ['title', 'subtitle'],
        data() {
            return  {
                sidebarIsClosed:false
            };
        },
        computed: {
            contentNbCols() {
                if (this.sidebarIsClosed) {
                    return '115';
                } else {
                    return '95';
                }
            },
            sidebarNbCols() {
                if (this.sidebarIsClosed) {
                    return '05';
                } else {
                    return '25';
                }
            }
        },
        methods: {
            /*
            method: function (event) {
                // content
            },
            */
        },
        created() {
            this.$root.$on('sidebar-toggle', () => {
                this.sidebarIsClosed = !this.sidebarIsClosed;
            });
        }
    }
</script>

<style>
 /* css styling */
</style>
