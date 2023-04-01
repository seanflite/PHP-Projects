@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Hi there</h3>
                    {{ __('You are logged in!') }}
                    <hr>
                    <a href="/todonotes/create" class="btn btn-primary">Create Todo Note</a>
                    @if(count($todoNotes) > 1)
                        <h3>Your Todo Notes</h3>
                            <table class = "table table-striped">
                            @foreach($todoNotes as $todoNote)
                                <tr>
                                    <td>{{$todoNote->content}}</td>
                                    <td><a href='/todonotes/{{$todoNote->id}}/edit'>Edit</a></td>
                                </tr>
                            @endforeach
                            </table>
                    @else
                        <p>No todo notes found</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
