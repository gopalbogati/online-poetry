<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="chalphal/images/logo2.png">
    <title>chalphal</title>

    <!-- Bootstrap core CSS -->
    <link href="chalphal/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="chalphal/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="chalphal/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="chalphal/css/owl.theme.css">
    <link href="chalphal/css/style.css" rel="stylesheet">
    <link href="chalphal/css/media.css" rel="stylesheet">
</head>

<body>

<header class="head">
    <div class="container">
        <div class="top-header pull-right">
            <ul>
                <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!--close of top-header-->
        <div class="clearfix"></div>
        </ul>
    </div>
    <!--close of container-->
</header>

<header>
    <div class="menu">
        <div class="navbar-wrapper">
            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span
                                class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span></button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
                            <li class=""><a href="index.html"> समाचार</a></li>
                            <li><a href="detail.html">बिचार/ब्लग</a></li>
                            <li><a href="catagories.html">मनोरञ्जन</a></li>
                            <li><a href="#contact">खेलकुद</a></li>
                            <li><a href="#contact">प्रवास</a></li>
                            <li><a href="#contact">विचित्र</a></li>
                            <li><a href="#contact">संसार </a></li>
                            <li><a href="#contact">जीवनशैली</a></li>
                            <li><a href="#contact">युरो कप २०१६</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!--close of menu-->

</header>

<section class="addvertise">
    <div class="container">
        <div id="owl-demo" class="owl-carousel">
            <div class="item"><img src="chalphal/images/add.png"></div>
            <div class="item"><img src="chalphal/images/add.png"></div>
            <div class="item"><img src="chalphal/images/add.png"></div>
        </div>
    </div>
    <!--close of container-->
</section>
<section class="block">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="left">
                    <div class="left-image">
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
                        <h2><a href="">लोगिन गर्नुहोस </a></h2>
                        <form action="{{ url('/login') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control"
                                       placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control"
                                       placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
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
                                            class="btn btn-primary btn-block btn-flat">{{
                                        trans('adminlte_lang::message.buttonsign') }}
                                    </button>
                                </div><!-- /.col -->
                            </div>
                        </form>

                        <!--close of left-date-->
                    </div>
                    <!--close of left-image-->
                    <p class="text"><a href="{{route('registerUserWelcome')}}">क्लिक हेरे इफ नोत रेगिस्तेर </a></p>
                </div>
                <!--close of left-->

            </div>
            <!--col-sm-6-->
            <div class="col-sm-4">
                <div class="right">
                    <div class="main-news">
                        <h4 class="heading-title"><a href="https://main-heading/">कतेगोॠ लिस्त </a></h4>
                    </div>
                    <!--close of main-news-->
                    <div class="main-haeding">
                        @foreach($categories as $category)
                        <div class="news"></div>
                        <!--close of news-->
                        <h5><a href="{{route('category.posts',$category->alias)}}">{{$category->name}}</a></h5>
                        <div class="aside-section">
                            <div class="first-image">
                                @if($category->image)
                                <img src="{{ Image::Url(asset('/uploads/'.$category->image),100,100) }}"
                                     alt="{{ $category->name }}" class="img-thumbnail"/>
                                @else
                                <img src="{{ asset('asset/images/no_image.png') }}" alt="">
                                @endif
                            </div>

                            <!--close of first-image-->

                            <!--close of col-sm-6-->

                            <div class="first-text">
                                <p>{{$category->details}} </p>
                                <h6><span><a href="https://first-text/"></a></span></h6>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                            <!--close of first-text-->
                        </div>
                        <!-- aside-section -->

                        <div class="last-line">
                            <h6 class="line-abc"><a href=""></a></h6>
                            <P></P>
                            <h6 class="last-bottom"><span><a href="https://first-text/"></a></span>
                            </h6>
                        </div>
                        <!--close of last-line-->
                        <div class="last-line">
                            <h6 class="line-abc"><a href=""></a></h6>
                            <p></p>
                            <h6 class="last-bottom"><span><a href="https://first-text/"> </a></span>
                            </h6>
                        </div>
                    </div>
                    <!--close of main-heading-->
                </div>
                <!--close of right-->
            </div>
        </div>
        <!--close of row-->
    </div>
    <!--close of container-->
