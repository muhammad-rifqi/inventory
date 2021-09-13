<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\School;
use App\Rekening;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::paginate(20);
        $school = School::all();
        $rek = Rekening::all();
        return view('home',compact('data','school','rek'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->kode_rekening = $request->kode_rekening;
        $product->nama_rekening = $request->nama_rekening;
        $product->nama_barang = $request->nama_barang;
        $product->volume = $request->volume;
        $product->satuan = $request->satuan;
        $product->harga = $request->harga;
        $product->total = $request->total;
        $product->id_school = $request->id_sekolah;
        $product->save();
        return redirect('/home')->with('status', 'Product created!');
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect('/home')->with('status', 'Product Deleted!');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $school = School::all();
        $rek = Rekening::all();
        return view('product.edit',compact('data','school','rek'));
    }


    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->kode_rekening = $request->kode_rekening;
        $product->nama_rekening = $request->nama_rekening;
        $product->nama_barang = $request->nama_barang;
        $product->volume = $request->volume;
        $product->satuan = $request->satuan;
        $product->harga = $request->harga;
        $product->total = $request->total;
        $product->id_school = $request->id_sekolah;
        $product->save();
        return redirect('/home')->with('status', 'Product Updated!');
    }
   
}
