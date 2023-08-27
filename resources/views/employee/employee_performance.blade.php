@extends('employee.layout.master')
@section('title', 'Employee Performance - Success On The Spectrum')
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Employee Performance</h3>
						</div>
					</div>
					<div class="row rowpd-lr-12 col-pd-7">
						<div class="col-md-12" id="tab-contact">
						<div class="datatable-box">
			                <table id="contact" class="datatable table table-striped table-bordered table-hover">
			                  <thead>
			                    <tr>
			                      <td class="text-left">Employees name</td>
			                      <td class="text-left">Email</td>
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
    var table = $('#contact').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/employee/employee-performance-list') }}",
        columns: [
        	{ data: 'name', name: 'name', searchable: true, "orderable": true },
        	{ data: 'email', name: 'email', searchable: true, "orderable": true },
        	{ data: 'action', name: 'action', searchable: false }
        ]
    });
</script>
@endsection
