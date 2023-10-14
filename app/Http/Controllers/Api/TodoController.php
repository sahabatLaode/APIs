<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();

        if ($todos->count() > 0){
            //
            return response()->json([
                'status' => true,
                'data' => $todos
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data todo tidak ada'
            ],404);
        }

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
        $status = false;
        $message = '';

        $validator = Validator::make($request->all(),[
            'title' => 'required|max:100|unique:todos',
            'description' => 'required|max:100'
        ],[
            'title.required' => 'Judul todo harus diisi.',
            'title.max' => 'Judul todo maksimal 100.',
            'title.unique' => 'Judul todo harus ada.',
            'description.required' => 'Judul todo harus diisi.',
            'description.max' => 'Judul todo maksimal 100.'
        ]);

        if ($validator->fails()){
            $status = false;
            $message = $validator->errors();
            return response()->json([
                'status' => $status,
                'message' => $message
            ],400);
        }else{
            $status = true;
            $message = 'Data ini berhasil ditambah';

            $todo = new Todo();
            $todo->title = $request->title;
            $todo->description = $request->description;
            $todo->save();
            return response()->json([
                'status' => $status,
                'message' => $message
            ],201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $todo = Todo::find($id);
        if ($todo != null){
            //
            return response()->json([
                'status' => true,
                'data' => $todo
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data todo tidak ada'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
