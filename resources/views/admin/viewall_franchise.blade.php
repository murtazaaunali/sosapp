@extends('admin.layout.master') 
@section('content')
<div class="container-fluid">
    <div class="row u-mb-large">
        <div class="col-12">
            <div class="c-whitebox">
                <div class="titlerow">
                    <h3>Franchises</h3>
                    <a class="c-btn c-btn--info editPorBtn" data-toggle="modal" data-target="#uploadDoco" href="#!">
                                <i class="x-plus u-mr-xsmall"></i> New
                            </a>
                </div>
                <!-- Modal -->
                <div class="c-modal modal fade" id="uploadDoco" tabindex="-1" role="dialog" aria-labelledby="uploadDoco">
                    <div class="c-modal__dialog modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="c-card u-p-medium u-mh-auto" style="max-width:590px;">
                                <h3>New Franchise</h3>
                                <form method="POST" enctype="multipart/form-data" id="AddFranchise" action="{{ url('admin/franchise/save') }}">
                                    {{ csrf_field() }}
                                    <div id="form_errors" style="display:none;"></div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="c-field">
                                                <label class="c-field__label">Location</label>
                                                <input class="c-input" id="Location" name="Location" type="text" placeholder="Location">
                                            </div>
                                            <div class="c-field">
                                                <label class="c-field__label">State</label>
                                                <input class="c-input" id="input1" name="State" type="text" placeholder="State">
                                            </div>

                                            <div class="c-field">
                                                <label class="c-field__label">Date FDD Signed</label>
                                                <input class="c-input" id="input1" name="DateFDDSigned" type="text" placeholder="Date FDD Signed">
                                            </div>
                                            <div class="c-field">
                                                <label class="c-field__label">Address</label>
                                                <textarea class="c-input" id="input1" name="Address" placeholder="Address"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="c-field">
                                                <label class="c-field__label">City</label>
                                                <input class="c-input" id="input1" name="City" type="text" placeholder="City">
                                            </div>
                                            <div class="c-field">
                                                <label class="c-field__label">Date Opening</label>
                                                <input class="c-input" id="input1" name="DateOpened" type="text" placeholder="Date Opening">
                                            </div>

                                            <div class="c-field">
                                                <label class="c-field__label">Date FDD Expiry</label>
                                                <input class="c-input" id="input1" name="DateFDDExpires" type="text" placeholder="Date FDD Expiry">
                                            </div>

                                            <div class="c-field">
                                                <label class="c-field__label">Email Addresss</label>
                                                <input class="c-input" id="input1" name="Email" type="text" placeholder="Date FDD Expiry">
                                            </div>
                                            <div class="c-field">
                                                <label class="c-field__label">Status</label>
                                                <select class="c-input" name="Status" id="input1">
                                                            <option value="1">Active</option>
                                                            <option value="2 ">For Sale</option>
                                                            <option value="3 ">Terminate</option>
                                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="c-field">
                                                <label class="c-field__label">Location</label>
                                                <input class="c-input" id="Location" name="Location" type="text" placeholder="Location">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="c-btn c-btn--info">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="datatable_wrapper " class="dataTables_wrapper">
                    <table class="c-table dataTable no-footer" id="datatable" role="grid" aria-describedby="datatable_info">
                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row " role="row ">
                                <th class="c-table__cell c-table__cell--head ">Location</th>
                                <th class="c-table__cell c-table__cell--head ">City</th>
                                <th class="c-table__cell c-table__cell--head  ">State</th>
                                <th class="c-table__cell c-table__cell--head  ">Date FDD Signed</th>
                                <th class="c-table__cell c-table__cell--head  ">Date FDD Expires</th>
                                <th class="c-table__cell c-table__cell--head ">Date Opened</th>
                                <th class="c-table__cell c-table__cell--head ">Status</th>
                                <th class="c-table__cell c-table__cell--head no-sort ">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Franchises as $Franchise)
                            <tr class="c-table__row " role="row ">
                                <td class="c-table__cell ">{{ $Franchise->Location }}</td>
                                <td class="c-table__cell ">{{ $Franchise->City }}</td>
                                <td class="c-table__cell ">{{ $Franchise->State }}</td>
                                <td class="c-table__cell ">{{ $Franchise->DateOpened }}</td>
                                <td class="c-table__cell ">{{ $Franchise->DateFDDSigned }}</td>
                                <td class="c-table__cell ">{{ $Franchise->DateFDDExpires }}</td>
                                <td class="c-table__cell ">{{ $Franchise->status }}</td>
                                <td class="c-table__cell "><a href="{{ $Franchise->url
                                                        }}">View</a>
                                    <a href="{{ $Franchise->url
                                                            }}">Edit</a>
                                    <a href="{{ $Franchise->url
                                                                }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('submit', 'form#AddFranchise', function (event) {
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
                      if(result.errors) {
                        $('#form_errors').html('');
                        $.each(result.errors, function(key, value){
                            $('#form_errors').show();
                            $('#form_errors').append('<div class="c-alert c-alert--danger"><i class="c-alert__icon fa fa-times-circle"></i> '+value+'</div>');
                  		});
                      }
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