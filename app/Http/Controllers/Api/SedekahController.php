<?php

namespace App\Http\Controllers\Api;

use App\Models\Sedekah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SedekahController extends Controller
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
        return view('sedekah.create');
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
            'sedekah' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
        ]);
        
        $file = $request->file('sedekah');
        $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
        $file->storeAs('public/sedekah', $fileName);
        $data['sedekah'] = $fileName;
        
        $sedekah = new Sedekah($data);
        $sedekah->save();
        
        return redirect(url('sedekah'))->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sedekah  $sedekah
     * @return \Illuminate\Http\Response
     */
    public function show(Sedekah $sedekah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sedekah  $sedekah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sedekah $sedekah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sedekah  $sedekah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sedekah $sedekah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sedekah  $sedekah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sedekah $sedekah)
    {
        //
    }
}
