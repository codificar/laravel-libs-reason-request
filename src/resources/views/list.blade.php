@extends('layout.master')

@section('breadcrumbs')
<div class="row page-titles">
	<div class="col-md-6 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">{{ trans('reasonsrequest::reasons.list_reason') }}</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
			<li class="breadcrumb-item active">{{ trans('reasonsrequest::reasons.list_reason') }}</li>
		</ol>
	</div>

    <div class="col-md-6 col-4 align-self-center">
        <button onclick="location.href='/admin/lib/reasons/add'" class="btn pull-right hidden-sm-down btn-success">
            <i class="mdi mdi-plus-circle"></i>
            {{ trans('reasonsrequest::reasons.add_reason') }}
        </button>
    </div>
</div>	
@stop

@section('content')
	<div id="reasons" style="width: 99%;">
		<listreason :trans="{{ json_encode(trans('reasonsrequest::reasons')) }}" />
	</div>
@stop

@section('javascripts')
	<script src="{{ asset('vendor/codificar/reasons-request/reasons.vue.js') }}"> </script>
@stop