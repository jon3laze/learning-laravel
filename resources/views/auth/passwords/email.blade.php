@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"  method="POST" action="{{ route('password.email') }}">
        @csrf
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

        <div class="flex items-center justify-between">
            <button class="button" type="submit">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
</div>
@endsection
