<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mod extends Model
{
    
	public $table = "mods";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"age"
	];

	public static $rules = [
	    "name" => "required"
	];

}
