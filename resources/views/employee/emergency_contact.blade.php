@extends('employee.layout.master')
@section('title', 'Emergency Contact - Success On The Spectrum')
@section('content')
<div class="row">
	<style type="text/css">
	.table>thead>tr>td {
	    font-size: 12px;
	}
	</style>
	<div class="col-xl-12">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Emergency Contacts</h3>
						</div>
					</div>
					<form id="EmployeeForm" action="{{ url('/employee/employee-emergency-contact-store') }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<div class="row rowpd-lr-12 col-pd-7">
						<div class="col-md-12" id="tab-contact">
							<div class="table-responsive">
			                <table id="contact" class="table table-striped table-bordered table-hover">
			                  <thead>
			                    <tr>
			                      <td class="text-left">Employees name</td>
			                      <td class="text-left">Phone</td>
			                      <td class="text-left">Address</td>
			                      <td class="text-left">Email</td>
			                      <td class="text-left">Emergency Contact's Name</td>
			                      <td class="text-left">Phone</td>
			                      <td class="text-left">Email</td>
			                      <td></td>
			                    </tr>
			                  </thead>

			                  <tbody>
			                  	
			                  	<?php 
			                  	$attribute_row = 0;
			                  	if (!empty($rows) ){
			                  	foreach( $rows as $row ) { 
			                  	?>
			                    	<tr id="attribute-row<?php echo $attribute_row; ?>">

				                    <td class="text-left">
				                      	<input type="text" name="emergency_contact[<?php echo $attribute_row; ?>][employee_name]" value="<?php echo $row->employee_name ?>" placeholder="" class="form-control" /></td>

			                      	<td class="text-left">
			                          <input type="text" name="emergency_contact[<?php echo $attribute_row; ?>][employee_phone]" value="<?php echo $row->employee_phone ?>" placeholder="" class="form-control"/></td>

			                        <td class="text-left">
				                      	<input type="text" name="emergency_contact[<?php echo $attribute_row; ?>][employee_address]" value="<?php echo $row->employee_address ?>" placeholder="" class="form-control" /></td>

				                    <td class="text-left">
				                      	<input type="email" name="emergency_contact[<?php echo $attribute_row; ?>][employee_email]" value="<?php echo $row->employee_email ?>" placeholder="" class="form-control" /></td>

				                    <td class="text-left">
				                      	<input type="text" name="emergency_contact[<?php echo $attribute_row; ?>][employee_emergency_name]" value="<?php echo $row->employee_emergency_name ?>" placeholder="" class="form-control" /></td>

				                    <td class="text-left">
				                      	<input type="text" name="emergency_contact[<?php echo $attribute_row; ?>][employee_emergency_phone]" value="<?php echo $row->employee_emergency_phone ?>" placeholder="" class="form-control" /></td>

				                    <td class="text-left">
				                      	<input type="email" name="emergency_contact[<?php echo $attribute_row; ?>][employee_emergency_email]" value="<?php echo $row->employee_emergency_email ?>" placeholder="" class="form-control" /></td>

				                    <td class="text-center"><button type="button" onclick="$('#attribute-row<?php echo $attribute_row; ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
			                    	</tr>
			                    <?php $attribute_row++; ?>
			                    <?php } } ?>
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
					<div class="row rowpd-lr-8 col-pd-7" style="margin-top: 20px;">
						<button type="submit" class="c-btn c-btn--info" value="submit" name="submit">Save</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var attribute_row = <?php echo $attribute_row; ?>;

	function addAttribute() {

	    html  = '<tr id="attribute-row' + attribute_row + '">';

		html += '  <td class="text-left"><input type="text" name="emergency_contact[' + attribute_row + '][employee_name]" value="" placeholder="" class="form-control" /></td>';

		html += '  <td class="text-left">';
		html += '<input type="text" name="emergency_contact[' + attribute_row + '][employee_phone]" value="" class="form-control" />';
		html += '  </td>';

		html += '  <td class="text-left">';
		html += '<input type="text" name="emergency_contact[' + attribute_row + '][employee_address]" value="" class="form-control" />';
		html += '  </td>';

		html += '  <td class="text-left">';
		html += '<input type="text" name="emergency_contact[' + attribute_row + '][employee_email]" value="" class="form-control" />';
		html += '  </td>';

		html += '  <td class="text-left">';
		html += '<input type="text" name="emergency_contact[' + attribute_row + '][employee_emergency_name]" value="" class="form-control" />';
		html += '  </td>';

		html += '  <td class="text-left">';
		html += '<input type="text" name="emergency_contact[' + attribute_row + '][employee_emergency_phone]" value="" class="form-control" />';
		html += '  </td>';

		html += '  <td class="text-left">';
		html += '<input type="text" name="emergency_contact[' + attribute_row + '][employee_emergency_email]" value="" class="form-control" />';
		html += '  </td>';

		html += '  <td class="text-center"><button type="button" onclick="$(\'#attribute-row' + attribute_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';

	    html += '</tr>';

		$('#contact tbody').append(html);

		attribute_row++;
	}
</script>
@endsection
