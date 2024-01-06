<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //
<<<<<<< HEAD
    public function index()
    {
        $user = User::all();

        if ($user->count() > 0){
            //
            return response()->json([
                'status' => true,
                'data' => $user
            ],200);
        }else{
            //
            return response()->json([
                'status' => false,
                'message' => 'Data user tidak ada'
            ],404);
        }

    }

=======

    // public function index()
    // {
    //     $user = User::all();

    //     if ($user->count() > 0){
    //         //
    //         return response()->json([
    //             'status' => true,
    //             'data' => $user
    //         ],200);
    //     }else{
    //         //
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'data zakat tidak ada'
    //         ],404);
    //     }

    // }
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['nullable', 'max:255'],
            'email' => ['nullable', 'email','unique:users','max:255'],
            // 'phone' => ['nullable', 'max:255'],
            // 'birth' => ['nullable', 'max:255'],
            // 'nik' => ['nullable', 'max:255'],
            // 'address' => ['nullable', 'max:255'],
            // 'ranting' => ['nullable', 'max:255'],
            'password' => ['nullable', 'max:255', 'confirmed']
        ],[
            'name.max' => 'Panjang nama maksimal 255',
            'email.email' => 'email tidak valid',
            'email.unique' => 'email sudah ada',
            'email.max' => 'panjang email maksimal 255',
            // 'phone.max' => 'panjang nomor telepon maksimal 255',
            // 'birth.max' => 'Panjang tanggal lahir maksimal 255',
            // 'nik.max' => 'Panjang NIK maksimal 255',
            // 'address.max' => 'Panjang address maksimal 255',
            // 'ranting.max' => 'Panjang ranting maksimal 255',
            'password.max' => 'Panjang password maksimal 255',
            'password.confirmed' => 'password tidak sama',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }else{
            //jika ok, simpan
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            // $user->phone = $request->phone;
            // $user->birth = $request->birth;
            // $user->nik = $request->nik;
            // $user->address = $request->address;
            // $user->ranting = $request->ranting;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mendaftar'
            ], 201);
        }
    }

    public function updatePassword(Request $request)
    {
        $user = User::find($request->id);

        if ($user) {
            $user->password = Hash::make($request->password);
            $saveResult = $user->save();

            if ($saveResult) {
                return response()->json(['message' => 'Password updated successfully'], 200);
            } else {
                return response()->json(['message' => 'Failed to update password'], 500);
            }
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function updateUserData(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update field lainnya...

        $user->save();

        return response()->json(['message' => 'User data updated successfully']);
    }

    public function updateUserPassword(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->password = Hash::make($request->input('password'));

        $user->save();

        return response()->json(['message' => 'User password updated successfully']);
    }

    // Lama
    public function update(Request $request, $id)
    {
        // validation data
        $validator = Validator::make ($request->all(),[
            'name' => ['nullable', 'max:255'],
            'email' => ['nullable', 'email','unique:users','max:255'],
            // 'phone' => ['nullable', 'max:255'],
            // 'birth' => ['nullable', 'max:255'],
            // 'nik' => ['nullable', 'max:255'],
            // 'address' => ['nullable', 'max:255'],
            // 'ranting' => ['nullable', 'max:255'],
            'password' => ['nullable', 'max:255', 'confirmed']
        ], [
            'name.max' => 'Panjang nama maksimal 255',
            'email.email' => 'email tidak valid',
            'email.unique' => 'email sudah ada',
            'email.max' => 'panjang email maksimal 255',
            // 'phone.max' => 'panjang nomor telepon maksimal 255',
            // 'birth.max' => 'Panjang tanggal lahir maksimal 255',
            // 'nik.max' => 'Panjang NIK maksimal 255',
            // 'address.max' => 'Panjang address maksimal 255',
            // 'ranting.max' => 'Panjang ranting maksimal 255',
            'password.max' => 'Panjang password maksimal 255',
            'password.confirmed' => 'password tidak sama',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 400);
        } else {
            // update user
            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            // $user->phone = $request->phone;
            // $user->birth = $request->birth;
            // $user->nik = $request->nik;
            // $user->address = $request->address;
            // $user->ranting = $request->ranting;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil di update.'
            ], 200);
        }
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'email harus diisi',
            'email.email' => 'email menggunakan format email',
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ],400);
<<<<<<< HEAD
        } else {
=======
        }else{
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33
            if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
                $user = Auth::user();
                $token = $user->createToken('authToken')->plainTextToken;

                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'token' => $token
                ],200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Login Gagal'
                ],400);
            }
        }
    }

<<<<<<< HEAD
    public function getUserData()
    {      
        $user = Auth::user();

        if ($user){
=======
    public function show(Request $id)
    {
        //
        $user = User::find($id);
        if ($user != null){
            //
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33
            return response()->json([
                'status' => true,
                'data' => $user
            ],200);
        }else{
<<<<<<< HEAD
=======
            //
>>>>>>> 9a3c2054952480228fcf6f753e4ab878c7b90e33
            return response()->json([
                'status' => false,
                'message' => 'data user tidak ada'
            ],404);
        }
    }


    public function logout(){
        Auth::user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil logout'
        ]);
    }
}
