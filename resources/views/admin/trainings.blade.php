@extends('admin.layout.master')

@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox">
			<div class="titlerow mg_bot7">
				<h3>Video Resources</h3>
				<a class="c-btn c-btn--info editPorBtn" data-toggle="modal" data-target="#uploadReso" href="#!"><i class="x-upload u-mr-xsmall"></i> Upload Resources</a>
				<!-- Modal -->
				<div class="c-modal modal fade" id="uploadReso" tabindex="-1" role="dialog" aria-labelledby="uploadReso">
					<div class="c-modal__dialog modal-dialog" role="document">
						<div class="modal-content text-center">
							<div class="c-card u-p-medium u-mh-auto" style="max-width:590px;">
								<h3>Upload Resources</h3>
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
			<div class="videoRow">
				<div class="row col-pd-7">
					<div class="col-md-3">
						<div class="fancyBox">
							<div class="videoBox">
								<img src="../img/videoimg.jpg" alt="">
							</div>
							<p>How to communicate better with teenagers.</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="fancyBox">
							<div class="videoBox">
								<img src="../img/videoimg.jpg" alt="">
							</div>
							<p>How to communicate better with teenagers.</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="fancyBox">
							<div class="videoBox">
								<img src="../img/videoimg.jpg" alt="">
							</div>
							<p>How to communicate better with teenagers.</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="fancyBox">
							<div class="videoBox">
								<img src="../img/videoimg.jpg" alt="">
							</div>
							<p>How to communicate better with teenagers.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="titlerow mg_bot7">
				<h3>Document Resources</h3>
			</div>
			<div class="fileRow">
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
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
