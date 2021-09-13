<?php include(public_path().'/helper.php');?>

@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Product</div>

                <div class="panel-body">
                   
                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-3">
                                    <label for="kr">Nama Sekolah</label>
                                    <input type="text" class="form-control" id="kr" value="{{$school->nama_sekolah}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nr">Kecamatan</label>
                                    <input type="text" class="form-control" id="nr" value="{{f_kec($school->kecamatan)}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nr">Kota</label>
                                    <input type="text" class="form-control" id="nr" value="{{f_kota($school->kota)}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nr">Provinsi</label>
                                    <input type="text" class="form-control" id="nr" value="{{f_propinsi($school->provinsi)}}">
                                </div>
                            </div>
                       
                    <div class="table-responsive-lg">
                        <table class="table">
                        <caption>List of Product</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode </th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Volume</th>
                            <th scope="col"> Satuan </th>
                            <th scope="col"> Harga </th>
                            </tr>
                        </thead>
                        <tbody>
                      
                           
                        @foreach($product as $no => $row)

     
                        <tr>
                            <th scope="row">{{$no+1}}</th>
                            <td>{{$row->kode_rekening}}</td>
                            <td>{{$row->nama_barang}}</td>
                            <td>{{$row->volume}}</td>
                            <td>{{$row->satuan}}</td>
                            <td>{{$row->harga}}</td>
                        </tr>

                        @endforeach
                        </tbody>   
                        </table>
                    </div>

                    <div class="paging">
                        {{$product->links()}}    
                    </div>
                    <br>
                    <div>
                        <p><a href="/admin/product/download/{{Request::segment(3)}}/xlsx" class="btn btn-primary">Save</a>
                        <a href="/admin/school/print/{{Request::segment(3)}}" class="btn btn-primary" target="_blank">Print</a>
                        <a href="/admin/school" class="btn btn-primary">Exit</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
