<template>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Head Create</h3>
                    </div>
                    <form role="form" @submit.prevent="paymentHeadStore">
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
                            <button type="submit" class="btn btn-success" :disabled="form.busy">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "create",
        data() {
            return {
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
        methods:{
            paymentHeadStore(){
                this.form.post('/api/payment-head')
                    .then((response)=>{
                        if (response.data.message == "success"){
                            this.$router.push('/payment-head')
                            this.form.reset()
                            toast.fire({
                                icon: 'success',
                                title: 'Payment head Created successfully'
                            })
                        }
                        else {
                            toast.fire({
                                icon: 'error',
                                title: 'Failed To Insert '
                            })
                        }
                    })
                .catch((error)=>{
                    toast.fire({
                        icon: 'error',
                        title: error
                    })
                })
            }
        }
    }
</script>

<style scoped>

</style>