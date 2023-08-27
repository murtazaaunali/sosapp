@extends('employee.layout.master')
@section('title', 'Task - Success On The Spectrum')
@section('menu_employee')
<ul class="c-sidebar__list">
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/home">
            <i class="x-client-prea"></i> <span>Home</span>
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/documents">
            <i class="x-document"></i> <span>Documents</span>
        </a>
    </li>
    <ul class="c-sidebar__item">
        <a class="c-sidebar__link" href="javascript:void(0);">
            <i class="x-multi-users"></i> <span>Employee</span>
        </a>
        <li class="c-sidebar__item">
            <a class="c-sidebar__link " href="/employee/add-employee">
                <span>Add Employee</span>
            </a>
        </li>
        <li class="c-sidebar__item">
            <a class="c-sidebar__link" href="/employee/emergency-contact">
                <span>Emergency Contact</span>
            </a>
        </li>
    </ul>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/clients">
            <i class="x-insurance"></i> <span>Clients</span>
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link is-active" href="/employee/class-schedule/1">
            <i class="x-insurance"></i> <span>Child Schedule</span>
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/time-punches">
            <i class="x-multi-users"></i> <span>Time Punches</span>
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/performance">
            <i class="x-report"></i> <span>Performance</span>
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/employee-performance">
            <i class="x-report"></i> <span>Employee Performance</span>
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link is-active" href="/employee/task">
            <i class="x-schedule"></i> <span>Task</span>
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/trainings">
            <i class="x-trainings"></i> <span>Trainings</span>
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/threads">
            <i class="x-insurance"></i> <span>Parent Training</span>
        </a>
    </li>
	@if(Auth::user()->type === 'teacher')
    <li class="c-sidebar__item">
        <a class="c-sidebar__link" href="/employee/messages">
            <i class="x-messages"></i> <span>Messages</span>
        </a>
    </li>
	@endif
</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox">
			<div class="titlerow">
				<h3>Task</h3>
				<a class="c-btn c-btn--danger editPorBtn right160" data-toggle="modal" data-target="#newtask" href="#!">
					<i class="x-plus u-mr-xsmall"></i> Over Due Tasks
				</a>
				<a class="c-btn c-btn--info editPorBtn" href="#!">
					<i class="x-check-mark u-mr-xsmall"></i> Completed Task
				</a>
			</div>

			<div class="c-card c-card--responsive u-mb-medium recentTask">
				<table class="c-table u-border-zero">
					<thead class="c-table__head c-table__head--slim">
						<tr class="c-table__row u-border-top-zero">
							<th class="c-table__cell c-table__cell--head">Objective</th>
							<th class="c-table__cell c-table__cell--head">Due Date</th>
							<th class="c-table__cell c-table__cell--head">Status</th>
						</tr>
					</thead>
					<tbody>
						<tr class="c-table__row">
							<td class="c-table__cell c-todo">
								<input class="c-todo__input" id="todo1" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo1">
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"
								</label>
							</td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--info">Due Today</span></td>
						</tr>
						<tr class="c-table__row">
							<td class="c-table__cell c-todo">
								<input class="c-todo__input" id="todo2" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo2">
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut adi…"
								</label>
							</td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--notdue">Due in 2 Days</span></td>
						</tr>
						<tr class="c-table__row">
							<td class="c-table__cell c-todo">
								<input class="c-todo__input" id="todo3" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo3">
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"
								</label>
							</td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--notdue">Due in 2 Days</span></td>
						</tr>
						<tr class="c-table__row overdueRow">
							<td class="c-table__cell c-todo">
								<input class="c-todo__input" id="todo4" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo4">
								   "Lorem ipsum dolor sit amet, consectetur adipiscing elit"
								</label>
							</td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--danger">Overdue</span></td>
						</tr>
						<tr class="c-table__row">
							<td class="c-table__cell c-todo is-completed">
								<input class="c-todo__input" id="todo5" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo5">
								   "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"
								</label>
							</td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--success">Completed</span></td>
						</tr>
						<tr class="c-table__row">
							<td class="c-table__cell c-todo is-completed">
								<input class="c-todo__input" id="todo6" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo6">
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut adipisc..."
								</label>
							</td>
							<td class="c-table__cell">Mathew Kris (Manager)</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--success">Completed</span></td>
						</tr>
						<tr class="c-table__row">
							<td class="c-table__cell c-todo is-completed">
								<input class="c-todo__input" id="todo7" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo7">
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"
								</label>
							</td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--success">Completed</span></td>
						</tr>
						<tr class="c-table__row">
							<td class="c-table__cell c-todo is-completed">
								<input class="c-todo__input" id="todo8" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo8">
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit"
								</label>
							</td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--success">Completed</span></td>
						</tr>
						<tr class="c-table__row">
							<td class="c-table__cell c-todo is-completed">
								<input class="c-todo__input" id="todo9" type="checkbox" name="exampe-list">
								<label class="c-todo__label" for="todo9">
									"Lorem ipsum dolor sit amet, consectetur adipiscing elit"
								</label>
							</td>
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell pd_tb-13"><span class="c-badge c-badge--small c-badge--success">Completed</span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
