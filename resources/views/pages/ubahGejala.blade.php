@extends('layout.master')

 @section('content')  
    <div class = "col-lg-9">
        <div class ="card">
            <div class = "card-body">
                <div class = "card-title">
                    <h3 class="text-center title-2">Diagnosa Sendi Mandiri</h3> 
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong>Form Ubah Gejala</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('updateGejala',$gejala->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            {{csrf_field()}}
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Gejala</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="nama" value="{{$gejala->nama}}" class="form-control">
                                    
                                </div>
                            </div>
                            
                            
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Pertanyaan</label>
                                    
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="pertanyaan" id="textarea-input" rows="9" value="" class="form-control">{{$gejala->pertanyaan}}</textarea>
                                    <small class="form-text text-muted">Pertanyaan yang jawabannya berupa ya atau tidak (contoh : Apakah terjadi kekauan pada sendi?)</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">Gambar Pertanyaan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <img  src="{{asset('storage/'.$gejala->image)}}" alt="" style="horizontal-align:middle">
                                    <input type="file" id="file-input" name="image" class="form-control-file">
                                    <small class="form-text text-muted">Gambar yang membuat pengguna memahami pertanyaan</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Sumber Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="sumber" value="{{$gejala->sumber_gambar}}" class="form-control">
                                    
                                </div>
                            </div>

                            @for ($i=0;$i<sizeof($penyakits);$i++)
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Densitas {{$penyakits[$i]->nama}}</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div>
                                            <input type="hidden" name="id_penyakit[]"  value="{{$penyakits[$i]->id}}" class="form-control cc-number identified visa">
                                            <input type="number" name="densitas[]" min="0" max="1" step="0.1" value="{{$densitas[$i]}}" class="form-control cc-number identified visa">
                                            <small class="form-text text-muted">Densitas maksimal 1</small>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            @error('nama')
                                <div class="row form-group">
                                    <p class="fa fa-exclamation"> {{$message}} </p> 
                                </div>
                            @enderror

                            @error('image')
                                <div class="row form-group">
                                    <p class="fa fa-exclamation"> {{$message}} </p> 
                                </div>
                            @enderror

                             @error('pertanyaan')
                                <div class="row form-group">
                                    <p class="fa fa-exclamation"> {{$message}} </p> 
                                </div>
                            @enderror

                            @error('sumber')
                                <div class="row form-group">
                                    <p class="fa fa-exclamation"> {{$message}} </p> 
                                </div>    
                            @enderror
                            
                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                        
                                    </div>
                        </form>
                    </div>                        
            </div>
        </div>
    </div>
 

@endsection