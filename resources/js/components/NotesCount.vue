<template>
    <nav class="level">
        <div class="level-item has-text-centered">
            <div>
              <p class="heading">Notes</p>
              <p class="title" v-text="notes"></p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">'Snippets</p>
                <p class="title" v-text="snippets"></p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">Total</p>
                <p class="title" v-text="total"></p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">Lines</p>
                <p class="title" v-text="lines"></p>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        mounted() {

        },
        data() {
            return  {
                notes: 345,
                snippets:123,
                total:468,
                lines:7089
            };
        },
    }
</script>
