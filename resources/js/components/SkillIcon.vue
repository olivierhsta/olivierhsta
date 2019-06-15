<template>
    <div class="skill-icon">
        <div class="circle" :style="'--border-color:'+color+';'">
            <i :class="icon + ' fa-lg'"></i>
            <div v-for="degreeValue in degreeValues" :class="'arc arc-'+degreeValue" :style="'--arc-color:'+color+';'"></div>
        </div>
        <div class="skill-name" :style="'--text-color:'+color">{{name}}</div>
    </div>
</template>

<script>
    export default {
        props: ['name','color', 'icon', 'skillLevel'],
        data() {
            return  {
                // data
            };
        },
        methods: {
            /*
            method: function (event) {
                // content
            },
            */
        },
        computed: {
            degreeValues: function() {
                let degreeValues = [];
                for (var i = 25; i <= 100; i+=25) {
                    if (this.skillLevel > i) {
                        degreeValues.push(String(i));
                    }
                }
                let maxTenth = Math.ceil(this.skillLevel / 10) * 10;
                maxTenth = (maxTenth > 100) ? 100 : (maxTenth < 0) ? 30 : maxTenth;
                degreeValues.push(String(maxTenth));
                return degreeValues;
            }
        }
    }
</script>

<style lang="scss">
@import "@/_variables.scss";

.circle {
    height: 3.5rem;
    width: 3.5rem;
    position: relative;
    margin: 0.5rem;
    color: var(--border-color);
    background: transparent;
    padding: 0.8rem 0.2rem 0 0;
    text-align: center;
}

.arc {
    position: absolute;
    top: 0;
    left: 0;
    margin-left: -2px;
    margin-top: -5px;
    border-radius: 50%;
    height: 3.5rem;
    width: 3.5rem;
    border: 5px solid transparent;
    border-top-color: var(--arc-color);
    animation: rotate 2s infinite linear;
    transform: rotate(45deg);
}

.arc-25 { /* min value */ }
.arc-30 { transform: rotate(63deg); }
.arc-40 { transform: rotate(99deg); }
.arc-50 { transform: rotate(135deg); }
.arc-60 { transform: rotate(171deg); }
.arc-70 { transform: rotate(207deg); }
.arc-75 { transform: rotate(225deg); }
.arc-80 { transform: rotate(243deg); }
.arc-90 { transform: rotate(279deg); }
.arc-100 { transform: rotate(315deg); }

.skill-icon {
    text-align: center;
    font-size: 90%;
}

.skill-name {
    padding-right: 0.2rem;
    margin-top: -0.5rem;
    color: var(--text-color);
}
</style>
