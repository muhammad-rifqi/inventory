@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit School</div>

                <div class="panel-body">
                   
                       

                    <form method="POST" action="/admin/product/update/{{$data->id}}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-6">
                                    <label for="kr">Kode Rekening</label>
                                    <select class="form-control" id="kr" name="kode_rekening">
                                             @foreach($rek as $kr)
											    <option value="{{$kr->rekening_code}}">{{$kr->rekening_code}}</option>
											@endforeach   
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nr">Nama Rekening</label>
                                    <select class="form-control" id="nr" name="nama_rekening">
                                            @foreach($rek as $nr)
											    <option value="{{$nr->rekening_name}}">{{$nr->rekening_name}}</option>
											@endforeach  
                                    </select>
                                </div>
                            </div>

                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-4">
                                    <label for="nb">Nama Barang</label>
                                    <input type="text" class="form-control" id="nb" name="nama_barang" value={{$data->nama_barang}}>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vol">Volume</label>
                                    <input type="text" class="form-control" id="vol" name="volume" value={{$data->volume}}>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="st">Satuan</label>
                                    <input type="text" class="form-control" id="st" name="satuan" value={{$data->satuan}}>
                                </div>
                            </div>

                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-4">
                                    <label for="hr">Harga</label>
                                    <input type="text" class="form-control" id="hr" name="harga" value={{$data->harga}}>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="total">Total</label>
                                    <input type="text" class="form-control" id="total" name="total" value={{$data->total}}>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="idschool">Sekolah</label>
                                    <select class="form-control" id="idschool" name="id_sekolah">
                                            @foreach($school as $r)
                                            @if($r->id == $data->id_school)
											<option value="{{$r->id}}" selected>{{$r->nama_sekolah}}</option>
                                            @else
                                            <option value="{{$r->id}}">{{$r->nama_sekolah}}</option>
                                            @endif
											@endforeach   
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding:10px;">
                                    <button type="submit" class="btn btn-primary"> Create </button>
                                </div>
                            </div>
                        </form>


                  

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
