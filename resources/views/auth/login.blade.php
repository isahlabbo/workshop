<x-guest-layout>
    <x-jet-authentication-card>
    @section('title') 
    sign in
    @endsection
        <x-slot name="logo">
        <h5 class="text text-center text-primary">Sign in</h5>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
            
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-2">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mb-2">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="mb-2 ">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="items-center">
            
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}" id="register">
                        
                    </a>
                
            </div>

            <div class="flex items-center justify-end ">
                
               @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}" id="register">
                        Forgot Password
                    </a>
                @endif
                <x-jet-button class="btn btn-primary">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
