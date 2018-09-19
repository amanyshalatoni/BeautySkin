<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'post_id' , 'person_id' , 'like'];
    protected $dates = ['created_at', 'updated_at'];

    public function posts(){
        return $this->belongsTo(Post::class,'id','post_id');

    }
    public function persons(){
        return $this->belongsTo(Person::class,'id','person_id');

    }

}
