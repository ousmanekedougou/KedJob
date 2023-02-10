<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Domaine;
class Candidat extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name','email','phone','date','lieu','adress','cv','motivation','profile','experience','domaine_id',
        'user_id','diplome','cni','status','type'
    ];

    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }
}
