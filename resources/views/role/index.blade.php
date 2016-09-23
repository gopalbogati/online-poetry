@extends('role.layout')

@section('content')

    <div class="row">
            <h3 class="page-header">Role Management</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel  panel-primary shadow-z-2">
                        <div class="panel-heading">
                            Total Roles [{{ count($roles) }}]
                            <a href="{{ route('role.index') }}" style="float:right;color:white;" class=" btn btn- btn-outline  btn-xs">
                                <i class="fa fa-refresh">
                                </i>&nbsp;Refresh
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                   @include('flash::message')
                                <div class="row col-xs-6">
                                    <form action="{{ route('role.index') }}" method="GET">
                                        <div class="form-group input-group">
                                            <input type="text" name="q" class="form-control" placeholder="Name" required/>
                                                <label class="input-group-btn">
                                                    <button type="submit" class="btn btn-material-orange btn-flat" type="button">
                                                        <i class="fa fa-search">
                                                        </i>
                                                        Find
                                                    </button>
                                                </label>
                                        </div>
                                    </form>
                                </div>

                                {!! Form::open(['route' => 'role.destroy','method'=>'DELETE','id'=>'formDelete']) !!}

                                    <div class="left-grid-action">
                                        <a href="{{ route('role.create') }}" class="btn btn-xs btn-success btn-flat">
                                            <i class="fa fa-plus">
                                                &nbsp;
                                            </i>Create
                                        </a>&nbsp;&nbsp;
                                        <button type="button" class="btn btn-xs btn-danger btn-flat"
                                                onclick="confirmAndSubmit()">
                                            <i class="fa fa-trash-o">
                                            </i>&nbsp;Delete
                                        </button>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr class="label-material-white-200 text-black">
                                            <th>
                                                <a href="{{ route('role.index') }}?sort={{ $sort }}&key=id"  class="grey">
                                                    ID
                                                    <span><i class="fa fa-sort text-success"></i></span>
                                                </a>
                                            </th>
                                            <th>
                                                 <a href="{{ route('role.index') }}?sort={{ $sort }}&key=name"  class="grey">
                                                     Name
                                                     <span><i class="fa fa-sort text-success"></i></span>
                                                 </a>
                                            </th>
                                            <th>
                                                 <a href="{{ route('role.index') }}?sort={{ $sort }}&key=level" class="grey">
                                                     Level
                                                     <span><i class="fa fa-sort text-success"></i></span>
                                                 </a>
                                            </th>
                                            <th>
                                                 <a href="{{ route('role.index') }}?sort={{ $sort }}&key=created_at"  class="grey">
                                                     Created Date
                                                     <span><i class="fa fa-sort text-success"></i></span>
                                                 </a>
                                            </th>
                                            <th>
                                                Edit
                                            </th>
                                            <th>
                                                View
                                            </th>
                                            <th>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id="checkAll"> Check
                                                    </label>
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         @forelse ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td class="green">{{ $role->name }}</td>
                                                <td>{{ $role->level }}</td>
                                                <td>{{ $role->created_at }}</td>
                                                <td align="center">
                                                    <a href="{{ route('role.edit',['id'=>$role->id]) }}">
                                                        <i class="fa fa-edit fa-lg">
                                                        </i>
                                                    </a>
                                                </td>
                                                <td align="center">
                                                    <a href="{{ route('role.show',['id'=>$role->id]) }}">
                                                        <i class="fa fa-eye fa-lg text-success">
                                                        </i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                        {!! Form::checkbox('toDelete[]',$role->id, false,['class'=>'checkItem']) !!}
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            @empty

                                        </tbody>
                                        <tr>
                                            <td colspan="7" class="errMsg"> No Result Found Try Again</td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="7"> {{ $roles->links() }}</td>
                                        </tr>
                                    </table>
                                {!! Form::close() !!}
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
    </div>
<!-- /.row -->
@stop