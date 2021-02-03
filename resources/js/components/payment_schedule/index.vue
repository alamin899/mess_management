<template>
    <div>
        <label class="typo__label">Simple select / dropdown</label>
        <multiselect v-model="value"
                     :options="options"
                     :multiple="true"
                     :close-on-select="false"
                     :clear-on-select="true"
                     :preserve-search="true"
                     placeholder="Pick some" label="name" track-by="name"
                     :preselect-first="true">
            <template slot="selection"
                      slot-scope="{ values, search, isOpen }"
            ><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
        </multiselect>
<!--        <multiselect v-model="value" :options="options" :multiple="true" group-values="libs" group-label="language" :group-select="true" placeholder="Type to search" track-by="name" label="name"><span slot="noResult">Oops! No elements found. Consider changing the search query.</span></multiselect>-->
        <pre class="language-json"><code>{{ value  }}</code></pre>
    </div>
</template>

<script>
    export default {
        name: "index",
        data () {
            return {
                value: [],
                options: [
                    { name: '', language: '' },
                    { name: 'Vue.js', language: 'JavaScript' },
                    { name: 'Adonis', language: 'JavaScript' },
                    { name: 'Rails', language: 'Ruby' },
                    { name: 'Sinatra', language: 'Ruby' },
                    { name: 'Laravel', language: 'PHP' },
                    { name: 'Phoenix', language: 'Elixir' }
                ]
            }
        }
        // data () {
        //     return {
        //         options: [
        //             {
        //                 language: 'Javascript',
        //                 libs: [
        //                     { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' }, { name: 'Vue.js', category: 'Front-end' },
        //                     { name: 'Adonis', category: 'Backend' },
        //                     { name: 'Rails', category: 'Backend' },
        //                     { name: 'Sinatra', category: 'Backend' },
        //                     { name: 'Laravel', category: 'Backend' },
        //                     { name: 'Phoenix', category: 'Backend' },
        //                 ]
        //             },
        //         ],
        //         value: []
        //     }
        // }
    }
</script>

<style scoped>

</style>