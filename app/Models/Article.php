<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        
        return route('articles.show', [$this]);

    }

    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    // if user is not used ,  author is used primary coloumn must be passed as second parameter.

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }



}
