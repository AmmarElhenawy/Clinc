@extends('layouts.master2')

@section('title')
تسجيل الدخول
@stop


@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('https://unpkg.com/bs-brain@2.0.4/components/logins/login-5/assets/css/login-5.css')}}">
@endsection
@section('content')
<!-- Login 5 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="card border-light-subtle shadow-sm">
        <div class="row g-0">
          <div class="col-12 col-md-6 text-bg-primary">
            <div class="d-flex align-items-center justify-content-center h-100">
              <div class="col-10 col-xl-8 py-3">
                <img class="img-fluid rounded mb-4" loading="" src="/resources/img/invoice-icon.jpg" width="245" height="80" alt="BootstrapBrain Logo">
                <hr class="border-primary-subtle mb-4">
                <h2 class="h1 mb-4">We make digital products that drive you to stand out.</h2>
                <p class="lead m-0">We write words, take photos, make videos, and interact with artificial intelligence.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="card-header">{{ __('Login') }}</div>
              <div class="row">
                <div class="col-12">
                  <div class="mb-5">
                    <h3>Log in</h3>
                  </div>
                </div>
              </div>
              <div class="card-header">{{ __('Login') }}</div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row gy-3 gy-md-4 overflow-hidden">
                  <div class="col-12">
                    <label for="email" class="form-label">{{ __('Email Address') }}<span class="text-danger">*</span></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>
                  <div class="col-12">
                    <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="form-check-label text-secondary" for="remember">
                            {{ __('Remember Me') }}
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button class="btn bsb-btn-xl btn-primary" type="submit">
                        {{ __('Login') }}
                      </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-12">
                  <hr class="mt-5 mb-4 border-secondary-subtle">
                  <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                    <a href="#!" class="link-secondary text-decoration-none">Create new account</a>
                    <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>
                  </div>
                </div>
              </div>
  </section>
@endsection
