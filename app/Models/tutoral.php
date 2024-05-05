<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tutoral extends Model
{
    
	public $table = "tutorals";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "title",
		"body",
		"name"
	];

	public static $rules = [
	    "title" => "required"
	];

}
