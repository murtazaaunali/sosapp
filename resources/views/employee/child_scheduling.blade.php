@extends('employee.layout.master')
@section('title', 'Child Schedule - Success On The Spectrum')
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
                            <h3 style="font-size: 24px;">Scheduled List Of {!! $child_name !!}</h3>
							<div class="card-box table-box datatable-box">
	                            <a class="c-btn c-btn--info editPorBtn" data-toggle="modal" data-target="#addSchedule" href="#!">
                                    <i class="x-pencil u-mr-xsmall"></i> Add Schedule
                                </a>
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissable ">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong> {{ session('success') }} </strong>
                                </div>
                                @endif

                                <button id="button" class="btn btn-danger" style="position: absolute;margin-top: 35px;z-index: 99;">Bulk Remove</button>
	                            <table id="childlist" class="datatable table table-striped table-bordered">
	                                <thead>
	                                    <tr>
                                            <!-- <th></th> -->
	                                        <th>Date</th>
                                            <th>Day</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
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

<!-- Modal -->
<div class="c-modal modal fade" id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="addSchedule">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="c-card u-p-medium u-mh-auto" style="max-width:100%;">
                <div class="text-center">
                    <h3>Add New Schedule</h3>
                </div>
                <div class="editForm">
                    <form id="EmployeeForm" action="{{ url('/employee/addSchedule') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="faranchise_id" value="{!! $faranchise_id !!}">
                        <input type="hidden" name="class_name" value="{!! $class_name !!}">
                        <input type="hidden" name="child_id" value="{!! $child_id !!}">
                        <div class="errors text-center" style="display: none;color: RED;margin-top: 10px;margin-bottom: 10px;">
                        </div>
                        <div class="row days_row_date">
                            <div class="col-md-6">
                                <div class="c-field">
                                    <label class="c-field__label" for="schedule_start">Date Start</label> 
                                    <input class="c-input" type="date" id="schedule_start" name="schedule_start" value="{!! date('Y-m-d') !!}" required> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="c-field">
                                    <label class="c-field__label" for="schedule_end">Date End</label> 
                                    <input class="c-input" type="date" id="schedule_end" name="schedule_end" required> 
                                </div>
                            </div>
                        </div>
                        <div class="row days_row" data-day = "mon">
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" style="padding-top: 30px;" for="monday">Monday</label> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="mon_timein">Time in</label> 
                                    <input class="c-input" type="time"  id="mon_timein" name="mon_timein"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="mon_timeout">Time out</label> 
                                    <input class="c-input" type="time"  id="mon_timeout" name="mon_timeout"> 
                                </div>
                            </div>
                        </div>
                        <div class="row days_row" data-day = "tue">
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" style="padding-top: 30px;" for="tuesday">Tuesday</label> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="tue_timein">Time in</label> 
                                    <input class="c-input" type="time"  id="tue_timein" name="tue_timein"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="tue_timeout">Time out</label> 
                                    <input class="c-input" type="time" id="tue_timeout" name="tue_timeout"> 
                                </div>
                            </div>
                        </div>
                        <div class="row days_row" data-day = "wed">
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" style="padding-top: 30px;" for="wednesday">Wednesday</label> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="wed_timein">Time in</label> 
                                    <input class="c-input" type="time" id="wed_timein" name="wed_timein"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="wed_timeout">Time out</label> 
                                    <input class="c-input" type="time" id="wed_timeout" name="wed_timeout"> 
                                </div>
                            </div>
                        </div>
                        <div class="row days_row" data-day = "thurs">
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" style="padding-top: 30px;" for="thursday">Thursday</label> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="thurs_timein">Time in</label> 
                                    <input class="c-input" type="time" id="thurs_timein" name="thurs_timein"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="thurs_timeout">Time out</label> 
                                    <input class="c-input" type="time" id="thurs_timeout" name="thurs_timeout"> 
                                </div>
                            </div>
                        </div>
                        <div class="row days_row" data-day = "fri">
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" style="padding-top: 30px;" for="friday">Friday</label> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="fri_timein">Time in</label> 
                                    <input class="c-input" type="time" id="fri_timein" name="fri_timein"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="fri_timeout">Time out</label> 
                                    <input class="c-input" type="time" id="fri_timeout" name="fri_timeout"> 
                                </div>
                            </div>
                        </div>
                        <div class="row days_row" data-day = "sat">
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" style="padding-top: 30px;" for="saturday">Saturday</label> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="sat_timein">Time in</label> 
                                    <input class="c-input" type="time" id="sat_timein" name="sat_timein"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="sat_timeout">Time out</label> 
                                    <input class="c-input" type="time" id="sat_timeout" name="sat_timeout"> 
                                </div>
                            </div>
                        </div>
                        <div class="row days_row" data-day = "sun">
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" style="padding-top: 30px;" for="sunday">Sunday</label> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="sun_timein">Time in</label> 
                                    <input class="c-input" type="time" id="sun_timein" name="sun_timein"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-field">
                                    <label class="c-field__label" for="sun_timeout">Time out</label> 
                                    <input class="c-input" type="time" id="sun_timeout" name="sun_timeout"> 
                                </div>
                            </div>
                        </div>
                        <button class="c-btn c-btn--info" id="schedule_submit" type="button" style="width: 100%;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="EditModelWrapper">
