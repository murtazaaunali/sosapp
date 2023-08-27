@extends('admin.layout.master') 
@section('content')

<div class="row">
	<div class="col-xl-12">
		<div class="c-whitebox style1">
			<h3>Franchise Details <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"
				 id="open">Add Franchise</button></h3>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-bordered" id="franchise" style="width:100%;">
						<thead>
							<tr>
								<th>ID</th>
								<th>Location</th>
								<th>City</th>
								<th>State</th>
								<th>Address</th>
								<th>Opened on</th>
								<th>FDD Signed</th>
								<th>FDD Expiry</th>
								<th>Status</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#franchise').DataTable({
            columnDefs: [
                {
                    targets: [ 0, 1, 2, 3, 4, 5, 6 ,7 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ],
			           processing: true,
			  serverSide: true,
			  paging:   true,
			  ordering: true,
              info:     true,
			  ajax: '{{ url('/admin/franchises/getalldata') }}',
			  columns: [
				{ data: 'id' },
				{ data: 'Location' },
				{ data: 'City' },
				{ data: 'State' },
				{ data: 'Address' },
				{ data: 'DateOpened' },
				{ data: 'DateFDDSigned' },
				{ data: 'DateFDDExpires' },
				{ data: 'Status',
				  render:function (data, type, full, meta) {
					if(data == 0) {
					  return '<span class="label label-danger">Terminated</span>';
					} else if(data == 1) {
					  return '<span class="label label-success">Active</span>';
					} else { 
                    return '<span class="label label-warning">For Sale</span>';
          }}},
          { data: 'id', render:function(data) {
            return '<a class="btn btn-primary"  href=" {{url('admin/franchise/show')}}/'+data+'">View</a>';
          } },
          { data: 'id', render:function(data) {
            return '<a class="btn btn-default"  href=" {{url('admin/franchise/edit')}}/'+data+'">Edit</a>';
          } },
        ]
		  });
  
  
		  $(document).on('submit', 'form#FranchiseForm', function (event) {
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