@extends('layouts.app')

@section('htmlheader_title')
    List post
@endsection

@if(Session::has('flash_message'))
    <div class="alert alert-success" style="text-align: center">
        {{ Session::get('flash_message') }}
    </div>
@endif
@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List post
                    </div>
                    <div class="register-box-body">
                        {{-- <span>

                             {!! Form::Open(['route'=>'post.search','method'=>'GET','class'=>'input-group custom-search-form','role'=>'search']) !!}

                             {!! Form::text('q',null,['class'=>'form-control','placeholder'=>'search'])!!}

                             {!! Form::close()!!}

                             <button class="btn btn-default" type="button">
                                 <i class="fa fa-search"></i>
                             </button>
                         </span>--}}
                        <table class="table -align-justify">
                            <tr class="table-bordered">
                                <th>
                                    Editor
                                </th>
                                <th>
                                    Post Number
                                </th>
                                <th>
                                    Post image
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Content
                                </th>

                                <th>
                                    Action
                                </th>

                            </tr>
                            @foreach($post as $posts)

                                <tr>
                                    <td>{{$posts->editor}}</td>

                                    <td>{{$posst->id}}</td>

                                    <td>
                                        @if($posts->image)
                                            <img src="{{ Image::Url(asset('/uploads/posts/'.$posts->image),300,300) }}"
                                                 alt="{{ $post->name }}" class="img-thumbnail"/>
                                        @else
                                            <img src="{{ asset('uploads/Noimage/no.png') }}" alt="">
                                        @endif
                                    </td>
                                    </td>

                                    <td>{{($poss->title)}}</td>
                                    <td>{{$posts->date}}</td>
                                    <td>{{$posts->category->name}}</td>
                                    <td>{{$posts->content}}</td>

                                    <td>

                                        <a href="{{route('post.edit', $posts->id) }}">EDIT</a>
                                        <a href="{{ route('post.delete', $posts->id) }}"
                                           onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a>


                                    </td>

                                </tr>

                            @endforeach
                        </table>

                    </div><!-- /.form-box -->

                    {{--//for pagination--}}
                   {{-- {{$posts->links()}}--}}
                </div><!-- /.register-box -->
            </div>
        </div>
    </div>
    </div>
@endsection
