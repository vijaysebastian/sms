<?php namespace Modules\Faveosms\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Provider extends Model {
    
    protected $table = "providers";
    
    protected $fillable = ["name"];

}