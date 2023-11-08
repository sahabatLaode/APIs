<?php

namespace App\Http\Controllers\Api;

use App\Models\driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class driverController extends Controller
{
    public function index()
    {
        $driver = driver::all();

        if ($driver->count() > 0){
            //
            return response()->json([
                'status' => true,
                'data' => $driver
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data zakat tidak ada'
            ],404);
        }

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','max:255'],
            'email' => ['required', 'email','unique:users','max:255'],
            'phone' => ['required',],
            'password' => ['required','max:255', 'confirmed']
        ],[
            'name.required' => 'Nama Hasrus Diisi',
            'name.max' => 'Panjang karakter maksimal 255',
            'email.required' => 'email harus diisi',
            'email.email' => 'email tidak valid',
            'email.unique' => 'email sudah ada',
            'email.max' => 'panjang email maksimal 255',
            'phone.required' => 'phone harus diisi',
            'password.required' => 'Password harus diisi',
            'password.max' => 'Panjang password maksimal 255',
            'password.confirmed' => 'password tidak sama',

        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ],400);
        }else{
            //jika ok, simpan
            $driver = new driver();
            $driver->name = $request->name;
            $driver->email = $request->email;
            $driver->phone = $request->phone;
            $driver->password = Hash::make($request->password);
            $driver->save();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil Regist'
            ], 201);

        }
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => ['required', 'email'],
            'password' => ['required']
        ],[
            'username.required' => 'Username harus diisi',
            'username.email' => 'Username menggunakan format email',
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ],400);
        }else{
            if (Auth::attempt(['email'=>$request->username, 'password'=>$request->password])){
                $driver = Auth::$driver();
                $token = $driver->createToken('authToken')->plainTextToken;

                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'token' => $token
                ],200);
            }else{

                return response()->json([
                    'status' => false,
                    'message' => 'Login Gagal'
                ],400);
            }
        }
    }

    public function show(Request $id)
    {
        //
        $driver = driver::find($id);
        if ($driver != null){
            //
            return response()->json([
                'status' => true,
                'data' => $driver
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'data user tidak ada'
            ],404);
        }
    }

    public function logout(){
        Auth::driver()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil logout'
        ]);
    }
}
