<template>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Password Update</h3>
                    </div>
                    <!-- /.card-header -->
                    <form role="form" @submit.prevent="passwordChange">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" id="password" placeholder="Enter Password">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm Password</label>
                                        <input type="password" v-model="form.password_confirmation" class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" id="confirmPassword" placeholder="Enter Confirm Password">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <router-link to="user" class="btn btn-primary">Back</router-link>
                            <button type="submit" class="btn btn-success" :disabled="form.busy">Update Password</button>
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
        name: "password_change",
        data(){
            return{
                form:new Form({
                    password:'',
                    password_confirmation:''
                })
            }
        },
        methods:{
            passwordChange()
            {
                this.form.put('/api/user/'+this.$route.params.user_id+'/pass-update')
                    .then((response)=>{
                        if (response.data == "success"){
                            this.$router.push('/user')
                            this.form.reset()
                            toast.fire({
                                icon: 'success',
                                title: 'User Password Change successfully'
                            })
                        }
                        else {
                            toast.fire({
                                icon: 'error',
                                title: 'Failed to Update'
                            })
                        }
                    })
                    .catch(()=>{
                        toast.fire({
                            icon: 'error',
                            title: 'Something Went Wrong'
                        })
                    })
            }
        }
    }
</script>

<style scoped>

</style>
