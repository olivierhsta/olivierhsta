<template>
    <div class="skills-view">
        <h2 class="skills-title"><span>Skills</span></h2>
        <fieldset class="skills-group" v-for="skillGroup in skills">
            <legend class="skill-group-title">{{skillGroup.groupName}}</legend>
            <div class="skills">
                <div v-for="skill in skillGroup.skills">
                    <minimal-card :iconBackgroundColor="skill.color" :fontawesomeIcon="skill.icon.fontawesome">
                        <template slot="title">{{skill.name}}</template>
                        {{ skill.description }}
                    </minimal-card>
                </div>
            </div>
        </fieldset>
    </div>
</template>

<script>
    import skillsData from "../../data/skills.json";
    export default {
        data() {
            return  {
                skills:skillsData
            };
        },
        methods: {
            /*
            method: function (event) {
                // content
            },
            */
        }
    }
</script>

<style lang="scss">
@import "@/_variables.scss";
.minimal-card {
    margin: 1rem 0;
}
.skills {
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    margin:auto;
}

.skills-title {
    color:$color6;
    font-size: 150%;
    font-weight: bold;
   width: 100%;
   text-align: center;
   border-bottom: 3px solid $color1;
   line-height: 0.1em;
   margin: 10px 0 20px;
}

.skills-title span {
    background: $body-bg;
    padding:0 10px;
}

.skills-group {
    padding: 1em;
    margin-top: 1em;
    border:3px solid $color0;
    border-radius: 1em;
    font-weight: 200;
}

.skill-group-title {
    text-align: center;
    padding: 0 0.3em;
    color:$color6;
    font-size: 130%;
    font-weight: bold;
}
</style>
