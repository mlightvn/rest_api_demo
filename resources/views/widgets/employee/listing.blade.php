<div class="card">
	<div class="card-header">Search result</div>
	<div class="card-body">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Birthday</th>
					<th>Address</th>
					<th>Boss</th>
					<th>Salary</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="model in model_list">
					<td>@{{("00000"+model.id).slice(-6)}}</td>
					<td>@{{model.firstname}}</td>
					<td>@{{model.lastname}}</td>
					<td>@{{model.birthday}}</td>
					<td>@{{model.address}}</td>
					<td>@{{model.boss}}</td>
					<td align="right">@{{model.salary | currency : '&yen;': false}}</td>
					<td>
						<button class="btn btn-primary btn-sm" name="btn_edit" ng-click="edit(model.id)" data-toggle="modal" data-target="#edit_modal" data-id="@{{model.id}}"><i class="fas fa-pencil-alt"></i></button>
						<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal" data-id="@{{model.id}}" ng-click="deleteModelOpen(model.id)" ><i class="fas fa-trash"></i></button>
					</td>
				</tr>
				<tr ng-if="last_page == 0">
					<td colspan="100">Data does not exist.</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="card-footer"><list-pagination></list-pagination></div>
</div>

<!-- The Modal -->
<div class="modal fade" id="create_modal">
  <div class="modal-dialog">
    <div class="modal-content">
		<form id="create_form" action="/api/employee" method="post">
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
					<div class="col-md-9"><input type="text" name="lastname" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Birthday</div>
					<div class="col-md-9"><input type="date" name="birthday" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Address</div>
					<div class="col-md-9"><input type="text" name="address" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Boss</div>
					<div class="col-md-9"><input type="text" name="boss" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Salary</div>
					<div class="col-md-9"><input type="number" name="salary" class="form-control text-right"></div>
				</div>
			</div>
		</form>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-submit-modal" data-dismiss="modal" ng-click="store()">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="edit_modal">
  <div class="modal-dialog">
    <div class="modal-content">
		<form id="edit_form" action="/api/employee" method="post">
			@csrf
			<input type="hidden" name="id">
			<input type="hidden" name="_method" value="PUT">

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
					<div class="col-md-9"><input type="text" name="lastname" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Birthday</div>
					<div class="col-md-9"><input type="date" name="birthday" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Address</div>
					<div class="col-md-9"><input type="text" name="address" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Boss</div>
					<div class="col-md-9"><input type="text" name="boss" class="form-control"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Salary</div>
					<div class="col-md-9"><input type="number" name="salary" class="form-control text-right" min="0" step="1"></div>
				</div>
			</div>
		</form>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-submit-modal" data-dismiss="modal" ng-click="update()">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="delete_modal">
  <div class="modal-dialog">
    <div class="modal-content">
		@csrf
		<input type="hidden" name="id">
		<input type="hidden" name="_method" value="DELETE">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">Employee Delete </h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">Are you sure to delete?
		</div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-submit-modal" data-dismiss="modal" ng-click="delete()"><i class="fas fa-trash"></i> Delete</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
