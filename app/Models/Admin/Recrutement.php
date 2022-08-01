<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Admin\Job;
class Recrutement extends Model
{
    use HasFactory,Notifiable;
    

    protected $fillable = ['genre','name','email','phone','adress','image','cv','cni','motivation','extrait',
        'type','user_id','profil','commune_id','job_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function job(){
        return $this->belongsTo(Job::class);
    }

     public function commune(){
        return $this->belongsTo(Commune::class);
    }
}
