@extends('employee.layout.master')
@section('title', 'Parent Training - Success On The Spectrum')
@section('content')
<div class="row">
	<style type="text/css">
	.table>thead>tr>td {
	    font-size: 12px;
	}
	fieldset.for-panel {
    background-color: #fcfcfc;
	border: 1px solid #999;
	border-radius: 4px;	
	padding:15px 10px;
	background-color: #d9edf7;
    border-color: #bce8f1;
	background-color: #f9fdfd;
	margin-bottom:12px;
}
fieldset.for-panel legend {
    background-color: #fafafa;
    border: 1px solid #ddd;
    border-radius: 5px;
    color: #4381ba;
    font-size: 14px;
    font-weight: bold;
    line-height: 10px;
    margin: inherit;
    padding: 7px;
    width: auto;
	background-color: #d9edf7;
	margin-bottom: 0;
}
.M20{
	margin-top: 20px;
}
.modal-dialog {
    width: 720px;
    margin: 30px auto;
}
.W20{
	width: 20px;
}
.parent-note{
	float: right;
    border: 1px solid #333;
    border-radius: 4px;
    margin-right: 20px;
    padding: 4px 14px 4px 14px;
}
	</style>
	<div class="col-xl-12">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Parent Training Calls</h3>
							<button type="button" class="btn btn-success waves-effect w-md waves-light pull-right add-employee-btn" data-toggle="modal" data-target="#TrainingModal">Create New Discussion</button>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<fieldset class="for-panel">
					          <legend>CONTACT INFORMATION</legend>
					          <div class="row">
					            <div class="col-sm-6">
					              <div class="form-horizontal">               
					                  <label class="col-xs-5 control-label">Contact Name:</label>
					                  <p class="form-control-static"><?php echo (!empty($parent_record['FatherFirstName'])) ? $parent_record['FatherFirstName']." ".$parent_record['FatherLastName'] : ""; ?></p>               
					                  <label class="col-xs-5 control-label">Phone Number: </label>
					                  <p class="form-control-static"><?php echo (!empty($parent_record['FatherContactNo'])) ? $parent_record['FatherContactNo'] : ""; ?></p>
					                  <label class="col-xs-4 control-label">Address: </label>
					                  <p class="form-control-static"><?php echo (!empty($parent_record['Address'])) ? $parent_record['Address'] : ""; ?></p>
					              </div>
					            </div>
					            <div class="col-sm-6">
					              <div class="form-horizontal">               
					                               
					                  <label class="col-xs-4 control-label">City:</label>
					                  <p class="form-control-static"><?php echo (!empty($parent_record['City'])) ? $parent_record['City'] : ""; ?></p>              
					                  <label class="col-xs-4 control-label">State:</label>
					                  <p class="form-control-static"><?php echo (!empty($parent_record['State'])) ? $parent_record['State'] : ""; ?></p>           
					                  <label class="col-xs-4 control-label">Zip Code:</label>
					                  <p class="form-control-static"><?php echo (!empty($parent_record['PostalCode'])) ? $parent_record['PostalCode'] : ""; ?></p>            
					              </div>
					            </div>
					          </div>
					        </fieldset>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<?php if( !empty( $parent_training_notes ) ){ ?>
				            <?php foreach( $parent_training_notes as $parent_training_note ){ ?>
								<div class="table-responsive">
					                <table class="table table-striped table-bordered table-hover" style="margin: 0px auto;display: block;width: 70%;">
					                  <thead>
					                  	<tr>
					                      <td class="text-center" COLSPAN=3 BGCOLOR="#cfe2f3" style="font-size: 16px;"><strong><?php echo $parent_training_note->column_name; ?></strong>   Date: <?php echo date("m-d-Y", strtotime( $parent_training_note->training_date )); ?> <a href="javascript:void(0);" class="parent-note" data-id="<?php echo $parent_training_note->thread_row; ?>">Edit</a></td>
					                    </tr>
					                  </thead>
					                  <tbody>
					                  	<?php $records = json_decode( $parent_training_note->column_value ); ?>

					                  	<?php foreach( $records as $record ){ ?>
					                  		 <tr>
							                    <td class="text-left W20" BGCOLOR="#cfe2f3"><?php echo $record->title; ?></td>
						                      	<td class="text-left"><?php echo $record->notes; ?></td>
					                    	</tr>
					                  	<?php } ?>
					                  </tbody>
					                </table>
					            </div>
							<?php 
		                		} 
		            		} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="c-modal modal fade" id="TrainingModal" tabindex="-1" role="dialog" aria-labelledby="TrainingModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="c-card u-p-medium u-mh-auto" style="max-width:100%;">
                <div class="text-center">
                    <h3>Add New Tranining Discussion</h3>
                </div>
                <div class="editForm">
                    <form id="TrainingFrom" action="{{ url('/employee/addDiscussion') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="training_id" value="{!! $training_id !!}">
                        <div class="row M20">
                            <div class="col-md-12">
                                <div class="c-field">
                                    <label class="c-field__label" for="discussion_title">Discussion Title</label> 
                                    <input class="c-input" type="text" id="discussion_title" name="discussion_title"> 
                                </div>
                            </div>
                        </div>
                        <div class="row M20">
                            <div class="col-md-12">
                                <div class="c-field">
                                    <label class="c-field__label" for="training_date">Discussion Date</label> 
                                    <input class="c-input" type="date" id="training_date" name="training_date"> 
                                </div>
                            </div> 
                        </div> 
                        <div class="row M20">
							<div class="col-md-12" id="tab-contact">
								<div class="table-responsive">
				                <table id="contact" class="table table-striped table-bordered table-hover">
				                  <thead>
				                    <tr>
				                      <td class="text-left">Actor Titles</td>
				                      <td class="text-left">Notes</td>
				                      <td></td>
				                    </tr>
				                  </thead>
				                  <tbody>
				                    	<tr id="attribute-row0">
						                    <td class="text-left W20">
						                      	<input type="text" name="discussion_notes[0][title]" placeholder="" class="form-control" /></td>
					                      	<td class="text-left">
					                          <input type="text" name="discussion_notes[0][notes]" value="" placeholder="" class="form-control"/></td>
						                    <td class="text-center">
						                    	<button type="button" onclick="$('#attribute-row0').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
						                    </td>
				                    	</tr>
				                  </tbody>
				                  <tfoot>
				                    <tr>
				                      <td colspan="7"></td>
				                      <td class="text-center"><button type="button" onclick="addAttribute();" data-toggle="tooltip" title="Add" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
				                    </tr>

				                  </tfoot>

				                </table>
				              </div>
							</div>
                       	 </div>
                       	 <div class="text-center">
                       		 <button class="c-btn c-btn--info" type="submit" style="width: 80%;">Save</button>
                       	 </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="EditModelWrapper">
