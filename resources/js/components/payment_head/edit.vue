<template>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Head Edit</h3>
                    </div>
                    <form role="form" @submit.prevent="" @keydown="form.onKeydown($event)">
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
                                        <select class="form-control" v-model="form.status" id="status">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                        <has-error :form="form" field="status"></has-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <router-link to="payment-head" class="btn btn-primary">Back</router-link>
                            <button type="submit" class="btn btn-success" :disabled="form.busy">Update</button>
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
                edit:'',
                form:new Form(
                    {
                        name:'',
                        status:1,
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
                        this.form.status = response.data.data.status
                    })
            },

        }
    }
</script>

<style scoped>

</style>