@extends('client.layout.master') 
@section('title', 'Insurance - Success On The Spectrum') 
@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="c-whitebox">
      <div class="titlerow">
        <h3>Insurance Details</h3>
        <button type="button" class="c-btn c-btn--info editPorBtn" data-toggle="modal" data-target="#myModal" id="open">Add Insurance</button>
      </div>
      <div id="datatable_wrapper " class="dataTables_wrapper">
        <table class="c-table dataTable no-footer c-table--highlight" id="datatable" role="grid" aria-describedby="datatable_info">
          <thead class="c-table__head c-table__head--slim">
            <tr class="c-table__row " role="row ">
              <th class="c-table__cell c-table__cell--head ">Insured ID</th>
              <th class="c-table__cell c-table__cell--head ">Patient Name</th>
              <th class="c-table__cell c-table__cell--head  ">Gender</th>
              <th class="c-table__cell c-table__cell--head  ">Date of Birth</th>
              <th class="c-table__cell c-table__cell--head  ">Group Policy Number</th>
              <th class="c-table__cell c-table__cell--head ">Subscriber Name</th>
              <th class="c-table__cell c-table__cell--head ">Relation</th>
              <th class="c-table__cell c-table__cell--head ">Status</th>
              <th class="c-table__cell c-table__cell--head no-sort ">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Insurances as $Insurance)
            <tr class="c-table__row " role="row ">
              <td class="c-table__cell ">{{ $Insurance->InsuredID }}</td>
              <td class="c-table__cell ">{{ $Insurance->PatientName }}</td>
              <td class="c-table__cell ">{{ $Insurance->Gender }}</td>
              <td class="c-table__cell ">{{ $Insurance->DOB }}</td>
              <td class="c-table__cell ">{{ $Insurance->GroupPolicyNumber }}</td>
              <td class="c-table__cell ">{{ $Insurance->SubscriberName }}</td>
              <td class="c-table__cell ">{{ $Insurance->RelationToSubscriber }}</td>
              <td class="c-table__cell ">{{ $Insurance->Status }}</td>
              <td class="c-table__cell "><a class="c-btn c-btn--info" href="{{ $Insurance->url
                                              }}"><i class="fa fa-search"></i></a>
                <a class="c-btn c-btn--warning" href="{{ $Insurance->url
                                                  }}"><i class="fa fa-pencil"></i></a>
                <a class="c-btn c-btn--danger" id="deleteBtn" onclick="deleteAlert({{ $Insurance->id}})"><i class="fa fa-close"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="c-modal modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="editProfile">
    <div class="c-modal__dialog modal-dialog" role="document">
      <div class="modal-content">
        <div class="c-card u-p-medium u-mh-auto">
          {{--
          <div class="modal-header">
          </div> --}}
          <h3>Add Insurance Information</h3>
          <form id="InsuranceForm" action="{{ url('/client/insurance/addinsurance') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="row">
              <div class="col-6">
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Company:</label>
                  <input type="text" class="c-input" name="Company" id="Company" required>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Coverage From:</label>
                  <input type="date" class="c-input" name="CoverageFrom" id="CoverageFrom" required>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Coverage To:</label>
                  <input type="date" class="c-input" name="CoverageTo" id="CoverageTo" required>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Subscriber Name:</label>
                  <input type="text" class="c-input" name="SubscriberName" id="SubscriberName" required>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Subscriber Address:</label>
                  <input type="text" class="c-input" name="SubscriberAddress" id="SubscriberAddress" required>
                </div>
                <button type="submit" class="c-btn c-btn--info" id="ajaxSubmit">Save</button>
              </div>
              <div class="col-6">
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Group Policy No.:</label>
                  <input type="text" class="c-input" name="GroupPolicyNumber" id="GroupPolicyNumber" required>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Insured ID:</label>
                  <input type="text" class="c-input" name="InsuredID" id="InsuredID" required>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Patient Name:</label>
                  <input type="text" class="c-input" name="PatientName" id="PatientName" required>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Relation to Subscriber:</label>
                  <input type="text" class="c-input" name="RelationToSubscriber" id="RelationToSubscriber" required>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">Gender:</label>
                  <select class="c-input" name="Gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
                </div>
                <div class="c-field ">
                  <label class="c-field__label" for="Name">DOB:</label>
                  <input type="date" class="c-input" name="DOB" id="name" required>
                </div>

              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).on('submit', 'form#InsuranceForm', function(event) {
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
      success: function(result) {
        console.log(result);
        if (result === 'true') {
          location.reload();
        }
      },
      error: function(data) {
        console.log(data);
      }
    });
    return false;
  });

  function deleteAlert(record_id) {
    console.log("Record_id:"+record_id);
    swal({
        title: "Are you sure?",
        text: "You want to delete the record.",
        icon: "warning",
        buttons: true,
        dangerMode: true
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "{{ url('client/insurance/deleteinsurance') }}",
            method: 'POST',
            dataType: 'json',
            data: {
              '_token': "{{csrf_token()}}",
              'record_id': record_id,
            },
            success: function(response) {
              if (response) {
                swal({
                  title: "Congratulations!",
                  text: "Record Deleted Successfully!",
                  type: "success",
                  timer: 1000
                });
                location.reload();
              }
            }
          });
        }
      });
  }

</script>
@endsection