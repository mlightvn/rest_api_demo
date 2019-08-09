@extends('layouts.master')

@section("title", "Employees")

@section('content')
	<div class="container" ng-app="myApp" ng-controller="myCtrl" ng-init='load()'>
		<div class="row">
			<div class="col-lg-12">
				@widget('Employee\Filter', ["list" => $list])
			</div>
		</div>
		<div class="row">
			&nbsp;
		</div>
		<div class="row">
			<div class="col-lg-12">
				<button class="btn btn-primary" data-toggle="modal" data-target="#create_modal" data-id=""><i class="fas fa-plus"></i></button>
			</div>
		</div>
		<div class="row">
			&nbsp;
		</div>
		<div class="row">
			<div class="col-lg-12">
				@widget('Employee\Listing', ["list" => $list])
			</div>
		</div>
	</div>

@endsection

@section('scripts')
@parent
<script src="/js/employee/index.js"></script>
@stop
