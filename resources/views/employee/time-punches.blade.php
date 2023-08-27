@extends('employee.layout.master')
@section('title', 'Time Punches - Success On The Spectrum')
@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox">
			<div class="titlerow">
				<h3>Time Punches</h3>
				<div class="c-field has-addon-left wd-px16">
					<input class="c-btn c-btn--info" data-toggle="datepicker" id="input9" type="text" placeholder="January 13th, 2017">
					<span class="c-field__addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="c-card c-card--responsive recentTask u-border-zero">
				<table class="c-table nobdRow u-border-zero">
					<thead class="c-table__head c-table__head--slim">
						<tr class="c-table__row">
							<th class="c-table__cell c-table__cell--head">Data</th>
							<th class="c-table__cell c-table__cell--head">Day</th>
							<th class="c-table__cell c-table__cell--head">Time In</th>
							<th class="c-table__cell c-table__cell--head wd-per40">Time Out</th>
							<th class="c-table__cell c-table__cell--head wd-per12">Duration</th>
						</tr>
					</thead>
					<tbody>
						<tr class="c-table__row u-border-zero">
							<td class="c-table__cell">21-04-2018</td>
							<td class="c-table__cell">Monday</td>
							<td class="c-table__cell">00:09:30 am</td>
							<td class="c-table__cell">00:10:30 pm</td>
							<td class="c-table__cell">01 hour(s)</td>
						</tr>
						<tr class="c-table__row u-border-zero">
							<td class="c-table__cell"></td>
							<td class="c-table__cell"></td>
							<td class="c-table__cell">00:03:30 am</td>
							<td class="c-table__cell">00:4:30 pm</td>
							<td class="c-table__cell">01 hour(s)</td>
						</tr>
						<tr class="c-table__row u-border-zero">
							<td class="c-table__cell"></td>
							<td class="c-table__cell"></td>
							<td class="c-table__cell">00:05:30 am</td>
							<td class="c-table__cell">00:6:00 pm</td>
							<td class="c-table__cell">30 minute(s)</td>
						</tr>
						<tr class="c-table__row u-border-zero">
							<td class="c-table__cell"></td>
							<td class="c-table__cell"></td>
							<td class="c-table__cell">00:08:30 am</td>
							<td class="c-table__cell">00:09:30 pm</td>
							<td class="c-table__cell">01 hour(s)</td>
						</tr>
						<tr class="c-table__row u-border-zero">
							<td class="c-table__cell"></td>
							<td class="c-table__cell"></td>
							<td class="c-table__cell">00:08:30 am</td>
							<td class="c-table__cell">00:09:30 pm</td>
							<td class="c-table__cell">01 hour(s)</td>
						</tr>
					</tbody>
				</table>
				<div class="greyRow text-right"><span>Total Break: 08 Hours</span></div>
			</div>
		</div><br>

		<div class="c-whitebox">
			<div class="titlerow">
				<h3>Attendance Chart for the Month of</h3>
				<div class="customWd wd-px15" style="left:275px;">
					<!-- Select2 jquery plugin is used -->
					<select class="c-select">
						<option>Month</option>
						<option>Second</option>
						<option>Third</option>
					</select>
				</div>
			</div>
			<div class="grapRow"><img src="../img/grap-img.jpg" alt=""></div>
		</div>
	</div>
</div>
@endsection
