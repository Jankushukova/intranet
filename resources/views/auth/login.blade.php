@extends('layouts.unauth_app')

@section('content')

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-8 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                                        </div>
                                        <input type="email"
                                               class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror"
                                               name="email" placeholder="Email"
                                               id="exampleInputEmail"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                                        </div>
                                        <input id="exampleInputPassword" type="password"
                                               class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror"
                                               name="password" placeholder="Password"
                                               required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Keep me signed in
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="auth-link text-black" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="my-3">
                                    <button type="submit"
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018
                            All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->

@endsection
