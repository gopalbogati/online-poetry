@extends('layouts.includes.front')
@section('content')
    <div class="wrap">
        <div class="main">

            <div class="content">

                <div class="box1">
                    <h2><a href="single.html"></a></h2>
                    <p>{{$post->title}}</p>
                    <div class="top_img">
                        @if($post->image)
                            <img src="{{ Image::Url(asset('/uploads/posts/'.$post->image),100,100) }}"
                                 alt="{{ $post->name }}" class="img-thumbnail"/>
                        @else
                            <img src="{{ asset('uploads/Noimage/no.png') }}" alt="">
                        @endif
                    </div>
                    <div class="data_desc">
                        <p>{{$post->content}}</p>

                    </div>
                </div>

            </div>

            <div class="sidebar">
                <div class="side_top">
                    <h2>Category lists</h2>

                    <div class="list1">
                        @foreach($categories as $cat)
                            <ul>
                                <li><a href="{{route('category.posts',$cat->alias)}}">{{$cat->name}}
                                        ({{count($cat->post)}})</a></li>
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
