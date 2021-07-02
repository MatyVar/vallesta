@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-20">

                    <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6 mb-0">{{ __('Reset Password') }}
                    </div>


                    <form method="POST" class="py-10 px-5" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                       
                            <label for="email" class="block text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>

                            <div class="flex flex-wrap mb-6">
                                <input id="email" type="email"
                                    class="p-3 bg-gray-200 rounded form-input w-full @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" novalidate autocomplete="email"
                                    autofocus>

                                @error('email')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    

                      
                            <label for="password" class="block text-gray-700 text-sm mb-2">{{ __('Password') }}</label>

                            <div class="flex flex-wrap mb-6">
                                <input id="password" type="password"
                                    class="p-3 bg-gray-200 rounded form-input w-full @error('password') is-invalid @enderror"
                                    name="password" novalidate autocomplete="new-password">

                                @error('password')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                      

                      
                            <label for="password-confirm"
                                class="block text-gray-700 text-sm mb-2">{{ __('Confirm Password') }}</label>

                            <div class="flex flex-wrap mb-6">
                                <input id="password-confirm" type="password"
                                    class="p-3 bg-gray-200 rounded form-input w-full" name="password_confirmation" novalidate
                                    autocomplete="new-password">
                            </div>
                   

                        <div class="flex flex-wrap ">
                         
                                <button type="submit"
                                    class="bg-red-400  w-full hover:bg-red-500 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase">
                                    {{ __('Reset Password') }}
                                </button>
                     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
