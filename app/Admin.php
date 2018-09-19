<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Auth;

class Admin extends Auth
{
    use SoftDeletes;
    protected $table="admins";
    public $fillable=['name','username','phone','password','email'];
    public $hidden=['password','remember_token'];
    public $primaryKey='id';
    public $dates = ['created_at','updated_at','deleted_at'];
}
