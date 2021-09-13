<?php include(public_path().'/helper.php');?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">School</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Token Anda adalah: <strong>{{ Auth::user()->api_token }}</strong> -->

                    <div class="form-row">
                        <div class="form-group col-md-12" style="padding:10px;">
                            <a href="/admin/school/create"  class="btn btn-primary"> Tambah </a>
                        </div>
                    </div>

                    <div class="table-responsive-lg">
                        <table class="table">
                        <caption>List of Product</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Sekolah</th>
                            <th scope="col">Sumber Dana</th>
                            <th scope="col"> Tahun Anggaran </th>
                            <th scope="col"> Kecamatan </th>
                            <th scope="col"> Kota </th>
                            <th scope="col"> Provinsi </th>
                            <th scope="col"> Edit </th>
                            <th scope="col"> Hapus </th>
                            </tr>
                        </thead>
                        <tbody>
                      
                           
                        @foreach($data as $no => $row)

     
                        <tr>
                            <th scope="row">{{$no+1}}</th>
                            <td>{{$row->nama_sekolah}}</td>
                            <td>{{$row->sumber_dana}}</td>
                            <td>{{$row->tahun_anggaran}}</td>
                            <td>{{f_kec($row->kecamatan)}}</td>
                            <td>{{f_kota($row->kota)}}</td>
                            <td>{{f_propinsi($row->provinsi)}}</td>
                            <td><a href="/admin/detailschool/{{$row->id}}" class="btn btn-warning"> Detail </a></td>
                            <td><a href="/admin/deleteschool/{{$row->id}}" class="btn btn-danger"> Hapus </a></td>
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
