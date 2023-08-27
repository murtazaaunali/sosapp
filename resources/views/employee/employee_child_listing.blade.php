@extends('employee.layout.master')
@section('title', 'Child List - Success On The Spectrum')
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>All childs List</h3>
						</div>
					</div>
					<div class="row rowpd-lr-12 col-pd-7">
						<div class="col-md-12" id="tab-contact">
							@if (session('success'))
							<div class="alert alert-success alert-dismissable ">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		     					<strong> {{ session('success') }} </strong>
							</div>
							@endif
							<div class="datatable-box">
				                <table id="childList" class="datatable table table-striped table-bordered table-hover">
				                  <thead>
				                    <tr>
				                      <td class="text-left">Child Name</td>
				                      <td class="text-left">Crew</td>
				                      <td class="text-center">Date Of Birth</td>
				                      <td class="text-center">Joined At</td>
				                      <td class="text-center">Status</td>
				                      <td class="text-center">Action</td>
				                    </tr>
				                  </thead>
				                </table>
				            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    var table = $('#childList').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/employee/employee-child-list') }}",
        columns: [
        	{ data: 'childname', name: 'childname', searchable: true, "orderable": true },
        	{ data: 'crew', name: 'crew', searchable: true, "orderable": true },
        	{ data: 'date_of_birth', name: 'date_of_birth', searchable: true },
        	{ data: 'created_at', name: 'created_at', searchable: false },
        	{ data: 'status', name: 'status', searchable: false },
        	{ data: 'action', name: 'action', searchable: false }
        ]
    });
</script>
@endsection
