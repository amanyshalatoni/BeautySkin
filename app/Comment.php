<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'post_id' , 'person_id' , 'body'];
    protected $dates = ['created_at', 'updated_at'];

    public function posts(){
        return $this->belongsTo(Post::class,'id','post_id');

    }
    public function persons(){
        return $this->belongsTo(Person::class,'id','person_id');

    }
}
