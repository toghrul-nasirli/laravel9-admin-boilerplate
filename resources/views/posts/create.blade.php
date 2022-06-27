@extends('layouts.app')

@section('title', __('admin.posts') . ' - ' . __('admin.new') . ' |')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row mb-3">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@lang('admin.add')</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">@lang('admin.posts')</a></li>
                            <li class="breadcrumb-item">@lang('admin.new')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="text-center">
                                            <img id="previewImage" src="{{ _asset() }}" class="profile-user-img img-circle" height="100px" width="100px">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div>@lang('admin.image')</div>
                                                <div class="input-group">
                                                    <label for="image" class="input-group-text"><i class="bi bi-upload"></i></label>
                                                    <input type="file" accept="image/*" id="image" name="image" class="form-control">
                                                </div>
                                            </div>
                                            @error('image')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">@lang('admin.categories')</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option>@lang('admin.choose')</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input id="title" name="title" value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="@lang('admin.title')">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-pen"></i>
                                                </div>
                                                @error('title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <textarea id="text" name="text" class="form-control editor" placeholder="@lang('admin.text')">{{ old('text') }}</textarea>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-textarea-t"></i>
                                                </div>
                                            </div>
                                            @error('text')
                                                <small class="text-danger">
                                                    <b>{{ $message }}</b>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input id="description" name="description" value="{{ old('description') }}" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="@lang('admin.meta-description')">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-card-text"></i>
                                                </div>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input id="keywords" name="keywords" value="{{ old('keywords') }}" type="text" class="form-control @error('keywords') is-invalid @enderror" placeholder="@lang('admin.meta-keywords')">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-card-text"></i>
                                                </div>
                                                @error('keywords')
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

@section('scripts')
    <script>
        $(function() {
            image.onchange = evt => {
                const [file] = image.files;
                if (file) {
                    previewImage.src = URL.createObjectURL(file);
                }
            }

            $('input[type="file"]').on('change', function() {
                $(this).next('label').text(this.files[0].name);
            });
        });
    </script>
@endsection
