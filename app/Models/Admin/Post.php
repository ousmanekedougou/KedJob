<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','resume','detail','expiration_at','status','user_id','slug'];

    public function categorys(){
        return $this->belongsToMany(Category::class,'post_categories');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tags');
    }
}
