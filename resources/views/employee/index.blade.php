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
				<button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal" data-id=""><i class="fas fa-plus"></i></button>
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

<!-- The Modal -->
<div class="modal fade" id="edit_modal">
  <div class="modal-dialog">
    <div class="modal-content">
		<form id="edit_form" action="/api/employee/create" method="post">
			@csrf
			<input type="hidden" name="id">
			<input type="hidden" name="_method" value="POST">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Employee Create/Edit </h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3">Firstname</div>
					<div class="col-md-9"><input type="text" name="firstname" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Lastname</div>
					<div class="col-md-9"><input type="text" name="Lastname" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Birthday</div>
					<div class="col-md-9"><input type="date" name="dirthday" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Address</div>
					<div class="col-md-9"><input type="text" name="Address" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Boss</div>
					<div class="col-md-9"><input type="text" name="Boss" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Salary</div>
					<div class="col-md-9"><input type="number" name="salary" class="form-control text-right"></div>
				</div>
			</div>
		</form>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-submit-modal" data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@section('scripts')
@parent
<script src="/js/employee/index.js"></script>
@stop
