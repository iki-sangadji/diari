<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use App\Penyakit;
use App\pivot_penyakit_gejala;
use Illuminate\Support\Facades\DB;

class GejalaController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except'=>['pertanyaanPertama','hitungDensitas']]);
    }
    public function index(){
        $gejalas= Gejala::all();
        return view('pages.tampilDaftarGejala')->with('gejalas', $gejalas);
    }
    public function store(Request $request)
    {
        $this->validasi($request);
        $request->validate([
            'image'=>'required|image',
        ]);
        $gejala = new Gejala;
        $gejala->nama = $request->input('nama');
        $gejala->pertanyaan = $request->input('pertanyaan');
        $gejala->sumber_gambar = $request->input('sumber');
        $arrayGejala = $request->input('id_penyakit');
        $arrayDensitas = $request->input('densitas');
        if($request->has('image')){
            // $request->validate([
            //     
            // ]);
            $gejala->image=$request->image->store('uploads','public');
        } else { 
            $gejala->image='';
        }
        
        $gejala->save();

        for($i=0;$i<sizeof($arrayGejala);$i++){
            if($arrayDensitas[$i]>0){
                $pivot= new pivot_penyakit_gejala;
                $pivot->penyakit_id=$arrayGejala[$i];
                $pivot->gejala_id= $gejala->id;
                $pivot->densitas=$arrayDensitas[$i];
                $pivot->save();
            }
        }
        
        
        return redirect('/');
    }
    
    public function edit($id){
        $gejala= Gejala::find($id);
        $penyakits= Penyakit::all();
        $pivots = DB::table('pivot_penyakit_gejalas')
        ->where('pivot_penyakit_gejalas.gejala_id','=',$id)
        ->select('pivot_penyakit_gejalas.*')->get()->toArray();
        $densitas=array();
        for($i=0;$i<sizeof($penyakits);$i++){
            $temp=0;
            for($j=0;$j<sizeof($pivots);$j++){
                if($penyakits[$i]->id==$pivots[$j]->penyakit_id){
                    $temp=$pivots[$j]->densitas;
                }
            }
            $densitas[]=$temp;
        }
        
        return view('pages.ubahGejala')->with('gejala',$gejala)->with('densitas',$densitas)->with('penyakits',$penyakits);
    }

    public function update(Request $request, $id)
    {
        $this->validasi($request);
        $gejala = Gejala::find($id);
        $gejala->nama = $request->input('nama');
        $gejala->pertanyaan = $request->input('pertanyaan');
        $gejala->sumber_gambar = $request->input('sumber');
        $arrayGejala = $request->input('id_penyakit');
        $arrayDensitas = $request->input('densitas');
        if($request->has('image')){
            $gejala->image=$request->image->store('uploads','public');
        }
        
        $gejala->save();

        for($i=0;$i<sizeof($arrayGejala);$i++){
            if($arrayDensitas[$i]>0){
                $pivot= new pivot_penyakit_gejala;
                $pivot->penyakit_id=$arrayGejala[$i];
                $pivot->gejala_id= $gejala->id;
                $pivot->densitas=$arrayDensitas[$i];
                $pivot->save();
            }
        }
        
        
        return redirect('/daftar-gejala');
    }
    public function pertanyaanPertama(){
        $gejalas= Gejala::All();
        return view("pages.tampilPertanyaan")->with('gejalas',$gejalas);
    }

    public function hitungDensitas(Request $request){
        $arrayGejala=$request->input("gejala");
        $m=array();
        $pivot=null;
        
        for($i=0;$i<sizeof($arrayGejala);$i++){
            $gejala= Gejala::where('nama', "=", $arrayGejala[$i])->get()->first();
            $densitas=pivot_penyakit_gejala::where('gejala_id','=',$gejala->id)->get()->max('densitas');
            $pivot=pivot_penyakit_gejala::where('gejala_id','=',$gejala->id)->get();
            $penyakit=array();
             for($j=0;$j<sizeof($pivot);$j++){
                 $temp=Penyakit::where('id','=',$pivot[$j]->penyakit_id)->get()->first();
                 $penyakit[]=$temp->nama;
             }
            $m[]=array(array("penyakit"=>$penyakit,"densitas"=>$densitas),array("penyakit"=>array("&"),"densitas"=> 1-$densitas));
        }
        $hasilAkhir=array();
        $hasilAkhir[]=$m[0][0];
        $hasilAkhir[]=$m[0][1];
        for($i=1;$i<sizeof($m);$i++){
            $jumlah=array();
            $hasil=$hasilAkhir;
            $pembagi=0;
            for($indexhasil1=0;$indexhasil1<sizeof($hasilAkhir);$indexhasil1++){
                $jumlah[]=0;
            }

            for( $k=0;$k<sizeof($hasil);$k++){
        
                for($j=0;$j<sizeof($m[$i]);$j++){
                    
                       $tempPenyakit2=$this->getIrisan($m[$i][$j]["penyakit"], $hasil[$k]["penyakit"]);
                       $tempDensitas2=$m[$i][$j]["densitas"] * $hasil[$k]["densitas"];
                       
                       if($tempPenyakit2[0]=="&" && (!($m[$i][$j]["penyakit"][0]=="&") || !($hasil[$k]["penyakit"][0]=="&")) ){
                           $pembagi=$pembagi+$tempDensitas2;
                          
                       }else{
                           $index=$this->getIndex($hasilAkhir, $tempPenyakit2);
                           if($index==-1){
                               $hasilAkhir[]=array("penyakit"=>$tempPenyakit2, "densitas"=>$tempDensitas2);
                               $jumlah[]=$tempDensitas2;
                           } else{
                               $jumlah[$index]=$jumlah[$index] + $tempDensitas2;
                               
                           }
                       }
                      
                    }
                    
             }
             for($l=0;$l<sizeof($hasilAkhir);$l++){
                
                 $hasilAkhir[$l]["densitas"]=$jumlah[$l]/(1-$pembagi);
                 
             }
        
        }
        $indexMax=0;
        for($l=0;$l<sizeof($hasilAkhir);$l++){
                
            if($hasilAkhir[$l]['densitas']>$hasilAkhir[$indexMax]["densitas"]){
                $indexMax=$l;
            }
        }
        //dd($hasilAkhir);
        
        $hasilAkhir[$indexMax]["densitas"]=round($hasilAkhir[$indexMax]["densitas"]*100, 4);
        return view("pages.tampilHasil")->with('hasilAkhir',$hasilAkhir[$indexMax])->with('gejalas',$arrayGejala);
    }
    
    public function getIndex( $arrayM, $arrayPenyakit){
        $index=-1;
        
        for($i=0;$i<sizeof($arrayM);$i++){
            $jumlahindex=0;
            if(sizeof($arrayM[$i]["penyakit"]) == sizeof($arrayPenyakit)){
                for($j=0;$j<sizeof($arrayM[$i]["penyakit"]);$j++){
                    for($k=0;$k<sizeof($arrayPenyakit);$k++){
                        if($arrayM[$i]["penyakit"][$j]==$arrayPenyakit[$k]){
                            $jumlahindex=$jumlahindex+1;
                        }
                    }  
                }
            } else{
                $index=-1;
            }
            if($jumlahindex==sizeof($arrayPenyakit)){
                return $i;
            }
            
        }
        return $index;
    }

    public function getIrisan($m1, $m2) {
        $hasil=array();
        if ($m1[0]=="&") {
            $hasil=$m2;
        } elseif ($m2[0]=="&"){
            $hasil=$m1;
        } else{
            for($i=0;$i<sizeof($m1);$i++){
                for($j=0;$j<sizeof($m2);$j++){
                    if($m1[$i]==$m2[$j] && $this->unik($m1[$i],$hasil)){
                        $hasil[]=$m1[$i];
                    }
                }
                
            }
        }
        if(empty($hasil)){
            $hasil[]="&";
        }
        return $hasil;
    }
    public function unik($a, array $b){
        for($i=0;$i<sizeof($b);$i++){
            if($b[$i]==$a){
                return false;
            }
        }
        return true;
    }
    private function validasi(Request $request){
        $request->validate([
            'nama'=>'required',
            'nama' => 'unique:penyakits,nama',
            'pertanyaan'=>'required',
            'sumber'=>'required',
        ]);
    }

    public function destroy($id)
    {
        $pivot = pivot_penyakit_gejala::where('gejala_id', $id);
        $pivot->delete();
        $gejala= Gejala::find($id);
        $gejala->delete();
        return redirect('/daftar-gejala');
    }
}
