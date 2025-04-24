<x-guest-layout>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

        .glass-wrapper {
            width: 400px;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(9px);
            -webkit-backdrop-filter: blur(9px);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .welcome-container {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .welcome-container h1 {
            font-size: 2.7rem;
            color: #e0e0e0;
            font-family: "Open Sans", sans-serif;
            font-weight: 800;
            margin: 0;
        }

        .glass-wrapper h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #fff;
            font-family: "Open Sans", sans-serif;
        }

        .glass-wrapper form {
            display: flex;
            flex-direction: column;
        }

        .input-field {
            position: relative;
            border-bottom: 2px solid #ccc;
            margin: 15px 0;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            color: #fff;
            font-size: 16px;
            pointer-events: none;
            transition: 0.15s ease;
            font-family: "Open Sans", sans-serif;
        }

        .input-field input {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: #fff;
            font-family: "Open Sans", sans-serif;
        }

        .input-field input:focus~label,
        .input-field input:not(:placeholder-shown)~label {
            font-size: 0.8rem;
            top: 10px;
            transform: translateY(-120%);
        }

        .glass-wrapper a {
            color: #efefef;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .glass-wrapper a:hover {
            text-decoration: underline;
        }

        .glass-wrapper button {
            background: #fff;
            color: #000;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
            border: 2px solid transparent;
            transition: 0.3s ease;
            font-family: "Open Sans", sans-serif;
        }

        .glass-wrapper button:hover {
            color: #fff;
            border-color: #fff;
            background: rgba(255, 255, 255, 0.15);
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
            color: #fff;
            font-family: "Open Sans", sans-serif;
        }

        .register-link p {
            font-size: 0.9rem;
        }

        .validation-errors {
            margin-bottom: 1rem;
            color: #f87171;
        }
    </style>

    <div class="relative min-h-screen flex items-center justify-center"
        style="background: url('{{ asset('images/backgrounds/backgorund-office.gif') }}') no-repeat center center; background-size: cover; background-color: #000;">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="glass-wrapper relative z-10">
            <div class="welcome-container">
                <h1>Welcome to Daily Log System</h1>
            </div>
            <h2>Register</h2>

            <x-validation-errors class="validation-errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-field">
                    <x-input id="name" type="text" name="name" :value="old('name')" required autofocus
                        placeholder=" " />
                    <x-label for="name" value="{{ __('Name') }}" />
                </div>

                <div class="input-field">
                    <x-input id="email" type="email" name="email" :value="old('email')" required placeholder=" " />
                    <x-label for="email" value="{{ __('Email') }}" />
                </div>

                <div class="input-field">
                    <x-input id="password" type="password" name="password" required autocomplete="new-password"
                        placeholder=" " />
                    <x-label for="password" value="{{ __('Password') }}" />
                </div>

                <div class="input-field">
                    <x-input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder=" " />
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="text-left mt-4 text-white text-sm">
                                    <label for="terms" class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />
                                        <span class="ml-2">{!! __('I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-white">' . __('Terms of Service') . '</a>',
                        'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-white">' . __('Privacy Policy') . '</a>',
                    ]) !!}</span>
                                    </label>
                                </div>
                @endif

                <button type="submit" class="mt-6">
                    {{ __('Register') }}
                </button>

                <div class="register-link">
                    <p>{{ __('Already registered?') }} <a href="{{ route('login') }}">{{ __('Log in') }}</a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>