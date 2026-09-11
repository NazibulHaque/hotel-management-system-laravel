@extends('admin.layouts.auth_app')

@section('title', 'Forgot Password')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey box-shadow-2 border-lighten-3 px-1 py-1 m-0 br-10">
                            <div class="card-header py-1 border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="{{ asset('public/backend/app-assets/images/logo/logo.png') }}" alt="branding logo">
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>{{ __('Admin/Employee Reset Password') }}</span>
                                </h6>
                            </div>
                            <div class="card-content">

                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form method="POST" class="form form-horizontal form-simple" action="{{ route('admin.password.request') }}">
                                        @csrf

                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" id="email" placeholder="Enter Your Email" required autofocus>
                                            <div class="form-control-position">
                                                <i class="feather icon-mail"></i>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group row">
                                            @if (Route::has('admin.login'))
                                                <div class="col-12 text-center text-sm-right">
                                                    <a href="{{ route('admin.login') }}"
                                                        class="card-link">{{ __('Have account?') }} {{ __('Login') }}</a>
                                                </div>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary br-10 btn-block submit-btn">
                                            <i class="feather icon-unlock"></i> {{ __('Send Password Reset Link') }}
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')

@endsection
