<?php
function f_propinsi($idp){
    $pr = new App\Province;
    $d = $pr::where('id','=',$idp)->first();
    return $d->nama_provinsi;
}

function f_kota($idc){
    $ct = new App\City;
    $d = $ct::where('id','=',$idc)->first();
    return $d->nama_kota;
}

function f_kec($idk){
    $kc = new App\District;
    $d = $kc::where('id','=',$idk)->first();
    return $d->nama_kecamatan;
}

function f_school($ids){
    $sc = new App\School;
    $d = $sc::where('id','=',$ids)->first();
    return $d->nama_sekolah;
}
?>
