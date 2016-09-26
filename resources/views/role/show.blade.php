@extends('layouts.app')
@section('main-content')

    <div class="row">
            {{--<h3 class="page-header">Vacancy Announcement</h3>--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary shadow-z-2">
                        <div class="panel-heading">
                            Show Roles
                            <a href="{{ route('role.index') }}" class="pull-right white">
                                <i class="fa fa-arrow-circle-left fa-2x">
                                </i>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="row">
                               <div class="col-lg-11">
                                <fieldset class="form-horizontal">
                                       <div class="form-group">
                                            {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
                                         <div class="col-md-10">
                                            {{ $role->name }}
                                         </div>
                                       </div>

                                      <div class="form-group">
                                            {!! Form::label('level', 'Level',['class' => 'col-md-2 control-label']) !!}
                                        <div class="col-md-4">
                                            {{ $role->level }}
                                        </div>
                                      </div>

                                       <div class="form-group">
                                            {!! Form::label('description', 'Description',['class' => 'col-md-2 control-label']) !!}
                                         <div class="col-md-4">
                                            {{ $role->description }}
                                         </div>
                                       </div>
                                 </fieldset>
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