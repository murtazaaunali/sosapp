@extends('franchisee.layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<div id="Error-Response"></div>
			<div id="Success-Response"></div>
			<form action="{{ route('franchisee.addEmployee') }}" method="post" id="add-employee" name="add-employee" autocomplete="off">
				{{ csrf_field() }}
				<input type="text" name="first_name" placeholder="First Name" /><br />
				<input type="text" name="last_name" placeholder="Last Name" /><br />
				<input type="text" name="email" placeholder="E-Mail Address" /><br />
				<input type="password" name="password" placeholder="Password" /><br />
				<input type="password" name="password_confirmation" placeholder="Confirmed Password" /><br />
				<select name="employee_type">
					<option value="teacher">Teacher</option>
					<option value="analyst">Analyst</option>
					<option value="crew">Crew</option>
					<option value="manager">Manager</option>
				</select>
				<button type="submit" >Add Employee</button>
			</form>
        </div>
    </div>
</div>
@endsection


@section('customjs')
<script src="{{ URL::asset('js/jquery-v3/jquery-3.3.1.min.js') }}"></script>
<script>
jQuery(function() {
	jQuery('#add-employee').on('submit',function (e) {
		e.preventDefault();
		jQuery.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		jQuery.ajax({
			url: "{{ route('franchisee.addEmployee') }}",
			method: 'post',
			data: $('#add-employee').serialize(),
			success: function (data) {
				jQuery('#Error-Response').html('');
				console.log(data);
				if(data.errors) {
					jQuery.each(data.errors, function (key, value) {
						jQuery('#Error-Response').append('<p>' + value + '</p>');
					});
                } 
				if(data.success){
					jQuery.each(data.success, function (key, value) {
						jQuery('#Success-Response').append('<p>' + value + '</p>');
					});
                }

			}
		});
	});
});
</script>
@endsection