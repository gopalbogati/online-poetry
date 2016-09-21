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
                        List category
                    </div>
                    <div class="register-box-body">
                        <span>

                            {!! Form::Open(['route'=>'category.search','method'=>'GET','class'=>'input-group custom-search-form','role'=>'search']) !!}

                            {!! Form::text('q',null,['class'=>'form-control','placeholder'=>'search'])!!}

                            {!! Form::close()!!}

                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        <table class="table -align-justify">
                            <tr class="table-bordered">
                                <th>
                                    Category Number
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Alias
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Details
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>


                            </tr>
                            @foreach($categories as $category)

                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{($category->name)}}</td>
                                    <td>{{$category->alias}}</td>

                                    <td>
                                        @if($category->image)
                                            <img src="{{ Image::Url(asset('/uploads/'.$category->image),100,100) }}"
                                                 alt="{{ $category->name }}" class="img-thumbnail"/>
                                        @else
                                            <img src="{{ asset('asset/images/no_image.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td>{{$category->details}}</td>
                                    <td>{{$category->status}}</td>

                                    <td>
                                        <a href="{{route('category.edit', $category->id) }}">EDIT</a>
                                        <a href="{{ route('category.delete', $category->id) }}"
                                           onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a>


                                    </td>

                                </tr>

                            @endforeach
                        </table>

                    </div><!-- /.form-box -->

                    {{--//for pagination--}}
                    {{$categories->links()}}
                </div><!-- /.register-box -->
            </div>
        </div>
    </div>
    </div>
@endsection
