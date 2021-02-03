<template>
    <div>
        <label class="typo__label">Groups</label>
        <multiselect
                v-model="value"
                :options="options"
                :multiple="true"
                group-values="libs"
                group-label="language"
                :group-select="true" :close-on-select="false" placeholder="Type to search" track-by="name" label="name"><span slot="noResult">Oops! No elements found. Consider changing the search query.</span></multiselect>
        <pre class="language-json"><code>{{ value  }}</code></pre>
    </div>
</template>

<script>
    export default {
        name: "index",
        data () {
            return {
                options: [
                    {
                        language: 'Javascript',
                        libs: [
                            { name: 'Vue.js', category: 'Front-end' },
                            { name: 'Adonis', category: 'Backend' },
                            { name: 'Rails', category: 'Backend' },
                            { name: 'Sinatra', category: 'Backend' },
                            { name: 'Laravel', category: 'Backend' }]
                    },
                ],
                value: ''
            }
        }
    }
</script>

<style scoped>

</style>