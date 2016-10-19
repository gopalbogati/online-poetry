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


                <div class="lev">
                    <div class="leave">
                        <h4>Leave a comment</h4>
                    </div>@if (Auth::guest())
                        <a href="{{route('register.user')}}">Register to comments here</a><br>
                        <a href="{{route('facebook.login')}}">Sign in using facebook</a>
                    @else
                        <form id="commentform" action="{{route('comment.store')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <label for="author">Name</label>
                            <input id="author" name="name" value="{{ Auth::guest()?'':Auth::user()->name }}" size="30"
                                   aria-required="true"
                                   readonly>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="" size="30" aria-required="true"
                                   required>
                            <label for="website">Website</label>
                            <input id="website" name="website" type="text" value="" size="30">
                            <label for="comment">Comment</label>
                            <textarea name="comment"></textarea>
                            <div class="clearfix"></div>
                            <input type="submit" id="submit" value="Send">

                        </form>
                    @endif
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
                <br>
                <div class="comments-main">
                    <br>
                    <span class="cmnts-right">Comments List</span>
                    <br>
                    <div class="col-md-10 cmts-main-right">

                        @foreach($posts as $post)
                            <h5>{{ Auth::guest()?'':$post->name }}</h5>

                            <p>{!! $post->comment !!}</p>
                            <div class="cmts">
                                <div class="cmnts-left">
                                    <p>{{$post->created_at}}</p>
                                </div>
                                <br>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="clear"></div>
        </div>
    </div>
@stop
