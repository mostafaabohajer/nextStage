@extends('layouts.app_dashboard')
@php
    $route = 'companies.ajax.page';
    $bivBack = 'companies';
@endphp
@section('content_dashboard')
    <!-- Page Heading -->
    <div class="header-title-dash p-3">
        <h1 class="h3 mb-0 text-gray-800">Company</h1>
    </div>
    <div class="p-3">
        <a href="{{route('companies.create')}}" class="btn btn-success mb-3">Create new company</a>

        <div class="pt-2 border-list-dash">
            <div class="p-3 header-title-dash">
                Companies list
            </div>
            <div id="companies" class="p-3">
                @include('ajax.companies_ajax')
            </div>

        </div>

    </div>
    @include('ajax.scriptPage.script_ajax_pagination_request')
@endsection
