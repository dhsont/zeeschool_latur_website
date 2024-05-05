<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
	public $table = "contacts";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"email",
		"phone",
		"mobile",
		"message",
		"spam"
	];

	public static $rules = [
	    "name" => "required",
		"mobile" => "required|numeric",
		"email" => "email",
		"message" => "required"
	];

}
