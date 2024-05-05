<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tutorial extends Model
{
    
	public $table = "tutorials";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "Name",
		"date",
		"desc"
	];

	public static $rules = [
	    "Name" => "required"
	];

}
