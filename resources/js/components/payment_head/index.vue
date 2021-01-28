<template>
    <div class="container">
        <br>
        <div class="vld-parent">
            <Loading :active.sync="isLoading"
                     :can-cancel="true"
                     :loader="bars"
                     :is-full-page="fullPage">
            </Loading>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>
                        <router-link :to="payment-head-create" class="btn btn-primary float-right">Add Payment Head</router-link>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive-md table-responsive-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px" class="text-center">#SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(paymentHead,index) in getPaymentHeadData">
                                <td>{{pagination.from+index}}</td>
                                <td>{{paymentHead.name}}</td>
                                <td>{{(paymentHead.status == 1)? "Active":"Deactive"}}</td>
                                <td class="text-center" v-if="paymentHead.deleted_at == null">
                                    <a v-if="paymentHead.status==1"><span class="material-icons" style="color: green"
                                                                          title="deactive">toggle_on</span></a>
                                    <a v-if="paymentHead.status==0"><span class="material-icons" style="color: red"
                                                                          title="active">toggle_off</span></a>
                                    <a href="#"><span class="material-icons" title="edit">edit</span></a>
                                    <a><span class="material-icons" style="color: red;" title="delete">delete</span></a>
                                </td>
                                <td class="text-center" v-else>
                                    <a><span class="material-icons" title="restore" style="color: green">undo</span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <pagination
                                :pagination="this.pagination"
                                :offset="5"
                                :is-search="isSearch"
                                @paginate="paymentHeads"
                        ></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "index",
        data() {
            return {
                isLoading: false,
                fullPage: true,
                isSearch: '',
                getPaymentHeadData: '',
                pagination: {
                    current_page: 1
                },
            }
        },
        mounted() {
            this.isLoading = true
            this.paymentHeads()
            Event.$on('paymentHeadEvent', () => {
                this.paymentHeads()
            })
        },
        methods: {
            paymentHeads() {
                axios.get('/api/payment-head?page=' + this.pagination.current_page)
                    .then((response) => {
                        this.getPaymentHeadData = response.data.data
                        this.pagination = response.data.meta
                        this.isLoading = false
                    })
            },
        }
    }
</script>

<style scoped>

</style>