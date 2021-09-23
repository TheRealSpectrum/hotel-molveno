<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <style>
                #pw-container {
                position: relative;
                }

                #pw-eye {
                    position: absolute;
                    cursor: pointer;
                    right: 18px;
                    top: 38px;
                }

                #pw-eye-slash {
                    position: absolute;
                    cursor: pointer;
                    display: none;
                    right: 18px;
                    top: 38px;
                }
            </style>
            <div id="pw-container" class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <i id="pw-eye" onclick="passvisToggle()" class="las la-eye"></i>
                <i id="pw-eye-slash" onclick="passvisToggle()" class="las la-eye-slash"></i>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <script>
            function passvisToggle() {
            let x = document.getElementById("password");

            if (x.type === "password") {
                document.getElementById("pw-eye").style.display = "none";
                document.getElementById("pw-eye-slash").style.display = "block";
                x.type = "text";
            } else {
                document.getElementById("pw-eye").style.display = "block";
                document.getElementById("pw-eye-slash").style.display = "none";
                x.type = "password";
            }
        }
        </script>
    </x-auth-card>
</x-guest-layout>
