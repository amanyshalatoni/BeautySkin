<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'expert_id' , 'title' , 'body', 'image'];
    protected $dates = ['created_at', 'updated_at','deleted_at'];

    public function experts(){
        return $this->belongsTo(Person::class,'id','expert_id');
    }

    public function likes(){
        return $this->hasMany(Like::class,'post_id','id');

    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id');

    }
    public function saves(){
        return $this->hasMany(Save::class,'post_id','id');
    }
}
