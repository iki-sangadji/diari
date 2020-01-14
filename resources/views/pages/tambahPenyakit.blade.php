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
                        <strong>Form Gejala</strong> Baru
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('storePenyakit')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            {{csrf_field()}}
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Penyakit</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="nama" placeholder="Nama gejala" class="form-control">
                                    @error('nama')
                                        <div class="row form-group">
                                            <p class="fa fa-exclamation"> {{$message}} </p> 
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                                    
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="deskripsi" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                    <small class="form-text text-muted">Deskripsi singkat penyakit</small>
                                    @error('deskripsi')
                                        <div class="row form-group">
                                            <p class="fa fa-exclamation"> {{$message}} </p> 
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Saran</label>
                                    
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="saran" id="textarea-input" rows="11" placeholder="Content..." class="form-control"></textarea>
                                    <small class="form-text text-muted">Saran untuk penderita</small>
                                    @error('saran')
                                        <div class="row form-group">
                                            <p class="fa fa-exclamation"> {{$message}} </p> 
                                        </div>    
                                    @enderror
                                </div>
                            </div>
                            

                            
                            
                            

                           

                             

                            
                            
                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        
                                    </div>
                        </form>
                    </div>                        
            </div>
        </div>
    </div>
 

@endsection