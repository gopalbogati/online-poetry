@extends('layouts.includes.front')
@section('content')
    <div class="wrap">
        <div class="main">
            <div class="content">
                <div class="box1">
                    <p>{{$post->title}}</p>
                    @if(Auth::user())
                    <p>@include('laravelLikeComment::like', ['like_item_id' => 'image_31'])</p>
                    @endif
                   {{-- @if(Auth::guest())
                        <span><b>Total likes:</b>{{$post->likeCount}}</span>
                    @elseif($post->liked())

                        <a href="{{$post->unlike()}}">like</a>
                        <span><b>Total likes:</b>{{$post->likeCount}}</span>
                    @else
                        <a href="{{$post->like()}}">Dislike</a> <span><b>Total likes::</b>{{$post->likeCount}}</span>
                        <br>
                    @endif--}}
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

                <div>
                    <div>
                        <h4>Leave a comment</h4>
                    </div>@if (Auth::guest())
                        <a href="{{route('register.user')}}">Register to comments here</a><br>
                        <a href="{{route('facebook.login')}}">Sign in using facebook</a>
                    @else
                        {{--@include('laravelLikeComment::comment', ['comment_item_id' => 'video_12'])--}}
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
                            <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
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
            </div>
            <div class="sidebar">
                <div class="sidetop">
                    <b>Comments List</b>
                    <br>
                    <br>
                    @foreach($post->comment as $comment)
                        <h5>{{ Auth::guest()?'':$comment->name }}</h5>
                        <p>{!!$comment->comment!!}</p>
                        <p>{{$post->created_at}}</p>
                        @if (Auth::User()== $comment->user)
                            <p><a href="{{ route('comment.delete', $comment->id) }}"
                                  onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a></p>
                        @endif
                        <br>
                </div>

                @endforeach
            </div>
        </div>
    </div>

    <div class="clear"></div>

    </div>
    </div>

@stop
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
