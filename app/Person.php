<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'username' , 'first_name' , 'last_name', 'phone','email',
        'password','agreed','code','long','lat','gender','age','type_skin','color_skin',
        'color_hair','freckles','eye_color','height','weight','activities','sensitivity',
        'fire','spf','water_resistance','amount_cream','image','type_of_person','cv','blocked'];
    protected $dates = ['created_at', 'updated_at','deleted_at','remember_token'];

    public function posts(){
        return $this->hasMany(Post::class,'expert_id','id');

    }

    public function likes(){
        return $this->hasMany(Like::class,'person_id','id');

    }
    public function comments(){
        return $this->hasMany(Comment::class,'person_id','id');

    }

    public function saves(){
        return $this->hasMany(Save::class,'person_id','id');

    }

    public function followers()
    {
        return $this->belongsToMany(Person::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
    }

    public function followings()
    {
        return $this->belongsToMany(Person::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
    }
    
      public function Settings()
    {
        return $this->hasOne(Setting::class, 'follower_id', 'leader_id')->withTimestamps();
    }

}
