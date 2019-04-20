<template>
    <div class="card m-lg">
        <header class="card-header">
        <a href="#" class="card-header-title clickable" @click.prevent="displayModal">
            <div v-text="title"></div>
        </a>
        <a href="#" class="card-header-icon" aria-label="more options" @click.prevent="toggle">
          <span class="icon">
            <i id="toggle-icon" class="fa fa-angle-down" aria-hidden="true"></i>
          </span>
        </a>
        </header>
        <div id="card-body">
            <div class="card-content">
                <div class="content">
                    <slot></slot>
                </div>
            </div>
        </div>
        <note-modal v-show="showModal" :title="title">
            <slot></slot>
        </note-modal>
    </div>
</template>

<script>
    export default {
        props: ['title'],
        data() {
            return  {
                showModal: false
            };
        },
        methods: {
            toggle: function (event) {
                document.getElementById('card-body').classList.toggle("hide");
                document.getElementById('toggle-icon').classList.toggle("flip-90");
            },
            displayModal:function(event) {
                this.showModal = true;
            },
            truncate:function(content) {
                return String.prototype.substring(0, 100);
            }
        },
        created() {
            this.$root.$on('modal-close', () => this.showModal = false);
        }
    }
</script>

<style>

.message-header {
    padding-top:0;
    padding-bottom:0;
}

#card-body {
    /* white-space:nowrap; */
    display:block;
    width:100%;
    max-height:20vh;
    overflow:hidden;
    transition: all .5s ease-in-out;
}

.hide {
    max-height:0px !important;
    padding-top:0;
    padding-bottom:0;
}

#toggle-icon {
    white-space:nowrap;
    display:inline-block;
    overflow:hidden;
    transition: all .5s ease-in-out;
}

.flip-90 {
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    transform: rotate(90deg);
}

.clickable {
    color:#3490dc;
}

</style>
