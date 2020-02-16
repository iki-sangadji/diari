@extends('layout.master')


 @section('content') 
 <style>
        ul.ks-cboxtags {
        list-style: none;
        padding: 10px;
    }
    ul.ks-cboxtags li{
    display: inline;
    }
    ul.ks-cboxtags li label{
        display: inline-block;
        background-color: rgba(255, 255, 255, .9);
        border: 4px solid rgba(139, 139, 139, .3);
        color: #adadad;
        border-radius: 100px;
        white-space: nowrap;
        margin: 3px 0px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        transition: all .2s;
        font-size: 20px;
    }

    ul.ks-cboxtags li label {
        padding: 8px 8px;
        cursor: pointer;
    }

    ul.ks-cboxtags li label::before {
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 30px;
        padding: 3px 7px 3px 3px;
        content: "\f067";
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
        content: "\f00c";
        transform: rotate(-360deg);
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked + label {
        border: 2px solid #1bdbf8;
        background-color: #12bbd4;
        color: #fff;
        transition: all .2s;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
    display: absolute;
    }
    ul.ks-cboxtags li input[type="checkbox"] {
    position: absolute;
    opacity: 0;
    }
    ul.ks-cboxtags li input[type="checkbox"]:focus + label {
    border: 2px solid #777777;
    }
</style>
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
            <div class="card-header">
               <strong id="header" style="display : none;">Klk "ya" jika mengalami gejala yang terasa</strong>
            </div>
            <div class = "card-body">
                {{-- <div class = "card-title">
                    <h3 class="text-center title-2"></h3> 
                </div> --}}
                <div class="row" id="bantuan">
                    <div class="card col-lg-9">
                        <div class="card-header">
                            <strong>Cara menggunakan</strong>
                        </div>
                        <div class="card-body card-block">
                            
                                <div class="form-group" >
                                    <img  src="{{asset('bantuan.png')}}" alt="" style="horizontal-align:middle">
                                    
                                </div>
                                
                        </div>                        
                    </div>
                </div>
                <form action="{{route('buatKesimpulan')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                {{csrf_field()}}
                    {{-- @foreach ( $gejalas as $gejala ) --}}
                    @for ($i =0 ; $i < sizeof($gejalas) ; $i++)
                        
                        
                        <div class="row" id="pertanyaan{{$i}}" style="display : none;">
                            <div class="card col-lg-9">
                                <div class="card-header">
                                    <strong>{{$gejalas[$i]->nama}}</strong>
                                </div>
                                <div class="card-body card-block">
                                    
                                        <div class="form-group" >
                                            <img  src="{{asset('storage/'.$gejalas[$i]->image)}}" alt="" style="horizontal-align:middle">
                                            
                                        </div>
                                        <small>Sumber gambar : {{$gejalas[$i]->sumber_gambar}}</small>
                                        <div class="form-group">
                                            <h4  class="control-label mb-1">{{$gejalas[$i]->pertanyaan}}</h4>
                                        </div>
                                        <div class="card-footer" >
                                            <button type="button" class="btn btn-success" onclick="nextQuestion({{$i}},{{$gejalas[$i]->id}})">Ya</button>
                                            <button type="button" class="btn btn-danger" onclick="skipQuestion({{$i}})">Tidak</button>
                                            <ul class="ks-cboxtags" style="display : none;">
                                                <li><input type="checkbox" id="pilih-{{$gejalas[$i]->id}}" name="gejalaTerpilih[]" value="{{$gejalas[$i]->nama}}" ><label for="{{$gejalas[$i]->nama}}">Ya</label></li>
                                                
                                            </ul>
                                            <input type="text" id="{{$gejalas[$i]->id}}" name="arrayGejala[]" value="{{$gejalas[$i]->nama}}" style="display : none;">
                                        
                                        </div>
                                </div>                        
                            </div>
                        </div>
                    @endfor
                {{-- @endforeach --}}
                <div class="card-footer" >
                    <button type="button" class="btn btn-primary btn-sm" id="btnMulai" onclick="firstQuestion()">
                        <i class="fa fa-dot-circle-o"></i> Mulai Diagnosa
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm" style="display:none" id="btnSelesai"> 
                        <i class="fa fa-dot-circle-o"></i> Selesai
                    </button>
                </div>
            </form>
        </div>
    </div>
 

@endsection