</div>
<script>
    
    $(document).ready(function(){
        $(document).on('change', "#schedule_start", function(){
            var currentDate = "{!! date('Y-m-d') !!}";
            var startDate = $(this).val();
            if( startDate < currentDate ){
                $(this).val("");
                $(".errors").text("The Start date should not be less than current date.");
                $(".errors").show();
                $(".errors").fadeOut(5000);
            }
        });

        $(document).on('change', "#schedule_end", function(){
            var currentDate = "{!! date('Y-m-d') !!}";
            var endDate = $(this).val();
            
            if( endDate == currentDate ){
                $(this).val("");
                $(".errors").text("The End date should not be current date.");
                $(".errors").show();
                $(".errors").fadeOut(5000);
            }else if( endDate < currentDate ){
                $(this).val("");
                $(".errors").text("The End date should not be less than current date.");
                $(".errors").show();
                $(".errors").fadeOut(5000);
            }
        });

        $(document).on('click', "#schedule_submit", function(){
            var startDate = $("#schedule_start").val();
            var endDate = $("#schedule_end").val();
            var check = true;

            if( startDate == null || startDate == "" || endDate == null || endDate == "" ){
                $(".errors").text("Please enter Start and End Date.");
                $(".errors").show();
                $(".errors").fadeOut(5000);
            }else if( startDate == endDate ){
                $(".errors").text("The End date should not be Start date.");
                $(".errors").show();
                $(".errors").fadeOut(5000);
            }else if( endDate < startDate ){
                $(".errors").text("The End date should not be less than Start date.");
                $(".errors").show();
                $(".errors").fadeOut(5000);
            }else{
                $(".days_row").each(function(){
                    var day = $(this).data('day');
                    var name = "";

                    if( day == "mon" ){
                        name = "Monday";
                    }else if( day == "tue" ){
                        name = "Tuesday";
                    }else if( day == "wed" ){
                        name = "Wednesday";
                    }else if( day == "thurs" ){
                        name = "Thursday";
                    }else if( day == "fri" ){
                        name = "Friday";
                    }else if( day == "sat" ){
                        name = "Saturday";
                    }else if( day == "sun" ){
                        name = "Sunday";
                    }
                    
                    var timeIn = $( "#"+day+"_timein").val();
                    var timeOut = $( "#"+day+"_timeout").val();

                    if( timeIn != "" && timeOut != "" ){
                        if( timeIn >= timeOut ){
                            $(".errors").text("The Start Time should not be greater or equal with the End Time Of "+name );
                            $(".errors").show();
                            $(".errors").fadeOut(5000);

                            check = false;
                            return;
                        }
                    }
               });

                if( check ){
                    $('#EmployeeForm').submit();
                }
            } 
        });

    });

    var table = $('#childlist').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/employee/getChildSchedules') }}/{!! $faranchise_id !!}/{!! $class_name !!}/{!! $child_id !!}",
        columns: [
            //{ data: 'id', name: 'id', searchable: false, "orderable": false },
        	{ data: 'schedule', name: 'schedule', searchable: true, "orderable": true },
            { data: 'day', name: 'day', searchable: true , "orderable": true},
        	{ data: 'time_in', name: 'time_in', searchable: true , "orderable": true},
            { data: 'time_out', name: 'time_out', searchable: true , "orderable": true},
            { data: 'action', name: 'action', searchable: false }
        ],
        select: {
            style: 'multi'
        }
    });

    $('#button').click( function () {
        var records = table.rows('.selected').data();
        var temp = [];

        $.each( records, function( key, value ) {
            temp.push(value['id']);
        });

        if( temp.length > 0 ){
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover these Schedules!",
              icon: "warning",
              buttons: true,
              dangerMode: true
            })
            .then((willDelete) => {
              if (willDelete) {
                 $.ajax({
                    url: "{{ url('/employee/child_bulk_schedule') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        '_token': "{{csrf_token()}}",
                        'row_ids' : temp,
                    },
                    success: function(response){
                        if( response ){
                            swal({
                                title:"Congratulations!", 
                                text: "Schedule Deleted Successfully!", 
                                type:"success", 
                                timer:1000 
                            });
                            location.reload(true); 
                        }
                    }
                });
              }
            });
        }else{
            swal({
              title: "Alert",
              text: "Please Select the Records from table first!",
              icon: "warning",
              button: "Close",
            });
        }
        
    });

     $('#childlist tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
     });
    
    $(document).on('click', '.schedule-edit', function(){
        var faranchise_id = $(this).data('faranchise');
        var class_name = $(this).data('crew');
        var row_id = $(this).data('id');

        $.ajax({
            url: "{{ url('/employee/getSingleSchedule') }}",
            method: 'POST',
            dataType: 'json',
            data: {
                '_token': "{{csrf_token()}}",
                'faranchise_id' : faranchise_id,
                'class_name' : class_name,
                'row_id' : row_id
            },
            success: function(result){
                if(result){
                    $('#EditModelWrapper').empty();
                    var html = '';
                    html += '<div class="c-modal modal fade" id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="editSchedule">';
                        html += '<div class="c-modal__dialog modal-dialog" role="document">';
                            html += '<div class="modal-content">';
                                html += '<div class="c-card u-p-medium u-mh-auto" style="max-width:100%;">';
                                    html += '<div class="text-center">';
                                        html += '<h3>Edit Schedule</h3>';
                                    html += '</div>';
                                    html += '<div class="editForm">';
                                        html += '<form id="EmployeeForm" action="{{ url('/employee/editSchedule') }}" method="POST">';
                                            html += '<input type="hidden" name="_token" value="{{ csrf_token() }}" />';
                                            html += '<input type="hidden" name="row_id" value="'+result.result['id']+'">';
                                            html += '<input type="hidden" name="faranchise_id" value="'+result.result['faranchise_id']+'">';
                                            html += '<input type="hidden" name="class_name" value="'+result.result['class_name']+'">';
                                            html += '<input type="hidden" name="child_id" value="'+result.result['child_id']+'">';
                                            html += '<div class="c-field">';
                                                html += '<label class="c-field__label" for="schedule">Date</label> ';
                                                html += '<input class="c-input" type="date" id="schedule" name="schedule" value="'+result.result['schedule']+'">'; 
                                            html += '</div>';
                                            html += '<div class="c-field">';
                                                html += '<label class="c-field__label" for="timein">Time in</label>'; 
                                                html += '<input class="c-input" type="time" id="timein" name="timein" value="'+result.result['time_in']+'">'; 
                                            html += '</div>';
                                            html += '<div class="c-field">';
                                                html += '<label class="c-field__label" for="timeout">Time out</label>'; 
                                                html += '<input class="c-input" type="time" id="timeout" name="timeout" value="'+result.result['time_out']+'">'; 
                                            html += '</div>';
                                            html += '<button class="c-btn c-btn--info" type="submit" style="width: 100%;">Submit</button>';
                                        html += '</form>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';

                    $('#EditModelWrapper').append(html);

                    $("#editSchedule").modal();

                    }
                }
            });
        });
    </script>
@endsection
