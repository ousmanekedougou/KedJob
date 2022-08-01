<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','status','slug'];

    public function posts(){
        return $this->belongsToMany(Post::class,'post_categories');
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }
}
