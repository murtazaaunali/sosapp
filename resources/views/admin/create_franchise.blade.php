@extends('admin.layout.master') 
@section('content')
<div class="container-fluid">
    <div class="c-card c-card--responsive u-mb-medium">
        <div class="c-card__header c-card__header--transparent o-line">
            <h5 class="c-card__title">Create Franchise</h5>
        </div>
        <div class="row u-mb-medium">
            <div class="col-12">
                <div class="c-field">
                    <label class="c-field__label" for="input1">Location</label>
                    <input class="c-input" id="input1" type="text" placeholder="Placeholder">
                </div>
                <div class="c-field">
                    <label class="c-field__label" for="input1">City</label>
                    <input class="c-input" id="input1" type="text" placeholder="Placeholder">
                </div>
                <div class="c-field">
                    <label class="c-field__label" for="input1">State</label>
                    <input class="c-input" id="input1" type="text" placeholder="Placeholder">
                </div>
                <div class="c-field">
                    <label class="c-field__label" for="input1">Address</label>
                    <input class="c-input" id="input1" type="text" placeholder="Placeholder">
                </div>
                <div class="c-field">
                    <label class="c-field__label" for="input1">Date Opened</label>
                    <input class="c-input" id="input1" type="text" placeholder="Placeholder">
                </div>
                <div class="c-field">
                    <label class="c-field__label" for="input1">Date FDD Signed </label>
                    <input class="c-input" id="input1" type="text" placeholder="Placeholder">
                </div>
                <div class="c-field">
                    <label class="c-field__label" for="input1">Date FDD Expires </label>
                    <input class="c-input" id="input1" type="text" placeholder="Placeholder">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection