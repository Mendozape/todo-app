<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ToDoList=ToDo::all();
       return view('ToDo.ToDoIndex')->with('data',$ToDoList);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ToDo.createToDoIndex');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task'=>'required|max:100',
            'status'=>'required',
            'priority'=>'required'
        ]);
        $input=$request->all();
        ToDo::create($input);
        return redirect()->route('ToDo.index')->with('task_added','The task has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $ToDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $ToDo)
    {
        return view('ToDo.createToDoIndex')->with('todo',$ToDo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDo $ToDo)
    {
        $request->validate([
            'task'=>'required|max:100',
            'status'=>'required',
            'priority'=>'required'
        ]);
        $ToDo->task    = $request['task'];
        $ToDo->status     = $request['status'];
        $ToDo->priority= $request['priority'];
        $ToDo->notes= $request['notes'];
        
        $ToDo->save();
        //Session::flash('user_edited','El registro ha sido editado con éxito');
        //return redirect()->route('client.index')->with('user_edited','El registro ha sido editado con éxito');
        return redirect()->route('ToDo.index')->with('task_edited','The task has been edited successfully');
        //return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $ToDo)
    {
        $ToDo->delete();
        return redirect()->route('ToDo.index')->with('task_deleted','The task has been deleted successfully');
    }
}
