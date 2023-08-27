@extends('admin.layout.master') 
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4">
				<ul class="list-group">
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Franchise: </strong></span> {{$Franchise->name}} </li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Status: </strong></span> {{$Franchise->status}} </li>
					<li class="list-group-item text-left"><span class="pull-left"><strong class="">Address: </strong></span><br> {{$Franchise->Address}} </li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Date Opened: </strong></span> {{ date("d F, Y", strtotime($Franchise->DateOpened))
						}}
					</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">No. of Clients: </strong></span>{{$Franchise->Clients or '0'}}</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">No. of Employees: </strong></span>{{$Franchise->Employees or '0'}}</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Date FDD Signed: </strong></span>{{ date("d F, Y", strtotime($Franchise->DateFDDSigned))
						}}
					</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Date FDD Expires: </strong></span>{{ date("d F, Y", strtotime($Franchise->DateFDDExpiry))
						}}
					</li>
					<li class="list-group-item text-muted" contenteditable="false">Contact Details</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Phone Number: </strong></span>{{$Franchise->BusinessPhone or '0'}}</li>
					<li class="list-group-item text-right"><span class="pull-left"><strong class="">Email: </strong></span>{{$Franchise->BusinessEmail or '0'}}</li>
				</ul>
			</div>
			<div class="col-md-8" style="" contenteditable="false">
				<div class="panel panel-default target">
					<div class="panel-heading"><b>Owner Details</b></div>
					<div class="panel-body">
						<div class="row clearfix">
							@if($Owners) @foreach ($Owners[0]->franchisees as $Owner)
							<div class="col-md-6 column">
								<ul class="list-group">
									<li class="list-group-item text-right"><span class="pull-left"><strong class="">Franchise: </strong></span> {{$Owner->name or ' '}} </li>
									<li class="list-group-item text-right"><span class="pull-left"><strong class="">Status: </strong></span> {{$Owner->status or ' '}} </li>
									<li class="list-group-item text-left"><span class="pull-left"><strong class="">Address: </strong></span><br> {{$Owner->Address or ' '}} </li>
									<li class="list-group-item text-right"><span class="pull-left"><strong class="">Business NPI: </strong></span>{{$Owner->BusinessNPI or '0'}}</li>
									<li class="list-group-item text-right"><span class="pull-left"><strong class="">Phone Number: </strong></span>{{$Owner->BusinessPhone or '0'}}</li>
									<li class="list-group-item text-right"><span class="pull-left"><strong class="">Email: </strong></span>{{$Owner->BusinessEmail or '0'}}</li>
									<li class="list-group-item text-right"><span class="pull-left"><strong class="">Email: </strong></span>{{$Owner->BusinessFax or '0'}}</li>
								</ul>
							</div>
							@endforeach @endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="c-whitebox">
					<div class="titlerow">
						<h3>Task</h3>
						<a class="c-btn c-btn--success editPorBtn right160" data-toggle="modal" data-target="#newtask" href="#!"><i class="x-plus u-mr-xsmall"></i> New Task </a>
						<!-- Modal -->
						<div class="c-modal modal fade" id="newtask" tabindex="-1" role="dialog" aria-labelledby="newtask">
							<div class="c-modal__dialog modal-dialog" role="document">
								<div class="modal-content">
									<div class="c-card u-p-medium u-mh-auto" style="max-width:410px;">
										<h3>Assign New Task</h3>
										<div class="editForm">
											<form method="POST" enctype="multipart/form-data" id="TaskForm" action="{{ url('admin/franchise/addtask') }}">
												{{ csrf_field() }}
												<input type="hidden" name="id" value="{{$Franchise->id}}">
												<div class="c-field">
													<label class="c-field__label" for="firstName">Title</label>
													<input class="c-input ht_39" type="text" name="title" placeholder="Task Title">
												</div>
												<div class="c-field">
													<label class="c-field__label" for="lastName">Description</label>
													<textarea class="c-textarea" name="description" placeholder="Description"></textarea>
												</div>
												<div class="c-field">
													<label class="c-field__label" for="lastName">Comment</label>
													<textarea class="c-textarea" name="comment" placeholder="Comment"></textarea>
												</div>
												<div class="c-field">
													<label class="c-field__label" for="lastName">Type</label>
													<!-- Select2 jquery plugin is used -->
													<select class="c-select" name="type">
                                                            <option value="acknowledgment">Acknowledgment</option>
                                                            <option value="document">Document</option>
                                                            <option value="legal">Legal</option>
                                                            <option value="task">Task</option>
                                                        </select>
												</div>
												<div class="c-field">
													<label class="c-field__label" for="lastName">Status</label>
													<!-- Select2 jquery plugin is used -->
													<select class="c-select" name="status">
																<option value="1">Completed</option>
																<option value="0">In-Complete</option>
															</select>
												</div>
												<button class="c-btn c-btn--info" type="submit">Save</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="c-btn c-btn--info editPorBtn" href="#!">
							<i class="x-check-mark u-mr-xsmall"></i> Complete Tasks
						</a>
					</div>
					<div class="c-table-responsive@desktop">
						<table class="c-table c-table--zebra u-mb-small bdLeftRight_0">
							<thead class="c-table__head c-table__head--slim">
								<tr class="c-table__row">
									<th class="c-table__cell c-table__cell--head">
										<div class="checkbox">
											<label><input type="checkbox"><span></span></label>
										</div>
									</th>
									<th class="c-table__cell c-table__cell--head">Title</th>
									<th class="c-table__cell c-table__cell--head">Description</th>
									<th class="c-table__cell c-table__cell--head">Comment</th>
									<th class="c-table__cell c-table__cell--head">Status</th>
								</tr>
							</thead>
							<tbody>
								@if (@count($Tasks[0]) > 0) @foreach ($Tasks[0]->tasks as $Task)
								<tr class="c-table__row duerow">
									<td class="c-table__cell">
										<div class="checkbox">
											@if($Task->status == 0)
											<label><input type="checkbox"><span></span></label> @elseif($Task->status == 1)
											<label><input type="checkbox" checked><span></span></label> @endif
										</div>
									</td>
									<td class="c-table__cell">
										<div class="o-media">
											<div class="o-media__body">
												{{ $Task->title }}
											</div>
										</div>
									</td>
									<td class="c-table__cell">{{ $Task->description }}</td>
									<td class="c-table__cell">{{ $Task->comment }}</td>
									<td class="c-table__cell">
										@if($Task->status == 0)
										<span class="label label-danger">In Complete</span> @else
										<span class="label label-success">Complete</span> @endif
									</td>
								</tr>
								@endforeach @else
								<tr class="c-table__row duerow">
									<td class="c-table__cell" colspan="5">
										<div class="text-center">
											No tasks found
										</div>
									</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>



			<div class="c-card c-card--responsive u-mb-medium">
				<div class="c-card__header c-card__header--transparent o-line">
					<h5 class="c-card__title">Invoicing</h5>
					<a class="c-card__meta" href="#">View all invoices</a>
				</div>

				<table class="c-table u-border-zero">
					<tbody>
						<tr class="c-table__row u-border-top-zero">
							<td class="c-table__cell u-text-mute">00450</td>
							<td class="c-table__cell">Design Works</td>
							<td class="c-table__cell u-text-mute">Carlson Limited</td>
							<td class="c-table__cell u-text-right">
								<span class="c-badge c-badge--small c-badge--danger">Delayed</span>
							</td>
							<td class="c-table__cell">$2,580</td>
						</tr>

						<tr class="c-table__row">
							<td class="c-table__cell u-text-mute">00569</td>
							<td class="c-table__cell">New Illustrations</td>
							<td class="c-table__cell u-text-mute">Twitter</td>
							<td class="c-table__cell">
								<span class="c-badge c-badge--small c-badge--warning">Pending Invoice</span>
							</td>
							<td class="c-table__cell">$2,580</td>
						</tr>

						<tr class="c-table__row">
							<td class="c-table__cell u-text-mute">01875</td>
							<td class="c-table__cell">UX Study</td>
							<td class="c-table__cell u-text-mute">Re-Research</td>
							<td class="c-table__cell u-text-right">
								<span class="c-badge c-badge--small c-badge--success">Paid Today</span>
							</td>
							<td class="c-table__cell">$2,580</td>
						</tr>

						<tr class="c-table__row">
							<td class="c-table__cell u-text-mute">00369</td>
							<td class="c-table__cell">Landing Page</td>
							<td class="c-table__cell u-text-mute">Travelsimo</td>
							<td class="c-table__cell u-text-right">
								<span class="c-badge c-badge--small c-badge--secondary">Paid Today</span>
							</td>
							<td class="c-table__cell">$2,580</td>
						</tr>

						<tr class="c-table__row">
							<td class="c-table__cell u-text-mute">00689</td>
							<td class="c-table__cell">iOS App Design</td>
							<td class="c-table__cell u-text-mute">Silingo</td>
							<td class="c-table__cell u-text-right">
								<span class="c-badge c-badge--small c-badge--secondary">Paid Today</span>
							</td>
							<td class="c-table__cell">$2,580</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('submit', 'form#TaskForm', function (event) {
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
@endsection