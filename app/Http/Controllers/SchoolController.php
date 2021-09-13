<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Province;
use App\City;
use App\District;
use App\Product;
use DB;
use Excel;

class SchoolController extends Controller
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
        $data = School::paginate(20);
        return view('school.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Province::all();
        return view('school.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $school = new School();
        $school->nama_sekolah = $request->nama_sekolah;
        $school->sumber_dana = $request->sumber_dana;
        $school->tahun_anggaran = $request->tahun_anggaran;
        $school->kecamatan = $request->kecamatan;
        $school->kota = $request->kota;
        $school->provinsi = $request->provinsi;
        $school->save();
        return redirect('/admin/school')->with('status', 'School created!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);
        $product = Product::where('id_school','=',$school->id)->paginate(15);
        return view('school.detail',compact('school','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = School::findOrFail($id);
        $data->delete();
        return redirect('/admin/school')->with('status', 'School Deleted!');
    }

    public function download($id,$type)
    {
        $data = Product::where('id_school','=', $id)->get()->toArray();
        return Excel::create('laravelcode', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function print($id)
    {
        $school = School::findOrFail($id);
        $data = Product::where('id_school','=', $id)->get();
        return view('school.print',compact('data','school'));
    }

    public function provinsi($id)
    {
        $data = Province::where('id','=',$id)->first();
        return $data->nama_provinsi;
    }

    public function kota($id)
    {
        $data = City::where('id_provinsi','=',$id)->get()->toArray();
        echo"
        <select name='kota' id='kota' class='form-control' onChange='showKecamatan(this.value)'>";
        $jumlah = count($data);
        for($i=0;$i<$jumlah;$i++){
          echo"  <option value='".$data[$i]['id']."'>".$data[$i]['nama_kota']."</option>";
        }
        echo"</select>";
    }

    public function kecamatan($id)
    {

        $data = District::where('id_kota','=',$id)->get()->toArray();
        echo"
        <select name='kecamatan' id='kecamatan' class='form-control'>";
        $jumlah = count($data);
        for($i=0;$i<$jumlah;$i++){
          echo"  <option value='".$data[$i]['id']."'>".$data[$i]['nama_kecamatan']."</option>";
        }
        echo"</select>";
    }
}
