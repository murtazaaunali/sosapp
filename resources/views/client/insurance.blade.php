@extends('client.layout.master') 
@section('title', 'Insurance - Success On The Spectrum') 
@section('content')
<div class="c-whitebox">
  <div class="titlerow">
    <h3>Insurance Details</h3>
    <button type="button" class="c-btn c-btn--info editPorBtn" id="editBtn">Edit Insurance</button>
  </div>
  <form id="InsuranceForm" action="{{ url('/client/insurance/updateinsurance')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ Crypt::encryptString($Insurance->id) ?? '' }}">
    <input type="hidden" name="client_id" value="{{ Crypt::encryptString($Insurance->client_id) ?? '' }}">
    <div class="u-flex u-flex-wrap">
      <div class="row clearfix">
        <div class="col-4">
          <div class="c-field">
            <label class="c-field__label" for="Company">Company</label>
            <input class="c-input" type="text" id="Company" name="Company" placeholder="First Name" readonly value="{{ $Insurance->Company  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field has-addon-right">
            <label class="c-field__label" for="CoverageFrom">Coverage From</label>
            <input class="c-input" id="CoverageFrom" type="text" readonly name="CoverageFrom" value="{{ $Insurance->CoverageFrom  ?? ''}}" type="text"
              style="max-width:300px;">
            <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field has-addon-right">
            <label class="c-field__label" for="CoverageTo">Coverage To</label>
            <input class="c-input" id="CoverageTo" type="text" readonly name="CoverageTo" value="{{ $Insurance->CoverageTo  ?? ''}}" type="text"
              style="max-width:300px;">
            <span class="c-field__addon"><i class="fa fa-calendar"></i></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="SubscriberName">Subscriber Name</label>
            <input class="c-input" type="text" id="SubscriberName" name="SubscriberName" placeholder="First Name" readonly value="{{ ucfirst($Insurance->SubscriberName)  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="SubscriberAddress">Subscriber Address</label>
            <input class="c-input" type="text" id="SubscriberAddress" name="SubscriberAddress" placeholder="First Name" readonly value="{{ $Insurance->SubscriberAddress  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="GroupPolicyNumber">Group Policy Number</label>
            <input class="c-input" type="text" id="GroupPolicyNumber" name="GroupPolicyNumber" placeholder="First Name" readonly value="{{ $Insurance->GroupPolicyNumber  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="InsuredID">Insured ID</label>
            <input class="c-input" type="text" id="InsuredID" name="InsuredID" placeholder="First Name" readonly value="{{ $Insurance->InsuredID  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="PatientName">Patient Name</label>
            <input class="c-input" type="text" id="PatientName" name="PatientName" placeholder="First Name" readonly value="{{ $Insurance->PatientName  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="RelationToSubscriber">Relation to Subscriber</label>
            <input class="c-input" type="text" id="RelationToSubscriber" name="RelationToSubscriber" placeholder="First Name" readonly
              value="{{ $Insurance->RelationToSubscriber  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="Gender">Gender</label>
            <input class="c-input" type="text" id="Gender" name="Gender" placeholder="First Name" readonly value="{{ $Insurance->Gender  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="DOB">Date of Birth</label>
            <input class="c-input" type="text" id="DOB" name="DOB" placeholder="First Name" readonly value="{{ $Insurance->DOB  ?? ''}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="c-field">
            <label class="c-field__label" for="Status">Approval Status</label>
            <input class="c-input" type="text" id="Status" placeholder="First Name" readonly value="{{ $Insurance->Status  ?? ''}}">
          </div>
        </div>
      </div>
      <button type="submit" class="c-btn c-btn--info" style="display:none;" id="ajaxSubmit">Save</button>
    </div>
  </form>
</div>
<script type="text/javascript">
  $('#editBtn').on('click', function(e) {
    $("#InsuranceForm").each(function(){
      $(this).find(':input').prop('readonly','').focus();
      $('#CoverageTo').attr('type', 'date');
      $('#CoverageFrom').attr('type', 'date');

      $('#Status').prop('readonly','readonly');
      $('#ajaxSubmit').show();
      
    });
  });
  $(document).on('submit', 'form#InsuranceForm', function (event) {
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
