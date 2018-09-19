<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Datebase\Eloquent\SoftDeletes;
use Exception;

class Setting extends Model
{
    
    public $table="settings";
        
    public $primaryKey='id';
    public $fillable = ['light','notice','payment by'];
    public $dates = ['created_at','updated_at'];
 
    
}
