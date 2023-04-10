@extends('layouts.app_dashboard')
@php
    $route = 'employees.ajax.page';
    $bivBack = 'employees';
@endphp
@section('content_dashboard')
    <!-- Page Heading -->
    <div class="header-title-dash p-3">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>
    <div class="p-3">
        <a href="{{route('employee.create')}}" class="btn btn-success mb-3">Create new employee</a>

        <div class="pt-2 border-list-dash">
            <div class="p-3 header-title-dash">
                employees list
            </div>
            <div id="employees">
                @include('ajax.employees_ajax')
            </div>
        </div>
    </div>
    @include('ajax.scriptPage.script_ajax_pagination_request')
@endsection
