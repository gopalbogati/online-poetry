@extends('layouts.app')

@section('htmlheader_title')
    List Users
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
                        List users
                    </div>
                    <div>
                        <table class="table -align-justify">
                            <tr class="table-bordered">
                                <th>
                                    User id
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Country
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    URL
                                </th>
                                <th>
                                    Action
                                </th>


                            </tr>

                            @foreach($usertables as $usertable)
                                <tr>

                                    <td>{{$usertable->id}}</td>
                                    <td>{{($usertable->username)}}</td>
                                    <td>{{$usertable->email}}</td>
                                    <td>{{$usertable->name}}</td>
                                    <td>{{$usertable->country}}</td>
                                    <td>{{$usertable->date}}</td>
                                    <td>{{$usertable->url}}</td>

                                    <td>

                                        <a href="{{ route('deleteuser', $usertable->id) }}"
                                           onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a>
                                    </td>


                                </tr>

                            @endforeach
                        </table>
                        {{$usertables->links()}}
                    </div><!-- /.register-box -->
                </div>
            </div>
        </div>
    </div>
@endsection

