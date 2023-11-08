<?php

namespace App\Http\Controllers\Api;

use App\Models\KoinSurga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KoinSurgaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $koinSurga = KoinSurga::all();

        if ($koinSurga->count() > 0){
            //
            return response()->json([
                'status' => true,
                'data' => $koinSurga
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data sedekah tidak ada'
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
        //
        $status = false;
        $message = '';

        $validator = Validator::make($request->all(),[
            'catatan' => 'required',
            'tanggal' => 'required',
            'jenis_permintaan' => 'required',

            // 'fotoSedekah' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
        ],[
            'catatan.required' => ' harus diisi.',
            'tanggal.required' => 'Nominal harus diisi.',
            'jenis_permintaan.required' => 'Nama harus diisi.',
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
            $message = 'Berhasil';

            $koinSurga = new KoinSurga();
            $koinSurga->catatan = $request->catatan;
            $koinSurga->tanggal = $request->tanggal;
            $koinSurga->jenis_permintaan = $request->jenis_permintaan;
            $koinSurga->save();
            return response()->json([
                'status' => $status,
                'message' => $message
            ],201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KoinSurga  $koinSurga
     * @return \Illuminate\Http\Response
     */
    public function show(KoinSurga $koinSurga)
    {
        //
        $koinSurga = KoinSurga::find($id);
        if ($koinSurga != null){
            //
            return response()->json([
                'status' => true,
                'data' => $koinSurga
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data sedekah tidak ada'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KoinSurga  $koinSurga
     * @return \Illuminate\Http\Response
     */
    public function edit(KoinSurga $koinSurga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KoinSurga  $koinSurga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KoinSurga $koinSurga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KoinSurga  $koinSurga
     * @return \Illuminate\Http\Response
     */
    public function destroy(KoinSurga $koinSurga)
    {
        //
    }
}
