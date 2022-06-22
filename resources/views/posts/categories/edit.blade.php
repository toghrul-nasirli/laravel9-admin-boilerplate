@extends('layouts.app')

@section('title', __('admin.posts') . ' / ' . __('admin.categories') . ' - ' . __('admin.edit') . ' |')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row mb-3">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@lang('admin.edit')</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">@lang('admin.posts')</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('post-categories.index') }}">@lang('admin.categories')</a></li>
                            <li class="breadcrumb-item">@lang('admin.edit')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('post-categories.update', $postCategory) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input id="name" name="name" value="{{ $postCategory->name }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('admin.name')">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">@lang('admin.add')</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">@lang('admin.reset')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
