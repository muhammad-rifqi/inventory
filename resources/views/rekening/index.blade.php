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


                         <form method="POST" action="/admin/rekening/create" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-6">
                                    <label for="kr">Kode Rekening</label>
                                    <input type="text" class="form-control" id="kr" name="kode_rekening">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nr">Nama Rekening</label>
                                    <input type="text" class="form-control" id="nr" name="nama_rekening">
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
                        <caption>List of Rekening</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Rekening</th>
                            <th scope="col">nama Rekening</th>
                            <th scope="col"> Edit </th>
                            <th scope="col"> Hapus </th>
                            </tr>
                        </thead>
                        <tbody>
                      
                           
                        @foreach($data as $no => $row)

     
                        <tr>
                            <th scope="row">{{$no+1}}</th>
                            <td>{{$row->rekening_code}}</td>
                            <td>{{$row->rekening_name}}</td>
                            <td><a href="/admin/editrekening/{{$row->id}}" class="btn btn-warning"> Edit </a></td>
                            <td><a href="/admin/deleterekening/{{$row->id}}" class="btn btn-danger"> Hapus </a></td>
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
