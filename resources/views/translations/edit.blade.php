@extends('layouts.app')

@section('title', __('admin.translates') . ' - ' . __('admin.edit') . ' |')

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
                            <li class="breadcrumb-item"><a href="{{ route('translations.index', $translation->group) }}">@lang('admin.translates')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('admin.edit')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('translations.update', $translation) }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input id="key" name="key" value="{{ $translation->key }}" type="text" class="form-control" placeholder="@lang('admin.key-placeholder')">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-key"></i>
                                                </div>
                                                @error('key')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($locales as $locale)
                                        <div class="col-md-6">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <textarea id="{{ $locale->key }}" name="{{ $locale->key }}" class="form-control" placeholder="@lang('admin.locale-placeholder', ['locale' => $locale->lang])">{{ $translation->text[$locale->key] }}</textarea>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-translate"></i>
                                                    </div>
                                                </div>
                                                @error($locale->key)
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">@lang('admin.save')</button>
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
