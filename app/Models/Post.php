<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

	public $table = "posts";

	public $primaryKey = "id";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "name",
		"age",
		"body",
		"keywords",
		"description"
	];

	public static $rules = [
	    "name" => "required"
	];

}
