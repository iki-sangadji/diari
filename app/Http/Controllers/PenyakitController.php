<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use App\pivot_penyakit_gejala;
class PenyakitController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['show']]);
    }
    public function index(){
        $penyakits=Penyakit::all();
        return view('pages.tampilDaftarPenyakit')->with('penyakits',$penyakits);
    }
    public function show($nama){
        $penyakit=Penyakit::where('nama', '=', $nama)->first();
        return view('pages.tampilPenyakit')->with('penyakit',$penyakit);
    }
    public function store(Request $request){
        $this->validasi($request);
        $request->validate([
            'nama'=>'required',
        ]);
        $penyakit= new Penyakit();
        $penyakit->nama=$request->input('nama');
        $penyakit->deskripsi=$request->input('deskripsi');
        $penyakit->saran=$request->input('saran');
        $penyakit->save();
        return redirect('/');
    }

    public function edit($id){
        $penyakit=Penyakit::find($id);
        return view('pages.ubahPenyakit')->with('penyakit',$penyakit);
    }

    public function update(Request $request, $id){
        $this->validasi($request);
        $penyakit= Penyakit::find($id);
        $penyakit->nama=$request->input('nama');
        $penyakit->deskripsi=$request->input('deskripsi');
        $penyakit->saran=$request->input('saran');
        $penyakit->save();

        return redirect('/');
    }
    private function validasi(Request $request){
        $request->validate([
            'nama'=>'required',
            'nama' => 'unique:penyakits,nama',
            'deskripsi'=>'required',
            'saran'=>'required',
        ]);
    }

    public function destroy($id)
    {
        $pivot = pivot_penyakit_gejala::where('penyakit_id', $id);
        $pivot->delete();
        $penyakit= Penyakit::find($id);
        $penyakit->delete();
        return redirect('/daftar-penyakit');
    }
}
