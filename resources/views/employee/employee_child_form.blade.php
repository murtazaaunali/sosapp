@extends('employee.layout.master')
@section('title', 'Child Form - Success On The Spectrum')
@section('content')
<div class="row">
	<div class="col-xl-6">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Create New Child</h3>
							<small>Create a new parent if its not in the below list</small>
						</div>
					</div>
					@if (isset($errors_child))
					    <div class="alert alert-danger">
					    	<strong>Whoops!</strong> There were some problems with your input.
					        <ul>
					            @foreach ($errors as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

					@if (session('success'))
					<div class="alert alert-success alert-dismissable ">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     					<strong> {{ session('success') }} </strong>
					</div>
					@endif
							
					<form id="EmployeeForm" action="{{ url('/employee/addchild') }}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="faranchise_id" value="<?php echo ( isset($EmployeeProfileInfo->faranchise_id) ) ? $EmployeeProfileInfo->faranchise_id : '1'; ?>" />
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="childname">Child Name</label> 
								<input class="c-input" type="text" id="childname" name="childname" value="<?php echo ( isset($child->childname) ) ? $child->childname : ''; ?>" placeholder="Child Name" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="date_of_birth">Child Date of Birth</label> 
								<input class="c-input" type="date" name="date_of_birth" value="<?php echo( isset($child->date_of_birth) ) ? $child->date_of_birth : ''; ?>" id="date_of_birth" > 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="crew">Crew</label> 
								<select class="c-input form-control" id="crew" value="<?php echo ( isset($child->crew) ) ? $child->crew : ''; ?>" name="crew" required>
								    <option value="ocean">Ocean</option>
								    <option value="voyagers">Voyagers</option>
								    <option value="sailor">Sailor</option>
								    <option value="captain">Captain</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<?php 
									if( isset($child->parent) ){
										$name = "Father :".$parent->FatherFirstName." ".$parent->FatherLastName." Mother :".$parent->MotherFirstName." ".$parent->MotherLastName;
									}
								?>
								<label class="c-field__label" for="parent">Assign Custodial Parent</label>
								<input type="text" class="c-input"  name="parent_name" value="<?php echo ( isset($parent->FatherFirstName) ) ? $name : ''; ?>" autocomplete="off" required />
                				<input type="hidden" name="parent" value="<?php echo ( isset($child->parent) ) ? $child->parent : ''; ?>" />
                				<div id="parentList">
    							</div>
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="status">Status</label> 
								<select class="c-input form-control" id="status" value="<?php echo ( isset($child->status) ) ? $child->status : ''; ?>" name="status" required>
								    <option value="1">active</option>
								    <option value="2">inactive</option>
								    <option value="3">applicant</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="date_of_initial_assessment">Date Of Initial Assessment</label> 
								<input class="c-input" type="date" id="date_of_initial_assessment" value="<?php echo ( isset($child->date_of_initial_assessment) ) ? $child->date_of_initial_assessment : ''; ?>" name="date_of_initial_assessment"> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="date_that_service_started">Date That Service Started</label> 
								<input class="c-input" type="date" id="date_that_service_started" value="<?php echo ( isset($child->date_that_service_started) ) ? $child->date_that_service_started : ''; ?>" name="date_that_service_started" > 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="date_of_repeat_assessment">Date Of Repeat Assessment</label> 
								<input class="c-input" type="date" id="date_of_repeat_assessment" value="<?php echo ( isset($child->date_of_repeat_assessment) ) ? $child->date_of_repeat_assessment : ''; ?>" name="date_of_repeat_assessment" > 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="form-group">
							    <label for="profilePicture">Profile Picture</label>
							    <input type="file" class="form-control-file" name="profilepicture" id="profilePicture">
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7" style="margin-top: 20px;">
						<?php echo $action; ?>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent-two">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Create New Parent</h3>
						</div>
					</div>
					<form id="EmployeeParentForm" action="{{ url('/employee/addparent') }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="faranchise_id" value="<?php echo ( isset($EmployeeProfileInfo->faranchise_id) ) ? $EmployeeProfileInfo->faranchise_id : '1'; ?>" />
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="fatherfirstname">Father First Name</label> 
								<input class="c-input" type="text" id="fatherfirstname" name="fatherfirstname" placeholder="Child Name" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="motherfirstname">Mother First Name</label> 
								<input class="c-input" type="text" id="motherfirstname" name="motherfirstname" required> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="fatherrlastname">Father Last Name</label> 
								<input class="c-input" type="text" name="fatherlastname" id="fatherlastname" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="motherlastname">Mother Last Name</label> 
								<input class="c-input" type="text" name="motherlastname" id="motherlastname" required> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="fatherdob">Father DOB</label> 
								<input class="c-input" type="date" id="fatherdob" name="fatherdob" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="motherdob">Mother DOB</label> 
								<input class="c-input" type="date" id="motherdob" name="motherdob" required> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="fatherphone">Father Phone</label> 
								<input class="c-input" type="text" name="fatherphone" id="fatherphone" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="motherphone">Mother Phone</label> 
								<input class="c-input" type="text" id="motherphone" name="motherphone" required> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="fatherssn">Father SSN</label> 
								<input class="c-input" type="text" name="fatherssn" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="motherssn">Mother SSN</label> 
								<input class="c-input" type="text" name="motherssn" required> 
							</div>
						</div>
					</div>		
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="fathercompany">Father Company</label> 
								<input class="c-input" type="text" name="fathercompany" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="mothercompany">Mother Company</label> 
								<input class="c-input" type="text" name="mothercompany" required> 
							</div>
						</div>	
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="fatheremail">Father Email</label> 
								<input class="c-input" type="email" id="fatheremail" name="fatheremail" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="motheremail">Mother Email</label> 
								<input class="c-input" type="email" name="motheremail" required> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="address">Address</label> 
								<input class="c-input" type="text" id="address" name="address" placeholder="Address" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="city">City</label> 
								<input class="c-input" type="text" id="city" name="city" required> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="state">State</label> 
								<input class="c-input" type="text" name="state" required> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="c-field">
								<label class="c-field__label" for="postal">Postal Code</label> 
								<input class="c-input" type="text" name="postal" required> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7" style="margin-top: 20px;">
						<button type="submit" class="btn btn-success">save parent</button>
					</div>			
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
        var faranchise_id = "<?php echo ( isset($EmployeeProfileInfo->faranchise_id) ) ? $EmployeeProfileInfo->faranchise_id : '1'; ?>";
        if(query != '')
        {
         $.ajax({
          url:'{!! url('/employee/autocomplete') !!}/'+faranchise_id+'/'+query,
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
@endsection
