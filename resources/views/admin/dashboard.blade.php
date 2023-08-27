@extends('admin.layout.master')

@section('content')
<div class="row">
	<div class="col-xl-4">
		<div class="c-graph-card graph1 mgright-15" data-mh="secondary-graphs">
			<div class="c-graph-card__content u-flex u-justify-between">
				<h3 class="c-graph-card__title u-h4">Franchise Sales</h3>
				<div class="u-text-right">
					<h4 class="u-h1 u-mb-zero">354</h4>
					<span class="u-color-success">+43%</span>
				</div>
			</div>
			<div class="c-graph-card__chart pdbot_0">
				<canvas id="js-chart-sales" height="150"></canvas>
			</div>
			<div class="u-flex u-justify-between u-ph-medium u-pv-small u-border-top">
				<p>
					<span class="u-mr-xsmall">Best Day</span>21
				</p>
				<p>
					<span class="u-mr-xsmall">Average</span>32
				</p>
			</div>
			<div class="c-graph-card__footer">
				<div class="row u-align-items-center">
					<div class="col-9">
						<p class="u-mb-xsmall">This Month
						</p>
						<div class="c-progress c-progress--medium c-progress--success">
							<div class="c-progress__bar" style="width:35%;"></div>
						</div>
					</div>
					<div class="col-3 u-text-right">
						<h4>21</h4>
					</div>
				</div>
				<div class="row u-align-items-center">
					<div class="col-9">
						<p class="u-mb-xsmall">
						Last Month</p>
						<div class="c-progress c-progress--medium c-progress--info">
							<div class="c-progress__bar" style="width:56%;"></div>
						</div>
					</div>
					<div class="col-3 u-text-right">
						<h4>32</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4">
		<div class="c-graph-card graph2 mgleft5 mgright-15" data-mh="secondary-graphs">
			<div class="c-graph-card__content u-flex u-justify-between">
				<h3 class="c-graph-card__title u-h4">Customers</h3>
				<div class="u-text-right">
					<h4 class="u-h1 u-mb-zero">354</h4>
					<span class="u-color-success">+43%</span>
				</div>
			</div>
			<div class="c-graph-card__chart u-flex u-justify-center">
				<canvas id="js-chart-customers" width="150" height="150"></canvas>
			</div>
			<div class="o-line u-ph-medium u-pv-small u-border-top graphRow">
				<span class="u-mr-xsmall">
					<i class="fa fa-circle u-mr-xsmall u-color-success"></i> New
				</span>
				<span class="u-mr-xsmall">
					<i class="fa fa-circle u-mr-xsmall u-color-fancy"></i> Returning
				</span>
				<span class="u-mr-xsmall">
					<i class="fa fa-circle u-mr-xsmall u-color-info"></i> Referrals
				</span>
			</div>
			<div class="c-graph-card__footer">
				<div class="row">
					<div class="col-4">
						<h5>39</h5>
						<!-- <p class="u-text-mute u-text-uppercase u-mb-xsmall u-text-xsmall">New</p> -->
						<div class="c-progress c-progress--medium c-progress--success">
							<div class="c-progress__bar" style="width:70%;"></div>
						</div>
					</div>
					<div class="col-4">
						<h5>52</h5>
						<!-- <p class="u-text-mute u-text-uppercase u-mb-xsmall u-text-xsmall">Returning</p> -->
						<div class="c-progress c-progress--medium c-progress--fancy">
							<div class="c-progress__bar" style="width:70%;"></div>
						</div>
					</div>
					<div class="col-4">
						<h5 class="u-h2 u-mb-zero">162</h5>
						<!-- <p class="u-text-mute u-text-uppercase u-mb-xsmall u-text-xsmall">Referrals</p> -->
						<div class="c-progress c-progress--medium c-progress--info">
							<div class="c-progress__bar" style="width:70%;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4">
		<div class="c-graph-card mgleft5" data-mh="secondary-graphs">
			<div class="c-graph-card__content u-flex u-justify-between u-align-items-baseline">
				<h3 class="c-graph-card__title u-h4">Profit</h3>
				<div class="u-text-right">
					<h4 class="u-h1 u-mb-zero">$8,526.76</h4>
					<span class="u-color-success">+43%</span>
				</div>
			</div>
			<div class="c-graph-card__chart u-p-zero">
				<canvas id="js-chart-profit" width="50" height="25"></canvas>
			</div>
			<div class="u-flex u-justify-between u-ph-medium u-pt-small u-pb-medium u-border-top">
				<span class="u-text-mute u-text-uppercase u-opacity-medium u-text-xsmall">Jan</span>
				<span class="u-text-mute u-text-uppercase u-opacity-medium u-text-xsmall">Feb</span>
				<span class="u-text-mute u-text-uppercase u-opacity-medium u-text-xsmall">Mar</span>
				<span class="u-text-mute u-text-uppercase u-opacity-medium u-text-xsmall">Apr</span>
				<span class="u-text-mute u-text-uppercase u-opacity-medium u-text-xsmall">May</span>
				<span class="u-text-mute u-text-uppercase u-opacity-medium u-text-xsmall">Jun</span>
			</div>
			<div class="c-graph-card__footer u-ph-zero">
				<div class="u-flex u-justify-between u-align-items-center u-border-bottom u-ph-medium u-pb-small">
					<span class="u-text-small u-color-primary">
						New Leads
					</span>
					<div class="u-text-right u-color-primary">
						$576.00
					</div>
				</div>
				<div class="u-flex u-justify-between u-align-items-center u-border-bottom u-ph-medium u-pv-small">
					<span class="u-text-small u-color-primary">
						Registered Clients
					</span>
					<div class="u-text-right u-color-primary">
						$576.00
					</div>
				</div>
				<div class="u-flex u-justify-between u-align-items-center u-ph-medium u-pt-small">
					<span class="u-text-small u-color-primary">
						Franchise
					</span>
					<div class="u-text-right u-color-primary">
						$576.00 
					</div>
				</div>
			</div><!-- // .c-graph-card__footer -->
		</div>
	</div>
