@extends('client.layout.master') 
@section('title', 'Documents - Success On The Spectrum') 
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox">
			<div class="titlerow">
				<h3>Documents</h3>
				<a class="c-btn c-btn--info editPorBtn" data-toggle="modal" data-target="#uploadDoco" href="#!">
					<i class="x-upload u-mr-xsmall"></i> Upload Document
				</a>
				<!-- Modal -->
				<div class="c-modal modal fade" id="uploadDoco" tabindex="-1" role="dialog" aria-labelledby="uploadDoco">
					<div class="c-modal__dialog modal-dialog" role="document">
						<div class="modal-content text-center">
							<div class="c-card u-p-medium u-mh-auto" style="max-width:590px;">
								<h3>Upload Document</h3>
								@if (count($errors) > 0)
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
								@endif
								<form class="form-horizontal" id="UploadDoc" role="form" method="POST">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="alert alert-danger" style="display: none;"></div>
											<label>Document Type:</label>
											<select class="form-control" name="doctype">
												<option value="">Please select document type</option>
												<option value="Health Insurance Card">Scanned Health Insurance Card</option>
												<option value="Diagnosis Report from the Doctor">Diagnosis Report from the Doctor</option>
												<option value="Hippa Agreement Form">Hippa Agreement Form</option>
												<option value="Payment Consent">Payment Consent</option>
												<option value="Informed Consent for Services">Informed Consent for Services</option>
												<option value="Security System Waiver">Security System Waiver</option>
												<option value="Release of Liability">Release of Liability</option>
												<option value="Parent Handbook Agreement">Parent Handbook Agreement</option>
												<option value="Other">Other</option>
											</select>
											<input type="file" class="form-control" name="file" multiple />
										</div>
									</div>
									<button type="submit" class="c-btn c-btn--info">Upload</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="fileRow">
				<ul>
					@if(count($Documents) > 0) @foreach ($Documents as $Document)
					<li>
						<?php
							$url = Storage::url($Document->Src); 
							?>
							<a href="{{ $url }}" data-toggle="tooltip" title="{{ $Document->Type }}" target="_blank">
								<div class="fancyBox">
									<div class="fileBox">
										@if($Document->FileType == 'pdf')
										<i class="x-pdf pdf"></i> @endif
									</div>
									{{ str_limit($Document->Type, $limit = 12, $end = '...') }}
								</div>
							</a>
					</li>
					@endforeach @endif
				</ul>
			</div><br><br><br>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
	$('#UploadDoc').submit(function(event) {
		event.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			url: "{{ url('client/documents/upload') }}",
			type: 'POST',              
			data: formData,
			processData: false,
			contentType: false,
			success: function(result)
			{
				location.reload();
			},
			error: function(response)
			{
				console.log(response.responseJSON.errors.file[0]);
				$('.alert-danger').empty();
				$('.alert-danger').append(response.responseJSON.errors.file[0]);
				$('.alert-danger').fadeIn();
			}
		});
	});

</script>
@endsection