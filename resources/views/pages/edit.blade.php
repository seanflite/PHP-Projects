@extends('layouts.app')
@section('content')
    <h1>Edit Todo Note</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\TodoNotePageController@update', $todoNote->id], "method" => "PUT"]) !!}
     <div class="form-group">
        {{Form::label('content', 'Todo note content')}}
         {{Form::text('content',$todoNote->content, ['class' => 'form-control', 'placeholder' => 'todo note content (required)'])}}
     </div>
     <div class="form-group">
        <input type="checkbox" value='1' checked id="completed" name="completed">
        <label>Completed or not</label>
    </div>
     {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection