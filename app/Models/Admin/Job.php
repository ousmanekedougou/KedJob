<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','resume','detail','expiration_at','status','user_id','type'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function recrutements(){
        return $this->hasMany(Recrutement::class);
    }
}
