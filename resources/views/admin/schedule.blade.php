@extends('admin.layout.master')

@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox style1">
			<div class="titlerow1">
				<h3>Schedule</h3>
				<a class="c-btn c-btn--info editPorBtn" href="#!"><i class="x-pencil u-mr-xsmall"></i> Create Event</a>
			</div>
			<div class="fc-header">
				<h2 class="fc-header-title">Schedule</h2>
			</div>
			<div class="js-calendar u-mb-large"></div>
		</div>
	</div>
</div>
@endsection
