@extends('layout.auth')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="px-0 content-wrapper d-flex align-items-center auth">
            <div class="mx-0 row w-100">
                <div class="mx-auto col-lg-4">
                    <div class="px-4 py-5 text-left auth-form-light px-sm-5">

                        <div class="brand-logo">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo">
                        </div>

                        <h4>Create your account</h4>
                        <h6 class="mb-4 font-weight-light">
                            Signing up is easy. It only takes a few steps.
                        </h6>

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="pt-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Name --}}
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control form-control-lg"
                                    placeholder="Full Name"
                                    required
                                    autofocus>
                            </div>

                            {{-- Email --}}
                            <div class="form-group">
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control form-control-lg"
                                    placeholder="Email Address"
                                    required>
                            </div>

                            {{-- Password --}}
                            <div class="form-group">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control form-control-lg"
                                    placeholder="Password"
                                    required>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="form-group">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control form-control-lg"
                                    placeholder="Confirm Password"
                                    required>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="terms"
                                        required>

                                    <label class="form-check-label text-muted" for="terms">
                                        I agree to the Terms & Conditions
                                    </label>
                                </div>
                            </div>

                            <div class="mt-3 d-grid">
                                <button type="submit"
                                    class="btn btn-primary btn-lg font-weight-medium auth-form-btn w-100">
                                    SIGN UP
                                </button>
                            </div>

                            <div class="mt-4 text-center font-weight-light">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-primary">
                                    Login
                                </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
