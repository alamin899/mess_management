<template>
    <div class="container">
        <br>
        <div class="vld-parent">
            <Loading :active.sync="isLoading"
                     :can-cancel="true"
                     :loader="'bars'"
                     :is-full-page=true>
            </Loading>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Schedule</h3>
                        <router-link to="payment-schedule-create" class="btn btn-primary float-right">Add Payment Schedule
                        </router-link>
                    </div>
                    <div class="card-body">
                        <table v-if="getPaymentScheduleData != '' " class="table table-bordered table-responsive-md table-responsive-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px" class="text-center">#SL</th>
                                <th class="text-center">Head</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Paid Date</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(paymentSchedule,index) in getPaymentScheduleData">
                                <td>{{pagination.from+index}}</td>
                                <td>{{paymentSchedule.paymentHead.name}}</td>
                                <td>{{paymentSchedule.user.name}}</td>
                                <td>{{paymentSchedule.paid_date}}</td>
                                <td v-if="paymentSchedule.payment_status == 2" class="text-center">
                                    <button type="button" class="btn btn-outline-success" disabled>Paid</button>
                                </td>
                                <td v-else class="text-center">
                                    <button type="button" class="btn btn-outline-danger" disabled>Unpaid</button>
                                </td>
                                <td class="text-center" v-if="paymentSchedule.deleted_at == null">
                                    <a href="#" @click.prevent="updatePaymentScheduleId(paymentSchedule.id)" data-toggle="modal" data-target="#paymentScheduleEditModal"><span class="material-icons" title="edit">edit</span></a>
                                    <a href="#" @click.prevent="paymentScheduleDelete(paymentSchedule.id)"><span class="material-icons" style="color: red;"
                                                      title="delete">delete</span></a>
                                </td>
                                <td class="text-center" v-else>
                                    <a href="#"><span class="material-icons" title="restore"
                                                      style="color: green">undo</span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <label v-else class="font-weight-bold text-danger">No Data Found</label>
                    </div>
                    <div class="card-footer">
                        <pagination
                                :pagination="this.pagination"
                                :offset="5"
                                :is-search="isSearch"
                                @paginate="paymentSchedules"
                        ></pagination>
                    </div>
                </div>
            </div>
        </div>
      <payment-schedule-edit :payment-schedule-id = "paymentScheduleId"></payment-schedule-edit>
    </div>
</template>

<script>
    export default {
        name: "index",
        data() {
            return {
                isLoading: false,
                isSearch: '',
                getPaymentScheduleData: '',
                paymentScheduleId:'',
                pagination: {
                    current_page: 1
                },
            }
        },
        mounted() {
            this.isLoading = true
            this.paymentSchedules()
            Event.$on('paymentScheduleEvent', () => {
                this.paymentSchedules()
            })
        },
        methods: {
            paymentSchedules() {
                axios.get('/api/payment-schedule?page=' + this.pagination.current_page)
                    .then((response) => {
                        this.isLoading = false
                        this.getPaymentScheduleData = response.data.data
                        this.pagination = response.data.meta
                    })
            },
          updatePaymentScheduleId(id){
            this.paymentScheduleId = id
          },
          paymentScheduleDelete(id)
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
                axios.delete('/payment-schedule/'+id)
                    .then((response) => {
                      if (response.data == true)
                      {
                        Event.$emit('paymentScheduleEvent')
                        toast.fire({
                          icon: 'success',
                          title: 'Payment Schedule deleted successfully'
                        })
                      }
                      else
                        toast.fire({
                          icon: 'error',
                          title: 'Something Went Wrong'
                        })
                    })
                    .catch(()=>{
                      toast.fire({
                        icon: 'error',
                        title: 'Something Went Wrong'
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