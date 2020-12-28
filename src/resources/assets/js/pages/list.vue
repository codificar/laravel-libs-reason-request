<template>
  <div>
    <div class="tab-content">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">{{ trans.filter }}</h4>
                </div>

                <div class="card-block">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!--Name-->
                            <div class="form-group">
                                <label for="name" class="control-label">{{ trans.reason }}</label>                                  
                                <input v-model="name" class="form-control" maxlenght="255" auto-focus :placeholder="trans.reason" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Action -->
                    <div class="form-group">
                        <div class="pull-right">
                            <div class="col-md-6 col-md-offset-4">
                                <button @click="listReasons" type="button" class="btn btn-success">
                                    <i class="fa fa-search"></i> 
                                    {{ trans.filter }}
                                </button>               
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content">
        <div class="col-lg-12">
            <div class="card card-outline-info">            
                <div class="card-block">
                    
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>{{ trans.reason }}</th>
                            <th>{{ trans.action }}</th>
                        </tr>
                        <tr v-for="item in reasons.data" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ item.reason }}</td>
                            <td style="width: 50px;">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                        {{ trans.actions }}
                                        <span class="caret"></span>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
                                        <!-- EDITAR -->
                                        <a class="dropdown-item" :href="'/admin/lib/reasons/edit/' + item.id" tabindex="-1">{{ trans.edit }}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>   

                    <pagination :data="reasons" @pagination-change-page="listReasons" ></pagination> 
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    props: [
        'trans'
    ],
    data() {
        return {
            name: '',
            reasons: {}
        }
    },
    methods: {
        async listReasons() {
            const { data: response } = await axios.get('/api/lib/reason/list', {
                params: {
                    reason: this.name
                }
            });
            
            this.reasons = response;
        }
    },
    mounted() {
        this.listReasons()
    }
}
</script>

<style>

</style>