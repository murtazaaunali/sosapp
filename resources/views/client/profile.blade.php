@extends('client.layout.master') 
@section('title', 'Dashboard - Success On The Spectrum') 
@section('content')
<div class="row">
	<div class="col-xl-4">
		<div class="c-card clientBox u-mb-medium">
			<div class="u-text-center avatarSec">
				<div class="c-avatar u-inline-flex">
					<img class="c-avatar__img" src="../img/avatar.jpg" alt="">
				</div>
				<h3>{{ $CurrentUser->name ?? '' }}</h3>
				<p>{{ $CurrentUser->email ?? '' }}</p>
				<span class="active">Active</span>
			</div>
			<div class="rowBorder">
				<?php
							$date_joined = date("d F, Y", strtotime($CurrentUser->created_at));
							?>
					<strong>Member Since  {{ $date_joined ?? '' }}</strong>
			</div>
			<h4>Notifications</h4>
			<div class="c-feed">
				<div class="c-feed__item c-feed__item--red">
					<p class="c-feed__title"><strong>New Report Submitted</strong></p>
					<p class="c-feed__comment">lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis</p>
				</div>
				<div class="c-feed__item c-feed__item--success">
					<p class="c-feed__title">New training uploaded - <strong>Importance of Home Schooling</strong></p>
				</div>
				<div class="c-feed__item c-feed__item--info">
					<p class="c-feed__title">Document pending</p>
				</div>
				<div class="c-feed__item c-feed__item--fancy">
					<p class="c-feed__title">Schedule updated</p>
				</div>
				<div class="c-feed__item c-feed__item--red">
					<p class="c-feed__title"><strong>New Report Submitted</strong></p>
					<p class="c-feed__comment">lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis</p>
				</div>
				<div class="c-feed__item c-feed__item--success">
					<p class="c-feed__title">New training uploaded - <strong>Importance of Home Schooling</strong></p>
				</div>
				<div class="c-feed__item c-feed__item--info">
					<p class="c-feed__title">Document pending</p>
				</div>
				<div class="c-feed__item c-feed__item--fancy">
					<p class="c-feed__title">Schedule updated</p>
				</div>
				<div class="c-feed__item c-feed__item--success">
					<p class="c-feed__title">New training uploaded - <strong>Importance of Home Schooling</strong></p>
				</div>
				<div class="c-feed__item c-feed__item--info">
					<p class="c-feed__title">Document pending</p>
				</div>
				<div class="c-feed__item c-feed__item--fancy">
					<p class="c-feed__title">Schedule updated</p>
				</div>
			</div>
			<!-- // .c-feed -->
		</div>
	</div>
	<div class="col-xl-8">
		<div class="tabBox">
			<ul class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
				<li><a class="c-tabs__link active" id="nav-clientdetails-tab" data-toggle="tab" href="#nav-clientdetails" role="tab" aria-controls="nav-clientdetails"
					 aria-selected="true">Client’s Details</a></li>
				<li><a class="c-tabs__link" id="nav-contactdetails-tab" data-toggle="tab" href="#nav-contactdetails" role="tab" aria-controls="nav-contactdetails"
					 aria-selected="false">Contact Details</a></li>
				<li><a class="c-tabs__link" id="nav-diagnosis-tab" data-toggle="tab" href="#nav-diagnosis" role="tab" aria-controls="nav-diagnosis"
					 aria-selected="false">Diagnosis</a></li>
				<li><a class="c-tabs__link u-hidden-down@tablet" id="nav-medicalhistory-tab" data-toggle="tab" href="#nav-medicalhistory"
					 role="tab" aria-controls="nav-medicalhistory" aria-selected="false">Medical History</a></li>
				<li><a class="c-tabs__link u-hidden-down@tablet" id="nav-schoolinfo-tab" data-toggle="tab" href="#nav-schoolinfo" role="tab"
					 aria-controls="nav-schoolinfo" aria-selected="false">School Info</a></li>
			</ul>
			<div class="c-tabs__content tab-content u-mb-large" id="nav-tabContent">
				{{-- Client Details Section --}}
				<div class="c-tabs__pane active u-pb-medium" id="nav-clientdetails" role="tabpanel" aria-labelledby="nav-clientdetails-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Client’s Details</h3>
							{{-- <a class="c-btn c-btn--info editPorBtn" data-toggle="modal" data-target="#editProfile" href="#!"><i class="x-pencil u-mr-xsmall"></i> Edit Profile</a>							--}} @foreach ($Children as $Child)
							<div class="row rowpd-lr-8 col-pd-7">
								<div class="col-md-4">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Child’s Name</label>
										<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ ucfirst($Child->childname)  ?? ''}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Child’s Date of Birth</label>
										<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $Child->date_of_birth  ?? ''}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Custodial Parent’s Address</label>
										<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $ClientProfile->FatherAddress ?? ''}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Crew</label>
										<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ ucfirst($Child->crew)  ?? ''}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Status</label>
										<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $Child->status  ?? ''}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Date of Initial Assessment</label>
										<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $Child->date_of_initial_assessment  ?? ''}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Date Services Started</label>
										<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $Child->date_that_service_started  ?? ''}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Date of Repeat Assessment</label>
										<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $Child->date_of_repeat_assessment  ?? ''}}">
									</div>
								</div>
								{{-- /Children Data --}}
							</div>
							<span class="c-divider u-mv-medium"></span> @endforeach
						</div>
					</div>
				</div>
				{{-- Client Details Section --}}
				<div class="c-tabs__pane u-pb-medium" id="nav-contactdetails" role="tabpanel" aria-labelledby="nav-contactdetails-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Contact Details</h3>
							<a class="c-btn c-btn--info editPorBtn" href="#!"><i class="x-pencil u-mr-xsmall"></i> Edit Profile</a>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="firstName">Father First Name</label>
								<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $ClientProfile->FatherFirstName  ?? ''}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Father Last Name</label>
								<input class="c-input" type="text" id="lastName" readonly value="{{ $ClientProfile->FatherLastName  ?? ''}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Father DOB</label>
								<input class="c-input" type="text" id="middleName" readonly value="{{ $ClientProfile->FatherDOB ?? '' }}">
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="firstName">Father Phone</label>
								<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $ClientProfile->FatherContactNo  ?? ''}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Father Address</label>
								<input class="c-input" type="text" id="lastName" readonly value="{{ $ClientProfile->FatherAddress  ?? ''}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Father SSN</label>
								<input class="c-input" type="text" id="middleName" readonly value="{{ $ClientProfile->FatherSSN ?? '' }}">
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="firstName">Mother First Name</label>
								<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $ClientProfile->MotherFirstName ?? '' }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Mother Last Name</label>
								<input class="c-input" type="text" id="lastName" readonly value="{{ $ClientProfile->MotherLastName ?? '' }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Mother DOB</label>
								<input class="c-input" type="text" id="middleName" readonly value="{{ $ClientProfile->MotherDOB ?? '' }}">
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="firstName">Mother Phone</label>
								<input class="c-input" type="text" id="firstName" placeholder="First Name" readonly value="{{ $ClientProfile->MotherContactNo  ?? ''}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Mother Address</label>
								<input class="c-input" type="text" id="lastName" readonly value="{{ $ClientProfile->MotherAddress  ?? ''}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="lastName">Mother SSN</label>
								<input class="c-input" type="text" id="middleName" readonly value="{{ $ClientProfile->MotherSSN ?? '' }}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="pull-right">
								<a class="c-btn c-btn--info " data-toggle="modal" data-target="#addAssignedPickup" href="#!"><i class="x-pencil u-mr-xsmall"></i> Add Assigned Pickups</a>
							</div>
							<h3>Assigned Pickup(s)</h3>
						</div>
					</div>
					<span class="c-divider u-mv-medium"></span> @foreach ($Pickups as $pickup)
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="assignedCrew">Name</label>
								<input class="c-input" type="text" id="assignedCrew" value="{{ $pickup->name }}" readonly>
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="assignedCrew1">Addresss</label>
								<input class="c-input" type="text" id="assignedCrew1" readonly value="{{ $pickup->address }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="assignedCrew2">Phone</label>
								<input class="c-input" type="text" id="assignedCrew2" readonly value="{{ $pickup->phone }}">
							</div>
						</div>
					</div>
					<div class="row rowpd-lr-8 col-pd-7">
						<div class="col-md-4">
							<div class="c-field">
								<label class="c-field__label" for="assignedCrew3">SSN</label>
								<input class="c-input" type="text" id="assignedCrew3" readonly value="{{ $pickup->ssn }}">
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4"></div>

					</div>
					<div class="row">
						<div class="col-md-12">
							<a class="c-btn c-btn--info pull-right" href="{{ $pickup->delete_url }}"><i class="x-pencil u-mr-xsmall"></i> Delete</a>
							<a class="c-btn c-btn--info pull-right" href="{{ $pickup->edit_url }}"><i class="x-pencil u-mr-xsmall"></i> Edit</a>

						</div>
					</div>
					<span class="c-divider u-mv-medium"></span> @endforeach
				</div>
				<div class="c-tabs__pane u-pb-medium" id="nav-diagnosis" role="tabpanel" aria-labelledby="nav-diagnosis-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Diagnosis</h3>
							<a class="c-btn c-btn--info editPorBtn" href="#!">
                                                <i class="x-pencil u-mr-xsmall"></i> Edit Profile
                                            </a>
						</div>
					</div>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo incidunt exercitationem
						nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum in, nam.</p>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt quod, est veniam,
						earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti in!</p>
				</div>
				<div class="c-tabs__pane u-pb-medium" id="nav-medicalhistory" role="tabpanel" aria-labelledby="nav-medicalhistory-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Medical History</h3>
							<a class="c-btn c-btn--info editPorBtn" href="#!">
                                                <i class="x-pencil u-mr-xsmall"></i> Edit Profile
                                            </a>
						</div>
					</div>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo incidunt exercitationem
						nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum in, nam.</p>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt quod, est veniam,
						earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti in!</p>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt quod, est veniam,
						earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti in!</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo incidunt exercitationem
						nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum in, nam.</p>
				</div>
				<div class="c-tabs__pane u-pb-medium" id="nav-schoolinfo" role="tabpanel" aria-labelledby="nav-schoolinfo-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>School Info</h3>
							<a class="c-btn c-btn--info editPorBtn" href="#!">
                                                <i class="x-pencil u-mr-xsmall"></i> Edit Profile
                                            </a>
						</div>
					</div>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo incidunt exercitationem
						nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum in, nam.</p>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt quod, est veniam,
						earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti in!</p>
					<p class="u-mb-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate nobis tenetur mollitia incidunt quod, est veniam,
						earum nemo! Alias rerum saepe aut sapiente minus sunt doloribus tempora corrupti in!</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem modi atque at aliquid expedita nemo incidunt exercitationem
						nihil sit. Laudantium suscipit id amet saepe ratione, accusamus. Voluptatum in, nam.</p>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Modals --}}
