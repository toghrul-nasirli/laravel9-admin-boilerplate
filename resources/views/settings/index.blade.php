@extends('layouts.app')

@section('title', __('admin.settings') . ' |')

@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>@lang('admin.settings')</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('admin.admin')</a></li>
                        <li class="breadcrumb-item active">@lang('admin.settings')</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PATCH')
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@lang('admin.main-settings')</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <img id="previewLogo" src="{{ _asset('images/settings', $settings->logo) }}" class="profile-user-img img-circle" height="100px" width="100px">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div>@lang('admin.logo')</div>
                                                    <div class="input-group">
                                                        <label for="logo" class="input-group-text"><i class="bi bi-upload"></i></label>
                                                        <input type="file" accept="image/*" id="logo" name="logo" class="form-control">
                                                    </div>
                                                </div>
                                                @error('logo')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <img id="previewFavicon" src="{{ _asset('images/settings', $settings->favicon) }}" class="profile-user-img img-circle" height="100px" width="100px">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div>@lang('admin.favicon')</div>
                                                    <div class="input-group">
                                                        <label for="favicon" class="input-group-text"><i class="bi bi-upload"></i></label>
                                                        <input type="file" accept="image/*" id="favicon" name="favicon" class="form-control">
                                                    </div>
                                                </div>
                                                @error('favicon')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="title">@lang('admin.title')</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ $settings->title }}" placeholder="@lang('admin.title')">
                                                @error('title')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">@lang('admin.email')</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $settings->email }}" placeholder="@lang('admin.email')">
                                                @error('email')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">@lang('admin.phone')</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $settings->phone }}" placeholder="@lang('admin.phone')">
                                                @error('phone')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="about">@lang('admin.about')</label>
                                                <textarea class="form-control editor" rows="4" id="about" name="about" placeholder="@lang('admin.about')">{{ $settings->about }}</textarea>
                                                @error('about')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">@lang('admin.save')</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('settings.update-seo') }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PATCH')
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">SEO</h3>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">META Description</label>
                                                <input type="text" class="form-control" id="description" name="description" value="{{ $settings->description }}" placeholder="@lang('admin.meta-description')">
                                                @error('description')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="keywords">META Keywords</label>
                                                <input type="text" class="form-control" id="keywords" name="keywords" value="{{ $settings->keywords }}" placeholder="@lang('admin.meta-keywords')">
                                                @error('keywords')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="robots">Robots.txt</label>
                                                <textarea class="form-control" rows="4" id="robots" name="robots" placeholder="@lang('admin.robots')">{{ $robots }}</textarea>
                                                @error('robots')
                                                    <small class="text-danger">
                                                        <b>{{ $message }}</b>
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">@lang('admin.save')</button>
                                <a href="{{ route('settings.update-sitemap') }}" class="btn btn-secondary btn-gradient btn-sm">@lang('admin.update-sitemap')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            logo.onchange = evt => {
                const [file] = logo.files;
                if (file) {
                    previewLogo.src = URL.createObjectURL(file);
                }
            }
            favicon.onchange = evt => {
                const [file] = favicon.files;
                if (file) {
                    previewFavicon.src = URL.createObjectURL(file);
                }
            }

            $('input[type="file"]').on('change', function() {
                $(this).next('label').text(this.files[0].name);
            });
        });
    </script>
@endsection
