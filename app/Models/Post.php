<?php

namespace App\Models;

use App\Models\Category;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = ["category_id","title","slug","content","is_published"];
    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }
    public function tags(){
        
        return  $this->belongsToMany(Tag::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
