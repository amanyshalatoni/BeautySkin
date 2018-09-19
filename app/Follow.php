<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'followers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'post_id' , 'leader_id' , 'follow'];
    protected $dates = ['created_at', 'updated_at'];
}
