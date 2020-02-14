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
                        <strong>Form Tambah Gejala</strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('storeGejala')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            {{csrf_field()}}
                            
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Gejala</label>
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
                                    <label for="textarea-input" class=" form-control-label">Pertanyaan</label>
                                    
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="pertanyaan" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                    <small class="form-text text-muted">Pertanyaan yang jawabannya berupa ya atau tidak (contoh : Apakah terjadi kekauan pada sendi?)</small>
                                    @error('pertanyaan')
                                        <div class="row form-group">
                                            <p class="fa fa-exclamation"> {{$message}} </p> 
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">Gambar Pertanyaan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file-input" name="image" class="form-control-file">
                                    <small class="form-text text-muted">Gambar yang membuat pengguna memahami pertanyaan</small>
                                    @error('image')
                                        <div class="row form-group">
                                            <p class="fa fa-exclamation"> {{$message}} </p> 
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Sumber Gambar</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="sumber" placeholder="Sumber Gambar" class="form-control">
                                    @error('sumber')
                                        <div class="row form-group">
                                            <p class="fa fa-exclamation"> {{$message}} </p> 
                                        </div>    
                                    @enderror
                                </div>
                            </div>

                            @foreach ($penyakits as $penyakit)
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Densitas {{$penyakit->nama}}</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div>
                                            <input type="hidden" name="id_penyakit[]"  value="{{$penyakit->id}}" class="form-control cc-number identified visa">
                                            <input type="number" name="densitas[]" min="0" max="1" step="0.1" value="0" class="form-control cc-number identified visa">
                                            <small class="form-text text-muted">Densitas maksimal 1</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                            

                            

                             

                            
                            
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