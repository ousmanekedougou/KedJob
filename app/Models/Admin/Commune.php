<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $fillable = ['name','departement_id'];

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function recrutements(){
        return $this->hasMany(Recrutement::class);
    }
    
}
