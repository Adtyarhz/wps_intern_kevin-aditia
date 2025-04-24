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

        .input-field input:focus ~ label,
        .input-field input:not(:placeholder-shown) ~ label {
            font-size: 0.8rem;
            top: 10px;
            transform: translateY(-120%);
        }

        .forget {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 25px 0 35px 0;
            color: #fff;
            font-family: "Open Sans", sans-serif;
        }

        .forget label {
            display: flex;
            align-items: center;
        }

        .forget label p {
            margin-left: 8px;
            font-size: 0.9rem;
        }

        #remember_me {
            accent-color: #fff;
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

        .register {
            text-align: center;
            margin-top: 30px;
            color: #fff;
            font-family: "Open Sans", sans-serif;
        }

        .register p {
            font-size: 0.9rem;
        }

        .validation-errors {
            margin-bottom: 1rem;
        }

        .status-message {
            margin-bottom: 1rem;
            font-family: "Open Sans", sans-serif;
        }
    </style>

    <div class="relative min-h-screen flex items-center justify-center" style="background: url('{{ asset('images/backgrounds/backgorund-office.gif') }}') no-repeat center center; background-size: cover; background-color: #000;">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="glass-wrapper relative z-10">
            <h2>Login</h2>

            <x-validation-errors class="validation-errors" />

            @session('status')
                <div class="status-message font-medium text-sm text-green-400">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-field">
                    <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder=" " />
                    <x-label for="email" value="{{ __('Enter your email') }}" />
                </div>

                <div class="input-field">
                    <x-input id="password" type="password" name="password" required autocomplete="current-password" placeholder=" " />
                    <x-label for="password" value="{{ __('Enter your password') }}" />
                </div>

                <div class="forget">
                    <label for="remember_me">
                        <x-checkbox id="remember_me" name="remember" />
                        <p>{{ __('Remember me') }}</p>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <x-button>
                    {{ __('Log In') }}
                </x-button>

                @if (Route::has('register'))
                    <div class="register">
                        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-guest-layout>