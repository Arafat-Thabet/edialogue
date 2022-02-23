<section style="background-image: url('{{asset('img/bg.jpg')}}');background-size: cover;"> 
<style>
    .bg-gray-100 {
    background-color: unset !important
}
</style>
<x-guest-layout >
    <x-jet-authentication-card>
        <div class="text-center flex justify-center">
    <img  src="{{asset('img/logo.png')}}" />
    </div>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="pt-6" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 mr-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-start mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

          
            </div>
       
            <div class="text-left">
            <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
              
                </div>
                <div class="text-left google">
                <a  href="{{ url('auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                </a>
                </div>
               
        </form>
     
    </x-jet-authentication-card>
</x-guest-layout>
</section>