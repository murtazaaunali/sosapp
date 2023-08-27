@extends('admin.layout.master')

@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox">
			<div class="titlerow">
				<h3>Task</h3>
				<a class="c-btn c-btn--success editPorBtn right160" data-toggle="modal" data-target="#newtask" href="#!">
					<i class="x-plus u-mr-xsmall"></i> New Task
				</a>
				<!-- Modal -->
				<div class="c-modal modal fade" id="newtask" tabindex="-1" role="dialog" aria-labelledby="newtask">
					<div class="c-modal__dialog modal-dialog" role="document">
						<div class="modal-content">
							<div class="c-card u-p-medium u-mh-auto" style="max-width:410px;">
								<h3>Assign New Task</h3>
								<div class="editForm">
									<div class="c-field">
										<label class="c-field__label" for="firstName">Select Branch</label> 
										<!-- Select2 jquery plugin is used -->
										<select class="c-select">
											<option>First</option>
											<option>Second</option>
											<option>Third</option>
										</select>
									</div>
									<div class="c-field">
										<label class="c-field__label" for="lastName">Select Employee</label> 
										<!-- Select2 jquery plugin is used -->
										<select class="c-select">
											<option>First</option>
											<option>Second</option>
											<option>Third</option>
										</select>
									</div>
									<div class="c-field">
										<label class="c-field__label" for="lastName">Task Type</label> 
										<!-- Select2 jquery plugin is used -->
										<select class="c-select">
											<option>First</option>
											<option>Second</option>
											<option>Third</option>
										</select>
									</div>
									<div class="c-field">
										<label class="c-field__label" for="dateOfBirth">Due Date</label> 
										<input class="c-input ht_39" data-toggle="datepicker" type="text" placeholder="Focus to open calendar"> 
									</div>
									<div class="c-field">
										<label class="c-field__label" for="initialAssessmentDate">Task</label>
										<textarea class="c-textarea"></textarea>
									</div>
									<button class="c-btn c-btn--info" data-dismiss="modal">Assign</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a class="c-btn c-btn--info editPorBtn" href="#!">
					<i class="x-check-mark u-mr-xsmall"></i> Complete Task
				</a>
			</div>

			<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small bdLeftRight_0" id="datatable2">
					<thead class="c-table__head c-table__head--slim">
						<tr class="c-table__row">
							<th class="c-table__cell c-table__cell--head">
								<div class="checkbox">
									<label>
										<input type="checkbox">
										<span></span>
									</label>
								</div>
							</th>
							<th class="c-table__cell c-table__cell--head">User</th>
							<th class="c-table__cell c-table__cell--head">Status</th>
							<th class="c-table__cell c-table__cell--head">Due Date</th>
							<th class="c-table__cell c-table__cell--head">Task Assigned</th>
							<th class="c-table__cell c-table__cell--head u-text-center">Edit</th>
						</tr>
					</thead>
					<tbody>
						<tr class="c-table__row duerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Due</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
						<tr class="c-table__row duerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox" checked="checked">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Due</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut adi…"
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
						<tr class="c-table__row activerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox" checked="checked">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Active</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
						<tr class="c-table__row activerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox" checked="checked">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Active</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit"
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
						<tr class="c-table__row activerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Active</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
						<tr class="c-table__row overduerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox" checked="checked">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Overdue</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut adipisc..."
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
						<tr class="c-table__row overduerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox" checked="checked">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Overdue</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
						<tr class="c-table__row activerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Active</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit"
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
						<tr class="c-table__row duerow">
							<td class="c-table__cell">
							   <div class="checkbox">
									<label>
										<input type="checkbox">
										<span></span>
									</label>
								</div>
							</td>
							<td class="c-table__cell">
								<div class="o-media">
									<div class="o-media__img u-mr-xsmall">
										<div class="c-avatar c-avatar--xsmall">
											<img class="c-avatar__img" src="../img/avatar3.png" alt="">
										</div>
									</div>
									<div class="o-media__body">
										Danicus Mitus<small class="u-block">Branch Manager</small>
									</div>
								</div>
							</td>
							<td class="c-table__cell"><span class="statustask">Due</span></td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit"
							</td>
							<td class="c-table__cell u-text-center editAction">
								<i class="x-pencil"></i>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
