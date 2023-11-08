<?php

namespace App\Http\Controllers\Api;

use App\Models\Zakat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zakat = Zakat::all();

        if ($zakat->count() > 0){
            //
            return response()->json([
                'status' => true,
                'data' => $zakat
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data zakat tidak ada'
            ],404);
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // $data = $request->validate([
        //     'bukti_zakat' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
        // ]);

        // $file = $request->file('bukti_zakat');
        // $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
        // $file->storeAs('public/zakat', $fileName);
        // $data['bukti_zakat'] = $fileName;

        // $zakat = new Zakat($data);
        // $zakat->save();

        // return redirect(url('bukti_zakat'))->with('success', 'success');
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
            'jenis_donasi' => 'required|max:100',
            'nominal' => 'required|max:100',
            'nama' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:100',
        ],[
            'jenis_donasi.required' => ' harus diisi.',
            'jenis_donasi.max' => ' maksimal 100.',
            'nominal.required' => 'Nominal harus diisi.',
            'nominal.max' => 'Nominal maksimal 100.',
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama maksimal 100.',
            'email.required' => 'Email harus diisi.',
            'email.max' => 'Email maksimal 100.',
            'phone.required' => 'Phone harus diisi.',
            'phone.max' => 'Phone maksimal 100.',
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

            $zakat = new Zakat();
            $zakat->jenis_donasi = $request->jenis_donasi;
            $zakat->nominal = $request->nominal;
            $zakat->nama = $request->nama;
            $zakat->email = $request->email;
            $zakat->phone = $request->phone;
            $zakat->save();
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
    public function show(Request $id)
    {
        //
        $zakat = Zakat::find($id);
        if ($zakat != null){
            //
            return response()->json([
                'status' => true,
                'data' => $zakat
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data zakat tidak ada'
            ],404);
        }
    }

}
