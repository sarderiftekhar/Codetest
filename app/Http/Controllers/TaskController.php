<?php

namespace App\Http\Controllers;

use App\TaskModel;
use Illuminate\Http\Request;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=TaskModel::all();
        return view('index')->withTasks($tasks);
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
            'file' => 'file|required'
        ]);

        $fileObj = $request->file('file');
        $extension = $fileObj->extension();
        $fileName = str_random(16) . '.' . $extension;

        $destinationPath = public_path('files/');
        $fileObj->move($destinationPath,$fileName);

        $complete_path='/files/'.$fileName;
        $path = public_path().$complete_path;


        if (file_exists($path)) {
            $task = TaskModel::find($request->id);
            $task->path=$complete_path;
            $task->status=1;
            $task->save();


            Session::flash('message','Task added successfully!');
            return redirect()->route('index');
        } else {
            Session::flash('message', 'Something went wrong!');
            return redirect()->back();
        }
    }


}
