<template>
    <div class="minimal-card">
        <div class="minimal-card-header" @click="toggleCardName">
            <div :class="'minimal-card-icon '+this.iconClass" :style="'--border-color:'+this.iconBackgroundColor+';'">
                <i :class="fontawesomeIcon"></i>
            </div>
            <div  v-if="slotPassed" class="minimal-card-title" :style="'--border-color:'+this.iconBackgroundColor+';'">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['iconBackgroundColor', 'fontawesomeIcon'],
        data() {
            return  {
                iconClass:'',
            };
        },
        methods: {
            toggleCardName() {
                this.iconClass = (this.iconClass == '') ? 'was-clicked' : '';
            },
        },
        computed:{
            slotPassed() {
                return !!this.$slots.default;
            }
        }
    }
</script>

<style lang="scss">
@import "@/_variables.scss";
.minimal-card-header {
    display: flex;

    .minimal-card-icon {
        height: 3.5rem;
        width: 3.5rem;
        padding: 0.22em 0;
        color: var(--border-color);
        border: 2px solid var(--border-color);
        background-color: $body-bg;
        text-align: center;
        font-size: 30px;
        border-radius: 50%;
        z-index: 1;
    }

    .minimal-card-title {
        border: 2px solid var(--border-color);
        border-radius: 0 5em 5em 0;
        text-align: center;
        line-height: 3.3rem;
        z-index: 0;
        font-size: 130%;
        font-weight: 200;
        width: auto;

        max-width:0px;
        margin: 0 2rem 0.5rem -1.7rem;
        color: transparent;
        padding: 0;
        transition: all 0.5s ease;

    }

    .minimal-card-icon:hover ~ .minimal-card-title,
    .minimal-card-icon.was-clicked ~ .minimal-card-title {
        max-width: 20rem;
        margin-right: 1rem;
        color: var(--border-color);
        padding: 0 1.5em 0 2em;
        transition: all 0.5s ease;
    }
}

.minimal-card-content {
    height: 0;
    width: 0;
    color: transparent;
    border-radius: 0 0 1em 1em;
    padding: 2em 0 0 0;
    margin-top: -2em;
    border-top: 0 !important;
    border: 2px solid transparent;
    transition: height 0.5s ease,
                width 0.5s ease 0.5s,
                color 0.5s ease,
                padding 0.5s ease,
                border 0.5s ease;
}

.minimal-card-header:hover ~ .minimal-card-content,
.minimal-card-header.was-clicked ~ .minimal-card-content {
    width: 14rem;
    padding: 2em 1em 1em 1em;
    border-radius: 0 0 1em 1em;
    height: 4rem;
    color: black;
    border: 2px solid var(--border-color);
    border-top: 0;
    transition: height 0.5s ease 0.4s,
                width 0.5s ease,
                color 0.5s ease 0.4s,
                padding 0.5s ease 0.4s,
                border 0.5s ease 0.4s;
}
</style>
