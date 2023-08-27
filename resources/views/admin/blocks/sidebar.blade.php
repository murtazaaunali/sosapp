@section('sidebar')

<div class="o-page__sidebar js-page-sidebar">
	<div class="c-sidebar">
		<a class="c-sidebar__brand" href="javascript:;">
						<img class="c-sidebar__brand-img" src="../../img/logo.png" alt="Logo">
					</a>
		<ul class="c-sidebar__list">
			<li class="c-sidebar__item">
				<a class="c-sidebar__link {{ Request::segment(2) == 'dashboard' ? 'is-active' : '' }}" href="/admin/dashboard">
								<i class="x-dashboard"></i> <span>Dashboard</span>
							</a>
			</li>

			<li class="c-sidebar__item has-submenu">
				<a class="c-sidebar__link {{ Request::segment(2) == 'franchises' || 'franchisees' ? 'is-active' : '' }}" data-toggle="collapse"
				 href="#sidebar-submenu" aria-expanded="true" aria-controls="sidebar-submenu">
									<i class="fa fa-caret-square-o-down u-mr-xsmall"></i>Franchises
								</a>
				<ul class="c-sidebar__submenu collapse" id="sidebar-submenu" style="">
					<li><a class="c-sidebar__link {{ Request::segment(2) == 'franchises' ? 'is-active' : '' }}" href="/admin/franchises/">Franchises</a></li>
					<li><a class="c-sidebar__link {{ Request::segment(2) == 'franchisees' ? 'is-active' : '' }}" href="/admin/franchisees/">Franchise Owners</a></li>
					{{--
					<li><a class="c-sidebar__link" href="#">Submenu link</a></li> --}}
				</ul>
			</li>

			<li class="c-sidebar__item">
				<a class="c-sidebar__link {{ Request::segment(2) == 'documents' ? 'is-active' : '' }}" href="/admin/documents">
								<i class="x-document"></i> <span>Documents</span>
							</a>
			</li>
			<li class="c-sidebar__item">
				<a class="c-sidebar__link {{ Request::segment(2) == 'reports' ? 'is-active' : '' }}" href="/admin/reports">
								<i class="x-report"></i> <span>Reports</span>
							</a>
			</li>
			<li class="c-sidebar__item">
				<a class="c-sidebar__link {{ Request::segment(2) == 'schedule' ? 'is-active' : '' }}" href="/admin/schedule">
								<i class="x-schedule"></i> <span>Schedule</span>
							</a>
			</li>
			<li class="c-sidebar__item">
				<a class="c-sidebar__link {{ Request::segment(2) == 'trainings' ? 'is-active' : '' }}" href="/admin/trainings">
								<i class="x-trainings"></i> <span>Trainings</span>
							</a>
			</li>
			<li class="c-sidebar__item">
				<a class="c-sidebar__link {{ Request::segment(2) == 'tasks' ? 'is-active' : '' }}" href="/admin/tasks">
								<i class="x-task"></i> <span>Task</span>
							</a>
			</li>
		</ul>
	</div>
	<!-- // .c-sidebar -->
</div>
<!-- // .o-page__sidebar -->
@show