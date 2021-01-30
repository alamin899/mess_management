<template>
    <div v-if="this.pagination.from >0 && this.pagination.to > 0">
        <nav aria-label="Page navigation" class="float-right">
            <ul class="pagination fullscreen">
                <li class="page-item"><a  href="#" class="page-link" :class="{ disabled: pagination.current_page <= 1 }" @click.prevent="changePage(1)">First</a></li>
                <li class="page-item"><a href="#" class="page-link" :class="{ disabled: pagination.current_page <= 1 }" @click.prevent="changePage(pagination.current_page - 1)">Previous</a></li>
                <li class="page-item" :class="isCurrentPage(page) ? 'active' : ''" v-for="page in pages"><a href="#" class="page-link"  :key="page"  @click.prevent="changePage(page)">{{ page }}
                    <span v-if="isCurrentPage(page)" class="sr-only"></span>
                </a></li>
                <li class="page-item"><a href="#" class="page-link" :class="{ disabled: pagination.current_page >= pagination.last_page }" @click.prevent="changePage(pagination.current_page + 1)">Next</a></li>
                <li class="page-item"><a href="#" class="page-link" :class="{ disabled: pagination.current_page >= pagination.last_page }" @click.prevent="changePage(pagination.last_page)">Last</a></li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "pagination",
        props:['pagination', 'offset','isSearch'],
        methods: {
            isCurrentPage(page){
                return this.pagination.current_page === page
            },
            changePage(page) {
                if (page > this.pagination.last_page) {
                    page = this.pagination.last_page;
                }
                this.pagination.current_page = page;
                if (this.isSearch === '')
                {
                    this.$emit('paginate');
                }
                else
                    this.$emit('searchPaginate');

            }
        },
        computed: {
            pages() {
                let pages = []
                let from = this.pagination.current_page - Math.floor(this.offset / 2)
                if (from < 1) {
                    from = 1
                }
                let to = from + this.offset -1
                if (to > this.pagination.last_page) {
                    to = this.pagination.last_page
                }
                while (from <= to) {
                    pages.push(from)
                    from++
                }
                return pages
            }

        }
    }
</script>

<style scoped>

</style>
