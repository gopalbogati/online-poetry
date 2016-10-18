`@extends('layouts.includes.front')
@section('content')
    <div class="wrap">
        <div class="main">

            <div class="content">
                @foreach($posts as $post)
                    <div class="box1">

                        <span></span>
                        <p><a href="{{route('post.single',$post->id)}}">{{$post->title}}</a></p>
                        <div class="top_img">
                            @if($post->image)
                                <img src="{{ Image::Url(asset('/uploads/posts/'.$post->image),100,100) }}"
                                     alt="{{ $post->name }}" class="img-thumbnail"/>
                            @else
                                <img src="{{ asset('asset/images/no_image.png') }}" alt="">
                            @endif
                        </div>
                        <div class="data_desc">
                            <p>{{$post->more}}</p>

                            <a href="{{route('post.single',$post->id)}}">Continue reading >>></a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="sidebar">
                <div class="side_top">
                    <h2>Category lists</h2>

                    <div class="list1">
                        @foreach($categories as $cat)
                            <ul>
                                <li>
                                    <a href="{{route('category.posts',$cat->alias)}}">{{$cat->name}}
                                        ({{count($cat->post)}})</a>
                                </li>
                                <!-- aside-section -->

                            </ul>
                        @endforeach
                    </div>
                </div>

                <div class="side_bottom">
                    <h2>Most Viewed</h2>
                    <div class="list2">
                        <ul>
                            <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
                            <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
                            <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
                            <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
                            <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
                            <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@stop
