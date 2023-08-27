@extends('employee.layout.master')
@section('title', 'Child Schedule - Success On The Spectrum')
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
							<h3>List Of Classes</h3>
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
						<div class="col-md-6">
							<div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th style="width:30%">Classes</th>
                                        <th style="width:13%" class="text-center">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="width:30%">Ocean</td>
                                        <td style="width:13%" class="text-center"><a href="{{ url('/employee/class-schedule') }}/{!! $faranchise_id !!}/ocean" class="btn btn-default waves-effect" target="_blank">View Schedule</a></td>
                                      </tr>
                                      <tr>
                                        <td style="width:30%">Voyagers</td>
                                        <td style="width:13%" class="text-center"><a href="{{ url('/employee/class-schedule') }}/{!! $faranchise_id !!}/voyagers" class="btn btn-default waves-effect" target="_blank">View Schedule</a></td>
                                      </tr>
                                      <tr>
                                        <td style="width:30%">Sailor</td>
                                        <td style="width:13%" class="text-center"><a href="{{ url('/employee/class-schedule') }}/{!! $faranchise_id !!}/sailor" class="btn btn-default waves-effect" target="_blank">View Schedule</a></td>
                                      </tr>
                                      <tr>
                                        <td style="width:30%">Captain</td>
                                        <td style="width:13%" class="text-center"><a href="{{ url('/employee/class-schedule') }}/{!! $faranchise_id !!}/captain" class="btn btn-default waves-effect" target="_blank">View Schedule</a></td>
                                      </tr>
                                    </tbody>
                    		</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
