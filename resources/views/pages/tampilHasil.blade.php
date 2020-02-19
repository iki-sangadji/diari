@extends('layout.master')


 @section('content') 
<script>
    function firstQuestion() {
      var x = document.getElementById("pertanyaan0");
      x.style.display = "block";  
      var btn= document.getElementById("btnMulai");
      btn.style.display = "none";  
      var bantuan= document.getElementById("bantuan");
      bantuan.style.display = "none";
      var header= document.getElementById("header");
      header.style.display = "block";
      
    }
    function skipQuestion(i) {
      var x = document.getElementById("pertanyaan"+i);
      x.style.display = "none";
      
      i++;
      var y = document.getElementById("pertanyaan"+i);
      y.style.display = "block";
      
    }
    function nextQuestion(i, id) {
      check(id);  
      var x = document.getElementById("pertanyaan"+i);
      x.style.display = "none";
      
      i++;
      var y = document.getElementById("pertanyaan"+i);
      y.style.display = "block";

      var selesai= document.getElementById("btnSelesai");
      selesai.style.display = "block";
    }
    function check(id) {
    document.getElementById("pilih-"+id).checked = true;
    }
</script>
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
                                        @if(count($gejalaTerpilih)>0)
                                            @foreach ($gejalaTerpilih as $row)
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

         <form action="{{route('buatKesimpulan')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                {{csrf_field()}}
            <input type="text"  name="waktu" value="{{$waktu}}" style="display : none;" >
                    @for ($i =0 ; $i < sizeof($gejalaBaru) ; $i++)
                        
                        
                        <div class="row" id="pertanyaan{{$i}}" style="display : none;">
                            <div class="card col-lg-9">
                                <div class="card-header">
                                    <strong>{{$gejalaBaru[$i]->nama}}</strong>
                                </div>
                                <div class="card-body card-block">
                                    
                                        <div class="form-group" >
                                            <img  src="{{asset('storage/'.$gejalaBaru[$i]->image)}}" alt="" style="horizontal-align:middle">
                                            
                                        </div>
                                        <small>Sumber gambar : {{$gejalaBaru[$i]->sumber_gambar}}</small>
                                        <div class="form-group">
                                            <h4  class="control-label mb-1">{{$gejalaBaru[$i]->pertanyaan}}</h4>
                                        </div>
                                        <div class="card-footer" >
                                            <button type="button" class="btn btn-success" onclick="nextQuestion({{$i}},{{$gejalaBaru[$i]->id}})">Ya</button>
                                            <button type="button" class="btn btn-danger" onclick="skipQuestion({{$i}})">Tidak</button>
                                            <ul class="ks-cboxtags" style="display : none;">
                                                <li><input type="checkbox" id="pilih-{{$gejalaBaru[$i]->id}}" name="gejalaTerpilih[]" value="{{$gejalaBaru[$i]->nama}}" ><label for="{{$gejalaBaru[$i]->nama}}">Ya</label></li>
                                                
                                                <input type="text" id="{{$gejalaBaru[$i]->id}}" name="arrayGejala[]" value="{{$gejalaBaru[$i]->nama}}" >
                                            </ul>
                                        </div>
                                </div>                        
                            </div>
                        </div>
                    @endfor
                
                <div >
                    <button type="button" class="btn btn-primary btn-sm" id="btnMulai" onclick="firstQuestion()">
                        <i class="fa fa-dot-circle-o"></i> Tambah Gejala
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm" style="display:none" id="btnSelesai"> 
                        <i class="fa fa-dot-circle-o"></i> Selesai
                    </button>
                </div>
        </form>

    </div>
    
 

@endsection