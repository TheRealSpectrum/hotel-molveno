@extends(backpack_view('layouts.plain'))

@section('content')
<style>
    #pw-container1 {
       position: relative;
    }

    #pw-container2 {
        position: relative;
    }

    #pw-eye1 {
        position: absolute;
        cursor: pointer;
        right: 30px;
        top: 216px;
    }

    #pw-eye-slash1 {
        position: absolute;
        cursor: pointer;
        display: none;
        right: 30px;
        top: 216px;
    }

    #pw-eye2 {
        position: absolute;
        cursor: pointer;
        right: 30px;
        top: 302px;
    }

    #pw-eye-slash2 {
        position: absolute;
        cursor: pointer;
        display: none;
        right: 30px;
        top: 302px;
    }

    .img-container {
        display: flex;
        justify-content: center;
    }
</style>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-4">
            <div class="img-container">
                <a href="/">
                    <img src="{{ url("images/Logo Molveno Resort Black.svg") }}" alt="Molveno Resort Logo" height="150" width="150">
                </a>
            </div>
            <h3 class="text-center mb-4">{{ trans('backpack::base.register') }} admin account</h3>
            <div class="card">
                <div class="card-body">
                    <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="control-label" for="name">{{ trans('backpack::base.name') }}</label>

                            <div>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="{{ backpack_authentication_column() }}">{{ config('backpack.base.authentication_column_name') }}</label>

                            <div>
                                <input type="{{ backpack_authentication_column()=='email'?'email':'text'}}" class="form-control{{ $errors->has(backpack_authentication_column()) ? ' is-invalid' : '' }}" name="{{ backpack_authentication_column() }}" id="{{ backpack_authentication_column() }}" value="{{ old(backpack_authentication_column()) }}">

                                @if ($errors->has(backpack_authentication_column()))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first(backpack_authentication_column()) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">{{ trans('backpack::base.password') }}</label>

                            <div>
                                <div class="pw-container1">
                                    <input id="pw-input1" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password">
                                    @if (!$errors->has("password"))
                                    <i id="pw-eye1" onclick="passvisToggle()" class="las la-eye"></i>
                                    <i id="pw-eye-slash1" onclick="passvisToggle()" class="las la-eye-slash"></i>
                                    @endif
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password_confirmation">{{ trans('backpack::base.confirm_password') }}</label>

                            <div>
                                <div class="pw-container2">
                                    <input id="pw-input2" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">
                                    @if (!$errors->has("password"))
                                    <i id="pw-eye2" onclick="confirmPassvisToggle()" class="las la-eye"></i>
                                    <i id="pw-eye-slash2" onclick="confirmPassvisToggle()" class="las la-eye-slash"></i>
                                    @endif
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ trans('backpack::base.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (backpack_users_have_email() && config('backpack.base.setup_password_recovery_routes', true))
                <div class="text-center"><a href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a></div>
            @endif
            <div class="text-center"><a href="{{ route('backpack.auth.login') }}">{{ trans('backpack::base.login') }}</a></div>
        </div>
    </div>
    <script>
            function passvisToggle() {
            let x = document.getElementById("pw-input1");

            if (x.type === "password") {
                document.getElementById("pw-eye1").style.display = "none";
                document.getElementById("pw-eye-slash1").style.display = "block";
                x.type = "text";
            } else {
                document.getElementById("pw-eye1").style.display = "block";
                document.getElementById("pw-eye-slash1").style.display = "none";
                x.type = "password";
            }
        }

        function confirmPassvisToggle() {
            let x = document.getElementById("pw-input2");

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
@endsection
