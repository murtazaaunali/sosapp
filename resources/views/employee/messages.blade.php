@extends('employee.layout.master')
@section('title', 'Messages - Success On The Spectrum')

@section('header_scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection
@section('content')
<div class="c-messanger">
	<div class="messRow">
		<div class="col-sm-4 u-p-zero">
			<div class="height-38 u-p-small u-border-bottom u-border-right"></div>
		</div>
		<div class="col-sm-8 u-p-zero">
			<div class="height-38 u-flex u-align-items-center u-border-bottom"></div>
		</div>
	</div>
	<div id="app" class="messRow">
        <sos-chat :user="{{ auth()->user() }}"></sos-chat>
	</div><!-- // .row -->
</div><!-- // .row -->
@endsection
@section('customjs')
@endsection
