<fieldset>
       <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
         <div class="col-md-10">
            {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Name','class'=>'form-control','onkeyup'=>'nospaces(this)']) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
         </div>
       </div>

      <div class="form-group">
            {!! Form::label('level', 'Level',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-4">
            {!! Form::select('level',[''=>'Select One','1' => 1, '2' => 2,'3' => 3, '4' => 4,'5' => 5, '6' => 6],null,['class'=>'form-control']) !!}
            <span class="text-danger">{{ $errors->first('level') }}</span>
        </div>
      </div>

       <div class="form-group">
            {!! Form::label('description', 'Description',['class' => 'col-md-2 control-label']) !!}
         <div class="col-md-10">
            {!! Form::textarea('description', $value = null, ['rows'=>3,'placeholder'=>'Description','class'=>'form-control']) !!}
           <span class="text-danger">{{ $errors->first('description') }}</span>
         </div>
       </div>

       <div class="form-group">

         <div class="col-md-10 col-md-offset-2">
         <a href="{{ route('role.index') }}">
            {!! Form::button('Cancel',['class'=>'btn btn-default']) !!}
         </a>
            {!! Form::submit($submitButtonText,['class'=>'btn btn-primary']) !!}
         </div>

       </div>
 </fieldset>
<!-- /.col-lg-6 (nested) -->
