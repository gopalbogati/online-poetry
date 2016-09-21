@extends('layouts.includes.front')
@section('content')
    <div class="wrap">
        <div class="main">

            <div class="content">

                <div class="box1">

                    @foreach($posts as $post)
                        <h2><a href="{{route('post.single',$post->id)}}">{{$post->title}}</a></h2>
                        <span>{{$post->date}}Postby:{{$post->editor}}</span>
                        <div class="box1_img">

                            @if($post->image)
                                <img src="{{ Image::Url(asset('/uploads/posts/'.$post->image),300,300) }}"
                                     alt="{{ $post->name }}" class="img-thumbnail"/>
                            @else
                                <img src="{{ asset('asset/images/no_image.png') }}" alt="">
                            @endif

                        </div>
                        <div class="data">
                            <p>{{$post->more}}</p>
                            <a href="{{route('post.single',$post->id)}}">Continue reading</a>
                        </div>
                        <div class="clear"></div>
                    @endforeach
                </div>

                <div class="page_links">
                    {{--<div class="next_button">
                        <a href="#"></a>
                    </div>--}}
                    <div class="page_numbers">
                        <ul>
                            <li><a href="#">{{ $posts->links()}}</a>


                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="page_bottom">
                        <p>Back To : <a href="#">Top</a> | <a href="#">Home</a></p>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <div class="side_top">
                    <h2>Category lists</h2>

                    <div class="list">
                        @foreach($categories as $category)
                            <ul>
                                <li>
                                    <a href="{{route('category.posts',$category->alias)}}">{{$category->name}}
                                        ({{count($category->post)}})</a>
                                </li>
                                <!-- aside-section -->

                            </ul>
                        @endforeach
                    </div>
                </div>

                <div class="side_bottom">
                    <h2>Sign in to post</h2>
                    <div class="list">
                        <body class="hold-transition login-page">
                        <div class="login-box">
                            <div class="login-logo">
                                <a href="{{ url('/home') }}"><b>Admin</b></a>
                            </div><!-- /.login-logo -->

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

                            <div class="login-box-body">
                                <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
                                <form action="{{ url('/login') }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group has-feedback">
                                        <input type="email" class="form-control"
                                               placeholder="{{ trans('adminlte_lang::message.email') }}"
                                               name="email"/>
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="password" class="form-control"
                                               placeholder="{{ trans('adminlte_lang::message.password') }}"
                                               name="password"/>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <div class="checkbox icheck">
                                                <label>
                                                    <input type="checkbox"
                                                           name="remember"> {{ trans('adminlte_lang::message.remember') }}
                                                </label>
                                            </div>
                                        </div><!-- /.col -->
                                        <div class="col-xs-4">
                                            <button type="submit"
                                                    class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>
                                        </div><!-- /.col -->
                                    </div>
                                </form>

                                @include('auth.partials.social_login')

                                <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
                                <a href="{{ Route('register.user') }}"
                                   class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>

                            </div><!-- /.login-box-body -->

                        </div><!-- /.login-box -->

                        @include('layouts.partials.scripts_auth')

                        <script>
                            $(function () {
                                $('input').iCheck({
                                    checkboxClass: 'icheckbox_square-blue',
                                    radioClass: 'iradio_square-blue',
                                    increaseArea: '20%' // optional
                                });
                            });
                        </script>
                        </body>
                    </div>
                </div>
            </div>


            <div class="clear"></div>
        </div>
    </div>
    </div>
@stop

