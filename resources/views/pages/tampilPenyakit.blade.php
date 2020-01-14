@extends('layout.master')


 @section('content') 

    <div class = "col-lg-9">
        <div class ="card">
            <div class = "card-body">
                <div class="card-header">
                    <h1> {{$penyakit->nama}}</h1>
                </div>
                <div class = "card-body">
                <p style="white-space: pre-wrap;">{{$penyakit->deskripsi}}</p>
                <h5>Saran :</h5>
                <p style="white-space: pre-wrap;">{{$penyakit->saran}}</p>
                </div>
            </div>
        </div>
    </div>
 

@endsection