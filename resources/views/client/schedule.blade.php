@extends('client.layout.master') 
@section('title', 'Schedule - Success On The Spectrum') 
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox style1">
			<h3>Schedule</h3>
			<div class="fc-header">
				<h2 class="fc-header-title">Schedule</h2>
			</div>
			<div id="calendar-schedule" class="u-mb-large"></div>

		</div>
	</div>
</div>
{!! $calendar->script() !!}
@endsection