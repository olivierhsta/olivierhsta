<template>
    <div class="modal is-active">
        <div class="modal-background" @click="onCloseButtonPressed"></div>
        <div class="modal-content">
            <div class="tile is-parent is-vertical">
                <article class="tile is-child notification is-white">
                    <p class="title" v-text="title"></p>
                    <slot></slot>
                </article>
            </div>
        </div>
        <button class="modal-close is-large" aria-label="close" @click="onCloseButtonPressed"></button>
    </div>
</template>

<script>
    export default {
        props: ['title'],
        data() {
            return  {

            };
        },
        methods: {
            onCloseButtonPressed() {
                this.$root.$emit('modal-close');
            }
        }
    }
</script>

<style>
    .modal-content{
        background-color:white;
    }
</style>
