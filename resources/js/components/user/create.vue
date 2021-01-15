<template>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <form role="form" @submit.prevent="userStore" @keydown="form.onKeydown($event)">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userName">User Name</label>
                                        <input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="userName" placeholder="Enter Name">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userEmail">Email Address</label>
                                        <input type="email" v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" id="userEmail" placeholder="Enter email">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" v-model="form.password" id="exampleInputPassword1" placeholder="Password">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="passwordConfirmation">Confirm Password</label>
                                        <input type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" v-model="form.password_confirmation" id="passwordConfirmation" placeholder="Password">
                                        <has-error :form="form" field="password_confirmation"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" :class="{ 'is-invalid': form.errors.has('status') }">
                                        <label>Status</label>
                                        <select class="form-control" v-model="form.status">
                                            <option value="1">Active</option>
                                            <option value="2">Pending</option>
                                        </select>
                                        <has-error :form="form" field="status"></has-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <router-link to="user" class="btn btn-primary">Back</router-link>
                            <button type="submit" class="btn btn-success" :disabled="form.busy">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "create",
        data() {
            return {
                form:new Form(
                    {
                        name:'',
                        email:'',
                        password:'',
                        password_confirmation:'',
                        status:1,
                    }
                )
            }
        },
        methods:{
            userStore(){
                this.form.post('/api/user')
                    .then((response)=>{
                        if (response.data.message == "success"){
                            this.$router.push('/user')
                            this.form.reset()
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>