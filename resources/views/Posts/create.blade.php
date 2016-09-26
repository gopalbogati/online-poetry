@extends('layouts.app')

@section('htmlheader_title')
    Create posts
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create posts
                    </div>
                    <div class="register-box-body">

                        <form action="{{route('poststore')}}" class="form" method="post" enctype="multipart/form-data" novalidate>
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
                                 date('Y-m-d ,h:i:sa')}}"
                                       name="date" readonly/>
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

                    </div><!-- /.form-box -->
                </div><!-- /.register-box -->
            </div>
        </div>
    </div>
    </div>
@endsection
