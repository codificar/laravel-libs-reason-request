@extends('layout.master')

@section('breadcrumbs')
<div class="row page-titles">
	<div class="col-md-6 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">{{ trans('reasonsrequest::reasons.setting') }}</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
			<li class="breadcrumb-item active">{{ trans('reasonsrequest::reasons.setting') }}</li>
		</ol>
	</div>
</div>	
@stop

@section('content')
	<div id="reasons" style="width: 99%;">
		<setting
            :trans="{{ json_encode(trans('reasonsrequest::reasons')) }}"
            edit="{{ $setting ? $setting : '' }}"
        />
	</div>
@stop

@section('javascripts')
	<script src="{{ elixir('vendor/codificar/reasons-request/reasons.vue.js') }}"> </script>
@stop
