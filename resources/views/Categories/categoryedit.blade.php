@extends('layouts.app')

@section('htmlheader_title')
    List category
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
                        Edit category
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
                                                <form role="form" action="{{route('category.update',$category->id)}}"
                                                      method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input class="form-control"
                                                               placeholder="Enter the name of a category" name="name"
                                                               value="{{ $category->name }}">
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alias:</label>
                                                        <input class="form-control"
                                                               placeholder="Enter the alias for category" name="alias"
                                                               value="{{ $category->alias }}">
                                                        <span class="text-danger">{{ $errors->first('alias') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Category images:</label>
                                                        <input type="hidden" name="old_image"
                                                               value="{{$category->image}}">
                                                        <input type="file" name="image" value="{{ $category->image }}">
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                        <td>
                                                            @if($category->image)
                                                                <img src="{{ Image::Url(asset('/uploads/'.$category->image),100,100) }}"
                                                                     alt="{{ $category->name }}" class="img-thumbnail"/>
                                                            @else
                                                                <img src="{{ asset('asset/images/no_image.png') }}"
                                                                     alt="">
                                                            @endif
                                                        </td>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Details:</label>
                                                        <textarea class="form-control" rows="6"
                                                                  name="details">{{ $category->details }}</textarea>
                                                        <span class="text-danger">{{ $errors->first('details') }}</span>
                                                    </div>
                                                    {{--<div class="form-group">
                                                        <label>Status</label>
                                                        <input class="form-control"
                                                               placeholder="Enter the alias for category" name="name"
                                                               value="{{ $category->alias }}">
                                                        <span class="text-danger">{{ $errors->first('alias') }}</span>
                                                    </div>--}}
                                                    <button type="submit" class="btn btn-default">Submit Button</button>

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
