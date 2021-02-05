<template>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <h6 class="m-0 font-weight-bold">Payment Schedule</h6><br>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 noprint">
                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 my-1">
                                            <multiselect v-model="head" id="head"
                                                         :options="this.heads"
                                                         :searchable="true"
                                                         placeholder="Select Head" label="name" track-by="id"
                                            >
                                            </multiselect>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 my-1">
                                            <multiselect v-model="user" id="user"
                                                         :options="this.users"
                                                         :searchable="true"
                                                         placeholder="Select User" label="name" track-by="id">
                                            </multiselect>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 my-1">
                                            <input type="date" v-model="paid_date"
                                                   class="form-control date"
                                                   placeholder="enterpaid date">
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 my-1">
                                            <input type="number" v-model="amount"
                                                   class="form-control"
                                                   placeholder="Enter Amout">
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 my-1">
                                            <input type="number" id="paid_date" v-model="period"
                                                   class="form-control "
                                                   placeholder="Enter period">
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 my-1">
                                            <button type="submit"
                                                    class="btn btn-primary col-md-12"
                                                    v-if="this.user != '' && this.head != '' && this.paid_date != '' && this.amount != '' && this.period != ''"
                                                    @click.prevent="showHide" id="submit"><i :class="btnLoader"></i>&nbsp;Generate
                                            </button>
                                            <button v-else class="btn btn-primary col-md-12" disabled>Generate</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <payment-schedule-list
                :show-hide="this.show_hide"
                :head="this.head"
                :user="this.user"
                :amount="this.amount"
                :period="this.period"
                :paid-date="this.paid_date"
        ></payment-schedule-list>
    </div>
</template>

<script>
    export default {
        name: "create",
        data() {
            return {
                show_hide: 'd-none',
                btnLoader: '',
                head: '',
                user: '',
                paid_date: '',
                amount: '',
                period: '',
                heads: [],
                users: [],
            }
        },
        mounted() {
            this.paymentHeadList()
            this.userList()
        },
        methods: {
            showHide() {
                this.show_hide = ''
            },
            paymentHeadList() {
                axios.get('/payment-head/list')
                    .then(response => {
                        this.headReset()
                        var headData = JSON.parse(JSON.stringify(response.data.data))
                        for (let i = 0; i < headData.length; i++) {
                            this.heads.push({
                                id: headData[i].id,
                                name: headData[i].name
                            })
                        }
                        this.heads.splice(0, 1)
                    });
            },
            headReset() {
                this.heads = [
                    {
                        id: '',
                        name: ''
                    }
                ]
            },
            userList() {
                axios.get('/user/list')
                    .then(response => {
                        this.userReset()
                        var userData = JSON.parse(JSON.stringify(response.data.data))
                        for (let i = 0; i < userData.length; i++) {
                            this.users.push({
                                id: userData[i].id,
                                name: userData[i].name
                            })
                        }
                        this.users.splice(0, 1)
                    });
            },
            userReset() {
                this.users = [
                    {
                        id: '',
                        name: ''
                    }
                ]
            }
        },
    }
</script>

<style scoped>

</style>