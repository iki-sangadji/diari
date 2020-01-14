<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    
    public function penyakits(){
        return $this->belongsToMany(Penyakit::class, 'pivot_penyakit_gejalas');
    }
}
