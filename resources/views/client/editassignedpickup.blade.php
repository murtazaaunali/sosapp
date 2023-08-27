@extends('client.layout.master') 
@section('title', 'Edit Assigned Pickup - Success On The Spectrum') 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-7">
            <div class="c-card u-p-medium u-mb-medium">
                <form id="addAssignedPickup" method="POST" action="{{ url('client/profile/saveassignedpickup')}}">
                    <div class="c-card u-p-medium u-text-small u-mb-small">
                        <h6 class="u-text-bold">Assigned Pickup</h6>
                        {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$Pickup->id}}">
                        <div class="editForm">
                            <div class="c-field">
                                <label class="c-field__label" for="firstName">Name</label>
                                <input class="c-input" type="text" id="name" name="name" placeholder="Name" value="{{$Pickup->name}}">
                            </div>
                            <div class="c-field">
                                <label class="c-field__label" for="lastName">Address</label>
                                <input class="c-input" type="text" id="address" name="address" placeholder="Address" value="{{$Pickup->address}}">
                            </div>
                            <div class="c-field">
                                <label class="c-field__label" for="lastName">Phone</label>
                                <input class="c-input" type="text" id="phone" name="phone" placeholder="Phone" value="{{$Pickup->phone}}">
                            </div>
                            <div class="c-field">
                                <label class="c-field__label" for="dateOfBirth">SSN</label>
                                <input class="c-input" type="text" id="ssn" name="ssn" placeholder="Social Security Number" value="{{$Pickup->ssn}}">
                            </div>
                        </div>
                    </div>
                    <div class="u-flex u-mt-medium">
                        <button type="submit" class="c-btn c-btn--info c-btn--fullwidth u-mr-xsmall">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-5">
        </div>
    </div>
</div>
@endsection