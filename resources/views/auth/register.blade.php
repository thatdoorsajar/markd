@extends('public.layout')
@section('content')

<section class="flex flex-col">
    <h1 class="font-sans text-grey-light text-xl2 w-5/6 sm:w-2/3 lg:w-1/3 mx-auto mt-10 -mb-2">SIGN UP</h1>
    <div class="w-5/6 sm:w-2/3 lg:w-1/3 mx-auto p-4 md:pt-8 md:p-10 bg-white border-t-4 rounded-sm shadow">
        <form class="w-full" method="POST" action="/sign-up">
            @csrf
            <div class="flex mb-2">
                <label class="w-1/2 font-sans font-semibold text-lg text-grey-dark mb-1 md:mb-0 mr-4" for="first_name">
                    First Name
                </label>
                <label class="w-1/2 font-sans font-semibold text-lg text-grey-dark mb-1 md:mb-0" for="last_name">
                    Last Name
                </label>
            </div>
            <div class="flex items-stretch mb-4">
                <input class="w-1/2 bg-grey-light border-2 border-grey-lighter rounded p-2 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple mr-4" 
                    id="first_name" 
                    type="first_name" 
                    name="first_name" 
                    value="{{ old('first_name') }}" 
                    required 
                    autofocus>
                <input class="w-1/2 bg-grey-light border-2 border-grey-lighter rounded p-2 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" 
                    id="last_name" 
                    type="last_name" 
                    name="last_name" 
                    value="{{ old('last_name') }}" 
                    required>
            </div>
            <div>
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-2">
                <label class="block font-sans font-semibold text-lg text-grey-dark mb-1 md:mb-0" for="email">
                    Email
                </label>
            </div>
            <div class="mb-4">
                <input class="bg-grey-light border-2 border-grey-lighter rounded w-full p-2 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-2">
                <label class="block font-sans font-semibold text-lg text-grey-dark mb-1 md:mb-0" for="password">
                    Password
                </label>
            </div>
            <div class="mb-4">
                <input class="bg-grey-light border-2 border-grey-lighter rounded w-full p-2 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" 
                    id="password" 
                    type="password" 
                    name="password" 
                    value="{{ old('password') }}" 
                    required 
                    autofocus>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-2">
                <label class="block font-sans font-semibold text-lg text-grey-dark mb-1 md:mb-0" for="password-confirm">
                    Confirm Password
                </label>
            </div>
            <div class="mb-4">
                <input class="bg-grey-light border-2 border-grey-lighter rounded w-full p-2 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" 
                    id="password-confirm" 
                    type="password" 
                    name="password_confirmation"  
                    required>
            </div>
            <div>
                <hr class="h-px bg-grey-lighter mb-4">
                <button class="font-sans text-xl shadow bg-purple hover:bg-purple-light focus:shadow-outline focus:outline-none text-white font-bold p-2 rounded w-full" 
                    type="submit">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
