<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class robot extends Model
{
    
	public $table = "robots";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    
	];

	public static $rules = [
	    
	];

}
