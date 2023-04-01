<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoNote;
use Illuminate\Support\Carbon;

class todoNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TodoNote::orderBy('created_at', 'DESC') -> get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTodoNote = new TodoNote;
        $newTodoNote -> content = $request -> todoNote["content"];
        $newTodoNote -> content = auth()->user()->id;
        $newTodoNote->save();

        return $newTodoNote;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TodoNote::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $todoNote = TodoNote::find($id);
        if ($todoNote) {
            $todoNote -> completed = $request -> todoNote["completed"] ? true : false;
            $todoNote -> completion_time = $request -> todoNote["completed"] ? Carbon::now() : null;

            $todoNote->save();
            return $todoNote;
        }

        return "The input TodoNote is not valid";
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
        if ($todoNote) {
            $todoNote->delete();
            return "The todoNote (id = {$id}) is deleted successfully";
        }

        return "The input TodoNote id is not valid";
    }
}
