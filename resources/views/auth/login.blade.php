{{--  <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>  --}}




@extends('admin.layout.master')

@section('content')
    <!-- login Content -->
    <main class="mt-0 main-content">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="top-0 my-auto text-center col-6 d-lg-flex d-none h-100 pe-0 position-absolute start-0 justify-content-center flex-column">
                            <div class="m-3 position-relative bg-gradient-primary h-100 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Sign in</h4>
                                    <p class="mb-0">Enter your email and password to log in </p>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-3 input-group input-group-outline">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control" required>
                                        </div>

                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <div class="mb-3 input-group input-group-outline">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>

                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <div class="form-check form-check-info text-start ps-0">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="flexCheckDefault">

                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember Me
                                            </label>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="mt-4 mb-0 btn btn-lg bg-gradient-primary w-100">
                                                Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="px-1 pt-0 text-center card-footer px-lg-2">
                                    <p class="mx-auto mb-2 text-sm">
                                        Already have an account?
                                        <a href="../pages/sign-in.html"
                                            class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
