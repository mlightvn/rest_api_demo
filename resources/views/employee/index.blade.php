@extends('layouts.master')

@section("title", "Employees")

@section('content')
	<div class="container">
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
				<a href="/employee/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
<script src="/js/product/common.js"></script>
@stop
