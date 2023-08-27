@extends('employee.layout.master')
@section('title', 'Employee Listing - Success On The Spectrum')
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox">
			<div class="titlerow">
				<h3>List Of Employees</h3>
				<a href="{{ url('/employee/add-employee') }}" class="c-btn c-btn--info editPorBtn">Add Employee</a>
				@if (session('success'))
					<div class="alert alert-success alert-dismissable ">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     					<strong> {{ session('success') }} </strong>
					</div>
				@endif
			</div>
			<div class="c-content">
				<div class="card-box table-box datatable-box">
					<table id="employeelist" class="datatable table table-striped table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Employee Name</th>
								<th>Job Title</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    var table = $('#employeelist').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/employee/employeelist') }}",
        columns: [
        	{ data: 'id', name: 'id', searchable: true, "orderable": true },
        	{ data: 'name', name: 'name', searchable: true, "orderable": true },
        	{ data: 'job_title', name: 'job_title', searchable: true, "orderable": true },
        	{ data: 'created_at', name: 'created_at', searchable: false, "orderable": true },
        	{ data: 'action', name: 'action', searchable: false }
        ],
        search: {
        "regex": true
    	}
    });
    </script>
@endsection