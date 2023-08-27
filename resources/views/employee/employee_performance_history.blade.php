@extends('employee.layout.master')
@section('title', 'Performance History - Success On The Spectrum')
@section('content')
<div class="row">
	<style type="text/css">
	.table>thead>tr>td {
	    font-size: 12px;
	}
	</style>
	<div class="col-xl-12">
		<div class="tabBox">
			<div class="c-tabs__content u-mb-large" id="nav-tabContent">
				<div class="c-tabs__pane active u-pb-medium" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
					<div class="row">
						<div class="col-md-12">
							<h3>Employee Performance</h3>
						</div>
                        <div class="col-md-6">
                            <form id="performance" action="{{ url('/employee/employee-performance-store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">
                                <div class="form-group">
                                    <label for="date">Select Date:</label>
                                    <input type="date" class="form-control" name="date" id="date" value = "<?php echo (isset($edit_record->date)) ? $edit_record->date : ''; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="event">Enter Event:</label>
                                    <input type="text" class="form-control" name="event" id="event" value = "<?php echo (isset($edit_record->event)) ? $edit_record->event : ''; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="comments">Enter Comments:</label>
                                    <input type="comments" class="form-control" name="comments" id="comments" value = "<?php echo (isset($edit_record->comment)) ? $edit_record->comment : ''; ?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="color">Select Row Fill Color:</label>
                                  <select class="form-control" name="color" id="color">
                                    <option style="background-color:WHITE; color: #000;" value="WHITE" <?php echo (isset($edit_record->color) && $edit_record->color == "WHITE") ? 'selected' : ''; ?>>No Color</option>
                                    <option style="background-color:RED; color: #fff;" value="RED" <?php echo (isset($edit_record->color) && $edit_record->color == "RED") ? 'selected' : ''; ?>>Red</option>
                                    <option style="background-color:GREEN; color: #fff;" value="GREEN" <?php echo (isset($edit_record->color) && $edit_record->color == "GREEN") ? 'selected' : ''; ?>>Green</option>
                                    <option style="background-color:YELLOW; color: #fff;" value="YELLOW" <?php echo (isset($edit_record->color) && $edit_record->color == "YELLOW") ? 'selected' : ''; ?>>Yellow</option>
                                  </select>
                                </div>
                                <?php echo $action; ?>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h3>Employee Detail</h3>
                            <div class="table-responsive">
                                <table id="contact" class="table table-striped table-bordered table-hover">
                                  <tbody>
                                    <?php 
                                    if (!empty($employee) ){ ?>
                                        <tr>
                                            <td class="text-left">Employee Name</td>
                                            <td class="text-center"><?php echo $employee->firstname." ".$employee->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Address</td>
                                            <td class="text-center"><?php echo $employee->address; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">City/State/Zip</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Date Of Birth</td>
                                            <td class="text-center"><?php echo $employee->dob; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Social Security</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Driver Licence</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?> </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Phone</td>
                                            <td class="text-center"><?php echo $employee->phone; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Email</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Hie Date</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">End Date</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Rate Pay</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Vacation</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Holidays</td>
                                            <td class="text-center"><?php echo $employee->lastname; ?></td>
                                        </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
					</div>
					<div class="row ">
						<div class="col-md-12 text-center">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissable ">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong> {{ session('success') }} </strong>
                            </div>
                            @endif
							<?php if( isset($employee->firstname) && !empty($employee->firstname) && isset($employee->lastname) && !empty($employee->lastname)){ ?>
                                <h2 style="margin-top: 20px;"><?php echo $employee->firstname." ".$employee->lastname; ?> Performance Sheet</h2>
                       		<?php } ?>
						 <div class="table-responsive">
			                <table id="contact" class="table table-striped table-bordered table-hover">
			                  <thead>
			                    <tr>
			                      <td class="text-left">Date</td>
			                      <td class="text-left">Event</td>
                                  <td class="text-left">Description</td>
			                      <td class="text-center">Action</td>
			                    </tr>
			                  </thead>

			                  <tbody>
                                <?php 
                                if( !empty($results) ) {
                                foreach( $results as $result ){ ?>
                                    <tr style="background-color: <?php echo $result->color; ?>; <?php echo ( $result->color == 'WHITE') ? 'color: #000' : 'color: #fff' ?>" >
                                      <td class="text-left"><?php echo $result->date; ?></td>
                                      <td class="text-left"><?php echo $result->event; ?></td>
                                      <td class="text-left"><?php echo $result->comment; ?></td>
                                      <td class="text-center"><a href="{{ url('/employee/employee-performance-record') }}/<?php echo $result->emp_id; ?>/<?php echo $result->id; ?>">Edit</a><a href="{{ url('/employee/employee-performance-delete') }}/<?php echo $result->emp_id; ?>/<?php echo $result->id; ?>">Delete</a></td>
                                    </tr>
                                <?php } } ?>	
			                  </tbody>
			                </table>
			              </div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
