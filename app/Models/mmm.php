<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mmm extends Model
{
    
	public $table = "mmms";

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
