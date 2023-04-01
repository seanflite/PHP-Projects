@extends('layouts.app')
@section('content')
    <a href="/todonotes" class="btn btn-default">Go Back</a>
    <h1>{{$todoNote->content}}</h1>
    <div>
        Created at {{$todoNote->created_at}}
    </div>
    <div>
        {{$todoNote->completed ? 'Completed' : 'Not Complete'}}
    </div>
    <hr>
    @if(Auth::user()->id == $todoNote->user_id)
        <p>you are the todoNote owner, you have the access to edit this todoNote</p>
        <a href="/todonotes/{{$todoNote->id}}/edit" class="btn btn-default">Edit</a> 
        {!!Form::open(['action' => ['App\Http\Controllers\TodoNotePageController@destroy', $todoNote->id], 'method' => 'DELETE', 'class' => 'pull-right'])!!}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
        @else
        <p>read-only, you are not the todoNote owner</p>

    @endif 

@endsection