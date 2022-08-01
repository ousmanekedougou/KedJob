<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

     protected $fillable = ['name','status','category_id','slug'];

    public function tags(){
        return $this->belongsToMany(Post::class,'post_tags');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