</div><!-- // .row -->
<div class="row">
	<div class="col-md-6">
		<div class="c-card c-card--responsive u-mb-medium mgright-15 recentTask">
			<div class="c-card__header c-card__header--transparent o-line">
				<h5 class="c-card__title">Recent Task</h5>
				<a class="c-btn c-btn--info" href="#">Detail View</a>
			</div>
			<table class="c-table u-border-zero">
				<thead class="c-table__head c-table__head--slim">
					<tr class="c-table__row u-border-top-zero">
						<th class="c-table__cell c-table__cell--head">Objective</th>
						<th class="c-table__cell c-table__cell--head">Assigned To</th>
						<th class="c-table__cell c-table__cell--head">Due Date</th>
					</tr>
				</thead>
				<tbody>
					<tr class="c-table__row">
						<td class="c-table__cell">
							<input class="c-todo__input" id="todo1" type="checkbox" name="exampe-list">
							<label class="c-todo__label" for="todo1">
								Add new Google Analytics code to all main files...
							</label>
						</td>
						<td class="c-table__cell assignto">Mathew Kris (Manager)</td>
						<td class="c-table__cell duedate">21-04-2018</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">
							<input class="c-todo__input" id="todo1" type="checkbox" name="exampe-list">
							<label class="c-todo__label" for="todo1">
								Add new Google Analytics code to all main files...
							</label>
						</td>
						<td class="c-table__cell assignto">Mathew Kris (Manager)</td>
						<td class="c-table__cell duedate">21-04-2018</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">
							<input class="c-todo__input" id="todo1" type="checkbox" name="exampe-list">
							<label class="c-todo__label" for="todo1">
								Add new Google Analytics code to all main files...
							</label>
						</td>
						<td class="c-table__cell assignto">Mathew Kris (Manager)</td>
						<td class="c-table__cell duedate">21-04-2018</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">
							<input class="c-todo__input" id="todo1" type="checkbox" name="exampe-list">
							<label class="c-todo__label" for="todo1">
								Add new Google Analytics code to all main files...
							</label>
						</td>
						<td class="c-table__cell assignto">Mathew Kris (Manager)</td>
						<td class="c-table__cell duedate">21-04-2018</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">
							<input class="c-todo__input" id="todo1" type="checkbox" name="exampe-list">
							<label class="c-todo__label" for="todo1">
								Add new Google Analytics code to all main files...
							</label>
						</td>
						<td class="c-table__cell assignto">Mathew Kris (Manager)</td>
						<td class="c-table__cell duedate">21-04-2018</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">
							<input class="c-todo__input" id="todo1" type="checkbox" name="exampe-list">
							<label class="c-todo__label" for="todo1">
								Add new Google Analytics code to all main files...
							</label>
						</td>
						<td class="c-table__cell assignto">Mathew Kris (Manager)</td>
						<td class="c-table__cell duedate">21-04-2018</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-6">
		<div class="c-card c-card--responsive u-mb-medium mgleft5 recentTask">
			<div class="c-card__header c-card__header--transparent o-line">
				<h5 class="c-card__title">Invoicing</h5>
				<a class="c-btn c-btn--info" href="#">Detail View</a>
			</div>
			<table class="c-table u-border-zero">
				<thead class="c-table__head c-table__head--slim">
					<tr class="c-table__row u-border-top-zero">
						<th class="c-table__cell c-table__cell--head">ID</th>
						<th class="c-table__cell c-table__cell--head">Invoice</th>
						<th class="c-table__cell c-table__cell--head">Status</th>
						<th class="c-table__cell c-table__cell--head">Amount</th>
					</tr>
				</thead>
				<tbody>
					<tr class="c-table__row">
						<td class="c-table__cell">#2563</td>
						<td class="c-table__cell">One Time Registration</td>
						<td class="c-table__cell pd_tb-13">
							<span class="c-badge c-badge--small c-badge--danger">Overdue</span>
						</td>
						<td class="c-table__cell">$4,589.00</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">#2563</td>
						<td class="c-table__cell">Annual Assesment</td>
						<td class="c-table__cell pd_tb-13">
							<span class="c-badge c-badge--small c-badge--danger">Overdue</span>
						</td>
						<td class="c-table__cell">$4,589.00</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">#2563</td>
						<td class="c-table__cell">One Time Registration</td>
						<td class="c-table__cell pd_tb-13">
							<span class="c-badge c-badge--small c-badge--info">Due</span>
						</td>
						<td class="c-table__cell">$4,589.00</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">#2563</td>
						<td class="c-table__cell">One Time Registration</td>
						<td class="c-table__cell pd_tb-13">
							<span class="c-badge c-badge--small c-badge--info">Due</span>
						</td>
						<td class="c-table__cell">$4,589.00</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">#2563</td>
						<td class="c-table__cell">Franchise Fee</td>
						<td class="c-table__cell pd_tb-13">
							<span class="c-badge c-badge--small c-badge--info">Due</span>
						</td>
						<td class="c-table__cell">$4,589.00</td>
					</tr>
					<tr class="c-table__row">
						<td class="c-table__cell">#2563</td>
						<td class="c-table__cell">Annual Assesment</td>
						<td class="c-table__cell pd_tb-13">
							<span class="c-badge c-badge--small c-badge--info">Due</span>
						</td>
						<td class="c-table__cell">$4,589.00</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div><!-- // .row -->
@endsection
