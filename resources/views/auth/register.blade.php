<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <style>
                #pw-container {
                position: relative;
                }

                #pw-container2 {
                position: relative;
                }

                #pw-eye {
                    position: absolute;
                    cursor: pointer;
                    right: 18px;
                    top: 38px;
                }

                #pw-eye2 {
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

                #pw-eye-slash2 {
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
                                required autocomplete="new-password" />
                <i id="pw-eye" onclick="passvisToggle()" class="las la-eye"></i>
                <i id="pw-eye-slash" onclick="passvisToggle()" class="las la-eye-slash"></i>
            </div>

            <!-- Confirm Password -->
            <div id="pw-container2" class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                <i id="pw-eye2" onclick="confPassvisToggle()" class="las la-eye"></i>
                <i id="pw-eye-slash2" onclick="confPassvisToggle()" class="las la-eye-slash"></i>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
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

        function confPassvisToggle() {
            let x = document.getElementById("password_confirmation");

            if (x.type === "password") {
                document.getElementById("pw-eye2").style.display = "none";
                document.getElementById("pw-eye-slash2").style.display = "block";
                x.type = "text";
            } else {
                document.getElementById("pw-eye2").style.display = "block";
                document.getElementById("pw-eye-slash2").style.display = "none";
                x.type = "password";
            }
        }
        </script>
    </x-auth-card>
</x-guest-layout>
