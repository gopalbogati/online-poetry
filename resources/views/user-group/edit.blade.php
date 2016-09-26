@extends('layouts.app')

@section('main-content')
    <div class="row">
            {{--<h3 class="page-header">Vacancy Announcement</h3>--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary shadow-z-2">
                        <div class="panel-heading">
                            Edit User Group
                            <a href="{{ route('user.group.index') }}" class="pull-right white">
                                <i class="fa fa-arrow-circle-left fa-2x">
                                </i>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="row">
                               <div class="col-lg-11">
                                     @include('flash::message')
                                     {!! Form::model($user,['method'=>'PUT','route'=>['user.group.update',$user->id],'class'=>'form-horizontal','role'=>'form']) !!}
                                        <fieldset>

                                           <div class="form-group">
                                                {!! Form::label('name', 'Full Name', ['class' => 'col-md-2 control-label']) !!}
                                             <div class="col-md-6">
                                                {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Full Name','class'=>'form-control']) !!}
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                             </div>
                                           </div>

                                            <div class="form-group">
                                              {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-md-2 control-label']) !!}
                                                <div class="col-md-3">
                                                       <div class="thumbnail img-wrap">
                                                           <span class="close" onclick="confirmFirst(1)">
                                                                <img src="{{URL::to('asset/images/close.png')}}" alt="close"/>
                                                           </span>
                                                           <a class="standAloneFacnyBox" href="{{ route('standalone-filemanager',['filed_id'=>'fileVal']) }}">
                                                               <img src="{{ $user->profile_image !='' ? $user->profile_image : URL::to('asset/images/no_img.png') }}"  id="previewImage"/>
                                                           </a>
                                                       </div>
                                                    <p class="text-danger ">{{ $errors->first('profile_image') }}</p>
                                                    {!! Form::hidden('profile_image',$user->profile_image,['id'=>'fileVal']) !!}
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                   {!! Form::label('email', 'Email', ['class' => 'col-md-2 control-label']) !!}
                                                <div class="col-md-6">
                                                   {!! Form::text('email', $value = null, ['id'=>'name','placeholder'=>'Email','class'=>'form-control']) !!}
                                                   <span class="text-danger">{{ $errors->first('email') }}</span>
                                                </div>
                                              </div>

                                               <div class="form-group">
                                                    {!! Form::label('roles', 'Roles',['class' => 'col-md-2 control-label']) !!}
                                                 <div class="col-md-10">
                                                  <p class="text-info"><span id="select-all-roles">Select All</span> || <span id="unselect-all-roles"> Unselect All</span></p>
                                                    {!! Form::select('roles[]',$roles,$userRoles,['class'=>'form-control','id'=>'role-select','multiple'=>'multiple']) !!}
                                                   <span class="text-danger">{{ $errors->first('roles') }}</span>
                                                 </div>
                                               </div>

                                              <div class="form-group">
                                                   {!! Form::label('permission', 'Permissions',['class' => 'col-md-2 control-label']) !!}
                                                <div class="col-md-10">
                                                   <p class="text-info"><span id="select-all-permissions">Select All</span> || <span id="unselect-all-permissions"> Unselect All</span></p>
                                                   {!! Form::select('permissions[]',$permissions,$userPermissions,['class'=>'form-control','id'=>'permission-select','multiple'=>'multiple']) !!}
                                                  <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                                </div>
                                              </div>

                                               <div class="form-group">

                                                 <div class="col-md-10 col-md-offset-2">
                                                 <a href="{{ route('role.index') }}">
                                                    {!! Form::button('Cancel',['class'=>'btn btn-default']) !!}
                                                 </a>
                                                    {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
                                                 </div>

                                               </div>

                                         </fieldset>
                                        <!-- /.col-lg-6 (nested) -->

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