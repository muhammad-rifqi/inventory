<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekening;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data= Rekening::paginate(15);
        return view('rekening.index',compact('data'));
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
        $rek = new Rekening();
        $rek->rekening_code = $request->kode_rekening;
        $rek->rekening_name = $request->nama_rekening;
        $rek->save();
        return redirect('/admin/rekening')->with('status', 'Rekening created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Rekening::findOrFail($id);
        return view('rekening.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rek = Rekening::findOrFail($id);
        $rek->rekening_code = $request->kode_rekening;
        $rek->rekening_name = $request->nama_rekening;
        $rek->save();
        return redirect('/admin/rekening')->with('status', 'Rekening Updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Rekening::findOrFail($id);
        $data->delete();
        return redirect('/admin/rekening')->with('status', 'Rekening Deleted!');
    }
}
