@extends('admin.layouts.auth_app')

@section('title', 'Reset Password')

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
                                    @if (session('invalid'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('invalid') }}
                                        </div>

                                        <a href="{{ route('admin.password.request') }}" class="btn btn-secondary btn-block mb-1">{{ __('Resend Link') }}</a>
                                    @endif
                                    <form method="POST" class="form form-horizontal form-simple" action="{{ route('admin.password.resetPassword') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                            <div class="form-control-position">
                                                <i class="feather icon-mail"></i>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password" placeholder="Password">
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                            required autocomplete="new-password" placeholder="Password Confirmation">
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>
                                        </fieldset>

                                        <button type="submit" class="btn btn-primary br-10 btn-block submit-btn">
                                            <i class="feather icon-unlock"></i> {{ __('Reset Password') }}
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
