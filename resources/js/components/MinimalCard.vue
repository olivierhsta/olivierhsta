<template>
    <div class="minimal-card">
        <div :class="'minimal-card-header '+this.iconClass" @click="toggleCardName">
            <div class="minimal-card-icon" :style="'--background-color:'+this.iconBackgroundColor+';'">
                <i :class="fontawesomeIcon"></i>
            </div>
            <div class="minimal-card-title" :style="'--border-color:'+this.iconBackgroundColor+';'">
                <slot name="title"></slot>
            </div>
        </div>
        <div class="minimal-card-content" :style="'--border-color:'+this.iconBackgroundColor+';'">
            <slot></slot>
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
        }
    }
</script>

<style lang="scss">

.minimal-card-header {
    display: flex;

    .minimal-card-icon {
        height: 4.5rem;
        width: 4.5rem;
        padding: 0.5em 0;
        color: white;
        background-color: var(--background-color);
        text-align: center;
        font-size: 30px;
        border-radius: 50%;
        z-index: 1;
    }

    .minimal-card-title {
        margin: 0 3rem 0 -2.5rem;
        border: 2px solid var(--border-color);
        border-bottom: 0;
        border-radius: 0 1em 0 0;
        line-height: 4.3rem;
        z-index: 0;
        font-size: 150%;
        font-weight: 200;
        color: transparent;
        width: 0;
        padding: 0;
        transition: all 0.5s ease 0.4s;

    }

    &:hover .minimal-card-title,
    &.was-clicked .minimal-card-title {
        width: 12rem;
        padding: 0 0 0 0.7em;
        margin: 0 1rem 0 -2.5rem;
        color: var(--border-color);
        transition: all 0.5s ease;
        text-align: center;
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
