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
                        <strong>Form Ubah Penyakit</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('updatePenyakit',$penyakit->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            {{csrf_field()}}
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Penyakit</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="nama" value="{{$penyakit->nama}}" class="form-control">
                                    
                                </div>
                            </div>
                            
                            
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                                    
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="deskripsi" id="textarea-input" rows="9"  class="form-control">{{$penyakit->deskripsi}}</textarea>
                                    <small class="form-text text-muted">Deskripsi singkat penyakit</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Saran</label>
                                    
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="saran" id="textarea-input" rows="11"  class="form-control">{{$penyakit->saran}}</textarea>
                                    <small class="form-text text-muted">Saran untuk penderita</small>
                                </div>
                            </div>
                            

                            
                            
                            @error('nama')
                                <div class="row form-group">
                                    <p class="fa fa-exclamation"> {{$message}} </p> 
                                </div>
                            @enderror

                           

                             @error('deskripsi')
                                <div class="row form-group">
                                    <p class="fa fa-exclamation"> {{$message}} </p> 
                                </div>
                            @enderror

                            @error('saran')
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