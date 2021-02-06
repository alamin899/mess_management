<template>
    <div class="row">
        <div class="col-md-12 col-sm-12" :class="this.showHide">
            <table v-if="this.form.payment_schedules.length >1"
                   class="table table-bordered table-responsive-md table-responsive-sm">
                <thead>
                <tr>
                    <th style="width: 10px" class="text-center">#SL</th>
                    <th class="text-center">Head</th>
                    <th class="text-center">User</th>
                    <th class="text-center">Paid Date</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(payment_schedule,index) in this.form.payment_schedules ">
                    <td>{{index+1}}</td>
                    <td><input class="form-control" type="text"
                               v-model="form.payment_schedules[index].payment_head_name" readonly></td>
                    <td><input class="form-control" type="text" v-model="form.payment_schedules[index].user_name"
                               readonly></td>
                    <td><input class="form-control" type="date" v-model="form.payment_schedules[index].paid_date"></td>
                    <td><a href="#" @click.prevent="removeSchedule(index)"><span class="material-icons" title="remove"
                                                                                 style="color: red">remove_circle_outline</span></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="row" v-else><label>No Data Found</label></div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12" :class="this.showHide">
            <button type="submit" class="btn btn-primary mb-4">Submit</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "schedule_list",
        props: {
            showHide: {},
            head: {},
            user: {},
            paidDate: {},
            period: {}
        },
        data() {
            return {
                form: new Form(
                    {
                        payment_schedules: [{
                            user_id: '',
                            user_name: '',
                            payment_head_id: '',
                            payment_head_name: '',
                            paid_date: '',
                        }],
                    }
                )
            }
        },
        watch: {
            showHide: function (newD, oldD) {
                this.conditionCheck()
            },
            head: function (newD, oldD) {
                this.conditionCheck()
            },
            user: function (newD, oldD) {
                this.conditionCheck()
            },
            period: function (newD, oldD) {
                this.conditionCheck()
            },
            paidDate: function (newD, oldD) {
                this.conditionCheck()
            },
        },
        methods: {
            conditionCheck(){
                if (this.user != '' && this.head != '' && this.paidDate != ''  && this.period != ''){
                    this.paymentSchedule()
                }
            },
            paymentSchedule() {
                this.form.reset()
                for (var i = 0; i < this.period; i++) {
                    this.form.payment_schedules.push({
                        user_id: this.user.id,
                        user_name: this.user.name,
                        payment_head_id: this.head.id,
                        payment_head_name: this.head.name,
                        paid_date: this.getDateDaily(this.paidDate, i),
                    })
                }
                this.form.payment_schedules.splice(0, 1)
            },
            removeSchedule(index) {
                if (this.form.payment_schedules.length > 1) {
                    this.form.payment_schedules.splice(index, 1)
                }

            }
        }
    }
</script>

<style scoped>

</style>