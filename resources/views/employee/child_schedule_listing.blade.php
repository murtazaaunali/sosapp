@extends('employee.layout.master')
@section('title', 'Schedule Listing - Success On The Spectrum')
@section('content')
<div class="row">
	<style>
	.customcss .o-page__content .container-fluid .row.rowpd-lr-8 {
    	padding: 23px 158px 0 8px;
	}
    /*.table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
        font-size: 12px;
    }
    .table-bordered>tbody>tr>td {
        font-size: 12px;
    }*/
    #childlist_length{
        float: left;
    }
    #childlist_filter{
        float: right;
    }
    #unchildlist_length{
        float: left;
    }
    #unchildlist_filter{
        float: right;
    }
    .customcss .o-page__content .container-fluid .c-modal .c-modal__dialog .modal-content .editForm {
        width: 80%; 
        margin: auto;
    }
    .text-center h3 {
        color: #2499f1;
        font-size: 1.25em;
        font-weight: 700;
        margin-bottom: 15px;
        padding: 5px 0;
    }
	</style>
	<div class="col-xl-12">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<div class="row">
						<div class="col-md-12">
                            <h3>Scheduled Childs List</h3>
							<div class="card-box table-box datatable-box">
	                            <table id="childlist" class="datatable table table-striped table-bordered">
	                                <thead>
	                                    <tr>
	                                        <th>S.no</th>
                                            <th>Child Name</th>
	                                        <th class="text-center">Action</th>
	                                    </tr>
	                                </thead>
	                            </table>
                    		</div>
						</div>
                        <br>
                        <br>
                        <div class="col-md-12" style="margin-top: 50px;">
                            <h3>Unscheduled Childs List</h3>
                            <div class="card-box table-box datatable-box">
                                <table id="unchildlist" class="datatable table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Child Name</th>
                                            <th class="text-center">Action</th>
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
    var table = $('#childlist').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/employee/scheduledchildlist') }}/{!! $faranchise_id !!}/{!! $class_name !!}",
        columns: [
        	{ data: 'id', name: 'id', searchable: true, "orderable": true, },
        	{ data: 'childname', name: 'childname', searchable: true , "orderable": true},
            { data: 'action', name: 'action', searchable: false }
        ]
    });
    
    var table = $('#unchildlist').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/employee/unscheduledchildlist') }}/{!! $faranchise_id !!}/{!! $class_name !!}",
        columns: [
            { data: 'id', name: 'id', searchable: true, "orderable": true, },
            { data: 'childname', name: 'childname', searchable: true , "orderable": true},
            { data: 'action', name: 'action', searchable: false }
        ]
    });
    
    </script>
@endsection
