@extends('Users.layouts.auth')

@section('htmlheader_title')
    Register here
@endsection

@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Users Account</b></a>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>
            <form action="{{ route('user.store')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username"
                           name="username" value="{{ old('username') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control"
                           placeholder="email"
                           name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control"
                           placeholder="password"
                           name="password" value=""/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control"
                           placeholder="conform password"
                           name="conformpassword" value=""/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div>Personal information</div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Name"
                           name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control"
                           placeholder="Country" name="country"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control"
                           placeholder="Url"
                           name="url"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="date" class="form-control"
                           name="date"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>


                <div class="form-group">
         <textarea name='body' class="form-control">

         </textarea>
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat">Create new account
                </button>
                <!-- /.col -->
            </form>

            <a href="{{route('user.login')}}"
               class="text-center"> Redirect to login if already register</a>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    @include('layouts.partials.scripts_auth')
    @include('auth.terms')


    </body>

@endsection
