@extends('employee.layout.master')
@section('title', 'Employee Form - Success On The Spectrum')
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Employee Information</h3>
						</div>
					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					    	<strong>Whoops!</strong> There were some problems with your input.
					        <ul>
					            @foreach ($errors as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

					<form id="EmployeeForm" action="<?php echo ( isset($formURL) ) ? $formURL : '/employee/addemployee'; ?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="faranchise_id" value="<?php echo ( isset($EmployeeProfileInfo->faranchise_id) ) ? $EmployeeProfileInfo->faranchise_id : $record->faranchise_id; ?>" />

					<?php 
						if( isset( $record ) ){ ?>
							<input type="hidden" name="employee_id" value="<?php echo $record->employee_id; ?>" />
					<?php	}
					?>

					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="firstName">First Name</label> 
								<input class="c-input" type="text" id="firstName" name="firstname" placeholder="First Name" value = "<?php echo ( isset($record->firstname) ) ? $record->firstname : ""; ?>" required> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Middle Name</label> 
								<input class="c-input" type="text" name="middlename" id="middleName" value = "<?php echo ( isset($record->middlename) ) ? $record->middlename : ""; ?>"placeholder="(Optional)"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Last Name</label> 
								<input class="c-input" type="text" name="lastname" id="lastName" placeholder="Last Name" value = "<?php echo ( isset($record->lastname) ) ? $record->lastname : ""; ?>" required"> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="dateOfBirth">Date Of Birth</label> 
								<input class="c-input" type="date" name="dob" id="dateOfBirth" placeholder="Date Of Birth" value = "<?php echo ( isset($record->dob) ) ? $record->dob : ""; ?>" required> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="jobTitle">Job Title</label> 
								<input class="c-input" type="text" name="job_title" id="jobTitle" placeholder="Job Title" value = "<?php echo ( isset($record->job_title) ) ? $record->job_title : ""; ?>" required> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="crew"">Crew</label>
								<select class="c-input form-control" id="crew" name="crew" required>
								    <option value="ocean" <?php echo ( isset($record->crew) && $record->crew == 'ocean') ? 'selected' : ""; ?> >Ocean</option>
								    <option value="voyagers" <?php echo ( isset($record->crew) && $record->crew == 'voyagers') ? 'selected' : ""; ?> >Voyagers</option>
								    <option value="sailor" <?php echo ( isset($record->crew) && $record->crew == 'sailor') ? 'selected' : ""; ?> >Sailor</option>
								    <option value="captain" <?php echo ( isset($record->crew) && $record->crew == 'captain') ? 'selected' : ""; ?> >Captain</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="status">Status</label> 
								<select class="c-input form-control" id="status" name="status" required>
								    <option value="1" <?php echo ( isset($record->status) && $record->status == '1') ? 'selected' : ""; ?> >active</option>
								    <option value="2" <?php echo ( isset($record->status) && $record->status == '2') ? 'selected' : ""; ?> >inactive</option>
								    <option value="3" <?php echo ( isset($record->status) && $record->status == '3') ? 'selected' : ""; ?> >applicant</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="dateemploymentStarted">Date Employment Started</label> 
								<input class="c-input" type="date" id="dateemploymentStarted" name="dateemploymentStarted" value = "<?php echo ( isset($record->dateemploymentStarted)) ? $record->dateemploymentStarted : ""; ?>" placeholder="Date Employment Started"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="dateprobation">Date That Probation Day Complete</label> 
								<input class="c-input" type="date" id="dateprobation" name="dateprobation" placeholder="Date That Probation Day Complete" value = "<?php echo ( isset($record->dateprobation)) ? $record->dateprobation : ""; ?>"> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="initialPayrate">Initial Payrate</label> 
								<input class="c-input" type="number" step="any" id="initialPayrate" name="initalpayrate" placeholder="Initial Payrate" value = "<?php echo ( isset($record->initalpayrate)) ? $record->initalpayrate : ""; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="currentPayrate">Current Payrate</label> 
								<input class="c-input" type="number" step="any" id="currentPayrate" name="currentpayrate" placeholder="Current Payrate" value = "<?php echo ( isset($record->currentpayrate)) ? $record->currentpayrate : ""; ?>"> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="insuranceplan">Company health insurance plan deduction</label> 
								<input class="c-input" type="text" id="insuranceplan" name="insuranceplan" placeholder="Company health insurance plan deduction" value = "<?php echo ( isset($record->insuranceplan) ) ? $record->insuranceplan : ""; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="retirementplan">Company retirement plan deduction</label> 
								<input class="c-input" type="text" id="retirementplan" name="retirementplan" placeholder="Company retirement plan deduction" value = "<?php echo ( isset($record->retirementplan) ) ? $record->retirementplan : ""; ?>"> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="allowedpaidvacations">Hours of allowed paid vacation per year</label> 
								<input class="c-input" type="text" id="allowedpaidvacations" name="allowedpaidvacations" placeholder="200" value = "<?php echo ( isset($record->allowedpaidvacations) ) ? $record->allowedpaidvacations : ""; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="remainingpaidbalance">balance of paid vacation remaining</label> 
								<input class="c-input" type="text" id="remainingpaidbalance" name="remainingpaidbalance" placeholder="150" value = "<?php echo ( isset($record->remainingpaidbalance) ) ? $record->remainingpaidbalance : ""; ?>"> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="sickdaysallowed">Sick days allowed per year</label> 
								<input class="c-input" type="text" id="sickdaysallowed" name="sickdaysallowed" placeholder="200" value = "<?php echo ( isset($record->sickdaysallowed) ) ? $record->sickdaysallowed : ""; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="balancesickdays">Balance of sick days remaining</label> 
								<input class="c-input" type="text" id="balancesickdays" name="balancesickdays" placeholder="150" value = "<?php echo ( isset($record->balancesickdays) ) ? $record->balancesickdays : ""; ?>"> 
							</div>
						</div>
					</div>
					<?php if(!isset($record)){ ?>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="email">Employee Email</label> 
								<input class="c-input" type="email" id="email" name="email" placeholder="email@gmail.com" value = "<?php echo ( isset($records->email) ) ? $records->email : ''; ?>" autocomplete="off"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="password">Employee Password</label> 
								<input class="c-input" type="password" id="password" name="password" placeholder="xyz!@$" value = "<?php echo ( isset($records->password) ) ? $records->password : ''; ?>"> 
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="form-group">
							    <label for="profilePicture">Profile Picture</label>
							    <input type="file" class="form-control-file" name="profilepicture" id="profilePicture">
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7" style="margin-top: 20px;">
						<button type="submit" class="c-btn c-btn--info" value="submit" name="submit"> <?php echo ( isset($record) ) ? 'Edit Profile' : 'Add Employee'; ?></button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
