<div class="card">
	<div class="card-header">Search result</div>
	<div class="card-body">
		<table class="table table-hover">
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
					<td>@{{model.id}}</td>
					<td>@{{model.firstname}}</td>
					<td>@{{model.lastname}}</td>
					<td>@{{model.birthday}}</td>
					<td>@{{model.address}}</td>
					<td>@{{model.boss}}</td>
					<td>@{{model.salary | currency:0}}</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="card-footer"></div>
</div>