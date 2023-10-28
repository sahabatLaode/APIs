<?php

namespace App\Http\Controllers\Api;

use App\Models\Infaq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfaqController extends Controller
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
        return view('infaq.create');
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
            'infaq' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
        ]);
        
        $file = $request->file('infaq');
        $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
        $file->storeAs('public/infaq', $fileName);
        $data['infaq'] = $fileName;
        
        $infaq = new Infaq($data);
        $infaq->save();
        
        return redirect(url('infaq'))->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infaq  $infaq
     * @return \Illuminate\Http\Response
     */
    public function show(Infaq $infaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infaq  $infaq
     * @return \Illuminate\Http\Response
     */
    public function edit(Infaq $infaq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infaq  $infaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infaq $infaq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infaq  $infaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infaq $infaq)
    {
        //
    }
}
