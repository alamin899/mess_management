<template>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <form role="form" @submit.prevent="update" @keydown="form.onKeydown($event)">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <multiselect v-model="form.status"
                                                     :options="status"
                                                     placeholder="Select Status" label="value" track-by="id"
                                                     :class="{ 'is-invalid': form.errors.has('status') }">
                                        </multiselect>
                                        <has-error :form="form" field="status"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label for="profile">Profile Image</label>
                                        <input @change = "changePhoto($event)" id="profile" name="image" type="file" :class="{ 'is-invalid': form.errors.has('image') }">
                                        <img :src="image" alt="" width="80" height="80" v-if="this.edit != null">
                                        <img :src="form.image" alt="" width="80" height="80" v-else>
                                        <has-error :form="form" field="image"></has-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <router-link to="user" class="btn btn-primary">Back</router-link>
                            <button type="submit" class="btn btn-success" :disabled="form.busy">Update</button>
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
        name: "edit",
        data() {
            return {
                image:'',
                edit:'',
                status: [
                    { id: 1, value: 'Active' },
                    { id: 2, value: 'Pending' },
                ],
                form:new Form(
                    {
                        name:'',
                        email:'',
                        image:'',
                        status:'',
                    }
                )
            }
        },
        mounted() {
            this.getUser()
        },
        methods:{
            changePhoto(event){
                this.edit = false
                let file = event.target.files[0];
                if(file.size>1048576){
                    alert("file size over");
                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.image = event.target.result
                    };
                    reader.readAsDataURL(file);
                }
            },
            getUser()
            {
                axios.get('/api/user/' + this.$route.params.user_id)
                    .then((response)=>{
                        this.form.name = response.data.data.name
                        this.form.email = response.data.data.email
                        this.selectStatus(response.data.data.status)
                        this.showImage(response.data.data.image)
                    })
            },
            selectStatus(id)
            {
                for(var i =0 ;i<this.status.length;i++) {
                    if (this.status[i].id == id) {
                        this.form.status ={
                            id: id,
                            value: this.status[i].value
                        }
                    }
                }

            },
            showImage(image)
            {
                this.edit = true
                this.image = "file/images/"+image
            },
            update(){
                this.form.put('/api/user/'+this.$route.params.user_id)
                    .then((response)=>{
                        if (response.data.message == "success"){
                            this.$router.push('/user')
                            this.form.reset()
                            toast.fire({
                                icon: 'success',
                                title: 'User Updated successfully'
                            })
                        }
                        else {
                            toast.fire({
                                icon: 'error',
                                title: 'Failed To Insert '
                            })
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>