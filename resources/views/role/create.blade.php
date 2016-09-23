@extends('role.layout')

@section('content')
    <div class="row">
            {{--<h3 class="page-header">Vacancy Announcement</h3>--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary shadow-z-2">
                        <div class="panel-heading">
                            Create Roles
                            <a href="{{ route('role.index') }}" class="pull-right white">
                                <i class="fa fa-arrow-circle-left fa-2x">
                                </i>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="row">
                               <div class="col-lg-11">
                                     @include('flash::message')
                                   {!! Form::open(['route' => 'role.store','method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                                        @include('user::role.partials.form',['submitButtonText'=>'Save'])
                                   {!! Form::close() !!}
                               </div>
                               <!-- /.col-lg-6 (nested) -->
                           </div>
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
