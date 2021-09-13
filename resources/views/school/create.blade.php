<script type="text/javascript">

function showProp(idp) {
  if (idp == "") {
        alert('please choose data!');
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("kota").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","/admin/sekolah/kota/"+idp,true);
    xmlhttp.send();
  }
}

function showKecamatan(idk) {
  if (idk == "") {
        alert('please choose data!');
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("kecamatan").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","/admin/sekolah/kecamatan/"+idk,true);
    xmlhttp.send();
  }
}

</script>


@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add School</div>

                <div class="panel-body">
                   
                         <form method="POST" action="/admin/school/store" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-4">
                                    <label for="ns">Nama Sekolah</label>
                                    <input type="text" class="form-control" id="ns" name="nama_sekolah">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vol">Sumber Dana </label>
                                    <input type="text" class="form-control" id="sd" name="sumber_dana">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ta">Tahun Anggaran</label>
                                    <select class="form-control" id="ta" name="tahun_anggaran">
                                            <option value="0">-- Pilih Tahun --</option>
                                            @for($i=2000; $i<2050; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-row" style="padding:10px;">
                                <div class="form-group col-md-4">
                                    <label for="provinsi">Provinsi</label>
                                    <select class="form-control" id="provinsi" name="provinsi" onChange="showProp(this.value)">
                                           <option value="0">-- Pilih Provinsi --</option>
                                           @foreach($provinsi as $p)
                                                <option value="{{$p->id}}">{{$p->nama_provinsi}}</option>
                                           @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="kota">Kota</label>
                                    <div id="kota">
                                        <select class='form-control'>
                                        <option>-- Pilih Kota --</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="kecamatan">Kecamatan</label>
                                    <div id="kecamatan">
                                        <select class='form-control'>
                                        <option>-- Pilih Kecamatan --</option>
                                        </select>
                                    </div>
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
