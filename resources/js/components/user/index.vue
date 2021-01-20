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
                        <router-link to="user-create" class="btn btn-primary float-right">Add User</router-link>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-responsive-md table-responsive-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px" class="text-center">#SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(user,index) in getUsersData">
                                <td>{{pagination.from+index}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td><img :src="ourImage(user.image)" alt="" width="50" height="60"></td>
                                <td class="text-center">
                                    <a><span class="material-icons"  title="edit">edit</span></a>
                                    <a><span class="material-icons" style="color: red;" title="delete">delete</span></a>
                                    <a><span class="material-icons" title="restore" style="color: green">undo</span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <pagination
                                :pagination="this.pagination"
                                :offset="5"
                                :is-search  ="isSearch"
                                @paginate="users"
                        ></pagination>
                    </div>
                </div>
                <!-- /.card -->
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
                getUsersData: '',
                pagination:{
                    current_page:1
                },
            }
        },
        mounted() {
            this.isLoading = true
            this.users()
        },
        methods:{
            ourImage(image){
                return "file/images/"+image
            },
            users(){
                axios.get('/api/user?page=' + this.pagination.current_page)
                    .then((response)=>{
                        this.getUsersData = response.data.data
                        this.pagination = response.data.meta
                        this.isLoading = false
                    })
            },
        }
    }
</script>

<style scoped>

</style>