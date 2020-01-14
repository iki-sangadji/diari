<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    public function gejalas(){
        return $this->belongsToMany(Gejala::class, 'pivot_penyakit_gejalas');
    }
}
