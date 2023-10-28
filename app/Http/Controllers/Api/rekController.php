<?php

namespace App\Http\Controllers\Api;

use App\Models\Rekening;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class rekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rekening = Rekening::all();
        if ($rekening->count() > 0){
            //
            return response()->json([
                'status' => true,
                'data' => $rekening
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data rekening tidak ada'
            ],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $status = false;
        $message = '';

        $validator = Validator::make($request->all(),[
            'nama_bank' => 'required',
            'rekening' => 'required'
        ],[
            'nama_bank.required' => 'harus diisi.',
            'rekening.required' => 'harus diisi.',
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

            $rekening = new Rekening();
            $rekening->nama_bank = $request->nama_bank;
            $rekening->rekening = $request->rekening;
            $rekening->save();
            return response()->json([
                'status' => $status,
                'message' => $message
            ],201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zakat  $zakat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rekening = Rekening::find($id);
        if ($rekening != null){
            //
            return response()->json([
                'status' => true,
                'data' => $rekening
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data rekening tidak ada'
            ],404);
        }
    }

}
