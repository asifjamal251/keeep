{!! Form::open(['method' => 'POST', 'route' => 'backlogSync', 'class' => 'form-horizontal']) !!}

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        {!! Form::label('image', 'File label') !!}
        {!! Form::file('image[]', ['required' => 'required']) !!}
        <p class="help-block">Help block text</p>
        <small class="text-danger">{{ $errors->first('image') }}</small>
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        {!! Form::label('image', 'File label') !!}
        {!! Form::file('image[]', ['required' => 'required']) !!}
        <p class="help-block">Help block text</p>
        <small class="text-danger">{{ $errors->first('image') }}</small>
    </div>


    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        {!! Form::label('image', 'File label') !!}
        {!! Form::file('image[]', ['required' => 'required']) !!}
        <p class="help-block">Help block text</p>
        <small class="text-danger">{{ $errors->first('image') }}</small>
    </div>

    <div class="btn-group pull-right">
        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
        {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
    </div>

{!! Form::close() !!}