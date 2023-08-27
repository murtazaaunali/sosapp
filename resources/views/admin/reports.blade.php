@extends('admin.layout.master')

@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox">
			<div class="titlerow">
				<h3>Reports</h3>
				<a class="c-btn c-btn--success editPorBtn right160" data-toggle="modal" data-target="#createRepo" href="#!">
					<i class="x-pencil u-mr-xsmall"></i> Create Report
				</a>
				<!-- Modal -->
				<div class="c-modal modal fade" id="createRepo" tabindex="-1" role="dialog" aria-labelledby="createRepo">
					<div class="c-modal__dialog modal-dialog" role="document">
						<div class="modal-content text-center">
							<div class="c-card u-p-medium u-mh-auto" style="max-width:590px;">
								<h3>Create Report</h3>
								<textarea class="c-textarea"></textarea>
								<button class="c-btn c-btn--info" data-dismiss="modal">Save Report</button>
							</div>
						</div>
					</div>
				</div>

				<a class="c-btn c-btn--info editPorBtn" data-toggle="modal" data-target="#uploadRepo" href="#!">
					<i class="x-upload u-mr-xsmall"></i> Upload Reports
				</a>
				<!-- Modal -->
				<div class="c-modal modal fade" id="uploadRepo" tabindex="-1" role="dialog" aria-labelledby="uploadRepo">
					<div class="c-modal__dialog modal-dialog" role="document">
						<div class="modal-content text-center">
							<div class="c-card u-p-medium u-mh-auto" style="max-width:590px;">
								<h3>Upload Reports</h3>
								<form action="/file-upload" class="dropzone" id="custom-dropzone" style="height:180px;">
									<div class="dz-message" data-dz-message>
										<i class="dz-icon fa fa-cloud-upload"></i>
										<span>Drag a file here or browse for a file to upload.</span>
									</div>
									<div class="fallback">
										<input name="file" type="file" multiple>
									</div>
								</form>
								<button class="c-btn c-btn--info" data-dismiss="modal">Upload</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="fileRow">
				<ul>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
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
								<i class="x-doc doc"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
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
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
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
								<i class="x-doc doc"></i>
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
								<i class="x-doc doc"></i>
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
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
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
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
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
								<i class="x-doc doc"></i>
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
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
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
								<i class="x-doc doc"></i>
							</div>
							<p>Behavioral <br>Communication</p>
						</div>
					</li>
					<li>
						<div class="fancyBox">
							<div class="fileBox">
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
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
								<i class="x-pdf pdf"></i>
							</div>
							<p>Initial Assessment <br>Semester - 1</p>
						</div>
					</li>
				</ul>
			</div><br><br><br>
		</div>
	</div>
</div>
@endsection
