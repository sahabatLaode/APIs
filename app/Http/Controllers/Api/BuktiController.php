<?php

namespace App\Http\Controllers\Api;

use App\Models\Bukti;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BuktiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bukti.create');
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
        $data = $request->validate([
            'photo' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
           ]);

           $file = $request->file('photo');
           $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
           $file->storeAs('public/photo', $fileName);
           $data['photo'] = $fileName;
           
           Bukti::create($data);
           return redirect(url('bukti'))->with('success', 'success');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function show(Bukti $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function edit(Bukti $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bukti $bukti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bukti $bukti)
    {
        //
    }
}
