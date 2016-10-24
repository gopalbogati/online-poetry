<!DOCTYPE HTML>
<html>
<head>
    <title>Online poetry</title>
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
  {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">

    <link href="{{asset('blog-master-web/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
    <div class="header_top">
        <div class="wrap">

            <div class="logo">
                <a href="{{route('welcome.user')}}">{{--<img src="{{asset('blog-master-web/images/logo.png')}}" alt=""/>--}}
                    <b style="font-size: 100px;color: #00a65a">Online-Poetry</b></a>
            </div>
            @if( Auth::check() )
                <div class="login_button">
                    <ul>
                <li><a href="{{ route('logout') }}" class="btn btn-info">Logout</a></li>
                <li>Logged In as: {{ Auth::user()->name }}</li>
                        </ul>
                    </div>
            @else
            <div class="login_button">
                <ul>
                    <li><a href="{{route('register.user')}}">Register here</a>
                    <li> |
                    <li><a href="{{route('user.login')}}">Login</a></li>

                </ul>
                    @endif
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="wrap">
            <div class="menu">
                <ul>
                    @foreach($categories as $cat)

                        <li><a href="{{route('category.posts',$cat->alias)}}">{{$cat->name}}</a></li>

                    @endforeach
                </ul>
            </div>
            <div class="search_box">
                {{--  <form>
                      <input type="text" value="Search" onfocus="this.value = '';"
                             onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
                  </form>--}}
                {!! Form::Open(['route'=>'post.search','method'=>'GET','class'=>'input-group custom-search-form','role'=>'search']) !!}

                {!! Form::text('q',null,['class'=>'form-control','placeholder'=>'search'])!!}

                {!! Form::close()!!}
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@yield('content')

<div class="footer">
    <div class="wrap">
        <div class="footer_grid1">
            <h3>About Us</h3>
            <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content
                here, content here desktop publishing making it look like readable English.<br><a href="#">Read
                    more....</a></p>
        </div>
        <div class="footer_grid2">
            <h3>Navigate</h3>
            <div class="f_menu">
                <ul>
                    <li><a href="{{route('welcome.user')}}">Home</a></li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Write for Us</a></li>
                    <li><a href="#">Submit Tips</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer_grid3">
            <h3>We're Social</h3>
            <div class="img_list">
                <ul>
                    <li><img src="{{asset('blog-master-web/images/facebook.png')}}" alt=""/><a href="#">Facebook</a></li>
                    <li><img src="{{asset('blog-master-web/images/flickr.png')}}" alt=""/><a href="#">Flickr</a></li>
                    <li><img src="{{asset('blog-master-web/images/google.png')}}" alt=""/><a href="#">Google</a></li>
                    <li><img src="{{asset('blog-master-web/images/yahoo.png')}}" alt=""/><a href="#">Yahoo</a></li>
                    <li><img src="{{asset('blog-master-web/images/youtube.png')}}" alt=""/><a href="#">Youtube</a></li>
                    <li><img src="{{asset('blog-master-web/images/twitter.png')}}" alt=""/><a href="#">Twitter</a></li>
                    <li><img src="{{asset('blog-master-web/images/yelp.png')}}" alt=""/><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="f_bottom">

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('/asset/vendor/tinymce/tinymce.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('/asset/js/custom-admin.js') }}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>

{{-- tiny mce init--}}
<script type="text/javascript">

    tinymce.init({
        selector: "textarea",
        resize: "both",
        relative_urls: false,
        plugins: ["autoresize", "image", "code", "lists", "code","example", "link"],
        indentation : '20pt',
        file_browser_callback: function(field_name, url, type, win) {
            if (type == 'image') $('#my_form input').click();
        },
        image_list: "/imglist",
        toolbar: [
            "undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright | preview | spellchecker"
        ]

    });

</script>

</body>
</html>
