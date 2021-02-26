<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function step(){
        return $this->HasMany(Step::class);
    }
}
