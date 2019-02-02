@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"  method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                {{ __('E-Mail Address') }}
            </label>
            <input id="email" 
                type="email" 
                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus
            >
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                {{ __('Password') }}
            </label>
            <input id="password" 
                type="password" 
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                name="password" 
                required
                >
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password-confirm">
                {{ __('Confirm Password') }}
            </label>
            <input id="password-confirm" 
                type="password" 
                class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                name="password_confirmation" 
                required
            >
        </div>

        <div class="flex items-center justify-between">
            <button class="button" type="submit">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</div>
@endsection
