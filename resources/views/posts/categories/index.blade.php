@extends('layouts.app')

@section('title', __('admin.posts') . ' / ' . __('admin.categories') . ' |')

@section('content')
    <a href="{{ route('post-categories.create') }}" class="btn icon btn-primary plus-btn">
        <i class="bi bi-plus-lg"></i>
    </a>
    <div class="page-heading">
        <div class="page-title">
            <div class="row mb-3">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@lang('admin.all-posts')</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">@lang('admin.posts')</a></li>
                            <li class="breadcrumb-item">@lang('admin.categories')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @livewire('post.post-categories-table')
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    @include('partials._swal')
@endsection
