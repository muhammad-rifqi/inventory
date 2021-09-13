@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add School</div>

                <div class="panel-body">
                   
                       

                <form method="POST" action="/admin/rekening/update/{{$data->id}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-6">
                                    <label for="kr">Kode Rekening</label>
                                    <input type="text" class="form-control" id="kr" name="kode_rekening" value="{{$data->rekening_code}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nr">Nama Rekening</label>
                                    <input type="text" class="form-control" id="nr" name="nama_rekening" value="{{$data->rekening_name}}">
                                </div>
                            </div>

                          
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding:10px;">
                                    <button type="submit" class="btn btn-primary"> Edit </button>
                                </div>
                            </div>
                        </form>


                  

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
