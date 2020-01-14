@extends('layout.master')


 @section('content') 

    <div class = "col-lg-9">
        <div class ="card">
            <div class = "card-body">
                <div class="card-header">
                    <h1> Hasil diagnosa :  </h1>
                </div>
                <div class = "card-body">
                    <h3> Tingkat keyakinan {{$hasilAkhir['densitas']}}%</h2>
                    <h3> Penyakit yang mungkin dialami : </h2>

                    
                    <div class="col-lg-5">
                        <!-- TOP CAMPAIGN-->
                            <div class="card">
                                <table class="table table-borderless table-data3">
                                    <tbody>
                                       @foreach ($hasilAkhir['penyakit'] as $penyakit)
                                                <tr>
                                                    <h4><i class="fa fa-plus"></i><a href="{{route('tampilPenyakit',$penyakit)}}">{{$penyakit}}</a></h4>   
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <!--  END TOP CAMPAIGN-->
                    </div>

                    
                    <div class = "col-lg-5">
                        <div class ="card">
                                        <div class="card-header">
                                            <h4>Gejala yang dipilih</h4>
                                        </div>
                            <div class = "card-body">
                                <table class="table table-borderless table-data3">
                                            
                                            <tbody>
                                                @if(count($gejalas)>0)
                                                    @foreach ($gejalas as $row)
                                                        <tr>
                                                            <td><h5>{{$row}}</h5></td>  
                                                        </tr>  
                                                    @endforeach
                                                    @else
                                                        <p>Belum ada Instalasi</p>
                                                @endif
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                </div>  
            </div>
        </div>
    </div>
 

@endsection