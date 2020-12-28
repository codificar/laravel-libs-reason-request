<template>
  <div class="col-lg-12">
    <div class="card card-outline-info">
        <div class="card-header">
            <h4 class="m-b-0 text-white">{{ trans.setting }}</h4>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="usr"> {{ trans.active }} </label>
                    <select v-model="setting" class="form-control">
                        <option value="1">{{ trans.yes }}</option>
                        <option value="0">{{ trans.no }}</option>
                    </select>
                </div>
            </div>
            
        </div>

        <div class="form-group text-right button-save">
            <button type="button" class="btn btn-success" @click="saveSetting">
                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
                  {{ trans.save }}
                </span>
            </button>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    props: [
        'trans',
        'edit'
    ],
    data() {
        return {
            setting: 0
        }
    },
    methods: {
        async saveSetting() {
            try {
                const { data: response } = await axios.post('/api/lib/reason/save_setting', {
                    setting: this.setting
                });

                if (response.success) {
                    this.$swal({
                        icon: 'success',
                        title: 'OK!'
                    });
                } else {
                    this.$swal({
                        icon: 'error'
                    });
                }
            } catch (error) {
                console.log('saveSetting', error);
                this.$swal({
                    icon: 'error'
                });
            }
        }
    },
    created() {
        if (this.edit) {
            const edit = JSON.parse(this.edit);
            this.setting = edit.value;
        }
    }
}
</script>

<style>
.button-save {
    padding-right: 40px;
}
</style>