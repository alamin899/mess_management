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
                        <h3 class="card-title">Payment Head</h3>
                        <router-link to="payment-head-create" class="btn btn-primary float-right">Add Payment Head
                        </router-link>
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
                                <td v-if="paymentHead.status == 1" class="text-center"><button type="button" @click.prevent="paymentHeadStatus(paymentHead.id , 0 , 'Deactive')" class="btn btn-outline-success">Active</button></td>
                                <td v-else class="text-center"><button type="button" @click.prevent="paymentHeadStatus(paymentHead.id , 1 ,'Active')" class="btn btn-outline-danger">Deactivate</button></td>
                                <td class="text-center" v-if="paymentHead.deleted_at == null">
                                    <router-link :to="`payment-head/${paymentHead.id}`"><span class="material-icons"  title="edit">edit</span></router-link>
                                    <a @click.prevent="paymentHeadDestroy(paymentHead.id)"><span class="material-icons" style="color: red;" title="delete">delete</span></a>
                                </td>
                                <td class="text-center" v-else>
                                    <a @click.prevent="paymentHeadRestore(paymentHead.id)"><span class="material-icons" title="restore" style="color: green">undo</span></a>
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
            paymentHeadDestroy(id)
            {
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/api/payment-head/'+id)
                            .then((response) => {
                                if (response.data == true)
                                {
                                    Event.$emit('paymentHeadEvent')
                                    toast.fire({
                                        icon: 'success',
                                        title: 'Payment Head deleted successfully'
                                    })
                                }
                                else
                                    toast.fire({
                                        icon: 'error',
                                        title: 'Something Went Wrong'
                                    })
                            })
                            .catch((error)=>{
                                toast.fire({
                                    icon: 'error',
                                    title: error
                                })
                            })
                    }
                })
            },
            paymentHeadRestore(id)
            {
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Restore it!'
                }).then((result) => {
                    if (result.value) {
                        axios.patch('/api/payment-head/'+id)
                            .then((response) => {
                                if (response.data == true)
                                {
                                    Event.$emit('paymentHeadEvent')
                                    toast.fire({
                                        icon: 'success',
                                        title: 'Payment Head Restored successfully'
                                    })
                                }
                                else
                                    toast.fire({
                                        icon: 'error',
                                        title: 'Something Went Wrong'
                                    })
                            })
                            .catch((error)=>{
                                toast.fire({
                                    icon: 'error',
                                    title: error
                                })
                            })
                    }
                })
            },

            paymentHeadStatus(payment_head_id, status_id , name) {
                Swal.fire({
                    title: 'Are you sure ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, '+name+'!'
                }).then((result) => {
                    if (result.value) {
                        axios.get('/api/payment-head/' + payment_head_id + '/status/' + status_id)
                            .then((response) => {
                                if (response.data == "active") {
                                    Event.$emit('paymentHeadEvent')
                                    toast.fire({
                                        icon: 'success',
                                        title: 'Payment Head Activate'
                                    })
                                }
                                else {
                                    Event.$emit('paymentHeadEvent')
                                    toast.fire({
                                        icon: 'success',
                                        title: 'Payment Head Deactivate'
                                    })
                                }

                            })
                            .catch((error) => {
                                toast.fire({
                                    icon: 'error',
                                    title: error
                                })
                            })
                    }
                })
            },
        }
    }
</script>

<style scoped>

</style>