@extends('layouts.app')

@section('htmlheader_title')
    Create category
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create category
                    </div>
                    <div class="register-box-body">
                        <form action="{{route('category.store')}}" class="form" method="post"
                              enctype="multipart/form-data" novalidate>
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <div class="form-group">
                                <label for="">Alias</label>
                                <input type="text" class="form-control" name="alias">
                            </div>
                            <span class="text-danger">{{ $errors->first('alias') }}</span>
                            <div class="form-group">
                                <label>Category image:</label>
                                <input type="file" name="image">
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Details </label>
                                <textarea rows="6" cols="50" class="form-control" name="details"
                                          placeholder="Enter details here">
</textarea>
                            </div>
                            <span class="text-danger">{{ $errors->first('details') }}</span>
                            <div class="form-group"><label for=""></label>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>

                        </form>

                    </div><!-- /.form-box -->
                </div><!-- /.register-box -->
            </div>
        </div>
    </div>
    </div>
@endsection