</section>

<section class="block2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 ">
                <div class="samachar">
                    <div class="samachar-bottom">
                        <h4 class="heading-title"><a class="abc" href="">Post List</a></h4>
                    </div>
                    <div class="block-center">
                        @foreach($posts as $post)
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="samachar-head">
                                    <td>
                                        @if($post->image)
                                        <img src="{{ Image::Url(asset('/uploads/posts/'.$post->image),300,300) }}"
                                             alt="{{ $post->name }}" class="img-thumbnail"/>
                                        @else
                                        <img src="{{ asset('asset/images/no_image.png') }}" alt="">
                                        @endif
                                    </td>
                                    <h4 class="samachar-heading"><a href="https://samacha/">{{$post->title}}</a>
                                    </h4>
                                    <h6><a href="">{{$post->date}}</a></h6>
                                    <p><b>{{$post->content}}</b></p>
                                </div>
                            </div>
                            <!--close of col-sm-6-->
                            @endforeach

                            <!--close of row-->

                        </div>
                        <!--close of block-left-->

                        <!--  <div class="clearfix"></div>-->

                    </div>
                    <!--close of samachar-->
                </div>
                <!--close of col-sm-7-->

                <!--close of row-->
            </div>
            <!--close of container-->
</section>


<section class="banner-add2">
    <div class="container">
        <div id="owl-demo7" class="owl-carousel">
            <div class="item"><img src="chalphal/images/banner-add2.png" alt=""/></div>
            <div class="item"><img src="chalphal/images/banner-add2.png" alt=""/></div>
            <div class="item"><img src="chalphal/images/banner-add2.png" alt=""/></div>
        </div>
    </div>
    <!--close of container-->
</section>


<footer>
    <div class="container">
        <div class="main-footer">
            <div class="row">
                <div class="col-sm-4 footer-left">
                    <p>Emale news network pvt. ltd. 2016, all rights reserved<br>
                    </p>
                </div>
                <!--footer-left-->
                <div class="col-sm-4 footer-middle">
                    <h6>Like Us On:</h6>
                    <a href=""> <img src="chalphal/images/footer-img.png" alt=""> </a></div>
                <!--footer-middle-->
                <div class="col-sm-4 footer-right"><a href="href=" https://facebook.com"><img
                        src="chalphal/images/logo2.png"
                        alt=""></a>
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="">Bhanimandal, Ekantankuna,
                                Jawalakhel</a></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="">01-5547750</a></li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="">atopati@gmail.com</a></li>
                        <li><a class="bog" href="">marketing.ratopati@gmail.com</a></li>
                        <li><a class="bog" href="">article.ratopati@gmail.com</a></li>
                    </ul>
                </div>
                <!--footer-right-->
            </div>
            <!--row-->
        </div>
        <!--main-footer-->
    </div>
    <!--container-->
</footer>
<!-- Placed at the end of the document so the pages load faster -->
<script src="chalphal/js/jquery.min.js"></script>
<script src="chalphal/js/bootstrap.min.js"></script>
<script src="chalphal/js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            autoPlay: 3000,
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });
        $("#owl-demo2").owlCarousel({
            autoPlay: 3000,
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });
        $("#owl-demo3").owlCarousel({
            autoPlay: 3000,
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });
        $("#owl-demo7").owlCarousel({
            autoPlay: 3000,
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });
        $("#owl-demo8").owlCarousel({
            autoPlay: 3000,
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });


    });


</script>
<style>
    #owl-demo4 .item img {
        display: block;
        width: 100%;
        height: auto;
    }

    #owldemo9 .item img {
        display: block;
        width: 100%;
        height: auto;
    }

    .owl-buttons {
        display: none;
    }

    .owl-pagination {
        display: none;
    }
</style>
</body>
</html>
