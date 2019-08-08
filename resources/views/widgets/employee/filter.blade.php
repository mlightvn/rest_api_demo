<div class="card">
	<div class="card-header">Filter</div>
	<div class="card-body">
		{!!Form::model($employee)!!}
		<div class="row">
			<div class="col-md-3">{{Form::text("id", null, ["class"=>"form-control"])}}</div>
			<div class="col-md-3">{{Form::text("firstname", null, ["class"=>"form-control"])}}</div>
			<div class="col-md-3">{{Form::text("lastname", null, ["class"=>"form-control"])}}</div>
		</div>
		{!!Form::close()!!}
	</div>
	<div class="card-footer text-right"><button type="button" class="btn btn-primary search">Search</button></div>
</div>