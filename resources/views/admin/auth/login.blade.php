@extends('layouts.auth_app')

@section('title', __('Login'))

@section('content')
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 p-0">
                <div class="card border-grey box-shadow-2 border-lighten-3 px-1 py-1 m-0 br-10">
                    <div class="card-header py-1 border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{ asset('backend/app-assets/images/logo/logo.png') }}" alt="branding logo">
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span>{{ __('Admin Login') }}</span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-0">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form class="form-horizontal form form-simple" action="{{ route('admin.login') }}"
                                  method="POST" novalidate>
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                                           required class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ __('Enter Email') }}" autocomplete="email" autofocus>
                                    <div class="form-control-position">
                                        <i class="feather icon-user"></i>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="{{ __('Enter Password') }}"
                                           required>
                                    <div class="form-control-position">
                                        <i class="fa fa-key"></i>
                                    </div>
                                    <div class="form-control-position-right">
                                        <i class="fa fa-eye-slash toggle-password" id="eye"></i>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-12 text-center text-sm-left">
                                        <fieldset>
                                            <input type="checkbox" name="remember" id="remember"
                                                   {{ old('remember') ? 'checked' : '' }} class="chk-remember">
                                            <label for="remember-me">{{ __('Remember Me') }}</label>
                                        </fieldset>
                                    </div>
                                    @if (Route::has('admin.password.request'))
                                        <div class="col-sm-6 col-12 text-center text-sm-right">
                                            <a href="{{ route('admin.password.request') }}"
                                               class="card-link">{{ __('Forgot Your Password?') }}</a>
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary br-10 btn-block submit-btn">
                                    <i class="feather icon-unlock"></i> {{ __('Login') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.toggle-password').click(function () {
                $(this).toggleClass('fa-eye fa-eye-slash');
                var input = $('#password');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                } else {
                    input.attr('type', 'password');
                }
            });
        });
    </script>
@endsection
