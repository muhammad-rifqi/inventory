@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Product</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Token Anda adalah: <strong>{{ Auth::user()->api_token }}</strong> -->


                         <form method="POST" action="/admin/product/create" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="nb" name="nama_barang">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vol">Volume</label>
                                    <input type="text" class="form-control" id="vol" name="volume">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="st">Satuan</label>
                                    <input type="text" class="form-control" id="st" name="satuan">
                                </div>
                            </div>

                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-4">
                                    <label for="hr">Harga</label>
                                    <input type="text" class="form-control" id="hr" name="harga">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="total">Total</label>
                                    <input type="text" class="form-control" id="total" name="total">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="idschool">Sekolah</label>
                                    <select class="form-control" id="idschool" name="id_sekolah">
                                            @foreach($school as $r)
											<option value="{{$r->id}}">{{$r->nama_sekolah}}</option>
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


                    <div class="table-responsive-lg">
                        <table class="table">
                        <caption>List of Product</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Rekening</th>
                            <th scope="col">nama Rekening</th>
                            <th scope="col"> Volume </th>
                            <th scope="col"> Satuan </th>
                            <th scope="col"> Harga </th>
                            <th scope="col"> Total </th>
                            <th scope="col"> Edit </th>
                            <th scope="col"> Hapus </th>
                            </tr>
                        </thead>
                        <tbody>
                      
                           
                        @foreach($data as $no => $row)

     
                        <tr>
                            <th scope="row">{{$no+1}}</th>
                            <td>{{$row->kode_rekening}}</td>
                            <td>{{$row->nama_rekening}}</td>
                            <td>{{$row->volume}}</td>
                            <td>{{$row->satuan}}</td>
                            <td>{{$row->harga}}</td>
                            <td>{{$row->total}}</td>
                            <td><a href="/admin/editproduct/{{$row->id}}" class="btn btn-warning"> Edit </a></td>
                            <td><a href="/admin/deleteproduct/{{$row->id}}" class="btn btn-danger"> Hapus </a></td>
                        </tr>


                        @endforeach
                        </tbody>   



                        </table>
                    </div>

                    <div class="paging">
                        {{$data->links()}}    
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