</div>
<script type="text/javascript">
	var attribute_row = 1;

	function addAttribute() {

	    html  = '<tr id="attribute-row' + attribute_row + '">';

		html += '  <td class="text-left W20"><input type="text" name="discussion_notes[' + attribute_row + '][title]" value="" placeholder="" class="form-control" /></td>';

		html += '  <td class="text-left W20">';
		html += '<input type="text" name="discussion_notes[' + attribute_row + '][notes]" value="" class="form-control" />';
		html += '  </td>';

		html += '  <td class="text-center"><button type="button" onclick="$(\'#attribute-row' + attribute_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';

	    html += '</tr>';

		$('#contact tbody').append(html);

		attribute_row++;
	}

	$(document).on('click', '.parent-note', function(){
        var row_id = $(this).data('id');
    
        $.ajax({
            url: "{{ url('/employee/getSingleNote') }}",
            method: 'POST',
            dataType: 'json',
            data: {
                '_token': "{{csrf_token()}}",
                'row_id' : row_id,
            },
            success: function(result){
            	console.log(result);
                if(result){
                    $('#EditModelWrapper').empty();
                    var html = '';
                    html += '<div class="c-modal modal fade" id="editNote" tabindex="-1" role="dialog" aria-labelledby="editNote">';
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
                                            html += '<button class="c-btn c-btn--info" type="submit" style="width: 100%;">Submit</button>';
                                        html += '</form>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';

                    $('#EditModelWrapper').append(html);

                    $("#editNote").modal();

                    }
                }
            });
        });
</script>
@endsection
