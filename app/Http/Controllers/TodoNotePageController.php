<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoNote;

class TodoNotePageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoNotes = TodoNote::all();
        return view('pages.todoNotes') -> with('todoNotes', $todoNotes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);
        $todoNote = new TodoNote;
        $todoNote -> content = $request -> content;
        $todoNote->completed = $request->completed ? true : false;
        $todoNote->user_id = auth()->user()->id;
        $todoNote->save();


        return redirect('/todonotes')->with('success', 'Todo Note created succcessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todoNote = TodoNote::find($id);
        return view('pages.show')->with('todoNote', $todoNote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todoNote = TodoNote::find($id);
        return view('pages.edit')->with('todoNote', $todoNote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $this->validate($request, [
                'content' => 'required'
            ]);
            $todoNote = TodoNote::find($id);
            $todoNote -> content = $request -> content;
            $todoNote->completed = $request->completed ? true : false;
            $todoNote->save();
    
            return redirect('/todonotes')->with('success', 'Todo Note updated succcessfully');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todoNote = TodoNote::find($id);
        $todoNote -> delete();

        return redirect('/todonotes')->with('success', 'Todo Note deleted succcessfully');
    }
}
