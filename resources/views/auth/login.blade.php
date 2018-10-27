@extends('public.layout')
@section('content')

<section class="flex flex-col">
    <h1 class="font-sans text-grey-light text-xl2 w-5/6 sm:w-2/3 lg:w-1/3 mx-auto mt-10 -mb-2">SIGN IN</h1>
    <div class="w-5/6 sm:w-2/3 lg:w-1/3 mx-auto p-4 md:pt-8 md:p-10 bg-white border-t-4 rounded-sm shadow">
        <form class="w-full" method="POST" action="/sign-in">
            @csrf
            <div class="mb-2">
                <label class="block font-sans font-semibold text-lg text-grey-dark mb-1 md:mb-0" for="email">
                    Email or Username
                </label>
            </div>
            <div class="mb-4">
                <input class="bg-grey-light appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus>
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
                <input class="bg-grey-light appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" 
                    id="password" 
                    type="password" 
                    name="password" 
                    required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-4">
                {{-- <label class="md:w-2/3 block font-sans font-semibold text-lg text-grey-dark">
                    <input class="mr-2 leading-tight" 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        {{ old('remember') ? 'checked' : '' }}>
                    <span class="font-sans text-md" for="remember">
                        Remember me
                    </span>
                </label> --}}
                <label class="flex items-center" for="remember">
                    <span class="toggle" role="checkbox" tabindex="0" aria-checked="true"></span>
                    <p class="font-sans ml-4 font-semibold text-md text-grey-dark">Remember me</p>
                </label>
            </div>
            <div>
                <button class="font-sans text-xl shadow bg-grey-darker hover:bg-grey-dark focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-full" 
                    type="submit">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</section>


@endsection
