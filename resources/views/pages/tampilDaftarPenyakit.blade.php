@extends('layout.master')


 @section('content') 

    <div class = "col-lg-12">
        <div class ="card">
            <div class = "card-body">
                <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>Nama Penyakit</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                 @if(count($penyakits)>0)
                                    @foreach ($penyakits as $row)
                                        <tr>
                                                <td>{{$row->nama}}</td>
                                                <td>{{$row->deskripsi}}</td>
                                                <td>
                                                    
                                                    <a class="btn btn-success btn-sm" href="{{route('editPenyakit',$row->id)}}"><i class="fa fa-file-text"></i> Ubah</a>
                                                    <form onsubmit="return confirm('Yakin Ingin Menghapus?');" action="{{route('hapusPenyakit', $row->id)}}" method="DELETE" >
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> Hapus</button>
                                                    </form>  
                                                </td>
                                                
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
 

@endsection