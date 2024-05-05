<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class popo extends Model
{
    
	public $table = "popos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"rate"
	];

	public static $rules = [
	    "name" => "required"
	];

}
