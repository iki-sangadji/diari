@extends('layout.master')


 @section('content') 

    <div class = "col-lg-9">
        <div class ="card">
            <div class = "table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>Nama Gejala</th>
                                    <th>Pertanyaan</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                 @if(count($gejalas)>0)
                                    @foreach ($gejalas as $row)
                                        <tr>
                                                <td>{{$row->nama}}</td>
                                                <td>{{$row->pertanyaan}}</td>
                                                <td>
                                                    <img height="100" width="100" src="{{asset('storage/'.$row->image)}}" alt="" style="horizontal-align:middle">
                                                </td>
                                                <td>
                                                    
                                                    <a class="btn btn-success btn-sm" href="{{route('editGejala',$row->id)}}"><i class="fa fa-file-text"></i> Ubah</a>
                                                    <form onsubmit="return confirm('Yakin Ingin Menghapus?');" action="{{route('hapusGejala', $row->id)}}" method="DELETE" >
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