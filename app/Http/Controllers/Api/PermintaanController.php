<?php

namespace App\Http\Controllers\Api;

use App\Models\Permintaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permintaan = Permintaan::all();

        if ($permintaan->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => $permintaan
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'data ambulan tidak ada'
            ], 404);
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
            'title' => 'required',
            'pemesan' => 'required',
            'pasien' => 'required',
            'berat' => 'required',
            'darurat' => 'required',
            'tanggal' => 'required',
            'pukul' => 'required',
            'lokasi' => 'required',

            // 'fotoSedekah' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
        ],[
            'title.required' => 'Title harus diisi.',
            'pemesan.required' => 'Nama pemesan harus diisi.',
            'pasien.required' => 'Nama pasien harus diisi.',
            'berat.required' => 'Berat badan harus diisi.',
            'darurat.required' => 'Level darurat harus diisi.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'pukul.required' => 'Pukul harus diisi.',
            'lokasi.required' => 'Lokasi harus diisi.',
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

            $permintaan = new Permintaan();
            $permintaan->title = $request->title;
            $permintaan->pemesan = $request->pemesan;
            $permintaan->pasien = $request->pasien;
            $permintaan->berat = $request->berat;
            $permintaan->darurat = $request->darurat;
            $permintaan->tanggal = $request->tanggal;
            $permintaan->pukul = $request->pukul;
            $permintaan->lokasi = $request->lokasi;
            $permintaan->save();
            return response()->json([
                'status' => $status,
                'message' => $message
            ],201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function show(Permintaan $permintaan)
    {
        //

        $permintaan = Permintaan::find($id);
        if ($permintaan != null){
            //
            return response()->json([
                'status' => true,
                'data' => $permintaan
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data tidak ada'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Permintaan $permintaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permintaan $permintaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permintaan $permintaan)
    {
        //
    }
}
