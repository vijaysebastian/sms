<?php namespace Modules\Faveosms\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Sms extends Model {
    
    protected $table ="sms";

    protected $fillable = ["provider_id","name","value"];

}