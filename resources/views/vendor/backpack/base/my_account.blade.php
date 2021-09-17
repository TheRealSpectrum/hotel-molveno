@extends(backpack_view('blank'))

@section('after_styles')
    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
    <style>
        #pw-container1, #pw-container2, #pw-container3 {
           position: relative;
        }

        #pw-eye1, #pw-eye2, #pw-eye3 {
            position: absolute;
            cursor: pointer;
            right: 30px;
            top: 44px;
        }

        #pw-eye-slash1, #pw-eye-slash2, #pw-eye-slash3 {
            position: absolute;
            cursor: pointer;
            display: none;
            right: 30px;
            top: 44px;
        }
    </style>
@endsection

@php
  $breadcrumbs = [
      trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
      trans('backpack::base.my_account') => false,
  ];
@endphp

@section('header')
    <section class="content-header">
        <div class="container-fluid mb-3">
            <h1>{{ trans('backpack::base.my_account') }}</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">

        @if (session('success'))
        <div class="col-lg-8">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
        @endif

        @if ($errors->count())
        <div class="col-lg-8">
            <div class="alert alert-danger">
                <ul class="mb-1">
                    @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        {{-- UPDATE INFO FORM --}}
        <div class="col-lg-8">
            <form class="form" action="{{ route('backpack.account.info.store') }}" method="post">

                {!! csrf_field() !!}

                <div class="card padding-10">

                    <div class="card-header">
                        {{ trans('backpack::base.update_account_info') }}
                    </div>

                    <div class="card-body backpack-profile-form bold-labels">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                @php
                                    $label = trans('backpack::base.name');
                                    $field = 'name';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                            </div>

                            <div class="col-md-6 form-group">
                                @php
                                    $label = config('backpack.base.authentication_column_name');
                                    $field = backpack_authentication_column();
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input required class="form-control" type="{{ backpack_authentication_column()=='email'?'email':'text' }}" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="la la-save"></i> {{ trans('backpack::base.save') }}</button>
                        <a href="{{ backpack_url() }}" class="btn">{{ trans('backpack::base.cancel') }}</a>
                    </div>
                </div>

            </form>
        </div>
        
        {{-- CHANGE PASSWORD FORM --}}
        <div class="col-lg-8">
            <form class="form" action="{{ route('backpack.account.password') }}" method="post">

                {!! csrf_field() !!}

                <div class="card padding-10">

                    <div class="card-header">
                        {{ trans('backpack::base.change_password') }}
                    </div>

                    <div class="card-body backpack-profile-form bold-labels">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                @php
                                    $label = trans('backpack::base.old_password');
                                    $field = 'old_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <div class="pw-container1">
                                    <input id="pw-input1" autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                                    <i id="pw-eye1" onclick="oldPassvisToggle()" class="las la-eye"></i>
                                    <i id="pw-eye-slash1" onclick="oldPassvisToggle()" class="las la-eye-slash"></i>
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                @php
                                    $label = trans('backpack::base.new_password');
                                    $field = 'new_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <div class="pw-container2">
                                    <input id="pw-input2" autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                                    <i id="pw-eye2" onclick="newPassvisToggle()" class="las la-eye"></i>
                                    <i id="pw-eye-slash2" onclick="newPassvisToggle()" class="las la-eye-slash"></i>
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                @php
                                    $label = trans('backpack::base.confirm_password');
                                    $field = 'confirm_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <div class="pw-container3">
                                    <input id="pw-input3" autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                                    <i id="pw-eye3" onclick="confirmPassvisToggle()" class="las la-eye"></i>
                                    <i id="pw-eye-slash3" onclick="confirmPassvisToggle()" class="las la-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="la la-save"></i> {{ trans('backpack::base.change_password') }}</button>
                            <a href="{{ backpack_url() }}" class="btn">{{ trans('backpack::base.cancel') }}</a>
                    </div>

                </div>

            </form>
        </div>

    </div>
    <script>
        function oldPassvisToggle() {
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

        function newPassvisToggle() {
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

        function confirmPassvisToggle() {
            let x = document.getElementById("pw-input3");

            if (x.type === "password") {
                document.getElementById("pw-eye3").style.display = "none";
                document.getElementById("pw-eye-slash3").style.display = "block";
                x.type = "text";
            } else {
                document.getElementById("pw-eye3").style.display = "block";
                document.getElementById("pw-eye-slash3").style.display = "none";
                x.type = "password";
            }
        }
    </script>
@endsection
