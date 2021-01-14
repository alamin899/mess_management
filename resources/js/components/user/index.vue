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
                        <a href="#" class="btn btn-primary float-right">Add User</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-responsive-md table-responsive-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px" class="text-center">#SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(user,index) in getUsers.data">
                                <td>{{index+1}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
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
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul>
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
                fullPage: true
            }
        },
        mounted() {
            this.isLoading = true
            this.$store.dispatch("users")
        },
        computed:{
            getUsers(){
                this.isLoading = false
                return this.$store.getters.getUsers
            }
        }
    }
</script>

<style scoped>

</style>