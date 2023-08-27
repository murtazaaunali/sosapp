@extends('employee.layout.master')
@section('title', 'Thread Listing - Success On The Spectrum')
@section('content')
<div class="row">
	<style>
	.customcss .o-page__content .container-fluid .row.rowpd-lr-8 {
    	padding: 23px 158px 0 8px;
	}
	</style>
	<div class="col-xl-12">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>All Parent Threads</h3>
						</div>
					</div>
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
							<div class="card-box table-box datatable-box">
	                            <button type="button" class="btn btn-success waves-effect w-md waves-light pull-right add-employee-btn" data-toggle="modal" data-target="#addthread">Create New Thread</button>

	                            <table id="employeelist" class="datatable table table-striped table-bordered">
	                                <thead>
	                                    <tr>
	                                        <th>Name</th>
                                            <th>Parent name</th>
	                                        <th>Created by</th>
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
		</div>
	</div>
</div>

<div class="c-modal modal fade" id="addthread" tabindex="-1" role="dialog" aria-labelledby="addSchedule">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="c-card u-p-medium u-mh-auto" style="max-width:100%;">
                <div class="text-center">
                    <h3>Add New Thread</h3>
                </div>
                <div class="editForm">
                    <form id="EmployeeForm" action="{{ url('/employee/addthread') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="faranchise_id" value="{!! $employee_detail['faranchise_id'] !!}">
                        <input type="hidden" name="employee_id" value="{!! $CurrentUser['id'] !!}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="c-field">
                                    <label class="c-field__label" for="thread_name">Thread Name</label> 
                                    <input class="c-input" type="text" id="thread_name" name="thread_name" autocomplete="off" required> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="c-field">
                                    <label class="c-field__label" style="padding-top: 30px;" for="parent_name">Parent Name</label>
                                    <input class="c-input" type="text" id="parent_name" name="parent_name" autocomplete="off" required>
                                    <input type="hidden" name="parent" />
                                    <div id="parentList"></div>
                                </div>
                            </div>
                        </div>
                        <button class="c-btn c-btn--info" type="submit" style="width: 100%;">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"><!--
$(document).ready(function(){
    $('input[name=\'parent_name\']').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         $.ajax({
          url:'{!! url('/employee/autocomplete') !!}/'+query,
          method:"GET",
          dataType: 'json',
          success:function(data){
            jQuery('#parentList').fadeIn();  
            jQuery('#parentList').html(data.result);
          }
         });
        }
    });

    jQuery(document).on('click', '.clients_names', function(){  
        $('input[name=\'parent_name\']').val( $(this).text() );
        $('input[name=\'parent\']').val( $(this).attr('data-client-id') );  
        $('#parentList').fadeOut();  
    });  
});
//--></script> 

<script type="text/javascript">
    var table = $('#employeelist').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/employee/threadlist') }}/{!! $employee_detail['faranchise_id'] !!}/{!! $CurrentUser['id'] !!}",
        columns: [
        	{ data: 'name', name: 'name', searchable: true, "orderable": true },
            { data: 'parent_name', name: 'parent_name', searchable: true, "orderable": true },
        	{ data: 'created_by', name: 'created_by', searchable: true, "orderable": true },
        	{ data: 'created_at', name: 'created_at', searchable: true, "orderable": true },
        	{ data: 'action', name: 'action', searchable: false }
        ]
    });
    
    </script>
@endsection
