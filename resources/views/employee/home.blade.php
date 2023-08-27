@extends('employee.layout.master')
@section('title', 'Home - Success On The Spectrum')
@section('content')
<div class="row">
	<div class="col-xl-4">
		<div class="c-card clientBox u-mb-medium">
			<div class="u-text-center avatarSec">
				<div class="c-avatar u-inline-flex">
					<img class="c-avatar__img" src="{{ URL::asset('employee_images/'.$EmployeeData->picture) }}" alt="">
				</div>
				<h3><?php echo ( isset($EmployeeData->name) ) ? $EmployeeData->name : ""; ?></h3>
				<p><?php echo ( isset($EmployeeData->email) ) ? $EmployeeData->email : ""; ?></p>
				<span class="active"><?php echo ( isset($EmployeeData->status) && $EmployeeData->status == 1 ) ? "Active" : "Inactive"; ?></span>
			</div>
			<div class="rowBorder">
				<?php
					$date_joined = date("d F, Y", strtotime($EmployeeData->created_at));
				?>
				<strong>Member Since  <?php echo ( isset($date_joined) ) ? $date_joined : ""; ?></strong>
			</div>
			<h4>Notifications</h4>
			<div class="c-feed">
				<div class="c-feed__item c-feed__item--red">
					<p class="c-feed__title"><strong>New Report Submitted</strong></p>
					<p class="c-feed__comment">lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
				</div>
				<div class="c-feed__item c-feed__item--success">
					<p class="c-feed__title"><span>New training uploaded - </span><strong>Importance of Home Schooling</strong></p>
				</div>
				<div class="c-feed__item c-feed__item--info">
					<p class="c-feed__title"><span>Document pending</span></p>
				</div>
				<div class="c-feed__item c-feed__item--fancy">
					<p class="c-feed__title"><span>Schedule updated</span></p>
				</div>
				<div class="c-feed__item c-feed__item--red">
					<p class="c-feed__title"><strong>New Report Submitted</strong></p>
					<p class="c-feed__comment">lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
				</div>
				<div class="c-feed__item c-feed__item--success">
					<p class="c-feed__title"><span>New training uploaded - </span><strong>Importance of Home Schooling</strong></p>
				</div>
				<div class="c-feed__item c-feed__item--info">
					<p class="c-feed__title"><span>Document pending</span></p>
				</div>
				<div class="c-feed__item c-feed__item--fancy">
					<p class="c-feed__title"><span>Schedule updated</span></p>
				</div>
				<div class="c-feed__item c-feed__item--success">
					<p class="c-feed__title"><span>New training uploaded - </span><strong>Importance of Home Schooling</strong></p>
				</div>
				<div class="c-feed__item c-feed__item--info">
					<p class="c-feed__title">Document pending</p>
				</div>
				<div class="c-feed__item c-feed__item--fancy">
					<p class="c-feed__title"><span>Schedule updated</span></p>
				</div>
			</div><!-- // .c-feed -->
		</div>
	</div>
	<div class="col-xl-8">
		<div class="tabBox">
			<ul class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
				<li><a class="c-tabs__link active" id="nav-information-tab" data-toggle="tab" href="#nav-information" role="tab" aria-controls="nav-information" aria-selected="true">Information</a></li>
				<li><a class="c-tabs__link" id="nav-contactdetails-tab" data-toggle="tab" href="#nav-contactdetails" role="tab" aria-controls="nav-contactdetails" aria-selected="false">Contact Details</a></li>
				<li><a class="c-tabs__link" id="nav-employmentDetails-tab" data-toggle="tab" href="#nav-employmentDetails" role="tab" aria-controls="nav-employmentDetails" aria-selected="false">Employment Details</a></li>
			</ul>
			<a class="c-btn c-btn--info editPorBtn" href="javascript:void(0);">
				Save Profile
			</a>
			<div class="c-tabs__content tab-content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Information</h3>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="firstName">First Name</label> 
								<input class="c-input" type="text" id="firstName" placeholder="First Name" value="<?php echo ( isset($EmployeeProfile->firstname) ) ? $EmployeeProfile->firstname : ''; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Middle Name</label> 
								<input class="c-input" type="text" id="middleName" placeholder="(Optional)" value="<?php echo ( isset($EmployeeProfile->middlename) ) ? $EmployeeProfile->middlename : ''; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Last Name</label> 
								<input class="c-input" type="text" id="lastName" placeholder="Last Name" value="<?php echo ( isset($EmployeeProfile->lastname) ) ? $EmployeeProfile->lastname : ''; ?>"> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="dateOfBirth">Date Of Birth</label> 
								<input class="c-input" type="text" id="dateOfBirth" placeholder="Date Of Birth" value="<?php echo ( isset($EmployeeProfile->dob) ) ? $EmployeeProfile->dob : ''; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="jobTitle">Job Title</label> 
								<input class="c-input" type="text" id="jobTitle" placeholder="Job Title" value="<?php echo ( isset($EmployeeProfile->job_title) ) ? $EmployeeProfile->job_title : ''; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="joiningDate">Joining Date</label> 
								<input class="c-input" type="text" id="joiningDate" placeholder="Joining Date" value="<?php echo ( isset($EmployeeData->created_at) ) ? $EmployeeData->created_at : ''; ?>"> 
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="initialPayrate">Initial Payrate</label> 
								<input class="c-input" type="text" id="initialPayrate" placeholder="Initial Payrate" value="<?php echo ( isset($EmployeeProfile->initalpayrate) ) ? $EmployeeProfile->initalpayrate : ''; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="currentPayrate">Current Payrate</label> 
								<input class="c-input" type="text" id="currentPayrate" placeholder="Current Payrate" value="<?php echo ( isset($EmployeeProfile->currentpayrate) ) ? $EmployeeProfile->currentpayrate : ''; ?>"> 
							</div>
						</div>
						<div class="col-md-4">
						</div>
					</div>
				</div>
				<div class="c-tabs__pane u-pb-medium" id="nav-contactdetails" role="tabpanel" aria-labelledby="nav-contactdetails-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Contact Details</h3>
						</div>
					</div>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo incidunt exercitationem nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum in, nam.</p>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt quod, est veniam, earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti in!</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea distinctio nostrum molestias assumenda, repudiandae consequuntur quae pariatur aut incidunt placeat doloremque doloribus! Recusandae nostrum dolore repudiandae libero mollitia, rem eveniet.</p>
				</div>
				<div class="c-tabs__pane u-pb-medium" id="nav-employmentDetails" role="tabpanel" aria-labelledby="nav-employmentDetails-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Employment Details</h3>
						</div>
					</div>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo incidunt exercitationem nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum in, nam.</p>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt quod, est veniam, earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti in!</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
