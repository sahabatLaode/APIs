<?php

namespace App\Http\Controllers\Api;

use App\Models\InfaqForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfaqFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $infaqForm = InfaqForm::all();

        if ($infaqForm->count() > 0){
            //
            return response()->json([
                'status' => true,
                'data' => $infaqForm
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data infaq tidak ada'
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
            'jenis_donasi' => 'required|max:100',
            'nominal' => 'required|max:100',
            'nama' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:100',
            'infaq' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
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
            'infaq.required' => ' harus diisi.',
            'infaq.file' => ' format file.',
            'infaq.image' => 'format image.',
            'infaq.mimes' => 'format mimes.',
            'infaq.max' => 'maksimal 4048.',
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
            $file = $request->file('infaq');
            $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
            $file->storeAs('public/infaq', $fileName);
            $data['infaq'] = $fileName;

            $infaqForm = new InfaqForm($data);
            $infaqForm->jenis_donasi = $request->jenis_donasi;
            $infaqForm->nominal = $request->nominal;
            $infaqForm->nama = $request->nama;
            $infaqForm->email = $request->email;
            $infaqForm->phone = $request->phone;
            $infaqForm->save();
            return response()->json([
                'status' => $status,
                'message' => $message
            ],201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfaqForm  $infaqForm
     * @return \Illuminate\Http\Response
     */
    public function show(InfaqForm $id)
    {
        //
        $infaqForm = InfaqForm::find($id);
        if ($infaqForm != null){
            //
            return response()->json([
                'status' => true,
                'data' => $infaqForm
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data infaq tidak ada'
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfaqForm  $infaqForm
     * @return \Illuminate\Http\Response
     */
    public function edit(InfaqForm $infaqForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfaqForm  $infaqForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfaqForm $infaqForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfaqForm  $infaqForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfaqForm $infaqForm)
    {
        //
    }
}
