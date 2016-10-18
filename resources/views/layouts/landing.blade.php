@extends('layouts.includes.front')
@section('content')
    <div class="wrap">
        <div class="main">
            <div id="google_translate_element"></div><script type="text/javascript">
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                }
            </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            <div class="content">
             {{--   @if( Auth::check() )
                    <a href="{{ route('logout') }}" class="btn btn-info">Logout</a>
                    Logged In as: {{ Auth::user()->name }}
                @endif--}}
                <div class="box1">
                    <div class="container spark-screen">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    </div>
                                    <div class="register-box-body">

                                        @if (Auth::check())
                                            Logged In as: {{ Auth::user()->name }}
                                            <li class="active"><a href="{{ url('home') }}">Go to dashboard</a></li>
                                        <h1>Create Post</h1>
                                            <form action="{{route('welcomepoststore')}}" class="form" method="post" enctype="multipart/form-data" novalidate>
                                            {{csrf_field()}}

                                            <label for="readonly">Editor</label><br>
                                            <input name="editor" value="{{ Auth::user()->name }}" readonly>
                                            <span class="text-danger">{{ $errors->first('editor') }}</span>


                                            <div class="form-group">
                                                <label>Post image:</label>
                                                <input type="file" name="image">
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type=" text" class="form-control" name="title" required>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                            <div class="form-group">
                                                <label for="readonly">Date</label>
                                                <input type="readonly" class="form-control" value="{{
                                 date('Y-m-d ,h:i:sa')}}" name="date" readonly/>
                                            </div>

                                            <div>
                                                <label for="">Select Category</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach( $categories as $category )
                                                        <option value="{{ $category->id}}">{{ $category->alias }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Details </label>
                                                <textarea rows="7" cols="80" class="form-control" name="content" required></textarea>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('content') }}</span>
                                            <div class="form-group"><label for=""></label>
                                                <button type="submit" class="btn btn-info">Create Post</button>
                                            </div>
                                        </form>
                                        @endif
                                    </div><!-- /.form-box -->
                                </div><!-- /.register-box -->
                            </div>
                        </div>
                    </div>


                </div>

                <div class="box1">
                    @foreach($posts as $post)
                        <h2><a href="{{route('post.single',$post->id)}}">{{$post->title}}</a></h2>
                        {{$post->date}}<br>
                    <span>Postby:{{$post->editor}}</span>
                        <div class="box1_img">

                            @if($post->image)
                                <img src="{{ Image::Url(asset('/uploads/posts/'.$post->image),300,300) }}"
                                     alt="{{ $post->name }}" class="img-thumbnail"/>
                            @else
                                <img src="{{ asset('uploads/Noimage/no.png') }}" alt="">
                            @endif

                        </div>
                        <div class="data">
                            <p>{!! $post->more !!}</p>
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
                    <div class="list">
                        @if (Auth::check())
                        @else
                        <h2>Sign in to post</h2>
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
                            @endif
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    </div>
@stop

