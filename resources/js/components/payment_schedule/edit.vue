<template>
  <div class="modal fade" id="paymentScheduleEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Edit {{this.head_name}} Schedule Of {{this.user_name}}</h3>
          <button type="button" @click.prevent="closeModal" class="close" data-dismiss="modal"
                  aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="startDate">Paid Date</label>
            <input type="date" v-model="form.paid_date" class="form-control"
                   :class="{ 'is-invalid': form.errors.has('paid_date') }" id="startDate">
            <has-error :form="form" field="paid_date"></has-error>
          </div>
          <div class="form-group">
            <label for="paymentStatus">Payment Status</label>
            <select class="form-control" v-model="form.payment_status" :class="{ 'is-invalid': form.errors.has('payment_status') }" id="paymentStatus">
              <option value="">Payment Status</option>
              <option :value="index" v-for="(paymentStatus,index) in getPaymentStatus ">{{paymentStatus}}
              </option>
            </select>
            <has-error :form="form" field="payment_status"></has-error>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" ref="closeBtn" class="btn btn-secondary" @click.prevent="closeModal"
                  data-dismiss="modal">Close
          </button>
          <button type="button" class="btn btn-primary" :disabled="form.busy"
                  @click.prevent="">Update
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "edit",
  props:{
    paymentScheduleId:{},
  },
  data() {
    return {
      getPaymentStatus:'',
      user_name:'',
      head_name : '',
      form: new Form(
          {
            user_id:'',
            payment_head_id: '',
            paid_date: '',
            status: '',
            payment_status:'',
          }
      )
    }
  },
  mounted() {
    this.paymentStatus()
  },
  methods:{
    paymentStatus() {
      axios.get('/payment-status')
          .then((response) => {
            this.getPaymentStatus = response.data
          })
    },
    closeModal() {
      this.form.reset()
    }
  }

}
</script>

<style scoped>

</style>