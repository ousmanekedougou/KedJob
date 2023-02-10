<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Candidat;
class Domaine extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function candidats(){
        return $this->hasMany(Candidat::class);
    }
    
}
