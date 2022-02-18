<script>
import axios from 'axios';

export default {
  props: [
    'trans',
    'edit'
  ],
  data() {
    return {
      reason: '',
      reasonId: null
    }
  },
  methods: {
    async saveReason() {
      try {
        const { data: response } = await axios.post('/api/lib/reason/save', {
          reason: this.reason,
          reason_id: this.reasonId
        });

        if (response.success) {
          this.$swal({
            icon: 'success',
            title: response.message,
          }).then((result) => { 
            window.location.replace('/admin/lib/reasons/list');
          });

        } else {
          this.$swal({
            icon: 'error',
            text: response.message
          });
        }
        console.log(response);
      } catch (error) {
        this.$swal({
            icon: 'error',
            text: this.trans.save_error
          });
        console.log(error);
      }
    }
  },
  mounted() {
    if (this.edit) {
      const edit = JSON.parse(this.edit);
      this.reason = edit.reason;
      this.reasonId = edit.id;
    }
  }
}
</script>
<template>
  <div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">{{ trans.add_title }}</h4>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="usr"> {{ trans.reason }} </label>
                    <input 
                      type="text" 
                      class="form-control"
                      :placeholder="trans.reason"
                      v-model="reason"
                    >
                </div>
            </div>
            
        </div>

        <div class="form-group text-right button-save">
            <button type="button" class="btn btn-success" @click="saveReason">
                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
                  {{ trans.save }}
                </span>
            </button>
        </div>
    </div>
  </div>
</template>
<style>
.button-save {
    padding-right: 40px;
}
</style>