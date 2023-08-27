@extends('employee.layout.master')
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
									<input type="hidden" name="employee_id" value="<?php echo $Employee_id; ?>" />
									<div class="row">
										<div class="col-md-12">
											<label>Document Type:</label>
											<select class="form-control docs" name="doctype" >
												<option value="">Please select document type</option>
												<option value="Offer Letter">Offer Letter</option>
												<option value="Drug and Alcohol Consent Form">Drug and Alcohol Consent Form</option>
												<option value="Consent For Background Check">Consent For Background Check</option>
												<option value="Background Check Results">Background Check Results</option>
												<option value="Hipaa Agreement">Hipaa Agreement</option>
												<option value="Responsibility to SOS Company Property">Responsibility to SOS Company Property</option>
												<option value="Notice of Workers Comp">Notice of Workers Comp</option>
												<option value="W-4">W-4</option>
												<option value="I-9">I-9</option>
												<option value="Direct Deposit Form">Direct Deposit Form</option>

												<option value="Employee Handbook Agreement">Employee Handbook Agreement</option>
												<option value="Drivers License">Drivers License</option>
												<option value="CPR Certification">CPR Certification</option>
											</select>
											<input type="file" class="form-control" name="file" multiple />
										</div>
										<div class="col-md-12 expiry"></div>
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
					@if(count($Documents) > 0) 
						@foreach ($Documents as $Document)
						<li>
							<?php
							$url = Storage::url($Document->Src); 
							?>
							<a href="{{ $url }}" class="document" data-toggle="tooltip" title="{{ $Document->Type }}" target="_blank" data-path="{{ $Document->Src }}">
							<div class="fancyBox">
								<div class="fileBox">
									@if($Document->FileType == 'pdf')
									<i class="x-pdf pdf"></i>
									@endif
								</div>
								<p>{{ str_limit($Document->Type, $limit = 25, $end = '...') }}</p>
							</div>
							</a>
						</li>
						@endforeach
					@endif
				</ul>
			</div>
			<!-- <div class="fileRow">
				<ul>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-ppt ppt"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-doc doc"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-xlsx xlsx"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-ppt ppt"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-doc doc"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-xlsx xlsx"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-ppt ppt"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-doc doc"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-xlsx xlsx"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-ppt ppt"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-doc doc"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-xlsx xlsx"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-ppt ppt"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-doc doc"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
				</ul>
			</div> -->
			<br><br><br>
		</div>
	</div>
</div>
@endsection
