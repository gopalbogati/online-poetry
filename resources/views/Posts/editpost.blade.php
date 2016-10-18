@extends('layouts.app')

@section('htmlheader_title')
    Edit post
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
                        Edit post
                    </div>
                    <div class="register-box-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Edit Details:
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form role="form" action="{{route('post.update',$post->id)}}"
                                                      method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label>Title:</label>
                                                        <input class="form-control"
                                                               placeholder="" name="title"
                                                               value="{{ $post->title }}">
                                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Post image</label>
                                                        <input type="hidden" name="old_image"
                                                               value="{{$post->image}}">
                                                        <input type="file" name="image" value="{{ $post->image }}">
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                        <td>
                                                            @if($post->image)
                                                                <img src="{{ Image::Url(asset('/uploads/posts/'.$post->image),100,100) }}"
                                                                     alt="{{ $post->name }}" class="img-thumbnail"/>
                                                            @else
                                                                <img src="{{ asset('uploads/Noimage/no.png') }}" alt="">

                                                            @endif
                                                        </td>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Content:</label>
                                                        <textarea class="form-control" rows="5"
                                                                  name="content">{{ $post->content }}</textarea>
                                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Update</button>

                                                </form>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div><!-- /.form-box -->

                {{--//for pagination--}}
                {{-- {{$categories->links()}}--}}
            </div><!-- /.register-box -->
        </div>
    </div>
    </div>
    </div>
@endsection