<div class="c-modal modal fade" id="addAssignedPickup" tabindex="-1" role="dialog" aria-labelledby="addAssignedPickup">
	<div class="c-modal__dialog modal-dialog" role="document">
		<div class="modal-content">
			<div class="c-card u-p-medium u-mh-auto" style="max-width:300px;">
				<h3>Add Assigned Pickup</h3>
				<form id="addAssignedPickup" method="POST" action="{{ url('client/profile/addassignedpickup')}}">
					{{ csrf_field() }}
					<div class="editForm">
						<div class="c-field">
							<label class="c-field__label" for="firstName">Name</label>
							<input class="c-input" type="text" id="name" name="name" placeholder="Name">
						</div>
						<div class="c-field">
							<label class="c-field__label" for="lastName">Address</label>
							<input class="c-input" type="text" id="address" name="address" placeholder="Address">
						</div>
						<div class="c-field">
							<label class="c-field__label" for="lastName">Phone</label>
							<input class="c-input" type="text" id="phone" name="phone" placeholder="Phone">
						</div>
						<div class="c-field">
							<label class="c-field__label" for="dateOfBirth">SSN</label>
							<input class="c-input" type="text" id="ssn" name="ssn" placeholder="Social Security Number">
						</div>
						<button class="c-btn c-btn--info" type="submit">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- /Modals --}} {{-- Javascript PUSH --}}
<script>
	$(document).on('submit', 'form#addAssignedPickup', function (event) {
	event.preventDefault();
	var form = $(this);
	var data = new FormData($(this)[0]);
	var url = form.attr("action");
	$.ajax({
		type: form.attr('method'),
		url: url,
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(result)
		{
		  console.log(result);
		  if(result === 'true') {
			 location.reload();
		  }
		},
		error: function(data)
		{
		  console.log(data);
		}
	});
	return false;
});

</script>
{{-- /Javascript PUSH --}}
@endsection