@extends('layouts.app')

@section('title', __('admin.translates') . ' |')

@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    @can('superable')
        <a href="{{ route('translations.create', $group) }}" class="btn icon btn-primary plus-btn">
            <i class="bi bi-plus-lg"></i>
        </a>
    @endcan
    <div class="page-heading">
        <div class="page-title">
            <div class="row mb-3">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@lang('admin.translates')</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">@lang('admin.translates')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @livewire('translations-table', ['group' => $group])
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    @include('partials._swal')
@endsection
