<template>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Head Edit</h3>
                    </div>
                    <form role="form" @submit.prevent="update" @keydown="form.onKeydown($event)">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="headName">Head Name</label>
                                        <input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="headName" placeholder="Enter Head Name">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" :class="{ 'is-invalid': form.errors.has('status') }">
                                        <label for="status">Status</label>
                                        <multiselect v-model="form.status" id="status"
                                                     :options="status"
                                                     placeholder="Select Status" label="value" track-by="id"
                                                     :class="{ 'is-invalid': form.errors.has('status') }">
                                        </multiselect>
                                        <has-error :form="form" field="status"></has-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <router-link to="payment-head" class="btn btn-primary">Back</router-link>
                            <button type="submit" class="btn btn-success" :disabled="form.busy"><i :class="btnLoader"></i>&nbsp;Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "edit",
        data() {
            return {
                btnLoader : '',
                edit:'',
                status: [
                    { id: 0, value: 'Pending' },
                    { id: 1, value: 'Active' },
                ],
                form:new Form(
                    {
                        name:'',
                        status:{ id: 1, value: 'Active' },
                    }
                )
            }
        },
        mounted() {
            this.getPaymentHead()
        },
        methods:{
            getPaymentHead()
            {
                axios.get('/api/payment-head/' + this.$route.params.payment_head_id)
                    .then((response)=>{
                        this.form.name = response.data.data.name
                        this.selectStatus(response.data.data.status)
                    })
            },
            selectStatus(id) {
                var status = this.status.find(stat => stat.id === id);
                this.form.status = {
                    id: status.id,
                    value: status.value
                }
            },
            update(){
                this.btnLoader = 'fa fa-refresh fa-spin'
                this.form.put('/api/payment-head/'+this.$route.params.payment_head_id)
                    .then((response)=>{
                        if (response.data.message == "success"){
                            this.$router.push('/payment-head')
                            this.form.reset()
                            toast.fire({
                                icon: 'success',
                                title: 'Payment Head Updated successfully'
                            })
                            this.btnLoader = ''
                        }
                        else {
                            toast.fire({
                                icon: 'error',
                                title: 'Failed To Insert '
                            })
                            this.btnLoader = ''
                        }
                    })
            }

        }
    }
</script>

<style scoped>

</style>