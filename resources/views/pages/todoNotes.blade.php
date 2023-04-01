@extends('layouts.app')
@section('content')
    <h1>Todo Notes</h1>
    <a href="/todonotes/create" class="btn btn-default">Create Todo Note</a>
    <hr>
    @if(count($todoNotes) > 1)
        @foreach($todoNotes as $todoNote)
            <div class="well">
                <h4><a href="/todonotes/{{$todoNote->id}}">{{$todoNote->content}}</a></h4>
                <small>{{$todoNote->completed ? 'Completed' : 'Not Complete'}}</small>
            </div>
        @endforeach
    @else
        <p>No todo notes found</p>
    @endif
@endsection