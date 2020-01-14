<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;

class PagesController extends Controller
{
    public function index(){
       
        return view('pages.index');
    }
    public function tambahGejala(){
        $penyakits=Penyakit::all();
        return view('pages.tambahGejala')->with('penyakits',$penyakits);
    }

    public function tambahPenyakit(){
        return view('pages.tambahPenyakit');
    }

    public function tampilDaftarGejala(){
        
        return view('pages.tampilDaftarGejala');
    }
}
