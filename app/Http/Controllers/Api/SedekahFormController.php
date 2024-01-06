<?php

namespace App\Http\Controllers\Api;

use App\Models\SedekahForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SedekahFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sedekahForm = SedekahForm::all();

        if ($sedekahForm->count() > 0){
            //
            return response()->json([
                'status' => true,
                'data' => $sedekahForm
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
            'jenis_donasi' => 'required|max:100',
            'nominal' => 'required|max:100',
            'nama' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:100',
<<<<<<< HEAD
            // 'fotoSedekah' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
=======
          
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33
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
<<<<<<< HEAD
            // 'fotosedekah.required' => ' harus diisi.',
            // 'fotosedekah.file' => ' format file.',
            // 'fotosedekah.image' => 'format image.',
            // 'fotosedekah.mimes' => 'format mimes.',
            // 'fotosedekah.max' => 'maksimal 4048.',
=======
            
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33
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
<<<<<<< HEAD
            // $file = $request->file('fotoSedekah');
            // $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
            // $file->storeAs('public/fotoSedekah', $fileName);
            // $data['fotoSedekah'] = $fileName;
=======
            
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33

            $sedekahForm = new SedekahForm();
            $sedekahForm->jenis_donasi = $request->jenis_donasi;
            $sedekahForm->nominal = $request->nominal;
            $sedekahForm->nama = $request->nama;
            $sedekahForm->email = $request->email;
            $sedekahForm->phone = $request->phone;
            $sedekahForm->save();
            return response()->json([
                'status' => $status,
                'message' => $message
            ],201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SedekahForm  $sedekahForm
     * @return \Illuminate\Http\Response
     */
    public function show(SedekahForm $id)
    {
        //
        $sedekahForm = SedekahForm::find($id);
        if ($sedekahForm != null){
            //
            return response()->json([
                'status' => true,
                'data' => $sedekahForm
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
     * @param  \App\Models\SedekahForm  $sedekahForm
     * @return \Illuminate\Http\Response
     */
    public function edit(SedekahForm $sedekahForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SedekahForm  $sedekahForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SedekahForm $sedekahForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SedekahForm  $sedekahForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(SedekahForm $sedekahForm)
    {
        //
    }
}
