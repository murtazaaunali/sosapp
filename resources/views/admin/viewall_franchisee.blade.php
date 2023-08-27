@extends('admin.layout.master') 
@section('content')
<div class="container-fluid">
    <div class="row u-mb-large">
        <div class="col-12">
            <div class="c-whitebox">
                <div class="titlerow">
                    <h3>Franchise Owners </h3>
                    <a class="c-btn c-btn--info editPorBtn" data-toggle="modal" data-target="#uploadDoco" href="#!">
                        <i class="x-plus u-mr-xsmall"></i> New
                    </a>
                </div>
                <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                    <table class="c-table dataTable no-footer" id="datatable" role="grid" aria-describedby="datatable_info">
                        <thead class="c-table__head c-table__head--slim">
                            <tr class="c-table__row" role="row">
                                <th class="c-table__cell c-table__cell--head ">Name</th>
                                <th class="c-table__cell c-table__cell--head ">Email</th>
                                <th class="c-table__cell c-table__cell--head ">Address</th>
                                <th class="c-table__cell c-table__cell--head ">Business Phone</th>
                                <th class="c-table__cell c-table__cell--head ">Business Email</th>
                                <th class="c-table__cell c-table__cell--head">Status</th>
                                <th class="c-table__cell c-table__cell--head no-sort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Franchisees as $Franchisee)
                            <tr class="c-table__row odd" role="row">
                                <td class="c-table__cell">{{ $Franchisee->name }}</td>
                                <td class="c-table__cell">{{ $Franchisee->email }}</td>
                                <td class="c-table__cell">{{ $Franchisee->Address }}</td>
                                <td class="c-table__cell">{{ $Franchisee->BusinessPhone }}</td>
                                <td class="c-table__cell">{{ $Franchisee->BusinessEmail }}</td>
                                <td class="c-table__cell">{{ $Franchisee->status }}</td>
                                <td class="c-table__cell">
                                    <a href="{{ $Franchisee->url }}">View</a>
                                    <a href="{{ $Franchisee->url }}">Edit</a>
                                    <a href="{{ $Franchisee->url }}">Delete</a>
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
@endsection